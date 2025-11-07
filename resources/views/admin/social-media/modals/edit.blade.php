<!--begin::Modal - Update Social Media-->
<div class="modal fade" id="kt_modal_update_social" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form class="form" action="" id="kt_modal_update_social_form" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h2 class="fw-bold">Update Social Media Link</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-social-modal-action="close">
                        <i class="fa-solid fa-times fs-1"></i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Platform</label>
                        <input type="text" name="platform" class="form-control form-control-solid mb-3 mb-lg-0" required/>
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">URL</label>
                        <input type="url" name="url" class="form-control form-control-solid mb-3 mb-lg-0" required/>
                    </div>
                    <div class="fv-row mb-7">
                        <label class="fw-semibold fs-6 mb-2">Order</label>
                        <input type="number" name="order" class="form-control form-control-solid mb-3 mb-lg-0" min="0"/>
                    </div>
                    <div class="fv-row mb-7">
                        <div class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" name="is_active" id="is_active_edit" value="1"/>
                            <label class="form-check-label" for="is_active_edit">
                                Active
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="reset" class="btn btn-light me-3" data-kt-social-modal-action="cancel">@lang('common.cancel')</button>
                    <button type="submit" class="btn btn-primary" data-kt-social-modal-action="submit">
                        <span class="indicator-label">@lang('common.update')</span>
                        <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end::Modal - Update Social Media-->

