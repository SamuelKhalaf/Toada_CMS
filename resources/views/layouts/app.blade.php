<!DOCTYPE html>
<html data-wf-domain="toada.com" data-wf-page="@yield('wf-page-id', '67a6d23cd1f672ae9697c3f8')" data-wf-site="toada.com" lang="en">
    <head>
        @include('partials.head')
    </head>
    <body>
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
            });
        </script>
        @yield('scripts')
    </body>
</html>

