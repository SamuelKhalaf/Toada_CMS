<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Insight;
use App\Models\InsightTranslation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class InsightController extends Controller
{
    public function index()
    {
        return view('admin.insights.index');
    }

    public function getInsightsDatatable()
    {
        $insights = Insight::with(['translations' => function ($query) {
            $query->where('language', app()->getLocale());
        }])->orderBy('id', 'desc')->get();

        return DataTables::of($insights)
            ->addColumn('title', function ($insight) {
                $translation = $insight->translation(app()->getLocale());
                return $translation ? $translation->title : '-';
            })
            ->addColumn('category', function ($insight) {
                $locale = app()->getLocale();
                return $locale === 'ar' ? $insight->category_ar : $insight->category_en;
            })
            ->addColumn('status', function ($insight) {
                if ($insight->status === 'published') {
                    return '<span class="badge badge-light-success fs-7">' . __('common.published') . '</span>';
                }
                return '<span class="badge badge-light-warning fs-7">' . __('common.draft') . '</span>';
            })
            ->addColumn('published_at', function ($insight) {
                return $insight->published_at ? $insight->published_at->format('Y-m-d') : '-';
            })
            ->addColumn('actions', function ($insight) {
                $actions = '<div class="text-center">
                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        ' . __('common.actions') . '
                        <span class="svg-icon svg-icon-5 m-0">
                           <i class="fa-solid fa-angle-down"></i>
                       </span>
                    </a>';

                $actions .= '<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">';

                    $actions .= '<div class="menu-item px-3">
                    <a href="' . route('admin.insights.edit', $insight->id) . '" class="menu-link px-3">
                        ' . __('common.edit') . '
                    </a>
                </div>';

                $actions .= '<div class="menu-item px-3">
                    <a href="#" class="menu-link px-3 text-danger" data-kt-insights-table-filter="delete_row"
                       data-insight-id="' . $insight->id . '">' . __('common.delete') . '</a>
                </div>';

                $actions .= '</div></div>';
                
                return $actions;
            })
            ->rawColumns(['status', 'actions'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.insights.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'nullable|string|unique:insights,slug',
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
            while (Insight::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            $insight = Insight::create([
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
                InsightTranslation::create([
                    'insight_id' => $insight->id,
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
                'message' => __('insights.insight_created'),
                'redirect' => route('admin.insights.index')
            ], Response::HTTP_CREATED);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred: ' . $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function edit(Insight $insight)
    {
        $translations = [];
        foreach (['ar', 'en'] as $language) {
            $translations[$language] = $insight->translation($language);
        }

        return view('admin.insights.edit', compact('insight', 'translations'));
    }

    public function update(Request $request, Insight $insight)
    {
        $request->validate([
            'slug' => 'nullable|string|unique:insights,slug,' . $insight->id,
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

            $insight->update([
                'slug' => $request->slug ?? $insight->slug,
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
                $translation = $insight->translation($language);
                
                if ($translation) {
                    $translation->update([
                        'title' => $request->input("translations.{$language}.title"),
                        'description' => $request->input("translations.{$language}.description"),
                        'body' => $request->input("translations.{$language}.body"),
                        'meta_title' => $request->input("translations.{$language}.meta_title"),
                        'meta_description' => $request->input("translations.{$language}.meta_description"),
                    ]);
                } else {
                    InsightTranslation::create([
                        'insight_id' => $insight->id,
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
                'message' => __('insights.insight_updated'),
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred: ' . $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(Insight $insight)
    {
        try {
            DB::beginTransaction();

            // Delete images if they exist
            if ($insight->featured_image && Storage::disk('public')->exists($insight->featured_image)) {
                Storage::disk('public')->delete($insight->featured_image);
            }

            if ($insight->images && is_array($insight->images)) {
                foreach ($insight->images as $image) {
                    if (Storage::disk('public')->exists($image)) {
                        Storage::disk('public')->delete($image);
                    }
                }
            }

            $insight->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => __('insights.insight_deleted')
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
            $filename = 'insights_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

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
