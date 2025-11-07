<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class SocialMediaController extends Controller
{
    public function index()
    {
        return view('admin.social-media.index');
    }

    public function getSocialMediaDatatable()
    {
        $socialMedia = SocialMedia::orderBy('order')->get();

        return DataTables::of($socialMedia)
            ->addColumn('actions', function ($item) {
                $actions = '<div class="text-center">
                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        ' . __('common.actions') . '
                        <span class="svg-icon svg-icon-5 m-0">
                           <i class="fa-solid fa-angle-down"></i>
                       </span>
                    </a>';

                $actions .= '<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">';

                $actions .= '<div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-social-id="' . $item->id . '" data-bs-toggle="modal" data-bs-target="#kt_modal_update_social">
                        ' . __('common.edit') . '
                    </a>
                </div>';

                $actions .= '<div class="menu-item px-3">
                    <a href="#" class="menu-link px-3 text-danger" data-kt-social-table-filter="delete_row"
                       data-social-id="' . $item->id . '">' . __('common.delete') . '</a>
                </div>';

                $actions .= '</div></div>';
                
                return $actions;
            })
            ->addColumn('status', function ($item) {
                if ($item->is_active) {
                    return '<span class="badge badge-light-success fs-7">' . __('common.active') . '</span>';
                }
                return '<span class="badge badge-light-danger fs-7">' . __('common.inactive') . '</span>';
            })
            ->rawColumns(['actions', 'status'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'platform' => 'required|string|max:255',
            'url' => 'required|url',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        try {
            DB::beginTransaction();

            SocialMedia::create([
                'platform' => $request->platform,
                'url' => $request->url,
                'icon_path' => $request->icon_path,
                'order' => $request->order ?? 0,
                'is_active' => $request->is_active ?? true,
            ]);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => __('social_media.link_created'),
            ], Response::HTTP_CREATED);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function edit(SocialMedia $socialMedia)
    {
        return response()->json([
            'id' => $socialMedia->id,
            'platform' => $socialMedia->platform,
            'url' => $socialMedia->url,
            'icon_path' => $socialMedia->icon_path,
            'order' => $socialMedia->order,
            'is_active' => $socialMedia->is_active,
        ]);
    }

    public function update(Request $request, SocialMedia $socialMedia)
    {
        $request->validate([
            'platform' => 'required|string|max:255',
            'url' => 'required|url',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        try {
            DB::beginTransaction();

            $socialMedia->update([
                'platform' => $request->platform,
                'url' => $request->url,
                'icon_path' => $request->icon_path,
                'order' => $request->order ?? 0,
                'is_active' => $request->is_active ?? true,
            ]);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => __('social_media.link_updated'),
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(SocialMedia $socialMedia)
    {
        try {
            DB::beginTransaction();

            $socialMedia->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => __('social_media.link_deleted')
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Operation failed'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
