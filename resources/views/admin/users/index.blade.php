@extends('admin.layouts.master')
@section('title', __('users.users_list'))
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">@lang('users.users_list')</h1>
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
                        <li class="breadcrumb-item text-muted">@lang('users.breadcrumb_users')</li>
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
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </span>
                                <!--end::Svg Icon-->
                                <input type="text" data-kt-user-table-filter="search"
                                       class="form-control form-control-solid w-250px ps-14" placeholder="@lang('app.search_placeholder')"/>
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                <!--begin::Add user-->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_add_user">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <i class="fa-solid fa-plus"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                    @lang('users.add_user')
                                </button>
                                <!--end::Add user-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-125px">@lang('users.full_name')</th>
                                <th class="min-w-125px">@lang('users.email')</th>
                                <th class="min-w-100px">@lang('users.preferred_language')</th>
                                <th class="min-w-125px">@lang('users.joined_date')</th>
                                <th class="text-center min-w-100px">@lang('common.actions')</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-semibold">
                            <!--begin::Table row-->
                            <!--end::Table row-->
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
    <!--begin::Modal - Add Users-->
    @include('admin.users.modals.create')
    <!--end::Modal - Add Users-->
    <!--begin::Modal - Update user-->
    @include('admin.users.modals.edit')
    <!--end::Modal - Update user-->
