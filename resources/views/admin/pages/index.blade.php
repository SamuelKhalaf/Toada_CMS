@extends('admin.layouts.master')
@section('title', __('navigation.pages'))
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">@lang('navigation.pages')</h1>
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
                        <li class="breadcrumb-item text-muted">@lang('navigation.pages')</li>
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
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">@lang('navigation.pages')</span>
                            <span class="text-muted mt-1 fw-semibold fs-7">@lang('common.manage_pages_content')</span>
                        </h3>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5">
                                <thead>
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-150px">@lang('common.page')</th>
                                    <th class="min-w-150px">@lang('common.description_english')</th>
                                    <th class="text-end min-w-100px">@lang('common.actions')</th>
                                </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-semibold">
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="fw-bold">Index</span>
                                        </div>
                                    </td>
                                    <td>@lang('common.home_page_content')</td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.pages.edit', 'index') }}" class="btn btn-sm btn-light btn-active-light-primary">
                                            @lang('common.edit')
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="fw-bold">About</span>
                                        </div>
                                    </td>
                                    <td>@lang('common.about_page_content')</td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.pages.edit', 'about') }}" class="btn btn-sm btn-light btn-active-light-primary">
                                            @lang('common.edit')
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="fw-bold">Services</span>
                                        </div>
                                    </td>
                                    <td>@lang('common.services_page_content')</td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.pages.edit', 'services') }}" class="btn btn-sm btn-light btn-active-light-primary">
                                            @lang('common.edit')
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="fw-bold">Contact</span>
                                        </div>
                                    </td>
                                    <td>@lang('common.contact_page_content')</td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.pages.edit', 'contact') }}" class="btn btn-sm btn-light btn-active-light-primary">
                                            @lang('common.edit')
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="fw-bold">Common</span>
                                        </div>
                                    </td>
                                    <td>@lang('common.shared_content')</td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.pages.edit', 'common') }}" class="btn btn-sm btn-light btn-active-light-primary">
                                            @lang('common.edit')
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="fw-bold">Insights</span>
                                        </div>
                                    </td>
                                    <td>@lang('common.insights_page_content')</td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.pages.edit', 'insights') }}" class="btn btn-sm btn-light btn-active-light-primary">
                                            @lang('common.edit')
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="fw-bold">Success Stories</span>
                                        </div>
                                    </td>
                                    <td>@lang('common.success_stories_page_content')</td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.pages.edit', 'success-stories') }}" class="btn btn-sm btn-light btn-active-light-primary">
                                            @lang('common.edit')
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
@endsection

