<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use App\Services\ContentService;
use App\Services\PageSectionConfigService;
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
        $pages = ['index', 'about', 'services', 'contact', 'common', 'insights', 'success-stories'];
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
        $validPages = ['index', 'about', 'services', 'contact', 'common', 'insights', 'success-stories'];
        
        if (!in_array($pageName, $validPages)) {
            abort(404);
        }

        // Get section configurations
        $sections = PageSectionConfigService::getPageSections($pageName);
        $groupedSections = PageSectionConfigService::getGroupedSections($pageName);

        // Get all existing content for this page grouped by section
        $contents = PageContent::where('page_name', $pageName)
            ->orderBy('section_key')
            ->orderBy('language')
            ->get()
            ->groupBy('section_key');

        return view('admin.pages.edit', compact('pageName', 'contents', 'sections', 'groupedSections'));
    }

    public function update(Request $request, $pageName)
    {
        $validPages = ['index', 'about', 'services', 'contact', 'common', 'insights', 'success-stories'];
        
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
                // Get section config to determine content type
                $sectionConfig = PageSectionConfigService::getSection($pageName, $sectionKey);
                $defaultContentType = $sectionConfig['type'] ?? 'text';

                // Update or create content for both languages
                foreach (['ar', 'en'] as $language) {
                    $contentValue = $sectionData[$language]['content'] ?? null;
                    $contentType = $sectionData[$language]['content_type'] ?? $defaultContentType;
                    $imagePath = $sectionData[$language]['image_path'] ?? null;
                    $images = $sectionData[$language]['images'] ?? null;
                    $highlight = $sectionData[$language]['highlight'] ?? null;
                    $number = $sectionData[$language]['number'] ?? null;

                    // Handle different content types
                    $finalContent = null;
                    
                    if ($contentType === 'text_with_highlight' || $contentType === 'text_with_number') {
                        // Store as JSON for complex content
                        $contentArray = ['text' => $contentValue];
                        if ($highlight) {
                            // Handle comma-separated string or array
                            if (is_array($highlight)) {
                                $contentArray['highlight'] = array_filter(array_map('trim', $highlight));
                            } else {
                                // Split comma-separated string and trim each value
                                $highlightArray = array_filter(array_map('trim', explode(',', $highlight)));
                                $contentArray['highlight'] = !empty($highlightArray) ? array_values($highlightArray) : null;
                            }
                        }
                        if ($number) {
                            $contentArray['number'] = $number;
                        }
                        $finalContent = json_encode($contentArray);
                    } elseif ($contentType === 'sub_service') {
                        // Store sub-service as JSON with title and description
                        $contentArray = [
                            'title' => $sectionData[$language]['title'] ?? '',
                            'description' => $sectionData[$language]['description'] ?? '',
                        ];
                        $finalContent = json_encode($contentArray);
                    } else {
                        // Simple text content
                        $finalContent = $contentValue;
                    }

                    PageContent::updateOrCreate(
                        [
                            'page_name' => $pageName,
                            'section_key' => $sectionKey,
                            'language' => $language,
                        ],
                        [
                            'content_type' => $contentType,
                            'content' => $finalContent,
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