@endsection
@section('scripts')
    <script>
        $('#kt_table_users').on('draw.dt', function () {
            KTMenu.createInstances();
        });

        "use strict";

        var KTUsersList = function () {
            // Define shared variables
            var table = document.getElementById('kt_table_users');
            var datatable;

            // Private functions
            var initUserTable = function () {
                // Check if current language is Arabic for RTL support
                const isArabic = document.documentElement.lang === 'ar';

                datatable = $(table).DataTable({
                    processing: true,
                    serverSide: false,
                    ajax: "{{ route('admin.users.datatable') }}",
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
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'language',
                            name: 'language',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'actions',
                            name: 'actions',
                            orderable: false,
                            searchable: false,
                            className: 'text-center'
                        }
                    ]
                });
            }

            // Search Datatable
            var handleSearchDatatable = () => {
                const filterSearch = document.querySelector('[data-kt-user-table-filter="search"]');
                filterSearch.addEventListener('keyup', function (e) {
                    datatable.search(e.target.value).draw();
                });
            }

            return {
                // Public functions
                init: function () {
                    if (!table) {
                        return;
                    }

                    initUserTable();
                    handleSearchDatatable();
                }
            }
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function () {
            KTUsersList.init();
        });
    </script>

    <script>
        "use strict";

        // Class definition
        var KTUsersAddUser = function () {
            // Shared variables
            const element = document.getElementById('kt_modal_add_user');
            const form = element.querySelector('#kt_modal_add_user_form');
            const modal = new bootstrap.Modal(element);

            // Init add schedule modal
            var initAddUser = () => {

                // Init form validation rules
                var validator = FormValidation.formValidation(
                    form,
                    {
                        fields: {
                            'name': {
                                validators: {
                                    notEmpty: {
                                        message: 'Full name is required'
                                    }
                                }
                            },
                            'email': {
                                validators: {
                                    notEmpty: {
                                        message: 'Valid email address is required'
                                    }
                                }
                            },
                            'password': {
                                validators: {
                                    notEmpty: {
                                        message: 'Password field is required'
                                    }
                                }
                            },
                            'password_confirmation': {
                                validators: {
                                    notEmpty: {
                                        message: 'Confirm password field is required'
                                    },
                                    identical: {
                                        compare: function() {
                                            return form.querySelector('[name="password"]').value;
                                        },
                                        message: 'The password and its confirm are not the same'
                                    }
                                }
                            },
                        },

                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap: new FormValidation.plugins.Bootstrap5({
                                rowSelector: '.fv-row',
                                eleInvalidClass: '',
                                eleValidClass: ''
                            })
                        }
                    }
                );

                // Submit button handler
                const submitButton = element.querySelector('[data-kt-users-modal-action="submit"]');
                submitButton.addEventListener('click', e => {
                    e.preventDefault();

                    if (validator) {
                        validator.validate().then(function (status) {
                            if (status === 'Valid') {
                                submitButton.setAttribute('data-kt-indicator', 'on');
                                submitButton.disabled = true;

                                // Get form data
                                let formData = new FormData(form);

                                // Send AJAX request
                                $.ajax({
                                    url: form.getAttribute('action'),
                                    type: "POST",
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function (response) {
                                        submitButton.removeAttribute("data-kt-indicator");
                                        submitButton.disabled = false;

                                        Swal.fire({
                                            text: response.message,
                                            icon: "success",
                                            buttonsStyling: false,
                                            confirmButtonText: __('got_it'),
                                            customClass: {
                                                confirmButton: "btn btn-primary"
                                            }
                                        }).then(function (result) {
                                            if (result.isConfirmed) {
                                                modal.hide();
                                                form.reset();
                                                $('#kt_table_users').DataTable().ajax.reload();
                                            }
                                        });
                                    },
                                    error: function (xhr) {
                                        submitButton.removeAttribute("data-kt-indicator");
                                        submitButton.disabled = false;

                                        let errorMessage = __('operation_failed');

                                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                                            errorMessage = Object.values(xhr.responseJSON.errors).join("\n");
                                        }

                                        Swal.fire({
                                            text: errorMessage,
                                            icon: "error",
                                            buttonsStyling: false,
                                            confirmButtonText: __('got_it'),
                                            customClass: {
                                                confirmButton: "btn btn-primary"
                                            }
                                        });
                                    }
                                });

                            } else {
                                Swal.fire({
                                    text: __('please_fix_errors'),
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: __('got_it'),
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                            }
                        });
                    }
                });
                // Cancel button handler
                const cancelButton = element.querySelector('[data-kt-users-modal-action="cancel"]');
                cancelButton.addEventListener('click', e => {
                    e.preventDefault();
                    modal.hide();
                    form.reset();
                });

                // Close button handler
                const closeButton = element.querySelector('[data-kt-users-modal-action="close"]');
                closeButton.addEventListener('click', e => {
                    e.preventDefault();
                    modal.hide();
                    form.reset();
                });
            }

            return {
                // Public functions
                init: function () {
                    initAddUser();
                }
            };
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function () {
            KTUsersAddUser.init();
        });
    </script>

    <script>
        "use strict";

        // Class definition
        var KTUsersUpdateDetails = function () {
            // Shared variables
            const element = document.getElementById('kt_modal_update_details');
            const form = element.querySelector('#kt_modal_update_user_form');
            const modal = new bootstrap.Modal(element);

            // Function to populate the form with user data
            var populateForm = (userData) => {
                // Set name field
                const nameField = form.querySelector('[name="name"]');
                if (nameField) {
                    nameField.value = userData.name || "";
                }

                // Set email field
                const emailField = form.querySelector('[name="email"]');
                if (emailField) {
                    emailField.value = userData.email || "";
                }

                // Set user ID
                $("#kt_modal_update_user_form").attr("data-user-id", userData.id);

                // Select the user's preferred language
                const languageSelect = form.querySelector('[name="preferred_language"]');
                if (languageSelect && userData.preferred_language) {
                    // Set the value
                    languageSelect.value = userData.preferred_language;
                    
                    // Also manually set selected attribute for reliability
                    Array.from(languageSelect.options).forEach(option => {
                        option.selected = (option.value === userData.preferred_language);
                    });
                    
                    // Trigger change event to ensure any dependent logic runs
                    $(languageSelect).trigger('change');
                }

                // Clear password fields (they should be empty for updates)
                const passwordField = form.querySelector('[name="password"]');
                if (passwordField) {
                    passwordField.value = "";
                }
                const passwordConfirmField = form.querySelector('[name="password_confirmation"]');
                if (passwordConfirmField) {
                    passwordConfirmField.value = "";
                }
            };

            // Fetch user data when modal is opened
            element.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                const userId = button ? button.getAttribute('data-user-id') : null;

                // Reset the form first
                form.reset();
                $("#kt_modal_update_user_form").attr("data-user-id", "");

                if (userId) {
                    // Show loading state
                    const submitButton = element.querySelector('[data-kt-users-modal-action="submit"]');
                    if (submitButton) {
                        submitButton.disabled = true;
                    }

                    // Fetch user data
                    $.ajax({
                        url: `{{ route('admin.users.edit', ':id') }}`.replace(':id', userId),
                        type: "GET",
                        dataType: 'json',
                        success: function (response) {
                            if (response && response.id) {
                                // Use setTimeout to ensure modal is fully shown before populating
                                setTimeout(function() {
                                    populateForm(response);
                                    // Re-enable submit button
                                    if (submitButton) {
                                        submitButton.disabled = false;
                                    }
                                }, 100);
                            } else {
                                console.error("Invalid response format:", response);
                                if (submitButton) {
                                    submitButton.disabled = false;
                                }
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error("Error fetching user data:", error);
                            console.error("Response:", xhr.responseText);
                            // Re-enable submit button
                            if (submitButton) {
                                submitButton.disabled = false;
                            }
                            Swal.fire({
                                text: __('error_occurred'),
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: __('got_it'),
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        }
                    });
                } else {
                    console.error("No user ID found");
                }
            });

            // Add reset handler when modal is hidden
            element.addEventListener('hidden.bs.modal', function () {
                // Clear the user ID when modal is closed
                $("#kt_modal_update_user_form").attr("data-user-id", "");
                form.reset();
            });

            // Init update user modal
            var initUpdateDetails = () => {
                // Init form validation
                var validator = FormValidation.formValidation(
                    form,
                    {
                        fields: {
                            'name': {
                                validators: {
                                    notEmpty: {
                                        message: 'Full name is required'
                                    }
                                }
                            },
                            'email': {
                                validators: {
                                    notEmpty: {
                                        message: 'Valid email address is required'
                                    }
                                }
                            },
                            'password': {
                                validators: {
                                    identical: {
                                        compare: function() {
                                            return form.querySelector('[name="password_confirmation"]').value;
                                        },
                                        message: 'The password and its confirm are not the same'
                                    }
                                }
                            },
                            'password_confirmation': {
                                validators: {
                                    identical: {
                                        compare: function() {
                                            return form.querySelector('[name="password"]').value;
                                        },
                                        message: 'The password and its confirm are not the same'
                                    }
                                }
                            },
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap: new FormValidation.plugins.Bootstrap5({
                                rowSelector: '.fv-row',
                                eleInvalidClass: '',
                                eleValidClass: ''
                            })
                        }
                    }
                );

                // Submit button handler
                const submitButton = element.querySelector('[data-kt-users-modal-action="submit"]');
                submitButton.addEventListener('click', e => {
                    e.preventDefault();

                    if (validator) {
                        validator.validate().then(function (status) {
                            if (status === 'Valid') {
                                submitButton.setAttribute('data-kt-indicator', 'on');
                                submitButton.disabled = true;

                                // Get form data and send AJAX request
                                let formData = new FormData(form);
                                let userId = $("#kt_modal_update_user_form").attr("data-user-id");
                                let updateUrl = `{{ route('admin.users.update', ':id') }}`.replace(':id', userId);
                                $.ajax({
                                    url: updateUrl,
                                    type: "POST",
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function (response) {
                                        submitButton.removeAttribute('data-kt-indicator');
                                        submitButton.disabled = false;

                                        Swal.fire({
                                            text: response.message,
                                            icon: "success",
                                            buttonsStyling: false,
                                            confirmButtonText: __('got_it'),
                                            customClass: {
                                                confirmButton: "btn btn-primary"
                                            }
                                        }).then(function (result) {
                                            if (result.isConfirmed) {
                                                form.reset();
                                                modal.hide();
                                                $('#kt_table_users').DataTable().ajax.reload();
                                            }
                                        });
                                    },
                                    error: function (xhr) {
                                        submitButton.removeAttribute('data-kt-indicator');
                                        submitButton.disabled = false;

                                        let errorMessage = __('operation_failed');

                                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                                            errorMessage = Object.values(xhr.responseJSON.errors).join("\n");
                                        }

                                        Swal.fire({
                                            text: errorMessage,
                                            icon: "error",
                                            buttonsStyling: false,
                                            confirmButtonText: __('got_it'),
                                            customClass: {
                                                confirmButton: "btn btn-primary"
                                            }
                                        });
                                    }
                                });
                            } else {
                                Swal.fire({
                                    text: __('please_fix_errors'),
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: __('got_it'),
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                            }
                        });
                    }
                });

                // Cancel button handler
                const cancelButton = element.querySelector('[data-kt-users-modal-action="cancel"]');
                cancelButton.addEventListener('click', resetAndCloseModal);

                // Close button handler
                const closeButton = element.querySelector('[data-kt-users-modal-action="close"]');
                closeButton.addEventListener('click', resetAndCloseModal);

                function resetAndCloseModal(e) {
                    e.preventDefault();
                    form.reset();
                    modal.hide();
                }
            }

            return {
                // Public functions
                init: function () {
                    initUpdateDetails();
                }
            };
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function () {
            KTUsersUpdateDetails.init();
        });
    </script>

    <script>
        // handle delete user
        $(document).on("click", '[data-kt-users-table-filter="delete_row"]', function (e) {
            e.preventDefault();

            var userId = $(this).data("user-id");

            Swal.fire({
                text: __('user_delete_confirm'),
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: __('yes_delete'),
                cancelButtonText: __('cancel'),
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(function (result) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.users.destroy', ':id') }}".replace(':id', userId),
                        type: 'DELETE',
                        data: {_token: '{{ csrf_token() }}'},
                        success: function (response) {
                            if (response.success) {
                                Swal.fire({
                                    text: response.message,
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: __('ok'),
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary",
                                    }
                                }).then(function () {
                                    $('#kt_table_users').DataTable().ajax.reload();
                                });
                            } else {
                                Swal.fire({
                                    text: response.message,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: __('ok'),
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-danger",
                                    }
                                });
                            }
                        },
                        error: function () {
                            Swal.fire({
                                text: __('operation_failed'),
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: __('ok'),
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
@endsection

