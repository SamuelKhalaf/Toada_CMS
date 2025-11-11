@extends('admin.layouts.master')
@section('title', 'Edit Insight')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">@lang('common.edit_insight')</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('admin.insights.index')}}" class="text-muted text-hover-primary">@lang('navigation.insights')</a>
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
                <form id="kt_form_insight" action="{{ route('admin.insights.update', $insight->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header border-0 pt-6">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">@lang('common.insight_details')</span>
                                <span class="text-muted mt-1 fw-semibold fs-7">@lang('common.edit_insight_content')</span>
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
                                <li class="nav-item mt-2">
                                    <a class="nav-link text-active-primary me-10 py-5" data-bs-toggle="tab" href="#kt_tab_seo">
                                        @lang('common.seo')
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content" id="kt_tab_content">
                                <!-- Basic Info Tab -->
                                <div class="tab-pane fade show active" id="kt_tab_basic" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-6 mb-5">
                                            <label class="required fw-semibold fs-6 mb-2">@lang('common.category_english')</label>
                                            <input type="text" name="category_en" class="form-control form-control-solid" value="{{ $insight->category_en }}" required/>
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <label class="required fw-semibold fs-6 mb-2">@lang('common.category_arabic')</label>
                                            <input type="text" name="category_ar" class="form-control form-control-solid" value="{{ $insight->category_ar }}" required/>
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.slug')</label>
                                            <input type="text" name="slug" class="form-control form-control-solid" value="{{ $insight->slug }}"/>
                                            <div class="form-text">@lang('common.auto_generate_slug')</div>
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.order')</label>
                                            <input type="number" name="order" class="form-control form-control-solid" value="{{ $insight->order }}" min="0"/>
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <label class="required fw-semibold fs-6 mb-2">@lang('common.status')</label>
                                            <select name="status" class="form-select form-select-solid" required>
                                                <option value="draft" {{ $insight->status === 'draft' ? 'selected' : '' }}>@lang('common.draft')</option>
                                                <option value="published" {{ $insight->status === 'published' ? 'selected' : '' }}>@lang('common.published')</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.published_at')</label>
                                            <input type="datetime-local" name="published_at" class="form-control form-control-solid" value="{{ $insight->published_at ? $insight->published_at->format('Y-m-d\TH:i') : '' }}"/>
                                        </div>
                                        <div class="col-12 mb-5">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.tags')</label>
                                            <input type="text" name="tags" class="form-control form-control-solid" 
                                                   value="{{ is_array($insight->tags) ? implode(', ', $insight->tags) : $insight->tags }}" 
                                                   placeholder="@lang('common.tags_placeholder')"/>
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
                                            <textarea name="translations[en][description]" class="form-control form-control-solid" rows="3" required>{{ $translations['en']->description ?? '' }}</textarea>
                                            <div class="form-text">@lang('common.short_description_preview')</div>
                                        </div>
                                        <div class="col-12 mb-5">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.body_english')</label>
                                            <textarea id="tinymce_en_body" name="translations[en][body]" class="form-control form-control-solid" rows="15">{{ $translations['en']->body ?? '' }}</textarea>
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
                                            <textarea name="translations[ar][description]" class="form-control form-control-solid" rows="3" required>{{ $translations['ar']->description ?? '' }}</textarea>
                                            <div class="form-text">@lang('common.short_description_preview')</div>
                                        </div>
                                        <div class="col-12 mb-5">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.body_arabic')</label>
                                            <textarea id="tinymce_ar_body" name="translations[ar][body]" class="form-control form-control-solid" rows="15">{{ $translations['ar']->body ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Images Tab -->
                                <div class="tab-pane fade" id="kt_tab_images" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12 mb-10">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.featured_image')</label>
                                            <div class="image-upload-wrapper">
                                                <input type="hidden" name="featured_image" id="featured_image_path" class="image-path-input" value="{{ $insight->featured_image }}">
                                                <div class="image-preview mb-3" style="max-width: 400px;">
                                                    @if($insight->featured_image)
                                                        <img src="{{ asset('storage/' . $insight->featured_image) }}" alt="Preview" class="img-thumbnail" style="max-width: 100%; height: auto;">
                                                    @else
                                                        <div class="border rounded p-5 text-center text-muted">
                                                            @lang('common.no_featured_image')
                                                        </div>
                                                    @endif
                                                </div>
                                                <button type="button" 
                                                        class="btn btn-sm btn-light-primary upload-insight-image-btn"
                                                        data-image-type="featured">
                                                    <i class="fa-solid fa-upload me-2"></i>@lang('common.upload_featured_image')
                                                </button>
                                                @if($insight->featured_image)
                                                    <button type="button" 
                                                            class="btn btn-sm btn-light-danger remove-image-btn ms-2">
                                                        <i class="fa-solid fa-trash me-2"></i>@lang('common.remove')
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- <div class="col-12 mb-5">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.additional_images')</label>
                                            <div id="gallery_images_wrapper">
                                                @if($insight->images && is_array($insight->images) && count($insight->images) > 0)
                                                    @foreach($insight->images as $image)
                                                        <div class="gallery-item mb-3">
                                                            <input type="hidden" name="images[]" class="gallery-image-path" value="{{ $image }}">
                                                            <div class="d-flex align-items-center gap-3">
                                                                <div class="gallery-preview" style="width: 150px; height: 100px; border: 1px solid #ddd; border-radius: 4px; overflow: hidden;">
                                                                    <img src="{{ asset('storage/' . $image) }}" alt="Preview" style="width: 100%; height: 100%; object-fit: cover;">
                                                                </div>
                                                                <button type="button" class="btn btn-sm btn-light-danger remove-gallery-image">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                <div class="gallery-item mb-3" style="display: none;">
                                                    <input type="hidden" name="images[]" class="gallery-image-path">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="gallery-preview" style="width: 150px; height: 100px; border: 1px solid #ddd; border-radius: 4px; overflow: hidden;">
                                                            <img src="" alt="Preview" style="width: 100%; height: 100%; object-fit: cover;">
                                                        </div>
                                                        <button type="button" class="btn btn-sm btn-light-danger remove-gallery-image">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" 
                                                    class="btn btn-sm btn-light-primary upload-insight-image-btn"
                                                    data-image-type="gallery">
                                                <i class="fa-solid fa-plus me-2"></i>@lang('common.add_gallery_image')
                                            </button>
                                        </div> --}}
                                    </div>
                                </div>

                                <!-- SEO Tab -->
                                <div class="tab-pane fade" id="kt_tab_seo" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12 mb-5">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.meta_title_english')</label>
                                            <input type="text" name="translations[en][meta_title]" class="form-control form-control-solid" 
                                                   value="{{ $translations['en']->meta_title ?? '' }}" maxlength="60"/>
                                            <div class="form-text">@lang('common.recommended_chars_50_60')</div>
                                        </div>
                                        <div class="col-12 mb-5">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.meta_description_english')</label>
                                            <textarea name="translations[en][meta_description]" class="form-control form-control-solid" rows="3" maxlength="160">{{ $translations['en']->meta_description ?? '' }}</textarea>
                                            <div class="form-text">@lang('common.recommended_chars_150_160')</div>
                                        </div>
                                        <div class="col-12 mb-5">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.meta_title_arabic')</label>
                                            <input type="text" name="translations[ar][meta_title]" class="form-control form-control-solid" 
                                                   value="{{ $translations['ar']->meta_title ?? '' }}" maxlength="60"/>
                                            <div class="form-text">@lang('common.recommended_chars_50_60')</div>
                                        </div>
                                        <div class="col-12 mb-5">
                                            <label class="fw-semibold fs-6 mb-2">@lang('common.meta_description_arabic')</label>
                                            <textarea name="translations[ar][meta_description]" class="form-control form-control-solid" rows="3" maxlength="160">{{ $translations['ar']->meta_description ?? '' }}</textarea>
                                            <div class="form-text">@lang('common.recommended_chars_150_160')</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="{{ route('admin.insights.index') }}" class="btn btn-light me-3">@lang('common.cancel')</a>
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">@lang('common.update')</span>
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
    <div class="modal fade" id="kt_modal_insight_image_upload" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fw-bold">@lang('common.upload')</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="fa-solid fa-times"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form id="kt_form_insight_image_upload" enctype="multipart/form-data">
                        <input type="file" name="image" id="insight_image_input" accept="image/*" class="form-control mb-5" required>
                        <div class="image-preview-upload mb-5" style="display: none;">
                            <img id="preview_insight_image" src="" alt="Preview" class="img-thumbnail" style="max-width: 100%; height: auto;">
                        </div>
                        <input type="hidden" name="image_type" id="upload_image_type">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">@lang('common.cancel')</button>
                    <button type="button" class="btn btn-primary" id="upload_insight_image_btn">@lang('common.upload')</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<!-- TinyMCE -->
