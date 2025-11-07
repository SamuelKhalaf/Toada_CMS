@extends('admin.layouts.master')
@section('title', 'Create Story')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Create Story</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('admin.stories.index')}}" class="text-muted text-hover-primary">@lang('navigation.stories')</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Create</li>
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
                <form id="kt_form_story" action="{{ route('admin.stories.store') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header border-0 pt-6">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">Story Details</span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <!-- Basic Info -->
                            <div class="mb-10">
                                <h4 class="fw-bold mb-5">Basic Information</h4>
                                <div class="row">
                                    <div class="col-md-6 mb-5">
                                        <label class="required fw-semibold fs-6 mb-2">Category (English)</label>
                                        <input type="text" name="category_en" class="form-control form-control-solid" required/>
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <label class="required fw-semibold fs-6 mb-2">Category (Arabic)</label>
                                        <input type="text" name="category_ar" class="form-control form-control-solid" required/>
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <label class="fw-semibold fs-6 mb-2">Slug</label>
                                        <input type="text" name="slug" class="form-control form-control-solid" placeholder="Auto-generated if empty"/>
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <label class="fw-semibold fs-6 mb-2">Order</label>
                                        <input type="number" name="order" class="form-control form-control-solid" value="0" min="0"/>
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <label class="required fw-semibold fs-6 mb-2">Status</label>
                                        <select name="status" class="form-select form-select-solid" required>
                                            <option value="draft">Draft</option>
                                            <option value="published">Published</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <label class="fw-semibold fs-6 mb-2">Published At</label>
                                        <input type="datetime-local" name="published_at" class="form-control form-control-solid"/>
                                    </div>
                                </div>
                            </div>

                            <!-- Translations -->
                            <div class="mb-10">
                                <h4 class="fw-bold mb-5">Content (English)</h4>
                                <div class="row">
                                    <div class="col-12 mb-5">
                                        <label class="required fw-semibold fs-6 mb-2">Title (English)</label>
                                        <input type="text" name="translations[en][title]" class="form-control form-control-solid" required/>
                                    </div>
                                    <div class="col-12 mb-5">
                                        <label class="required fw-semibold fs-6 mb-2">Description (English)</label>
                                        <textarea name="translations[en][description]" class="form-control form-control-solid" rows="3" required></textarea>
                                    </div>
                                    <div class="col-12 mb-5">
                                        <label class="fw-semibold fs-6 mb-2">Body (English)</label>
                                        <textarea name="translations[en][body]" class="form-control form-control-solid" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-10">
                                <h4 class="fw-bold mb-5">Content (Arabic)</h4>
                                <div class="row">
                                    <div class="col-12 mb-5">
                                        <label class="required fw-semibold fs-6 mb-2">Title (Arabic)</label>
                                        <input type="text" name="translations[ar][title]" class="form-control form-control-solid" required/>
                                    </div>
                                    <div class="col-12 mb-5">
                                        <label class="required fw-semibold fs-6 mb-2">Description (Arabic)</label>
                                        <textarea name="translations[ar][description]" class="form-control form-control-solid" rows="3" required></textarea>
                                    </div>
                                    <div class="col-12 mb-5">
                                        <label class="fw-semibold fs-6 mb-2">Body (Arabic)</label>
                                        <textarea name="translations[ar][body]" class="form-control form-control-solid" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Images -->
                            <div class="mb-10">
                                <h4 class="fw-bold mb-5">Images</h4>
                                <div class="row">
                                    <div class="col-12 mb-5">
                                        <label class="fw-semibold fs-6 mb-2">Featured Image URL</label>
                                        <input type="text" name="featured_image" class="form-control form-control-solid" placeholder="Path from storage"/>
                                        <small class="text-muted">Upload image first, then paste the path here</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="{{ route('admin.stories.index') }}" class="btn btn-light me-3">@lang('common.cancel')</a>
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">@lang('common.save')</span>
                                <span class="indicator-progress">Please wait...
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
    document.getElementById('kt_form_story').addEventListener('submit', function(e) {
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

