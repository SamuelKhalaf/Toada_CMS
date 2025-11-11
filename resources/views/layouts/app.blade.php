<!DOCTYPE html>
@php
    $currentLang = app()->getLocale();
    $isRTL = $currentLang === 'ar';
@endphp
<html data-wf-domain="toada.com" data-wf-page="@yield('wf-page-id', '67a6d23cd1f672ae9697c3f8')" data-wf-site="toada.com" lang="{{ $currentLang }}" @if($isRTL) dir="rtl" @endif>
    <head>
        @include('partials.head')
    </head>
    <body class="@if($isRTL) rtl-mode @endif">
        <div class="page-wrapper">
            <div class="cursor-wrap">
                <div class="cursor"></div>
            </div>
            <div class="hover-component">
                <div class="view-project">
                    <div>↳ View</div>
                </div>
            </div>
            <div class="main-wrapper">
                @include('partials.header')
                
                @yield('content')
                
                @include('partials.footer')
            </div>
        </div>
        <script src="{{ asset('js/jquery-3.5.1.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/webflow.schunk.4a394eb5af8156f2.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/webflow.schunk.1fff90bd94b9d2f5.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/webflow.7b9d2db1.cb34f938b9f42ae7.js') }}" type="text/javascript"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const badge = document.querySelector('.w-webflow-badge');
                if (badge) {
                    badge.remove();
                }
                
                // Language switcher functionality
                const languageSwitcher = document.querySelector('.language-switcher-button');
                if (languageSwitcher) {
                    languageSwitcher.addEventListener('click', function(e) {
                        e.preventDefault();
                        const url = this.href;
                        
                        // Show loading state
                        const originalHTML = this.innerHTML;
                        this.innerHTML = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="animate-spin"><circle cx="12" cy="12" r="10" opacity="0.25"></circle><path d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" opacity="0.75"></path></svg> <span>Loading...</span>';
                        
                        // Navigate to language switch URL
                        window.location.href = url;
                    });
                }
            });
        </script>
        <style>
            @keyframes spin {
                from { transform: rotate(0deg); }
                to { transform: rotate(360deg); }
            }
            .animate-spin {
                animation: spin 1s linear infinite;
            }
        </style>
        @yield('scripts')
    </body>
</html>