<script src="{{ asset('assets/plugins/global/tinymce/tinymce.min.js') }}"></script>
<script>
    // Initialize TinyMCE for English body
    tinymce.init({
        selector: '#tinymce_en_body',
        height: 400,
        menubar: false,
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | blocks | ' +
            'bold italic forecolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });

    // Initialize TinyMCE for Arabic body
    tinymce.init({
        selector: '#tinymce_ar_body',
        height: 400,
        menubar: false,
        directionality: 'rtl',
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | blocks | ' +
            'bold italic forecolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px; direction: rtl; }'
    });

    // Image preview on file selection
    document.getElementById('insight_image_input')?.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview_insight_image').src = e.target.result;
                document.querySelector('.image-preview-upload').style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });

    // Handle image upload button clicks
    document.querySelectorAll('.upload-insight-image-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const imageType = this.getAttribute('data-image-type');
            document.getElementById('upload_image_type').value = imageType;
            
            // Reset form
            document.getElementById('kt_form_insight_image_upload').reset();
            document.querySelector('.image-preview-upload').style.display = 'none';
            
            const modal = new bootstrap.Modal(document.getElementById('kt_modal_insight_image_upload'));
            modal.show();
        });
    });

    // Handle image upload
    document.getElementById('upload_insight_image_btn')?.addEventListener('click', function() {
        const form = document.getElementById('kt_form_insight_image_upload');
        const formData = new FormData(form);
        const imageType = document.getElementById('upload_image_type').value;
        
        // Add CSRF token
        formData.append('_token', '{{ csrf_token() }}');
        
        fetch('{{ route("admin.insights.upload-image") }}', {
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
                } else if (imageType === 'gallery') {
                    // Add to gallery
                    const wrapper = document.getElementById('gallery_images_wrapper');
                    const template = wrapper.querySelector('.gallery-item[style*="display: none"]');
                    const newItem = template.cloneNode(true);
                    newItem.style.display = 'block';
                    newItem.querySelector('.gallery-image-path').value = data.path;
                    newItem.querySelector('.gallery-preview img').src = data.url;
                    wrapper.appendChild(newItem);
                }
                
                bootstrap.Modal.getInstance(document.getElementById('kt_modal_insight_image_upload')).hide();
                
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

    // Handle remove gallery image
    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-gallery-image')) {
            e.target.closest('.gallery-item').remove();
        }
    });

    // Handle tags input - convert to array
    document.getElementById('kt_form_insight').addEventListener('submit', function(e) {
        e.preventDefault();
        const form = this;
        
        // Get TinyMCE content
        if (typeof tinymce !== 'undefined') {
            tinymce.triggerSave();
        }
        
        const submitButton = form.querySelector('button[type="submit"]');
        const indicator = submitButton.querySelector('.indicator-progress');
        const label = submitButton.querySelector('.indicator-label');
        
        submitButton.setAttribute('data-kt-indicator', 'on');
        indicator.classList.remove('d-none');
        label.classList.add('d-none');
        submitButton.disabled = true;
        
        const formData = new FormData(form);
        
        // Convert tags string to array and add to FormData
        const tagsInput = form.querySelector('input[name="tags"]');
        if (tagsInput) {
            // Remove the original tags input from FormData
            formData.delete('tags');
            
            // If tags have a value, convert to array and add each tag
            if (tagsInput.value) {
                const tagsArray = tagsInput.value.split(',').map(tag => tag.trim()).filter(tag => tag);
                tagsArray.forEach(tag => {
                    formData.append('tags[]', tag);
                });
            }
        }
        
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
