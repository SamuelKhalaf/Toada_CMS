<!doctype html>
@php
    $currentLang = app()->getLocale();
    $isRTL = $currentLang === 'ar';
@endphp
<html lang="{{ str_replace('_', '-', $currentLang) }}" @if($isRTL) dir="rtl" @endif>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Toada') }} - {{ __('auth.sign_in') }}</title>
        <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />
        <!--begin::Fonts(mandatory for all pages)-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
        <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
        <!--end::Global Stylesheets Bundle-->
    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat @if($isRTL) app-rtl @endif">
    <!--begin::Theme mode setup on page load-->
    <script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Page bg image-->
        @yield('bg_image')
        <!--end::Page bg image-->
        @yield('content')
    </div>
    <!--end::Root-->
    <!--begin::Javascript-->
    <script>var hostUrl = "assets/";</script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Custom Javascript(used for this page only)-->
    @yield('scripts')
    <!--end::Custom Javascript-->
    <!--begin::Language Switching Script-->
    <script>
        // Language switching functionality
        document.addEventListener('DOMContentLoaded', function() {
            const isRTL = document.documentElement.dir === 'rtl';
            if (isRTL) {
                document.body.classList.add('app-rtl');
            }
            
            document.addEventListener('click', function(e) {
                const link = e.target.closest('a[href*="language/switch"]');
                if (!link) return;
                
                e.preventDefault();
                e.stopPropagation();
                
                const url = link.href;
                const language = url.split('/').pop();
                const originalHTML = link.innerHTML;
                
                link.innerHTML = '<i class="fas fa-spinner fa-spin"></i> ' + (language === 'ar' ? 'جاري التحميل...' : 'Loading...');
                
                fetch(url, {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                    },
                    credentials: 'same-origin'
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.status === 'success') {
                        window.location.reload();
                    } else {
                        throw new Error(data.message || 'Language switch failed');
                    }
                })
                .catch(error => {
                    console.error('Language switch error:', error);
                    link.innerHTML = originalHTML;
                    alert('Failed to change language. Please try again.');
                });
            });
        });
    </script>
    <!--end::Language Switching Script-->
    <!--end::Javascript-->
    </body>
    <!--end::Body-->
</html>

