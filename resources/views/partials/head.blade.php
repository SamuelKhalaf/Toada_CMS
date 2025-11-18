<meta charset="utf-8"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', 'Toada')</title>
@hasSection('meta')
    @yield('meta')
@else
    <meta content="{{ asset('images/index/meta-image.jpg') }}" property="og:image"/>
    <meta property="og:type" content="website"/>
    <meta content="summary_large_image" name="twitter:card"/>
@endif
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<link href="{{ asset('css/asteria-template.webflow.shared.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/lama-sans-fonts.css') }}" rel="stylesheet" type="text/css"/>
@yield('styles')
<link href="{{ asset('fonts/') }}" rel="preconnect"/>
<link href="{{ asset('fonts/') }}" rel="preconnect" crossorigin="anonymous"/>
<script src="{{ asset('js/webfont.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    WebFont.load({
        custom: {
            families: ["LamaSans", "LamaSans Condensed", "LamaSans Expanded"]
        }
    });
</script>
<script type="text/javascript">
    !function(o, c) {
        var n = c.documentElement
          , t = " w-mod-";
        n.className += t + "js",
        ("ontouchstart"in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
    }(window, document);
</script>
<link href="{{ asset('images/favicon.png') }}" rel="shortcut icon" type="image/x-icon"/>
<link href="{{ asset('images/apple-touch-icon.png') }}" rel="apple-touch-icon"/>
<link href="{{ asset('css/toada.css') }}" rel="stylesheet" type="text/css"/>
@if(app()->getLocale() === 'ar')
<!-- <link href="{{ asset('css/rtl.css') }}" rel="stylesheet" type="text/css"/> -->
@endif
<style type="text/css">
    body {
        -webkit-font-smoothing: antialiased;
    }
    
    /* Arabic font support */
    @if(app()->getLocale() === 'ar')
    body, h1, h2, h3, h4, h5, h6, p, a, span, div {
        font-family: 'LamaSans', 'Arial', 'Tahoma', sans-serif !important;
    }
    @endif
    .slide-content {
        background-color: #EBEBEB;
    }
    
    /* Navigation text font size */
    .nav-link {
        font-size: 36px !important;
    }
    
    /* Social icons styling */
    .social-icons-wrap {
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
        gap: 1.5rem !important;
        width: 100% !important;
        margin: 0 auto !important;
        grid-template-columns: none !important;
        grid-gap: 0 !important;
    }
    
    .social-icon-link {
        width: 60px !important;
        height: 60px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        margin: 0 !important;
    }
    
    .social-icon-link svg {
        width: 40px !important;
        height: 40px !important;
    }
    
    /* Override Webflow grid system */
    .w-layout-grid.social-icons-wrap {
        display: flex !important;
        grid-template-columns: none !important;
        grid-gap: 0 !important;
        justify-content: center !important;
        align-items: center !important;
    }

    .icon-embed {
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 2.5em !important;
        height: 2.5em !important;
        display: flex;
    }
    
    /* Prevent logo and menu button from toggling positions in RTL mode */
    .container-nav {
        direction: ltr !important;
        flex-direction: row !important;
    }
    
    [dir="rtl"] .container-nav {
        direction: ltr !important;
        flex-direction: row !important;
    }
    
    /* Ensure logo stays on the left */
    .logo-link {
        order: 1 !important;
    }
    
    /* Ensure menu button stays on the right */
    .button-menu {
        order: 3 !important;
    }
    
    /* Language switcher stays in the middle */
    .language-switcher {
        order: 2 !important;
    }
    
    /* RTL support for navigation content */
    [dir="rtl"] .nav-content {
        direction: rtl !important;
        text-align: right !important;
    }
    
    [dir="rtl"] .nav-link-list {
        direction: rtl !important;
        text-align: right !important;
    }
    
    [dir="rtl"] .nav-link-item {
        direction: rtl !important;
        text-align: right !important;
    }
    
    [dir="rtl"] .nav-link-wrapper {
        direction: rtl !important;
        text-align: right !important;
    }
    
    [dir="rtl"] .nav-link {
        direction: rtl !important;
        text-align: right !important;
    }
    
    [dir="rtl"] .display-xs {
        direction: rtl !important;
        text-align: right !important;
    }
</style>
@yield('page-specific-styles')


