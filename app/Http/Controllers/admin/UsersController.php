<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CreateUserRequest;
use App\Http\Requests\admin\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UsersController extends Controller
{

    public function index()
    {
        return view('admin.users.index');
    }

    public function getUsersDatatable()
    {
        $users = User::select('id', 'name', 'email', 'preferred_language', 'created_at')
            ->orderBy('id', 'desc')
            ->get();

        return DataTables::of($users)
            ->addColumn('actions', function ($user) {
                $actions = '<div class="text-center">
                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        ' . __('common.actions') . '
                        <span class="svg-icon svg-icon-5 m-0">
                           <i class="fa-solid fa-angle-down"></i>
                       </span>
                    </a>';

                $actions .= '<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">';

                    $actions .= '<div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-user-id="' . $user->id . '" data-bs-toggle="modal" data-bs-target="#kt_modal_update_details">
                        ' . __('common.edit') . '
                    </a>
                </div>';

                $actions .= '<div class="menu-item px-3">
                    <a href="#" class="menu-link px-3 text-danger" data-kt-users-table-filter="delete_row"
                       data-user-id="' . $user->id . '">' . __('common.delete') . '</a>
                </div>';

                $actions .= '</div></div>';
                
                return $actions;
            })
            ->addColumn('language', function ($user) {
                if ($user->preferred_language) {
                    $lang = $user->preferred_language === 'ar' ? __('languages.arabic') : __('languages.english');
                    return '<span class="badge badge-light-info fs-7">' . $lang . '</span>';
                }
                return '<span class="badge badge-light-secondary fs-7">-</span>';
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at->format('Y-m-d');
            })
            ->rawColumns(['actions', 'language'])
            ->make(true);
    }

    public function store(CreateUserRequest $request)
    {
        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'preferred_language' => $request->preferred_language ?? 'ar',
            ]);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => __('users.user_created'),
            ], Response::HTTP_CREATED);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function edit(User $user)
    {
        return response()->json([
            'id'                => $user->id,
            'name'              => $user->name,
            'email'             => $user->email,
            'preferred_language' => $user->preferred_language ?? 'ar',
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            DB::beginTransaction();

            $updateData = [
                'name' => $request->name,
                'email' => $request->email,
                'preferred_language' => $request->preferred_language ?? 'ar',
            ];

            // Only update password if provided
            if ($request->filled('password')) {
                $updateData['password'] = Hash::make($request->password);
            }

            $user->update($updateData);

            DB::commit();

            return response()->json(['message' => __('users.user_updated')]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'An error occurred'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(User $user)
    {
        try {
            DB::beginTransaction();

            $user->delete();

            DB::commit();

            return response()->json(['success' => true, 'message' => __('users.user_deleted')]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Operation failed'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

