<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectTranslation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class ProjectController extends Controller
{
    public function index()
    {
        return view('admin.projects.index');
    }

    public function getProjectsDatatable()
    {
        $projects = Project::with(['translations' => function ($query) {
            $query->where('language', app()->getLocale());
        }])->orderBy('id', 'desc')->get();

        return DataTables::of($projects)
            ->addColumn('title', function ($project) {
                $translation = $project->translation(app()->getLocale());
                return $translation ? $translation->title : '-';
            })
            ->addColumn('date_range', function ($project) {
                return $project->date_range ?? '-';
            })
            ->addColumn('location', function ($project) {
                return $project->location_text ?? '-';
            })
            ->addColumn('status', function ($project) {
                if ($project->status === 'published') {
                    return '<span class="badge badge-light-success fs-7">' . __('common.published') . '</span>';
                }
                return '<span class="badge badge-light-warning fs-7">' . __('common.draft') . '</span>';
            })
            ->addColumn('published_at', function ($project) {
                return $project->published_at ? $project->published_at->format('Y-m-d') : '-';
            })
            ->addColumn('actions', function ($project) {
                $actions = '<div class="text-center">
                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        ' . __('common.actions') . '
                        <span class="svg-icon svg-icon-5 m-0">
                           <i class="fa-solid fa-angle-down"></i>
                       </span>
                    </a>';

                $actions .= '<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">';

                    $actions .= '<div class="menu-item px-3">
                    <a href="' . route('admin.projects.edit', $project->id) . '" class="menu-link px-3">
                        ' . __('common.edit') . '
                    </a>
                </div>';

                // $actions .= '<div class="menu-item px-3">
                //     <a href="#" class="menu-link px-3 text-danger" data-kt-projects-table-filter="delete_row"
                //        data-project-id="' . $project->id . '">' . __('common.delete') . '</a>
                // </div>';

                $actions .= '</div></div>';
                
                return $actions;
            })
            ->rawColumns(['status', 'actions'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'nullable|string|unique:projects,slug',
            'featured_image' => 'nullable|string',
            'date_range' => 'nullable|string|max:255',
            'location_text' => 'nullable|string|max:255',
            'location_url' => 'nullable|url',
            'register_url_ar' => 'nullable|url',
            'register_url_en' => 'nullable|url',
            'tags' => 'nullable|string', // Will be converted to array
            'published_at' => 'nullable|date',
            'order' => 'nullable|integer|min:0',
            'status' => 'required|in:draft,published',
            'translations.ar.title' => 'required|string|max:255',
            'translations.ar.description' => 'required|string',
            'translations.ar.badge_text' => 'nullable|string|max:255',
            'translations.en.title' => 'required|string|max:255',
            'translations.en.description' => 'required|string',
            'translations.en.badge_text' => 'nullable|string|max:255',
        ]);

        try {
            DB::beginTransaction();

            // Generate slug if not provided
            $slug = $request->slug ?? Str::slug($request->input('translations.en.title'));

            // Ensure slug is unique
            $originalSlug = $slug;
            $counter = 1;
            while (Project::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            // Convert tags string to array
            $tags = null;
            if ($request->tags) {
                $tagsArray = array_map('trim', explode(',', $request->tags));
                $tags = array_filter($tagsArray);
            }

            $project = Project::create([
                'slug' => $slug,
                'featured_image' => $request->featured_image,
                'date_range' => $request->date_range,
                'location_text' => $request->location_text,
                'location_url' => $request->location_url,
                'register_url_ar' => $request->register_url_ar,
                'register_url_en' => $request->register_url_en,
                'tags' => $tags,
                'published_at' => $request->published_at,
                'order' => $request->order ?? 0,
                'status' => $request->status,
            ]);

            // Create translations
            foreach (['ar', 'en'] as $language) {
                ProjectTranslation::create([
                    'project_id' => $project->id,
                    'language' => $language,
                    'title' => $request->input("translations.{$language}.title"),
                    'description' => $request->input("translations.{$language}.description"),
                    'badge_text' => $request->input("translations.{$language}.badge_text"),
                ]);
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => __('common.project_created'),
                'redirect' => route('admin.projects.index')
            ], Response::HTTP_CREATED);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred: ' . $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function edit(Project $project)
    {
        $translations = [];
        foreach (['ar', 'en'] as $language) {
            $translations[$language] = $project->translation($language);
        }

        return view('admin.projects.edit', compact('project', 'translations'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'slug' => 'nullable|string|unique:projects,slug,' . $project->id,
            'featured_image' => 'nullable|string',
            'date_range' => 'nullable|string|max:255',
            'location_text' => 'nullable|string|max:255',
            'location_url' => 'nullable|url',
            'register_url_ar' => 'nullable|url',
            'register_url_en' => 'nullable|url',
            'tags' => 'nullable|string',
            'published_at' => 'nullable|date',
            'order' => 'nullable|integer|min:0',
            'status' => 'required|in:draft,published',
            'translations.ar.title' => 'required|string|max:255',
            'translations.ar.description' => 'required|string',
            'translations.ar.badge_text' => 'nullable|string|max:255',
            'translations.en.title' => 'required|string|max:255',
            'translations.en.description' => 'required|string',
            'translations.en.badge_text' => 'nullable|string|max:255',
        ]);

        try {
            DB::beginTransaction();

            // Convert tags string to array
            $tags = null;
            if ($request->tags) {
                $tagsArray = array_map('trim', explode(',', $request->tags));
                $tags = array_filter($tagsArray);
            }

            $project->update([
                'slug' => $request->slug ?? $project->slug,
                'featured_image' => $request->featured_image,
                'date_range' => $request->date_range,
                'location_text' => $request->location_text,
                'location_url' => $request->location_url,
                'register_url_ar' => $request->register_url_ar,
                'register_url_en' => $request->register_url_en,
                'tags' => $tags,
                'published_at' => $request->published_at,
                'order' => $request->order ?? 0,
                'status' => $request->status,
            ]);

            // Update translations
            foreach (['ar', 'en'] as $language) {
                $translation = $project->translation($language);
                
                if ($translation) {
                    $translation->update([
                        'title' => $request->input("translations.{$language}.title"),
                        'description' => $request->input("translations.{$language}.description"),
                        'badge_text' => $request->input("translations.{$language}.badge_text"),
                    ]);
                } else {
                    ProjectTranslation::create([
                        'project_id' => $project->id,
                        'language' => $language,
                        'title' => $request->input("translations.{$language}.title"),
                        'description' => $request->input("translations.{$language}.description"),
                        'badge_text' => $request->input("translations.{$language}.badge_text"),
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => __('common.project_updated'),
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred: ' . $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(Project $project)
    {
        try {
            DB::beginTransaction();

            // Delete image if it exists
            if ($project->featured_image && Storage::disk('public')->exists($project->featured_image)) {
                Storage::disk('public')->delete($project->featured_image);
            }

            $project->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => __('common.project_deleted')
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
            $filename = 'projects_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

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
