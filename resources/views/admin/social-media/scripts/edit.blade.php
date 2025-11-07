<script>
    "use strict";
    var KTSocialMediaUpdate = function () {
        const element = document.getElementById('kt_modal_update_social');
        const form = element.querySelector('#kt_modal_update_social_form');
        const modal = new bootstrap.Modal(element);

        element.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const socialId = button ? button.getAttribute('data-social-id') : null;
            form.reset();

            if (socialId) {
                $.ajax({
                    url: "{{ route('admin.social-media.edit', ':id') }}".replace(':id', socialId),
                    type: "GET",
                    dataType: 'json',
                    success: function (response) {
                        form.action = "{{ route('admin.social-media.update', ':id') }}".replace(':id', socialId);
                        form.querySelector('[name="platform"]').value = response.platform || '';
                        form.querySelector('[name="url"]').value = response.url || '';
                        form.querySelector('[name="order"]').value = response.order || 0;
                        document.getElementById('is_active_edit').checked = response.is_active || false;
                    },
                    error: function () {
                        Swal.fire({
                            text: "{{ __('error_occurred') }}",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "{{ __('got_it') }}",
                            customClass: { confirmButton: "btn btn-primary" }
                        });
                    }
                });
            }
        });

        var initUpdateSocial = () => {
            const submitButton = element.querySelector('[data-kt-social-modal-action="submit"]');
            submitButton.addEventListener('click', e => {
                e.preventDefault();
                submitButton.setAttribute('data-kt-indicator', 'on');
                submitButton.disabled = true;

                let formData = new FormData(form);
                $.ajax({
                    url: form.action,
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
                initUpdateSocial();
            }
        };
    }();

    KTUtil.onDOMContentLoaded(function () {
        KTSocialMediaUpdate.init();
    });
</script>

