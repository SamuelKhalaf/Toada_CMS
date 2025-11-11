<!--begin::Modal - Add Social Media-->
<div class="modal fade" id="kt_modal_add_social" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form class="form" action="{{ route('admin.social-media.store') }}" id="kt_modal_add_social_form">
                @csrf
                <div class="modal-header" id="kt_modal_add_social_header">
                    <h2 class="fw-bold">@lang('common.add_social_media_link')</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-social-modal-action="close">
                        <i class="fa-solid fa-times fs-1"></i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">@lang('common.platform')</label>
                        <input type="text" name="platform" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="@lang('common.platform_placeholder')" required/>
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">@lang('common.url')</label>
                        <input type="url" name="url" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="https://..." required/>
                    </div>
                    <div class="fv-row mb-7">
                        <label class="fw-semibold fs-6 mb-2">@lang('common.icon')</label>
                        <div class="icon-upload-wrapper">
                            <input type="hidden" name="icon_path" id="icon_path_add" class="icon-path-input">
                            <div class="icon-preview mb-3" style="max-width: 100px;">
                                <div class="border rounded p-3 text-center text-muted" style="min-height: 60px; display: flex; align-items: center; justify-content: center;">
                                    <small>@lang('common.no_icon')</small>
                                </div>
                            </div>
                            <button type="button" 
                                    class="btn btn-sm btn-light-primary upload-icon-btn">
                                <i class="fa-solid fa-upload me-2"></i>@lang('common.upload_icon')
                            </button>
                            <button type="button" 
                                    class="btn btn-sm btn-light-danger remove-icon-btn ms-2"
                                    style="display: none;">
                                <i class="fa-solid fa-trash me-2"></i>@lang('common.remove')
                            </button>
                            <div class="form-text mt-2">@lang('common.icon_upload_description')</div>
                        </div>
                    </div>
                    <div class="fv-row mb-7">
                        <label class="fw-semibold fs-6 mb-2">@lang('common.order')</label>
                        <input type="number" name="order" class="form-control form-control-solid mb-3 mb-lg-0" value="0" min="0"/>
                        <div class="form-text">@lang('common.lower_numbers_first')</div>
                    </div>
                    <div class="fv-row mb-7">
                        <div class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" name="is_active" id="is_active_add" value="1" checked/>
                            <label class="form-check-label" for="is_active_add">
                                @lang('common.active')
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="reset" class="btn btn-light me-3" data-kt-social-modal-action="cancel">@lang('common.cancel')</button>
                    <button type="submit" class="btn btn-primary" data-kt-social-modal-action="submit">
                        <span class="indicator-label">@lang('common.submit')</span>
                        <span class="indicator-progress">@lang('common.please_wait')
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end::Modal - Add Social Media-->

<!-- Icon Upload Modal -->
<div class="modal fade" id="kt_modal_icon_upload" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-500px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold">@lang('common.upload_icon')</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    <i class="fa-solid fa-times"></i>
                </div>
            </div>
            <div class="modal-body">
                <form id="kt_form_icon_upload" enctype="multipart/form-data">
                    <input type="file" name="image" id="icon_image_input" accept="image/*" class="form-control mb-5" required>
                    <div class="image-preview-upload mb-5" style="display: none;">
                        <img id="preview_icon_image" src="" alt="Preview" class="img-thumbnail" style="max-width: 100px; height: auto;">
                    </div>
                    <input type="hidden" name="target_input" id="target_icon_input">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">@lang('common.cancel')</button>
                <button type="button" class="btn btn-primary" id="upload_icon_btn">@lang('common.upload')</button>
            </div>
        </div>
    </div>
</div>
