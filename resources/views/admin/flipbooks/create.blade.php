@extends('admin.layouts.master')
@section('title', 'Create Flipbook')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">@lang('common.create_flipbook')</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('admin.flipbooks.index')}}" class="text-muted text-hover-primary">@lang('navigation.flipbooks')</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">@lang('common.create')</li>
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
                <form id="kt_form_flipbook" action="{{ route('admin.flipbooks.store') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header border-0 pt-6">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">@lang('common.flipbook_details')</span>
                                <span class="text-muted mt-1 fw-semibold fs-7">@lang('common.create_new_flipbook')</span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <!-- Tabs -->
                            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold mb-10">
                                <li class="nav-item mt-2">
                                    <a class="nav-link text-active-primary ms-0 me-10 py-5 active" data-bs-toggle="tab" href="#kt_tab_basic">
                                        @lang('common.basic_info')
                                    </a>
                                </li>
                                <li class="nav-item mt-2">
                                    <a class="nav-link text-active-primary me-10 py-5" data-bs-toggle="tab" href="#kt_tab_english">
                                        @lang('common.english_content')
                                    </a>
                                </li>
                                <li class="nav-item mt-2">
                                    <a class="nav-link text-active-primary me-10 py-5" data-bs-toggle="tab" href="#kt_tab_arabic">
                                        @lang('common.arabic_content')
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content" id="kt_tab_content">
                                <!-- Basic Info Tab -->
                                <div class="tab-pane fade show active" id="kt_tab_basic" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-6 mb-5">
                                            <label class="required fw-semibold fs-6 mb-2">@lang('common.heyzine_url_english')</label>
                                            <input type="url" name="heyzine_url_en" class="form-control form-control-solid" placeholder="https://heyzine.com/flip-book/..." required/>
                                            <div class="form-text">@lang('common.heyzine_url_help')</div>
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.heyzine_url_arabic')</label>
                                            <input type="url" name="heyzine_url_ar" class="form-control form-control-solid" placeholder="https://heyzine.com/flip-book/..."/>
                                            <div class="form-text">@lang('common.heyzine_url_help')</div>
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.cover_image_english')</label>
                                            <input type="url" name="cover_image_en" class="form-control form-control-solid" placeholder="https://example.com/image.jpg"/>
                                            <div class="form-text">@lang('common.cover_image_url_help')</div>
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.cover_image_arabic')</label>
                                            <input type="url" name="cover_image_ar" class="form-control form-control-solid" placeholder="https://example.com/image.jpg"/>
                                            <div class="form-text">@lang('common.cover_image_url_help')</div>
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <label class="required fw-semibold fs-6 mb-2">@lang('common.status')</label>
                                            <select name="status" class="form-select form-select-solid" required>
                                                <option value="draft">@lang('common.draft')</option>
                                                <option value="published">@lang('common.published')</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.published_at')</label>
                                            <input type="datetime-local" name="published_at" class="form-control form-control-solid"/>
                                        </div>
                                    </div>
                                </div>

                                <!-- English Content Tab -->
                                <div class="tab-pane fade" id="kt_tab_english" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12 mb-5">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.title_english')</label>
                                            <input type="text" name="translations[en][title]" class="form-control form-control-solid" placeholder="@lang('common.title_placeholder')"/>
                                            <div class="form-text">@lang('common.title_optional')</div>
                                        </div>
                                        <div class="col-12 mb-5">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.subtitle_english')</label>
                                            <input type="text" name="translations[en][subtitle]" class="form-control form-control-solid" placeholder="@lang('common.subtitle_placeholder')"/>
                                            <div class="form-text">@lang('common.subtitle_optional')</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Arabic Content Tab -->
                                <div class="tab-pane fade" id="kt_tab_arabic" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12 mb-5">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.title_arabic')</label>
                                            <input type="text" name="translations[ar][title]" class="form-control form-control-solid" placeholder="@lang('common.title_placeholder')"/>
                                            <div class="form-text">@lang('common.title_optional')</div>
                                        </div>
                                        <div class="col-12 mb-5">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.subtitle_arabic')</label>
                                            <input type="text" name="translations[ar][subtitle]" class="form-control form-control-solid" placeholder="@lang('common.subtitle_placeholder')"/>
                                            <div class="form-text">@lang('common.subtitle_optional')</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="{{ route('admin.flipbooks.index') }}" class="btn btn-light me-3">@lang('common.cancel')</a>
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">@lang('common.save')</span>
                                <span class="indicator-progress">@lang('common.please_wait')
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    // Handle form submission
    document.getElementById('kt_form_flipbook').addEventListener('submit', function(e) {
        e.preventDefault();
        const form = this;
        
        const submitButton = form.querySelector('button[type="submit"]');
        const indicator = submitButton.querySelector('.indicator-progress');
        const label = submitButton.querySelector('.indicator-label');
        
        submitButton.setAttribute('data-kt-indicator', 'on');
        indicator.classList.remove('d-none');
        label.classList.add('d-none');
        submitButton.disabled = true;
        
        const formData = new FormData(form);
        
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            }
        })
        .then(response => response.json())
        .then(data => {
            submitButton.removeAttribute('data-kt-indicator');
            indicator.classList.add('d-none');
            label.classList.remove('d-none');
            submitButton.disabled = false;
            
            if (data.status === 'success') {
                Swal.fire({
                    text: data.message,
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "{{ __('common.ok') }}",
                    customClass: { confirmButton: "btn btn-primary" }
                }).then(function() {
                    if (data.redirect) {
                        window.location.href = data.redirect;
                    }
                });
            } else {
                Swal.fire({
                    text: data.message || "{{ __('operation_failed') }}",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "{{ __('common.ok') }}",
                    customClass: { confirmButton: "btn btn-primary" }
                });
            }
        })
        .catch(error => {
            submitButton.removeAttribute('data-kt-indicator');
            indicator.classList.add('d-none');
            label.classList.remove('d-none');
            submitButton.disabled = false;
            
            Swal.fire({
                text: "{{ __('operation_failed') }}",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "{{ __('common.ok') }}",
                customClass: { confirmButton: "btn btn-primary" }
            });
        });
    });
</script>
@endsection

