<div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">@lang('users.add_user')</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <i class="fa-solid fa-xmark " style="font-size: 2rem !important;"></i>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="kt_modal_add_user_form" class="form" action="{{ route('admin.users.store') }}">
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
                         data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                         data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
                         data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        @csrf
                        <!--begin::Row-->
                        <div class="row mb-7">
                            <!--begin::Col-->
                            <div class="col-md-6">
                                <div class="fv-row">
                                    <!--begin::Label-->
                                    <label class="required fw-semibold fs-6 mb-2">@lang('users.full_name')</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="name" class="form-control form-control-solid"
                                           placeholder="@lang('users.full_name_placeholder')"/>
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6">
                                <div class="fv-row">
                                    <!--begin::Label-->
                                    <label class="required fw-semibold fs-6 mb-2">@lang('users.email')</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="email" name="email" class="form-control form-control-solid"
                                           placeholder="@lang('users.email_placeholder')"/>
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                        
                        <!--begin::Row-->
                        <div class="row mb-7">
                            <!--begin::Col-->
                            <div class="col-md-6">
                                <div class="fv-row">
                                    <!--begin::Label-->
                                    <label class="fw-semibold fs-6 mb-2">@lang('users.preferred_language')</label>
                                    <!--end::Label-->
                                    <!--begin::Select-->
                                    <select name="preferred_language" class="form-select form-control-solid">
                                        <option value="ar" selected>@lang('languages.arabic')</option>
                                        <option value="en">@lang('languages.english')</option>
                                    </select>
                                    <!--end::Select-->
                                </div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                        
                        <!--begin::Row-->
                        <div class="row mb-7">
                            <!--begin::Col-->
                            <div class="col-md-6">
                                <div class="fv-row">
                                    <!--begin::Label-->
                                    <label class="required fw-semibold fs-6 mb-2">@lang('users.password')</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="password" name="password" class="form-control form-control-solid"/>
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6">
                                <div class="fv-row">
                                    <!--begin::Label-->
                                    <label class="required fw-semibold fs-6 mb-2">@lang('users.confirm_password')</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="password" name="password_confirmation" class="form-control form-control-solid"/>
                                    <!--end::Input-->
                                </div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">
                            @lang('common.discard')
                        </button>
                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                            <span class="indicator-label">@lang('common.submit')</span>
                            <span class="indicator-progress">
                                @lang('common.please_wait')...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>

