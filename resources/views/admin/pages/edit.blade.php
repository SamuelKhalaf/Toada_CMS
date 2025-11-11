@extends('admin.layouts.master')
@section('title', __('pages.' . $pageName))
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">{{ str_replace(':page', ucfirst($pageName), __('common.edit_page')) }}</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('admin.pages.index')}}" class="text-muted text-hover-primary">@lang('navigation.pages')</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">{{ ucfirst($pageName) }}</li>
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
                            <span class="card-label fw-bold fs-3 mb-1">{{ str_replace(':page', ucfirst($pageName), __('common.edit_page_content')) }}</span>
                            <span class="text-muted mt-1 fw-semibold fs-7">@lang('common.manage_bilingual_content')</span>
                        </h3>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <form id="kt_form_page_content" action="{{ route('admin.pages.update', $pageName) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            @php
                                // Helper function to get existing content
                                $getContent = function($sectionKey, $language, $field = 'content') use ($contents) {
                                    if (isset($contents[$sectionKey])) {
                                        $content = $contents[$sectionKey]->firstWhere('language', $language);
                                        if ($content) {
                                            if ($field === 'image_path') {
                                                return $content->image_path;
                                            } elseif ($field === 'images') {
                                                return is_array($content->images) ? $content->images : (is_string($content->images) ? json_decode($content->images, true) : []);
                                            } else {
                                                $contentValue = $content->content;
                                                // Try to decode JSON
                                                $decoded = json_decode($contentValue, true);
                                                if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                                                    return $decoded;
                                                }
                                                return $contentValue;
                                            }
                                        }
                                    }
                                    return null;
                                };
                            @endphp

                            <!-- Language Tabs -->
                            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold mb-10">
                                <li class="nav-item mt-2">
                                    <a class="nav-link text-active-primary ms-0 me-10 py-5 active" data-bs-toggle="tab" href="#kt_tab_english">
                                        @lang('common.english')
                                    </a>
                                </li>
                                <li class="nav-item mt-2">
                                    <a class="nav-link text-active-primary me-10 py-5" data-bs-toggle="tab" href="#kt_tab_arabic">
                                        @lang('common.arabic')
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content" id="kt_tab_content">
                                <!-- English Tab -->
                                <div class="tab-pane fade show active" id="kt_tab_english" role="tabpanel">
                                    @foreach($groupedSections as $category => $categorySections)
                                        <div class="card mb-5">
                                            <div class="card-header">
                                                <h3 class="card-title">{{ $category }}</h3>
                                            </div>
                                            <div class="card-body">
                                                @foreach($categorySections as $section)
                                                    @php
                                                        $sectionKey = $section['key'];
                                                        $sectionType = $section['type'];
                                                        $sectionLabel = $section['label'];
                                                        $existingContent = $getContent($sectionKey, 'en');
                                                        $existingImage = $getContent($sectionKey, 'en', 'image_path');
                                                    @endphp

                                                    <div class="mb-10 section-field" data-section-key="{{ $sectionKey }}" data-section-type="{{ $sectionType }}">
                                                        @if($sectionType === 'image')
                                                            <!-- Image Field -->
                                                            <label class="form-label fw-semibold fs-6 mb-2">{{ $sectionLabel }}</label>
                                                            <div class="image-upload-wrapper mb-3">
                                                                <input type="hidden" name="sections[{{ $sectionKey }}][en][image_path]" 
                                                                       value="{{ $existingImage }}" 
                                                                       class="image-path-input">
                                                                <div class="image-preview mb-3" style="max-width: 300px;">
                                                                    @if($existingImage)
                                                                        <img src="{{ asset('storage/' . $existingImage) }}" 
                                                                             alt="Preview" 
                                                                             class="img-thumbnail" 
                                                                             style="max-width: 100%; height: auto;">
                                                                    @else
                                                                        <div class="border rounded p-5 text-center text-muted">
                                                                            @lang('common.no_image_uploaded')
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <button type="button" 
                                                                        class="btn btn-sm btn-light-primary upload-image-btn"
                                                                        data-page-name="{{ $pageName }}"
                                                                        data-section-key="{{ $sectionKey }}">
                                                                    <i class="fa-solid fa-upload me-2"></i>@lang('common.upload_image')
                                                                </button>
                                                                @if($existingImage)
                                                                    <button type="button" 
                                                                            class="btn btn-sm btn-light-danger remove-image-btn ms-2">
                                                                        <i class="fa-solid fa-trash me-2"></i>@lang('common.remove')
                                                                    </button>
                                                                @endif
                                                            </div>
                                                        @elseif($sectionType === 'text')
                                                            <!-- Text Field -->
                                                            <label class="form-label fw-semibold fs-6 mb-2">{{ $sectionLabel }}</label>
                                                            <input type="text" 
                                                                   name="sections[{{ $sectionKey }}][en][content]" 
                                                                   class="form-control form-control-solid"
                                                                   value="{{ is_string($existingContent) ? $existingContent : (isset($existingContent['text']) ? $existingContent['text'] : '') }}">
                                                            <input type="hidden" name="sections[{{ $sectionKey }}][en][content_type]" value="text">
                                                        @elseif($sectionType === 'textarea')
                                                            <!-- Textarea Field -->
                                                            <label class="form-label fw-semibold fs-6 mb-2">{{ $sectionLabel }}</label>
                                                            <textarea name="sections[{{ $sectionKey }}][en][content]" 
                                                                      class="form-control form-control-solid" 
                                                                      rows="4">{{ is_string($existingContent) ? $existingContent : (isset($existingContent['text']) ? $existingContent['text'] : '') }}</textarea>
                                                            <input type="hidden" name="sections[{{ $sectionKey }}][en][content_type]" value="textarea">
                                                        @elseif($sectionType === 'text_with_highlight')
                                                            <!-- Text with Highlight -->
                                                            <label class="form-label fw-semibold fs-6 mb-2">{{ $sectionLabel }}</label>
                                                            <input type="text" 
                                                                   name="sections[{{ $sectionKey }}][en][content]" 
                                                                   class="form-control form-control-solid mb-3"
                                                                   placeholder="@lang('common.enter_text_highlight')"
                                                                   value="{{ is_string($existingContent) ? $existingContent : (isset($existingContent['text']) ? $existingContent['text'] : '') }}">
                                                            <label class="form-label fs-7 mb-2">@lang('common.highlight_text')</label>
                                                            <input type="text" 
                                                                   name="sections[{{ $sectionKey }}][en][highlight]" 
                                                                   class="form-control form-control-solid"
                                                                   placeholder="@lang('common.example_highlight')"
                                                                   value="{{ isset($existingContent['highlight']) ? (is_array($existingContent['highlight']) ? implode(', ', $existingContent['highlight']) : $existingContent['highlight']) : '' }}">
                                                            <input type="hidden" name="sections[{{ $sectionKey }}][en][content_type]" value="text_with_highlight">
                                                        @elseif($sectionType === 'text_with_number')
                                                            <!-- Text with Number -->
                                                            <label class="form-label fw-semibold fs-6 mb-2">{{ $sectionLabel }}</label>
                                                            <div class="row">
                                                                <div class="col-md-2 mb-3">
                                                                    <label class="form-label fs-7 mb-2">@lang('common.number')</label>
                                                                    <input type="text" 
                                                                           name="sections[{{ $sectionKey }}][en][number]" 
                                                                           class="form-control form-control-solid"
                                                                           value="{{ isset($existingContent['number']) ? $existingContent['number'] : ($section['number'] ?? '') }}">
                                                                </div>
                                                                <div class="col-md-10 mb-3">
                                                                    <label class="form-label fs-7 mb-2">@lang('common.title')</label>
                                                                    <input type="text" 
                                                                           name="sections[{{ $sectionKey }}][en][content]" 
                                                                           class="form-control form-control-solid"
                                                                           value="{{ isset($existingContent['text']) ? $existingContent['text'] : '' }}">
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="sections[{{ $sectionKey }}][en][content_type]" value="text_with_number">
                                                        @elseif($sectionType === 'sub_service')
                                                            <!-- Sub Service -->
                                                            <label class="form-label fw-semibold fs-6 mb-2">{{ $sectionLabel }}</label>
                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="form-label fs-7 mb-2">@lang('common.title')</label>
                                                                    <input type="text" 
                                                                           name="sections[{{ $sectionKey }}][en][title]" 
                                                                           class="form-control form-control-solid"
                                                                           value="{{ isset($existingContent['title']) ? $existingContent['title'] : '' }}">
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="form-label fs-7 mb-2">@lang('common.description_english')</label>
                                                                    <textarea name="sections[{{ $sectionKey }}][en][description]" 
                                                                              class="form-control form-control-solid" 
                                                                              rows="3">{{ isset($existingContent['description']) ? $existingContent['description'] : '' }}</textarea>
                                </div>
                            </div>
                                                            <input type="hidden" name="sections[{{ $sectionKey }}][en][content_type]" value="sub_service">
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                            </div>

                                <!-- Arabic Tab -->
                                <div class="tab-pane fade" id="kt_tab_arabic" role="tabpanel">
                                    @foreach($groupedSections as $category => $categorySections)
                                        <div class="card mb-5">
                                        <div class="card-header">
                                                <h3 class="card-title">{{ $category }}</h3>
                                        </div>
                                        <div class="card-body">
                                                @foreach($categorySections as $section)
                                                    @php
                                                        $sectionKey = $section['key'];
                                                        $sectionType = $section['type'];
                                                        $sectionLabel = $section['label'];
                                                        $existingContent = $getContent($sectionKey, 'ar');
                                                        $existingImage = $getContent($sectionKey, 'ar', 'image_path');
                                                    @endphp

                                                    <div class="mb-10 section-field" data-section-key="{{ $sectionKey }}" data-section-type="{{ $sectionType }}">
                                                        @if($sectionType === 'image')
                                                            <!-- Image Field -->
                                                            <label class="form-label fw-semibold fs-6 mb-2">{{ $sectionLabel }}</label>
                                                            <div class="image-upload-wrapper mb-3">
                                                                <input type="hidden" name="sections[{{ $sectionKey }}][ar][image_path]" 
                                                                       value="{{ $existingImage }}" 
                                                                       class="image-path-input">
                                                                <div class="image-preview mb-3" style="max-width: 300px;">
                                                                    @if($existingImage)
                                                                        <img src="{{ asset('storage/' . $existingImage) }}" 
                                                                             alt="Preview" 
                                                                             class="img-thumbnail" 
                                                                             style="max-width: 100%; height: auto;">
                                                                    @else
                                                                        <div class="border rounded p-5 text-center text-muted">
                                                                            @lang('common.no_image_uploaded')
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <button type="button" 
                                                                        class="btn btn-sm btn-light-primary upload-image-btn"
                                                                        data-page-name="{{ $pageName }}"
                                                                        data-section-key="{{ $sectionKey }}">
                                                                    <i class="fa-solid fa-upload me-2"></i>@lang('common.upload_image')
                                                                </button>
                                                                @if($existingImage)
                                                                    <button type="button" 
                                                                            class="btn btn-sm btn-light-danger remove-image-btn ms-2">
                                                                        <i class="fa-solid fa-trash me-2"></i>@lang('common.remove')
                                                                    </button>
                                                                @endif
                                                            </div>
                                                        @elseif($sectionType === 'text')
                                                            <!-- Text Field -->
                                                            <label class="form-label fw-semibold fs-6 mb-2">{{ $sectionLabel }}</label>
                                                            <input type="text" 
                                                                   name="sections[{{ $sectionKey }}][ar][content]" 
                                                                   class="form-control form-control-solid"
                                                                   value="{{ is_string($existingContent) ? $existingContent : (isset($existingContent['text']) ? $existingContent['text'] : '') }}">
                                                            <input type="hidden" name="sections[{{ $sectionKey }}][ar][content_type]" value="text">
                                                        @elseif($sectionType === 'textarea')
                                                            <!-- Textarea Field -->
                                                            <label class="form-label fw-semibold fs-6 mb-2">{{ $sectionLabel }}</label>
                                                            <textarea name="sections[{{ $sectionKey }}][ar][content]" 
                                                                      class="form-control form-control-solid" 
                                                                      rows="4">{{ is_string($existingContent) ? $existingContent : (isset($existingContent['text']) ? $existingContent['text'] : '') }}</textarea>
                                                            <input type="hidden" name="sections[{{ $sectionKey }}][ar][content_type]" value="textarea">
                                                        @elseif($sectionType === 'text_with_highlight')
                                                            <!-- Text with Highlight -->
                                                            <label class="form-label fw-semibold fs-6 mb-2">{{ $sectionLabel }}</label>
                                                            <input type="text" 
                                                                   name="sections[{{ $sectionKey }}][ar][content]" 
                                                                   class="form-control form-control-solid mb-3"
                                                                   placeholder="@lang('common.enter_text_highlight')"
                                                                   value="{{ is_string($existingContent) ? $existingContent : (isset($existingContent['text']) ? $existingContent['text'] : '') }}">
                                                            <label class="form-label fs-7 mb-2">@lang('common.highlight_text')</label>
                                                            <input type="text" 
                                                                   name="sections[{{ $sectionKey }}][ar][highlight]" 
                                                                   class="form-control form-control-solid"
                                                                   placeholder="@lang('common.example_highlight')"
                                                                   value="{{ isset($existingContent['highlight']) ? (is_array($existingContent['highlight']) ? implode(', ', $existingContent['highlight']) : $existingContent['highlight']) : '' }}">
                                                            <input type="hidden" name="sections[{{ $sectionKey }}][ar][content_type]" value="text_with_highlight">
                                                        @elseif($sectionType === 'text_with_number')
                                                            <!-- Text with Number -->
                                                            <label class="form-label fw-semibold fs-6 mb-2">{{ $sectionLabel }}</label>
                                                            <div class="row">
                                                                <div class="col-md-2 mb-3">
                                                                    <label class="form-label fs-7 mb-2">@lang('common.number')</label>
                                                                    <input type="text" 
                                                                           name="sections[{{ $sectionKey }}][ar][number]" 
                                                                           class="form-control form-control-solid"
                                                                           value="{{ isset($existingContent['number']) ? $existingContent['number'] : ($section['number'] ?? '') }}">
                                                                </div>
                                                                <div class="col-md-10 mb-3">
                                                                    <label class="form-label fs-7 mb-2">@lang('common.title')</label>
                                                                    <input type="text" 
                                                                           name="sections[{{ $sectionKey }}][ar][content]" 
                                                                           class="form-control form-control-solid"
                                                                           value="{{ isset($existingContent['text']) ? $existingContent['text'] : '' }}">
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="sections[{{ $sectionKey }}][ar][content_type]" value="text_with_number">
                                                        @elseif($sectionType === 'sub_service')
                                                            <!-- Sub Service -->
                                                            <label class="form-label fw-semibold fs-6 mb-2">{{ $sectionLabel }}</label>
                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="form-label fs-7 mb-2">@lang('common.title')</label>
                                                                    <input type="text" 
                                                                           name="sections[{{ $sectionKey }}][ar][title]" 
                                                                           class="form-control form-control-solid"
                                                                           value="{{ isset($existingContent['title']) ? $existingContent['title'] : '' }}">
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="form-label fs-7 mb-2">@lang('common.description_arabic')</label>
                                                                    <textarea name="sections[{{ $sectionKey }}][ar][description]" 
                                                                              class="form-control form-control-solid" 
                                                                              rows="3">{{ isset($existingContent['description']) ? $existingContent['description'] : '' }}</textarea>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="sections[{{ $sectionKey }}][ar][content_type]" value="sub_service">
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-10">
                                <button type="button" class="btn btn-light me-3" onclick="window.history.back()">@lang('common.cancel')</button>
                                <button type="submit" class="btn btn-primary">
                                    <span class="indicator-label">@lang('common.save')</span>
                                    <span class="indicator-progress">@lang('common.please_wait')
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>

    <!-- Image Upload Modal -->
    <div class="modal fade" id="kt_modal_image_upload" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fw-bold">@lang('common.upload_image')</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="fa-solid fa-times"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form id="kt_form_image_upload" enctype="multipart/form-data">
                        <input type="file" name="image" id="image_input" accept="image/*" class="form-control mb-5" required>
                        <div class="image-preview-upload mb-5" style="display: none;">
                            <img id="preview_image" src="" alt="Preview" class="img-thumbnail" style="max-width: 100%; height: auto;">
                        </div>
                        <input type="hidden" name="page_name" id="upload_page_name">
                        <input type="hidden" name="section_key" id="upload_section_key">
                        <input type="hidden" name="language" id="upload_language">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">@lang('common.cancel')</button>
                    <button type="button" class="btn btn-primary" id="upload_image_btn">@lang('common.upload')</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    // Image preview on file selection
    document.getElementById('image_input')?.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview_image').src = e.target.result;
                document.querySelector('.image-preview-upload').style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });

    // Handle image upload button clicks
    document.querySelectorAll('.upload-image-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const pageName = this.getAttribute('data-page-name');
            const sectionKey = this.getAttribute('data-section-key');
            const language = this.closest('.tab-pane').id === 'kt_tab_english' ? 'en' : 'ar';
            
            document.getElementById('upload_page_name').value = pageName;
            document.getElementById('upload_section_key').value = sectionKey;
            document.getElementById('upload_language').value = language;
            
            // Reset form
            document.getElementById('kt_form_image_upload').reset();
            document.querySelector('.image-preview-upload').style.display = 'none';
            
            const modal = new bootstrap.Modal(document.getElementById('kt_modal_image_upload'));
            modal.show();
        });
    });

    // Handle image upload
    document.getElementById('upload_image_btn')?.addEventListener('click', function() {
        const form = document.getElementById('kt_form_image_upload');
        const formData = new FormData(form);
        
        // Add CSRF token
        formData.append('_token', '{{ csrf_token() }}');
        
        fetch('{{ route("admin.pages.upload-image") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Update the hidden input and preview
                const language = document.getElementById('upload_language').value;
                const sectionKey = document.getElementById('upload_section_key').value;
                const imagePathInput = document.querySelector(`input[name="sections[${sectionKey}][${language}][image_path]"]`);
                const imagePreview = imagePathInput?.closest('.image-upload-wrapper')?.querySelector('.image-preview');
                
                if (imagePathInput) {
                    imagePathInput.value = data.path;
                }
                
                if (imagePreview) {
                    imagePreview.innerHTML = `<img src="${data.url}" alt="Preview" class="img-thumbnail" style="max-width: 100%; height: auto;">`;
                }
                
                // Show remove button if hidden
                const removeBtn = imagePathInput?.closest('.image-upload-wrapper')?.querySelector('.remove-image-btn');
                if (removeBtn) {
                    removeBtn.style.display = 'inline-block';
                }
                
                bootstrap.Modal.getInstance(document.getElementById('kt_modal_image_upload')).hide();
                
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

    // Handle remove image button
    document.querySelectorAll('.remove-image-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const wrapper = this.closest('.image-upload-wrapper');
            const imagePathInput = wrapper.querySelector('.image-path-input');
            const imagePreview = wrapper.querySelector('.image-preview');
            
            imagePathInput.value = '';
            imagePreview.innerHTML = '<div class="border rounded p-5 text-center text-muted">{{ __('common.no_image_uploaded') }}</div>';
            this.style.display = 'none';
        });
    });

    // Form submission handler
    document.getElementById('kt_form_page_content').addEventListener('submit', function(e) {
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
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
            } else {
                Swal.fire({
                    text: data.message || "{{ __('operation_failed') }}",
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
            submitButton.removeAttribute('data-kt-indicator');
            indicator.classList.add('d-none');
            label.classList.remove('d-none');
            submitButton.disabled = false;
            
            Swal.fire({
                text: "{{ __('operation_failed') }}",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "{{ __('common.ok') }}",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
        });
    });
</script>
@endsection
