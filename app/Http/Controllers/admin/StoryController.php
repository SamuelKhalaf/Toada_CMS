<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Models\StoryTranslation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class StoryController extends Controller
{
    public function index()
    {
        return view('admin.stories.index');
    }

    public function getStoriesDatatable()
    {
        $stories = Story::with(['translations' => function ($query) {
            $query->where('language', app()->getLocale());
        }])->orderBy('id', 'desc')->get();

        return DataTables::of($stories)
            ->addColumn('title', function ($story) {
                $translation = $story->translation(app()->getLocale());
                return $translation ? $translation->title : '-';
            })
            ->addColumn('category', function ($story) {
                $locale = app()->getLocale();
                return $locale === 'ar' ? $story->category_ar : $story->category_en;
            })
            ->addColumn('status', function ($story) {
                if ($story->status === 'published') {
                    return '<span class="badge badge-light-success fs-7">' . __('common.published') . '</span>';
                }
                return '<span class="badge badge-light-warning fs-7">' . __('common.draft') . '</span>';
            })
            ->addColumn('published_at', function ($story) {
                return $story->published_at ? $story->published_at->format('Y-m-d') : '-';
            })
            ->addColumn('actions', function ($story) {
                $actions = '<div class="text-center">
                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        ' . __('common.actions') . '
                        <span class="svg-icon svg-icon-5 m-0">
                           <i class="fa-solid fa-angle-down"></i>
                       </span>
                    </a>';

                $actions .= '<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">';

                    $actions .= '<div class="menu-item px-3">
                    <a href="' . route('admin.stories.edit', $story->id) . '" class="menu-link px-3">
                        ' . __('common.edit') . '
                    </a>
                </div>';

                $actions .= '<div class="menu-item px-3">
                    <a href="#" class="menu-link px-3 text-danger" data-kt-stories-table-filter="delete_row"
                       data-story-id="' . $story->id . '">' . __('common.delete') . '</a>
                </div>';

                $actions .= '</div></div>';
                
                return $actions;
            })
            ->rawColumns(['status', 'actions'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.stories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'nullable|string|unique:stories,slug',
            'category_en' => 'required|string|max:255',
            'category_ar' => 'required|string|max:255',
            'tags' => 'nullable|array',
            'featured_image' => 'nullable|string',
            'images' => 'nullable|array',
            'published_at' => 'nullable|date',
            'order' => 'nullable|integer|min:0',
            'status' => 'required|in:draft,published',
            'translations.ar.title' => 'required|string|max:255',
            'translations.ar.description' => 'required|string',
            'translations.ar.body' => 'nullable|string',
            'translations.en.title' => 'required|string|max:255',
            'translations.en.description' => 'required|string',
            'translations.en.body' => 'nullable|string',
        ]);

        try {
            DB::beginTransaction();

            // Generate slug if not provided
            $slug = $request->slug ?? Str::slug($request->input('translations.en.title'));

            // Ensure slug is unique
            $originalSlug = $slug;
            $counter = 1;
            while (Story::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            $story = Story::create([
                'slug' => $slug,
                'category_en' => $request->category_en,
                'category_ar' => $request->category_ar,
                'tags' => $request->tags,
                'featured_image' => $request->featured_image,
                'images' => $request->images,
                'published_at' => $request->published_at,
                'order' => $request->order ?? 0,
                'status' => $request->status,
            ]);

            // Create translations
            foreach (['ar', 'en'] as $language) {
                StoryTranslation::create([
                    'story_id' => $story->id,
                    'language' => $language,
                    'title' => $request->input("translations.{$language}.title"),
                    'description' => $request->input("translations.{$language}.description"),
                    'body' => $request->input("translations.{$language}.body"),
                    'meta_title' => $request->input("translations.{$language}.meta_title"),
                    'meta_description' => $request->input("translations.{$language}.meta_description"),
                ]);
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => __('stories.story_created'),
                'redirect' => route('admin.stories.index')
            ], Response::HTTP_CREATED);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred: ' . $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function edit(Story $story)
    {
        $translations = [];
        foreach (['ar', 'en'] as $language) {
            $translations[$language] = $story->translation($language);
        }

        return view('admin.stories.edit', compact('story', 'translations'));
    }

    public function update(Request $request, Story $story)
    {
        $request->validate([
            'slug' => 'nullable|string|unique:stories,slug,' . $story->id,
            'category_en' => 'required|string|max:255',
            'category_ar' => 'required|string|max:255',
            'tags' => 'nullable|array',
            'featured_image' => 'nullable|string',
            'images' => 'nullable|array',
            'published_at' => 'nullable|date',
            'order' => 'nullable|integer|min:0',
            'status' => 'required|in:draft,published',
            'translations.ar.title' => 'required|string|max:255',
            'translations.ar.description' => 'required|string',
            'translations.ar.body' => 'nullable|string',
            'translations.en.title' => 'required|string|max:255',
            'translations.en.description' => 'required|string',
            'translations.en.body' => 'nullable|string',
        ]);

        try {
            DB::beginTransaction();

            $story->update([
                'slug' => $request->slug ?? $story->slug,
                'category_en' => $request->category_en,
                'category_ar' => $request->category_ar,
                'tags' => $request->tags,
                'featured_image' => $request->featured_image,
                'images' => $request->images,
                'published_at' => $request->published_at,
                'order' => $request->order ?? 0,
                'status' => $request->status,
            ]);

            // Update translations
            foreach (['ar', 'en'] as $language) {
                $translation = $story->translation($language);
                
                if ($translation) {
                    $translation->update([
                        'title' => $request->input("translations.{$language}.title"),
                        'description' => $request->input("translations.{$language}.description"),
                        'body' => $request->input("translations.{$language}.body"),
                        'meta_title' => $request->input("translations.{$language}.meta_title"),
                        'meta_description' => $request->input("translations.{$language}.meta_description"),
                    ]);
                } else {
                    StoryTranslation::create([
                        'story_id' => $story->id,
                        'language' => $language,
                        'title' => $request->input("translations.{$language}.title"),
                        'description' => $request->input("translations.{$language}.description"),
                        'body' => $request->input("translations.{$language}.body"),
                        'meta_title' => $request->input("translations.{$language}.meta_title"),
                        'meta_description' => $request->input("translations.{$language}.meta_description"),
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => __('stories.story_updated'),
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred: ' . $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(Story $story)
    {
        try {
            DB::beginTransaction();

            // Delete images if they exist
            if ($story->featured_image && Storage::disk('public')->exists($story->featured_image)) {
                Storage::disk('public')->delete($story->featured_image);
            }

            if ($story->images && is_array($story->images)) {
                foreach ($story->images as $image) {
                    if (Storage::disk('public')->exists($image)) {
                        Storage::disk('public')->delete($image);
                    }
                }
            }

            $story->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => __('stories.story_deleted')
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Operation failed'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:10240', // 10MB max
        ]);

        try {
            $image = $request->file('image');

            // Generate unique filename
            $filename = 'stories_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

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
