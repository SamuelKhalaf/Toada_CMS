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
                        
                        // Set icon path and preview
                        const iconPathInput = document.getElementById('icon_path_edit');
                        const iconPreview = document.querySelector('#kt_modal_update_social .icon-preview');
                        const removeBtn = document.querySelector('#kt_modal_update_social .remove-icon-btn');
                        
                        if (response.icon_path) {
                            iconPathInput.value = response.icon_path;
                            if (iconPreview) {
                                iconPreview.innerHTML = `<img src="{{ asset('storage/') }}/${response.icon_path}" alt="Icon Preview" style="max-width: 100px; height: auto;">`;
                            }
                            if (removeBtn) {
                                removeBtn.style.display = 'inline-block';
                            }
                        } else {
                            iconPathInput.value = '';
                            if (iconPreview) {
                                iconPreview.innerHTML = '<div class="border rounded p-3 text-center text-muted" style="min-height: 60px; display: flex; align-items: center; justify-content: center;"><small>{{ __('common.no_icon') }}</small></div>';
                            }
                            if (removeBtn) {
                                removeBtn.style.display = 'none';
                            }
                        }
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

    // Icon upload functionality for edit modal
    document.addEventListener('DOMContentLoaded', function() {
        // Handle icon upload button clicks in edit modal
        document.querySelectorAll('#kt_modal_update_social .upload-icon-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const targetInput = this.closest('.icon-upload-wrapper').querySelector('.icon-path-input');
                document.getElementById('target_icon_input').value = targetInput.id;
                
                // Reset form
                document.getElementById('kt_form_icon_upload').reset();
                document.querySelector('#kt_modal_icon_upload .image-preview-upload').style.display = 'none';
                
                const iconModal = new bootstrap.Modal(document.getElementById('kt_modal_icon_upload'));
                iconModal.show();
            });
        });

        // Handle remove icon button in edit modal
        document.querySelectorAll('#kt_modal_update_social .remove-icon-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const wrapper = this.closest('.icon-upload-wrapper');
                const iconPathInput = wrapper.querySelector('.icon-path-input');
                const iconPreview = wrapper.querySelector('.icon-preview');
                
                iconPathInput.value = '';
                iconPreview.innerHTML = '<div class="border rounded p-3 text-center text-muted" style="min-height: 60px; display: flex; align-items: center; justify-content: center;"><small>{{ __('common.no_icon') }}</small></div>';
                this.style.display = 'none';
            });
        });
    });
</script>
