<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use App\Services\ContentService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PageContentController extends Controller
{
    protected $contentService;

    public function __construct(ContentService $contentService)
    {
        $this->contentService = $contentService;
    }

    public function index()
    {
        $pages = ['index', 'about', 'services', 'contact', 'common'];
        $pageContents = [];

        foreach ($pages as $page) {
            $pageContents[$page] = PageContent::where('page_name', $page)
                ->orderBy('section_key')
                ->orderBy('language')
                ->get()
                ->groupBy('section_key');
        }

        return view('admin.pages.index', compact('pages', 'pageContents'));
    }

    public function edit($pageName)
    {
        $validPages = ['index', 'about', 'services', 'contact', 'common'];
        
        if (!in_array($pageName, $validPages)) {
            abort(404);
        }

        // Get all content for this page grouped by section
        $contents = PageContent::where('page_name', $pageName)
            ->orderBy('section_key')
            ->orderBy('language')
            ->get()
            ->groupBy('section_key');

        return view('admin.pages.edit', compact('pageName', 'contents'));
    }

    public function update(Request $request, $pageName)
    {
        $validPages = ['index', 'about', 'services', 'contact', 'common'];
        
        if (!in_array($pageName, $validPages)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid page name'
            ], Response::HTTP_BAD_REQUEST);
        }

        try {
            DB::beginTransaction();

            $sections = $request->input('sections', []);

            foreach ($sections as $sectionKey => $sectionData) {
                // Update or create content for both languages
                foreach (['ar', 'en'] as $language) {
                    $content = $sectionData[$language]['content'] ?? null;
                    $contentType = $sectionData[$language]['content_type'] ?? 'text';
                    $imagePath = $sectionData[$language]['image_path'] ?? null;
                    $images = $sectionData[$language]['images'] ?? null;

                    PageContent::updateOrCreate(
                        [
                            'page_name' => $pageName,
                            'section_key' => $sectionKey,
                            'language' => $language,
                        ],
                        [
                            'content_type' => $contentType,
                            'content' => $content,
                            'image_path' => $imagePath,
                            'images' => is_array($images) ? json_encode($images) : $images,
                        ]
                    );
                }
            }

            // Clear cache
            $this->contentService->clearCache($pageName);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => __('pages.content_updated'),
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred: ' . $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:10240', // 10MB max
            'page_name' => 'required|string',
            'section_key' => 'required|string',
        ]);

        try {
            $image = $request->file('image');
            $pageName = $request->input('page_name');
            $sectionKey = $request->input('section_key');

            // Generate unique filename
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Store in storage/app/public/content
            $path = $image->storeAs('content', $filename, 'public');

            // Return the path relative to storage/app/public
            return response()->json([
                'status' => 'success',
                'path' => $path,
                'url' => asset('storage/' . $path),
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to upload image: ' . $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
