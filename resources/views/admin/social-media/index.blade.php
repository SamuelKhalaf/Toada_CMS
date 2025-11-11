@extends('admin.layouts.master')
@section('title', __('navigation.social_media'))
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">@lang('navigation.social_media')</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('admin.users.index')}}" class="text-muted text-hover-primary">@lang('navigation.home')</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">@lang('navigation.social_media')</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </span>
                                <input type="text" data-kt-social-table-filter="search"
                                       class="form-control form-control-solid w-250px ps-14" placeholder="@lang('common.search')..."/>
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-social-table-toolbar="base">
                                <!--begin::Add social media-->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_add_social">
                                    <span class="svg-icon svg-icon-2">
                                        <i class="fa-solid fa-plus"></i>
                                    </span>
                                    @lang('common.add_social_media')
                                </button>
                                <!--end::Add social media-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_social">
                            <!--begin::Table head-->
                            <thead>
                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-125px">@lang('common.platform')</th>
                                <th class="min-w-200px">@lang('common.url')</th>
                                <th class="min-w-100px">@lang('common.status')</th>
                                <th class="min-w-100px">@lang('common.order')</th>
                                <th class="text-center min-w-100px">@lang('common.actions')</th>
                            </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-semibold">
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--begin::Modal - Add Social Media-->
    @include('admin.social-media.modals.create')
    <!--end::Modal - Add Social Media-->
    <!--begin::Modal - Update Social Media-->
    @include('admin.social-media.modals.edit')
    <!--end::Modal - Update Social Media-->
@endsection
@section('scripts')
    <script>
        $('#kt_table_social').on('draw.dt', function () {
            KTMenu.createInstances();
        });

        "use strict";

        var KTSocialMediaList = function () {
            var table = document.getElementById('kt_table_social');
            var datatable;

            var initSocialTable = function () {
                const isArabic = document.documentElement.lang === 'ar';

                datatable = $(table).DataTable({
                    processing: true,
                    serverSide: false,
                    ajax: "{{ route('admin.social-media.datatable') }}",
                    language: isArabic ? {
                        search: "بحث:",
                        lengthMenu: "عرض _MENU_ عناصر",
                        info: "عرض _START_ إلى _END_ من _TOTAL_ عنصر",
                        infoEmpty: "عرض 0 إلى 0 من 0 عنصر",
                        infoFiltered: "(تمت التصفية من _MAX_ عنصر إجمالي)",
                        processing: "جاري المعالجة...",
                        loadingRecords: "جاري التحميل...",
                        emptyTable: "لا توجد بيانات متاحة في الجدول",
                        paginate: {
                            first: "الأول",
                            last: "الأخير",
                            next: "التالي",
                            previous: "السابق"
                        }
                    } : {},
                    columns: [
                        { data: 'platform', name: 'platform' },
                        { data: 'url', name: 'url' },
                        { data: 'status', name: 'status', orderable: false, searchable: false },
                        { data: 'order', name: 'order' },
                        { data: 'actions', name: 'actions', orderable: false, searchable: false, className: 'text-center' }
                    ]
                });
            }

            var handleSearchDatatable = () => {
                const filterSearch = document.querySelector('[data-kt-social-table-filter="search"]');
                filterSearch.addEventListener('keyup', function (e) {
                    datatable.search(e.target.value).draw();
                });
            }

            return {
                init: function () {
                    if (!table) {
                        return;
                    }
                    initSocialTable();
                    handleSearchDatatable();
                }
            }
        }();

        KTUtil.onDOMContentLoaded(function () {
            KTSocialMediaList.init();
        });

        // Handle delete
        $(document).on("click", '[data-kt-social-table-filter="delete_row"]', function (e) {
            e.preventDefault();
            var socialId = $(this).data("social-id");

            Swal.fire({
                text: "{{ __('confirm_delete') }}",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "{{ __('yes_delete') }}",
                cancelButtonText: "{{ __('cancel') }}",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(function (result) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.social-media.destroy', ':id') }}".replace(':id', socialId),
                        type: 'DELETE',
                        data: {_token: '{{ csrf_token() }}'},
                        success: function (response) {
                            if (response.success) {
                                Swal.fire({
                                    text: response.message,
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "{{ __('ok') }}",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary",
                                    }
                                }).then(function () {
                                    $('#kt_table_social').DataTable().ajax.reload();
                                });
                            }
                        },
                        error: function () {
                            Swal.fire({
                                text: "{{ __('operation_failed') }}",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "{{ __('ok') }}",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-danger",
                                }
                            });
                        }
                    });
                }
            });
        });
    </script>
    @include('admin.social-media.scripts.create')
    @include('admin.social-media.scripts.edit')
@endsection

