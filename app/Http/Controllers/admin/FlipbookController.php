<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Flipbook;
use App\Models\FlipbookTranslation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class FlipbookController extends Controller
{
    public function index()
    {
        return view('admin.flipbooks.index');
    }

    public function getFlipbooksDatatable()
    {
        $flipbooks = Flipbook::with(['translations' => function ($query) {
            $query->where('language', app()->getLocale());
        }])->orderBy('id', 'desc')->get();

        return DataTables::of($flipbooks)
            ->addColumn('title', function ($flipbook) {
                $translation = $flipbook->translation(app()->getLocale());
                return $translation ? $translation->title : '-';
            })
            ->addColumn('heyzine_url', function ($flipbook) {
                $url = $flipbook->heyzine_url_en ?: $flipbook->heyzine_url_ar;
                if ($url) {
                    return '<a href="' . $url . '" target="_blank" class="text-primary">' . substr($url, 0, 50) . '...</a>';
                }
                return '-';
            })
            ->addColumn('status', function ($flipbook) {
                if ($flipbook->status === 'published') {
                    return '<span class="badge badge-light-success fs-7">' . __('common.published') . '</span>';
                }
                return '<span class="badge badge-light-warning fs-7">' . __('common.draft') . '</span>';
            })
            ->addColumn('published_at', function ($flipbook) {
                return $flipbook->published_at ? $flipbook->published_at->format('Y-m-d') : '-';
            })
            ->addColumn('actions', function ($flipbook) {
                $actions = '<div class="text-center">
                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        ' . __('common.actions') . '
                        <span class="svg-icon svg-icon-5 m-0">
                           <i class="fa-solid fa-angle-down"></i>
                       </span>
                    </a>';

                $actions .= '<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">';

                    $actions .= '<div class="menu-item px-3">
                    <a href="' . route('admin.flipbooks.edit', $flipbook->id) . '" class="menu-link px-3">
                        ' . __('common.edit') . '
                    </a>
                </div>';

                $actions .= '<div class="menu-item px-3">
                    <a href="#" class="menu-link px-3 text-danger" data-kt-flipbooks-table-filter="delete_row"
                       data-flipbook-id="' . $flipbook->id . '">' . __('common.delete') . '</a>
                </div>';

                $actions .= '</div></div>';
                
                return $actions;
            })
            ->rawColumns(['status', 'actions', 'heyzine_url'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.flipbooks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heyzine_url_en' => 'required|url|max:500',
            'heyzine_url_ar' => 'nullable|url|max:500',
            'cover_image_en' => 'nullable|url|max:500',
            'cover_image_ar' => 'nullable|url|max:500',
            'published_at' => 'nullable|date',
            'status' => 'required|in:draft,published',
            'translations.ar.title' => 'nullable|string|max:255',
            'translations.ar.subtitle' => 'nullable|string|max:255',
            'translations.en.title' => 'nullable|string|max:255',
            'translations.en.subtitle' => 'nullable|string|max:255',
        ]);

        try {
            DB::beginTransaction();

            $flipbook = Flipbook::create([
                'heyzine_url_en' => $request->heyzine_url_en,
                'heyzine_url_ar' => $request->heyzine_url_ar,
                'cover_image_en' => $request->cover_image_en,
                'cover_image_ar' => $request->cover_image_ar,
                'published_at' => $request->published_at,
                'status' => $request->status,
            ]);

            // Create translations
            foreach (['ar', 'en'] as $language) {
                FlipbookTranslation::create([
                    'flipbook_id' => $flipbook->id,
                    'language' => $language,
                    'title' => $request->input("translations.{$language}.title"),
                    'subtitle' => $request->input("translations.{$language}.subtitle"),
                ]);
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => __('flipbooks.flipbook_created'),
                'redirect' => route('admin.flipbooks.index')
            ], Response::HTTP_CREATED);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred: ' . $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function edit(Flipbook $flipbook)
    {
        $translations = [];
        foreach (['ar', 'en'] as $language) {
            $translations[$language] = $flipbook->translation($language);
        }

        return view('admin.flipbooks.edit', compact('flipbook', 'translations'));
    }

    public function update(Request $request, Flipbook $flipbook)
    {
        $request->validate([
            'heyzine_url_en' => 'required|url|max:500',
            'heyzine_url_ar' => 'nullable|url|max:500',
            'cover_image_en' => 'nullable|url|max:500',
            'cover_image_ar' => 'nullable|url|max:500',
            'published_at' => 'nullable|date',
            'status' => 'required|in:draft,published',
            'translations.ar.title' => 'nullable|string|max:255',
            'translations.ar.subtitle' => 'nullable|string|max:255',
            'translations.en.title' => 'nullable|string|max:255',
            'translations.en.subtitle' => 'nullable|string|max:255',
        ]);

        try {
            DB::beginTransaction();

            $flipbook->update([
                'heyzine_url_en' => $request->heyzine_url_en,
                'heyzine_url_ar' => $request->heyzine_url_ar,
                'cover_image_en' => $request->cover_image_en,
                'cover_image_ar' => $request->cover_image_ar,
                'published_at' => $request->published_at,
                'status' => $request->status,
            ]);

            // Update translations
            foreach (['ar', 'en'] as $language) {
                $translation = $flipbook->translation($language);
                
                if ($translation) {
                    $translation->update([
                        'title' => $request->input("translations.{$language}.title"),
                        'subtitle' => $request->input("translations.{$language}.subtitle"),
                    ]);
                } else {
                    FlipbookTranslation::create([
                        'flipbook_id' => $flipbook->id,
                        'language' => $language,
                        'title' => $request->input("translations.{$language}.title"),
                        'subtitle' => $request->input("translations.{$language}.subtitle"),
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => __('flipbooks.flipbook_updated'),
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred: ' . $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(Flipbook $flipbook)
    {
        try {
            DB::beginTransaction();

            $flipbook->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => __('flipbooks.flipbook_deleted')
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
            $filename = 'flipbooks_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

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
