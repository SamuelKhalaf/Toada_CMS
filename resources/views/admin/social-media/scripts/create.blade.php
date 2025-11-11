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
                            // Reset icon preview
                            const iconPreview = document.querySelector('#kt_modal_add_social .icon-preview');
                            const iconPathInput = document.getElementById('icon_path_add');
                            if (iconPreview && iconPathInput) {
                                iconPreview.innerHTML = '<div class="border rounded p-3 text-center text-muted" style="min-height: 60px; display: flex; align-items: center; justify-content: center;"><small>{{ __('common.no_icon') }}</small></div>';
                                iconPathInput.value = '';
                                document.querySelector('#kt_modal_add_social .remove-icon-btn').style.display = 'none';
                            }
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

    // Icon upload functionality
    document.addEventListener('DOMContentLoaded', function() {
        // Icon preview on file selection
        document.getElementById('icon_image_input')?.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview_icon_image').src = e.target.result;
                    document.querySelector('#kt_modal_icon_upload .image-preview-upload').style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });

        // Handle icon upload button clicks
        document.querySelectorAll('.upload-icon-btn').forEach(btn => {
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

        // Handle icon upload
        document.getElementById('upload_icon_btn')?.addEventListener('click', function() {
            const form = document.getElementById('kt_form_icon_upload');
            const formData = new FormData(form);
            const targetInputId = document.getElementById('target_icon_input').value;
            
            // Add CSRF token
            formData.append('_token', '{{ csrf_token() }}');
            
            fetch('{{ route("admin.social-media.upload-icon") }}', {
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
                    const targetInput = document.getElementById(targetInputId);
                    const iconPreview = targetInput.closest('.icon-upload-wrapper').querySelector('.icon-preview');
                    const removeBtn = targetInput.closest('.icon-upload-wrapper').querySelector('.remove-icon-btn');
                    
                    if (targetInput) {
                        targetInput.value = data.path;
                    }
                    
                    if (iconPreview) {
                        iconPreview.innerHTML = `<img src="${data.url}" alt="Icon Preview" style="max-width: 100px; height: auto;">`;
                    }
                    
                    if (removeBtn) {
                        removeBtn.style.display = 'inline-block';
                    }
                    
                    bootstrap.Modal.getInstance(document.getElementById('kt_modal_icon_upload')).hide();
                    
                    Swal.fire({
                        text: "{{ __('common.icon_uploaded_successfully') }}",
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

        // Handle remove icon button
        document.querySelectorAll('.remove-icon-btn').forEach(btn => {
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
