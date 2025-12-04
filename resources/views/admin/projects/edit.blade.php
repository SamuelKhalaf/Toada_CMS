@extends('admin.layouts.master')
@section('title', __('common.edit_project'))
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">@lang('common.edit_project')</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('admin.projects.index')}}" class="text-muted text-hover-primary">@lang('common.projects')</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">@lang('common.edit')</li>
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
                <form id="kt_form_project" action="{{ route('admin.projects.update', $project->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header border-0 pt-6">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">@lang('common.project_details')</span>
                                <span class="text-muted mt-1 fw-semibold fs-7">@lang('common.edit_project_content')</span>
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
                                <li class="nav-item mt-2">
                                    <a class="nav-link text-active-primary me-10 py-5" data-bs-toggle="tab" href="#kt_tab_images">
                                        @lang('common.images')
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content" id="kt_tab_content">
                                <!-- Basic Info Tab -->
                                <div class="tab-pane fade show active" id="kt_tab_basic" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-6 mb-5">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.date_range')</label>
                                            <input type="text" name="date_range" class="form-control form-control-solid" value="{{ $project->date_range }}" placeholder="e.g., December 15-17, 2025"/>
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.location_text')</label>
                                            <input type="text" name="location_text" class="form-control form-control-solid" value="{{ $project->location_text }}" placeholder="e.g., Malham Location"/>
                                        </div>
                                        <div class="col-12 mb-5">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.location_url_google_maps')</label>
                                            <input type="url" name="location_url" class="form-control form-control-solid" value="{{ $project->location_url }}" placeholder="https://www.google.com/maps/..."/>
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.register_url_arabic')</label>
                                            <input type="url" name="register_url_ar" class="form-control form-control-solid" value="{{ $project->register_url_ar }}" placeholder="https://..."/>
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.register_url_english')</label>
                                            <input type="url" name="register_url_en" class="form-control form-control-solid" value="{{ $project->register_url_en }}" placeholder="https://..."/>
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.slug')</label>
                                            <input type="text" name="slug" class="form-control form-control-solid" value="{{ $project->slug }}"/>
                                            <div class="form-text">@lang('common.auto_generate_slug')</div>
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.order')</label>
                                            <input type="number" name="order" class="form-control form-control-solid" value="{{ $project->order }}" min="0"/>
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <label class="required fw-semibold fs-6 mb-2">@lang('common.status')</label>
                                            <select name="status" class="form-select form-select-solid" required>
                                                <option value="draft" {{ $project->status === 'draft' ? 'selected' : '' }}>@lang('common.draft')</option>
                                                <option value="published" {{ $project->status === 'published' ? 'selected' : '' }}>@lang('common.published')</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.published_at')</label>
                                            <input type="datetime-local" name="published_at" class="form-control form-control-solid" value="{{ $project->published_at ? $project->published_at->format('Y-m-d\TH:i') : '' }}"/>
                                        </div>
                                        <div class="col-12 mb-5">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.tags')</label>
                                            <input type="text" name="tags" class="form-control form-control-solid" value="{{ is_array($project->tags) ? implode(', ', $project->tags) : '' }}" placeholder="Event, Saudi Arabia, 2025 (comma-separated)"/>
                                        </div>
                                    </div>
                                </div>

                                <!-- English Content Tab -->
                                <div class="tab-pane fade" id="kt_tab_english" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12 mb-5">
                                            <label class="required fw-semibold fs-6 mb-2">@lang('common.title_english')</label>
                                            <input type="text" name="translations[en][title]" class="form-control form-control-solid" value="{{ $translations['en']->title ?? '' }}" required/>
                                        </div>
                                        <div class="col-12 mb-5">
                                            <label class="required fw-semibold fs-6 mb-2">@lang('common.description_english')</label>
                                            <textarea name="translations[en][description]" class="form-control form-control-solid" rows="5" required>{{ $translations['en']->description ?? '' }}</textarea>
                                        </div>
                                        <div class="col-12 mb-5">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.badge_text')</label>
                                            <input type="text" name="translations[en][badge_text]" class="form-control form-control-solid" value="{{ $translations['en']->badge_text ?? '' }}" placeholder="e.g., Upcoming Event"/>
                                        </div>
                                    </div>
                                </div>

                                <!-- Arabic Content Tab -->
                                <div class="tab-pane fade" id="kt_tab_arabic" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12 mb-5">
                                            <label class="required fw-semibold fs-6 mb-2">@lang('common.title_arabic')</label>
                                            <input type="text" name="translations[ar][title]" class="form-control form-control-solid" value="{{ $translations['ar']->title ?? '' }}" required/>
                                        </div>
                                        <div class="col-12 mb-5">
                                            <label class="required fw-semibold fs-6 mb-2">@lang('common.description_arabic')</label>
                                            <textarea name="translations[ar][description]" class="form-control form-control-solid" rows="5" required>{{ $translations['ar']->description ?? '' }}</textarea>
                                        </div>
                                        <div class="col-12 mb-5">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.badge_text')</label>
                                            <input type="text" name="translations[ar][badge_text]" class="form-control form-control-solid" value="{{ $translations['ar']->badge_text ?? '' }}" placeholder="نص الشارة"/>
                                        </div>
                                    </div>
                                </div>

                                <!-- Images Tab -->
                                <div class="tab-pane fade" id="kt_tab_images" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12 mb-10">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.featured_image')</label>
                                            <div class="image-upload-wrapper">
                                                <input type="hidden" name="featured_image" id="featured_image_path" class="image-path-input" value="{{ $project->featured_image }}">
                                                <div class="image-preview mb-3" style="max-width: 400px;">
                                                    @if($project->featured_image)
                                                        <img src="{{ asset('storage/' . $project->featured_image) }}" alt="Preview" class="img-thumbnail" style="max-width: 100%; height: auto;">
                                                    @else
                                                        <div class="border rounded p-5 text-center text-muted">
                                                            @lang('common.no_featured_image')
                                                        </div>
                                                    @endif
                                                </div>
                                                <button type="button" 
                                                        class="btn btn-sm btn-light-primary upload-project-image-btn"
                                                        data-image-type="featured">
                                                    <i class="fa-solid fa-upload me-2"></i>@lang('common.upload_featured_image')
                                                </button>
                                                @if($project->featured_image)
                                                    <button type="button" 
                                                            class="btn btn-sm btn-light-danger remove-image-btn ms-2">
                                                        <i class="fa-solid fa-trash me-2"></i>@lang('common.remove')
                                                    </button>
                                                @else
                                                    <button type="button" 
                                                            class="btn btn-sm btn-light-danger remove-image-btn ms-2"
                                                            style="display: none;">
                                                        <i class="fa-solid fa-trash me-2"></i>@lang('common.remove')
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="{{ route('admin.projects.index') }}" class="btn btn-light me-3">@lang('common.cancel')</a>
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

    <!-- Image Upload Modal -->
    <div class="modal fade" id="kt_modal_project_image_upload" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fw-bold">@lang('common.upload')</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="fa-solid fa-times"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form id="kt_form_project_image_upload" enctype="multipart/form-data">
                        <input type="file" name="image" id="project_image_input" accept="image/*" class="form-control mb-5" required>
                        <div class="image-preview-upload mb-5" style="display: none;">
                            <img id="preview_project_image" src="" alt="Preview" class="img-thumbnail" style="max-width: 100%; height: auto;">
                        </div>
                        <input type="hidden" name="image_type" id="upload_image_type">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">@lang('common.cancel')</button>
                    <button type="button" class="btn btn-primary" id="upload_project_image_btn">@lang('common.upload')</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    // Image preview on file selection
    document.getElementById('project_image_input')?.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview_project_image').src = e.target.result;
                document.querySelector('.image-preview-upload').style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });

    // Handle image upload button clicks
    document.querySelectorAll('.upload-project-image-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const imageType = this.getAttribute('data-image-type');
            document.getElementById('upload_image_type').value = imageType;
            
            // Reset form
            document.getElementById('kt_form_project_image_upload').reset();
            document.querySelector('.image-preview-upload').style.display = 'none';
            
            const modal = new bootstrap.Modal(document.getElementById('kt_modal_project_image_upload'));
            modal.show();
        });
    });

    // Handle image upload
    document.getElementById('upload_project_image_btn')?.addEventListener('click', function() {
        const form = document.getElementById('kt_form_project_image_upload');
        const formData = new FormData(form);
        const imageType = document.getElementById('upload_image_type').value;
        
        // Add CSRF token
        formData.append('_token', '{{ csrf_token() }}');
        
        fetch('{{ route("admin.projects.upload-image") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                if (imageType === 'featured') {
                    // Update featured image
                    document.getElementById('featured_image_path').value = data.path;
                    const preview = document.querySelector('#kt_tab_images .image-upload-wrapper .image-preview');
                    if (preview) {
                        preview.innerHTML = `<img src="${data.url}" alt="Preview" class="img-thumbnail" style="max-width: 100%; height: auto;">`;
                    }
                    const removeBtn = document.querySelector('#kt_tab_images .remove-image-btn');
                    if (removeBtn) {
                        removeBtn.style.display = 'inline-block';
                    }
                }
                
                bootstrap.Modal.getInstance(document.getElementById('kt_modal_project_image_upload')).hide();
                
                Swal.fire({
                    text: "{{ __('common.image_uploaded_successfully') }}",
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "{{ __('common.ok') }}",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
            } else {
                Swal.fire({
                    text: data.message || "{{ __('common.upload_failed') }}",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "{{ __('common.ok') }}",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
            }
        })
        .catch(error => {
            Swal.fire({
                text: "{{ __('common.an_error_occurred') }}",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "{{ __('common.ok') }}",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
        });
    });

    // Handle remove featured image
    document.querySelector('#kt_tab_images .remove-image-btn')?.addEventListener('click', function() {
        document.getElementById('featured_image_path').value = '';
        const preview = this.closest('.image-upload-wrapper').querySelector('.image-preview');
        preview.innerHTML = '<div class="border rounded p-5 text-center text-muted">{{ __('common.no_featured_image') }}</div>';
        this.style.display = 'none';
    });

    // Handle form submission
    document.getElementById('kt_form_project').addEventListener('submit', function(e) {
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
                    window.location.href = "{{ route('admin.projects.index') }}";
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

