<script>
    "use strict";
    var KTSocialMediaAdd = function () {
        const element = document.getElementById('kt_modal_add_social');
        const form = element.querySelector('#kt_modal_add_social_form');
        const modal = new bootstrap.Modal(element);

        var initAddSocial = () => {
            const submitButton = element.querySelector('[data-kt-social-modal-action="submit"]');
            submitButton.addEventListener('click', e => {
                e.preventDefault();
                submitButton.setAttribute('data-kt-indicator', 'on');
                submitButton.disabled = true;

                let formData = new FormData(form);
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
                            confirmButtonText: "{{ __('got_it') }}",
                            customClass: { confirmButton: "btn btn-primary" }
                        }).then(function () {
                            modal.hide();
                            form.reset();
                            $('#kt_table_social').DataTable().ajax.reload();
                        });
                    },
                    error: function (xhr) {
                        submitButton.removeAttribute("data-kt-indicator");
                        submitButton.disabled = false;
                        let errorMessage = "{{ __('operation_failed') }}";
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            errorMessage = Object.values(xhr.responseJSON.errors).join("\n");
                        }
                        Swal.fire({
                            text: errorMessage,
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "{{ __('got_it') }}",
                            customClass: { confirmButton: "btn btn-primary" }
                        });
                    }
                });
            });

            element.querySelector('[data-kt-social-modal-action="cancel"]').addEventListener('click', e => {
                e.preventDefault();
                modal.hide();
                form.reset();
            });

            element.querySelector('[data-kt-social-modal-action="close"]').addEventListener('click', e => {
                e.preventDefault();
                modal.hide();
                form.reset();
            });
        }

        return {
            init: function () {
                initAddSocial();
            }
        };
    }();

    KTUtil.onDOMContentLoaded(function () {
        KTSocialMediaAdd.init();
    });
</script>

