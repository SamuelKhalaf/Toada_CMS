@extends('layouts.app')

@section('title', 'Toada')

@section('wf-page-id', '67a6d23cd1f672ae9697c3f8')

@php
    $contentService = app(\App\Services\ContentService::class);
    $currentLang = app()->getLocale();
    
    // Helper function to get content
    $getContent = function($sectionKey, $default = '') use ($contentService, $currentLang) {
        $content = $contentService->getContent('index', $sectionKey, $currentLang);
        if (is_array($content) && isset($content['text'])) {
            return $content['text'];
        }
        return is_string($content) ? $content : $default;
    };
    
    // Helper function to get image
    $getImage = function($sectionKey) use ($contentService, $currentLang) {
        return $contentService->getImage('index', $sectionKey, $currentLang);
    };
    
    // Get content with highlights
    $getContentWithHighlight = function($sectionKey) use ($contentService, $currentLang) {
        $content = $contentService->getContent('index', $sectionKey, $currentLang);
        if (is_array($content)) {
            return $content;
        }
        return ['text' => $content, 'highlight' => null];
    };
    
    // Load all content once
    $heroTitle = $getContent('hero_title', 'LIFE-CHANGING EXPERIENCES');
    $heroIntro = $getContent('hero_intro_text', '');
    $heroImage = $getImage('hero_image');
    
    $philosophyData = $getContentWithHighlight('philosophy_title');
    $philosophyText = $getContent('philosophy_text', '');
    
    $servicesData = $getContentWithHighlight('services_title');
    
    $service1Title = $getContent('service_1_title', 'Strategize');
    $service1Text = $getContent('service_1_text', '');
    $service1Image = $getImage('service_1_image');
    $service1Icon = $getImage('service_1_icon');
    
    $service2Title = $getContent('service_2_title', 'Conceptualize');
    $service2Text = $getContent('service_2_text', '');
    $service2Image = $getImage('service_2_image');
    $service2Icon = $getImage('service_2_icon');
    
    $service3Title = $getContent('service_3_title', 'Perform');
    $service3Text = $getContent('service_3_text', '');
    $service3Image = $getImage('service_3_image');
    $service3Icon = $getImage('service_3_icon');
    
    $themesTitle = $getContent('themes_title', 'Key Themes And Personae');
    $theme1Title = $getContent('theme_1_title', 'Culture Driven');
    $theme1Text = $getContent('theme_1_text', '');
    $theme2Title = $getContent('theme_2_title', 'Human-Centric');
    $theme2Text = $getContent('theme_2_text', '');
    $theme3Title = $getContent('theme_3_title', 'Trend-Setter');
    $theme3Text = $getContent('theme_3_text', '');
    $themesCircularImage = $getImage('themes_circular_image');
    // Get caption from separate themes_circular_caption section
    $themesCircularCaptionDefault = $currentLang === 'ar' ? 'حمضنا النووي' : 'Our DNA';
    $themesCircularCaption = $getContent('themes_circular_caption', $themesCircularCaptionDefault);
    
    $teamTitle = $getContent('team_title', 'Meet the Minds Behind the impact');
    $teamBackgroundImage = $getImage('team_background_image');
@endphp

@section('meta')
    <meta content="{{ asset('images/index/meta-image.jpg') }}" property="og:image"/>
    <meta property="og:type" content="website"/>
    <meta content="summary_large_image" name="twitter:card"/>
@endsection

@section('page-specific-styles')
    <style>
        @media (min-width: 992px) {
            html.w-mod-js:not(.w-mod-ix) [data-w-id="1d64aac0-a45f-5968-b743-9b1d2539d575"] {
                -webkit-transform:translate3d(0, 100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -moz-transform: translate3d(0, 100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -ms-transform: translate3d(0, 100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                transform: translate3d(0, 100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
            }
        }
        
        /* Enhanced responsive typography for hero intro text */
        @media (min-width: 1200px) {
            .hero-intro-text {
                font-size: clamp(1.25rem, 1.5vw, 1.5rem);
            }
        }
        
        @media (min-width: 1600px) {
            .hero-intro-text {
                font-size: clamp(1.375rem, 1.9vw, 3rem);
            }
        }
        
        /* Enhanced responsive typography for button text */
        @media (min-width: 1200px) {
            .button-text {
                font-size: clamp(0.9rem, 1.1vw, 1.1rem);
            }
        }
        
        @media (min-width: 1600px) {
            .button-text {
                font-size: clamp(1rem, 1.5vw, 2.4rem);
            }
        }

        @media (min-width: 992px) {
            html.w-mod-js:not(.w-mod-ix) [data-w-id="1d64aac0-a45f-5968-b743-9b1d2539d574"] {
                -webkit-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -moz-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -ms-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                filter: blur(0px);
            }
        }

        @media (max-width: 991px) and (min-width:768px) {
            html.w-mod-js:not(.w-mod-ix) [data-w-id="1d64aac0-a45f-5968-b743-9b1d2539d575"] {
                -webkit-transform:translate3d(0, 100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -moz-transform: translate3d(0, 100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -ms-transform: translate3d(0, 100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                transform: translate3d(0, 100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
            }

            html.w-mod-js:not(.w-mod-ix) [data-w-id="1d64aac0-a45f-5968-b743-9b1d2539d574"] {
                -webkit-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -moz-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -ms-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                filter: blur(0px);
            }
        }

        @media (max-width: 767px) and (min-width:480px) {
            html.w-mod-js:not(.w-mod-ix) [data-w-id="1d64aac0-a45f-5968-b743-9b1d2539d575"] {
                -webkit-transform:translate3d(0, 100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -moz-transform: translate3d(0, 100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -ms-transform: translate3d(0, 100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                transform: translate3d(0, 100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
            }

            html.w-mod-js:not(.w-mod-ix) [data-w-id="1d64aac0-a45f-5968-b743-9b1d2539d574"] {
                -webkit-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -moz-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -ms-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                filter: blur(0px);
            }
        }
        
        /* Hero Carousel Styles */
        .hero-carousel {
            position: relative;
            overflow: hidden;
            height: 100vh;
            min-height: 600px;
            padding-bottom: 0 !important;
        }
        
        .hero-carousel-wrapper {
            display: flex;
            transition: transform 0.6s ease-in-out;
            width: 200%;
            height: 100%;
        }
        
        .hero-slide {
            width: 50%;
            flex-shrink: 0;
            height: 100%;
        }
        
        .hero-slide .hero-content {
            height: 100%;
        }
        
        .hero-slide-2 {
            position: relative;
        }
        
        .hero-slide-2 .hero-content {
            position: relative;
            display: flex;
            align-items: flex-end;
            justify-content: flex-end;
            padding: 2rem;
        }
        
        .hero-slide-2 .header-image-wrapper {
            height: 100%;
        }
        
        .hero-slide-2 .full-image-slide {
            width: 100%;
            height: 100%;
            /* object-fit: cover; */
            position: absolute;
            top: 0;
            left: 0;
        }
        
        .hero-slide-2 .register-button-wrapper {
            position: absolute;
            bottom: 10rem;
            right: 10rem;
            z-index: 10;
        }
        
        .carousel-dots {
            position: absolute;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 0.75rem;
            z-index: 20;
        }
        
        .carousel-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .carousel-dot.active {
            background: #fff;
            width: 32px;
            border-radius: 6px;
        }
        
        @media (max-width: 768px) {
            .hero-slide-2 .register-button-wrapper {
                bottom: 5rem;
                right: 40%;
            }
        }

        @media (max-width: 480px) {
            .hero-slide-2 .register-button-wrapper {
                bottom: 20%;
                right: 34%;
            }
        }

        /* Register Button Styles */
        .register-button-wrapper .button {
            background-color: #F6D400 !important;
            color: #000 !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            /* padding: 1em 1.5em !important; */
        }

        .register-button-wrapper .button-text {
            color: #000 !important;
        }

        @media (min-width: 992px) {
            .register-button-wrapper .button {
                padding: 1.3em 2.5em !important;
            }
        }

        .register-button-wrapper .button:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 8px 20px rgba(246, 212, 0, 0.4);
        }

        .register-button-wrapper .button-background.cover {
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background-color: rgba(0, 0, 0, 0.1);
        }

        .register-button-wrapper .button:hover .button-background.cover {
            -webkit-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
            -moz-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
            -ms-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
            transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
        }

        .register-button-wrapper .button-icon-arrow.hover {
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .register-button-wrapper .button:hover .button-icon-arrow.hover {
            -webkit-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
            -moz-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
            -ms-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
            transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
        }

        .register-button-wrapper .button:active {
            transform: translateY(0) scale(1);
        }
    </style>
@endsection

@section('content')
                <div id="Hero" class="section hero hero-carousel">
                    <div class="hero-carousel-wrapper">
                        <!-- Slide 1: Original Hero Content -->
                        <div class="hero-slide hero-slide-1">
                            <div class="hero-content">
                                <div class="hero-content-wrapper">
                                    <div data-w-id="e9c54af6-1d6f-b4ff-e3eb-6661252f0024" style="-webkit-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="animation-up-0-1">
                                        <div class="hero-top">
                                            <div class="w-layout-grid _12-column-grid hero">
                                                <div id="w-node-_9a84e4f1-8302-797d-66ec-0df0ead5c9a2-9697c3f8" class="hero-headline-text" style="max-width: 60ch;">
                                                    <h2 class="display-7xl" style="font-weight: 500;">{{ $heroTitle }}</h2>
                                                </div>
                                                <div id="w-node-_99f7e1eb-2c65-e7ab-c37c-9cae345006c7-9697c3f8" class="home-hero-content-wrap">
                                                    <p class="hero-intro-text" style="font-weight: 400;">
                                                        {{ $heroIntro }}
                                                    </p>
                                                    <a href="{{ route('contact') }}" data-w-id="f00b5019-30b4-4986-c6e1-b53269829657" class="button secondary w-inline-block">
                                                        <div class="button-text">{{ __('common.bring_us_your_vision') }}</div>
                                                        <div style="-webkit-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="button-background cover"></div>
                                                        <div class="icon-wrapper">
                                                            <div style="-webkit-transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="button-icon-arrow hover w-embed">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                    <polyline points="12 5 19 12 12 19"></polyline>
                                                                </svg>
                                                            </div>
                                                            <div class="button-icon-arrow w-embed">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                    <polyline points="12 5 19 12 12 19"></polyline>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hero-bottom">
                                        <div class="location-wrap">
                                            <!-- <div class="display-xs">2025</div>
                                            <div id="w-node-_713ecd43-4f95-9152-79f0-3b4197acf972-9697c3f8" class="display-xs">Based in Austin, TX</div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="header-image-wrapper" style="opacity: 1;">
                                    <div class="hero-image-overlay"></div>
                                    @if($heroImage)
                                    <img data-w-id="3561d8df-5151-7e32-e083-b156f9abd845" loading="lazy" alt="" src="{{ $heroImage }}" class="header-image"/>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Slide 2: Made in Saudi Exhibition -->
                        <div class="hero-slide hero-slide-2">
                            <div class="hero-content">
                                <div class="header-image-wrapper" style="opacity: 1;">
                                    <picture>
                                        <source media="(max-width: 500px)" srcset="{{ asset('images/made_in_saudi_500px.jpeg') }}">
                                        <source media="(max-width: 768px)" srcset="{{ asset('images/made_in_saudi_768px.jpeg') }}">
                                        <img loading="lazy" alt="Made in Saudi Exhibition" src="{{ asset('images/made_in_saudi.png') }}" class="full-image-slide"/>
                                    </picture>
                                </div>
                                <div class="register-button-wrapper">
                                    <a href="https://toadacompany.systeme.io/f81feee3" target="_blank" rel="noopener noreferrer" class="button secondary w-inline-block">
                                        <div class="button-text">Register Now</div>
                                        <div style="-webkit-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="button-background cover"></div>
                                        <div class="icon-wrapper">
                                            <div style="-webkit-transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="button-icon-arrow hover w-embed">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                    <polyline points="12 5 19 12 12 19"></polyline>
                                                </svg>
                                            </div>
                                            <div class="button-icon-arrow w-embed">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                    <polyline points="12 5 19 12 12 19"></polyline>
                                                </svg>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Carousel Navigation Dots -->
                    <div class="carousel-dots">
                        <button class="carousel-dot" data-slide="0" aria-label="Go to slide 1"></button>
                        <button class="carousel-dot active" data-slide="1" aria-label="Go to slide 2"></button>
                    </div>
                </div>
                <div class="overlap-wrap">
                    <div class="section" style="padding-bottom: 0 !important;">
                        <div class="container">
                            <div data-w-id="f6ed5937-9c72-a2e6-1c60-60657c81eec3" style="-webkit-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="animation-up-0-1">
                                <div class="_12-column-grid align-middle">
                                    <div id="w-node-_5c6454c6-42ee-2638-77a0-214b1e247be9-9697c3f8" class="label-wrap">
                                        <div id="w-node-_124d3e25-82a6-4c61-cfbe-08434a501db5-9697c3f8" style="font-size: 3rem;">
                                            @if(isset($philosophyData['highlight']))
                                                @php
                                                    $text = $philosophyData['text'];
                                                    if (is_array($philosophyData['highlight'])) {
                                                        foreach ($philosophyData['highlight'] as $highlight) {
                                                            $text = str_replace($highlight, '<span style="color: #4C489D; font-weight: bold;">' . $highlight . '</span>', $text);
                                                        }
                                                    } else {
                                                        $text = str_replace($philosophyData['highlight'], '<span style="color: #4C489D; font-weight: bold;">' . $philosophyData['highlight'] . '</span>', $text);
                                                    }
                                                @endphp
                                                {!! $text !!}
                                            @else
                                                {{ $philosophyData['text'] }}
                                            @endif
                                        </div>
                                    </div>
                                    <div id="w-node-_58ed89af-a60f-6589-b887-5cb943dc3d22-9697c3f8" class="about-text-wrap">
                                        <div class="display-intro-text" style="font-size: 2.5rem;">
                                            {!! nl2br(e($philosophyText)) !!}
                                    </div>
                                    <div id="w-node-b60af381-9b8f-f2eb-dd30-fc73a308abbf-9697c3f8" class="button-wrap" style="margin-top: 2rem;">
                                        <a href="{{ route('about') }}" data-w-id="b60af381-9b8f-f2eb-dd30-fc73a308abc0" class="button w-inline-block">
                                            <div class="button-text">{{ __('common.about_us') }}</div>
                                            <div style="-webkit-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="button-background cover"></div>
                                            <div class="icon-wrapper">
                                                <div style="-webkit-transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="button-icon-arrow hover w-embed">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                                        <polyline points="12 5 19 12 12 19"></polyline>
                                                    </svg>
                                                </div>
                                                <div class="button-icon-arrow w-embed">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                                        <polyline points="12 5 19 12 12 19"></polyline>
                                                    </svg>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="section">
                        <div data-w-id="f29a1246-4ee5-af6a-19a3-fd21152cb53b" style="-webkit-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="animation-up-0-1">
                            <div class="container">
                                <div class="custom-margin">
                                    <div id="w-node-_667de9ba-8363-156a-e219-29f785437ff6-9697c3f8" class="text-wrap">
                                        <div class="_50ch-headline-wrap">
                                            <h2 id="w-node-_667de9ba-8363-156a-e219-29f785437ff8-9697c3f8" data-w-id="667de9ba-8363-156a-e219-29f785437ff8" style="-webkit-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);" class="display-4xl">
                                                @if(isset($servicesData['highlight']))
                                                    @php
                                                        $text = $servicesData['text'];
                                                        if (is_array($servicesData['highlight'])) {
                                                            foreach ($servicesData['highlight'] as $highlight) {
                                                                $text = str_replace($highlight, '<span style="color: #4C489D; font-weight: bold;">' . $highlight . '</span>', $text);
                                                            }
                                                        } else {
                                                            $text = str_replace($servicesData['highlight'], '<span style="color: #4C489D; font-weight: bold;">' . $servicesData['highlight'] . '</span>', $text);
                                                        }
                                                    @endphp
                                                    {!! $text !!}
                                                @else
                                                    {{ $servicesData['text'] }}
                                                @endif
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="_12-column-grid">
                                    <div id="w-node-e5f959a8-6f30-3b38-567d-64a6a55f46ae-9697c3f8" data-w-id="e5f959a8-6f30-3b38-567d-64a6a55f46ae" class="cards-mover">
                                        <div class="sticky-viewbox">
                                            <div class="cards-wrapper">
                                                <div class="card-section left">
                                                    <div class="card-side">
                                                        <div class="card-image-mobile">
                                                            <div class="slide-content">
                                                                @if($service1Image)
                                                                <img sizes="(max-width: 2000px) 100vw, 2000px" srcset="{{ $service1Image }}" alt="{{ $service1Title }}" src="{{ $service1Image }}" loading="lazy" class="full-image"/>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="slide-content">
                                                            <div class="service-svg-wrap">
                                                                @if($service1Icon)
                                                                <img src="{{ $service1Icon }}" loading="lazy" alt="" class="service-icon"/>
                                                                @endif
                                                            </div>
                                                            <div class="side-content-wrap">
                                                                <h3 class="display-2xl black">{{ $service1Title }}</h3>
                                                                <div>{{ $service1Text }}</div>
                                                            </div>
                                                            <div class="button-wrap">
                                                                <a href="{{ route('services') }}" data-w-id="5e1a9e64-ae06-846e-aaef-028918009673" class="button w-inline-block">
                                                                    <div class="button-text">{{ __('common.learn_more') }}</div>
                                                                    <div style="-webkit-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="button-background cover"></div>
                                                                    <div class="icon-wrapper">
                                                                        <div style="-webkit-transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="button-icon-arrow hover w-embed">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                                <polyline points="12 5 19 12 12 19"></polyline>
                                                                            </svg>
                                                                        </div>
                                                                        <div class="button-icon-arrow w-embed">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                                <polyline points="12 5 19 12 12 19"></polyline>
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-side">
                                                        <div class="card-image-mobile">
                                                            <div class="slide-content">
                                                                @if($service2Image)
                                                                <img sizes="(max-width: 2000px) 100vw, 2000px" srcset="{{ $service2Image }}" alt="{{ $service2Title }}" src="{{ $service2Image }}" loading="lazy" class="full-image"/>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="slide-content">
                                                            <div class="service-svg-wrap">
                                                                @if($service2Icon)
                                                                <img src="{{ $service2Icon }}" loading="lazy" alt="" class="service-icon"/>
                                                                @endif
                                                            </div>
                                                            <div class="side-content-wrap">
                                                                <h3 class="display-2xl black">{{ $service2Title }}</h3>
                                                                <p>{{ $service2Text }}</p>
                                                            </div>
                                                            <div class="button-wrap">
                                                                <a href="{{ route('services') }}" data-w-id="ac1d1311-fbbe-5282-1c06-dba777c19669" class="button w-inline-block">
                                                                    <div class="button-text">{{ __('common.learn_more') }}</div>
                                                                    <div style="-webkit-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="button-background cover"></div>
                                                                    <div class="icon-wrapper">
                                                                        <div style="-webkit-transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="button-icon-arrow hover w-embed">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                                <polyline points="12 5 19 12 12 19"></polyline>
                                                                            </svg>
                                                                        </div>
                                                                        <div class="button-icon-arrow w-embed">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                                <polyline points="12 5 19 12 12 19"></polyline>
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-side">
                                                        <div class="card-image-mobile">
                                                            <div class="slide-content">
                                                                @if($service3Image)
                                                                <img sizes="(max-width: 2000px) 100vw, 2000px" srcset="{{ $service3Image }}" alt="{{ $service3Title }}" src="{{ $service3Image }}" loading="lazy" class="full-image"/>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="slide-content">
                                                            <div class="service-svg-wrap">
                                                                @if($service3Icon)
                                                                <img src="{{ $service3Icon }}" loading="lazy" alt="" class="service-icon"/>
                                                                @endif
                                                            </div>
                                                            <div class="side-content-wrap">
                                                                <h3 class="display-2xl black">{{ $service3Title }}</h3>
                                                                <p>{{ $service3Text }}</p>
                                                            </div>
                                                            <div class="button-wrap">
                                                                <a href="{{ route('services') }}" data-w-id="7f884948-d7d9-214c-a505-b517a8225c2b" class="button w-inline-block">
                                                                    <div class="button-text">{{ __('common.learn_more') }}</div>
                                                                    <div style="-webkit-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="button-background cover"></div>
                                                                    <div class="icon-wrapper">
                                                                        <div style="-webkit-transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="button-icon-arrow hover w-embed">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                                <polyline points="12 5 19 12 12 19"></polyline>
                                                                            </svg>
                                                                        </div>
                                                                        <div class="button-icon-arrow w-embed">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                                <polyline points="12 5 19 12 12 19"></polyline>
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-section right">
                                                    <div class="card-side">
                                                        <div class="slide-content right">
                                                            @if($service1Image)
                                                            <img loading="lazy" src="{{ $service1Image }}" alt="{{ $service1Title }}" class="full-image"/>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="card-side">
                                                        <div class="slide-content right">
                                                            @if($service2Image)
                                                            <img loading="lazy" src="{{ $service2Image }}" alt="{{ $service2Title }}" class="full-image"/>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="card-side">
                                                        <div class="slide-content right">
                                                            @if($service3Image)
                                                            <img loading="lazy" src="{{ $service3Image }}" alt="{{ $service3Title }}" class="full-image"/>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section circular">
                        <div class="container">
                            <div data-w-id="da2919f5-5556-ca22-9c79-2cafc1e4dd7a" style="-webkit-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="animation-up-0-1">
                                <div class="process-section">
                                    <div class="text-wrap">
                                        <div class="align-center">
                                            <div class="circular-headline-text-wrap">
                                                <h2 id="w-node-_60bde03a-40a5-84a9-4e9c-bd9ab4fb083e-9697c3f8" data-w-id="60bde03a-40a5-84a9-4e9c-bd9ab4fb083e" style="-webkit-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="display-4xl">
                                                    {{ $themesTitle }}
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Triangular Process Layout -->
                                    <div class="triangular-process-layout">
                                        <!-- First Row: Design and Implement -->
                                        <div class="process-row">
                                            <div id="w-node-_5e7191b4-65e4-44f6-9033-d86dbff9c4d3-9697c3f8" class="circular-content-wrap">
                                                <div class="display-large" style="font-weight: bold;">{{ $theme1Title }}</div>
                                                <div>{{ $theme1Text }}</div>
                                            </div>
                                            
                                            <!-- Center Image -->
                                    <div id="w-node-edfb548c-774d-fbda-65ac-87d5895109bc-9697c3f8" data-w-id="edfb548c-774d-fbda-65ac-87d5895109bc" class="circular-svg-wrap">
                                                @if($themesCircularImage)
                                                <img src="{{ $themesCircularImage }}" loading="lazy" id="w-node-_3192f9a7-5677-7695-e2e7-2cf2e76f76ef-9697c3f8" alt="" class="circular-svg"/>
                                                @endif
                                        <div class="circular-text-wrap">
                                            <div style="font-weight: 400; font-size: 2.2rem;">{{ $themesCircularCaption }}</div>
                                        </div>
                                    </div>
                                            
                                    <div id="w-node-_9edb2c72-7fa7-afec-287d-45fd28ffc453-9697c3f8" class="circular-content-wrap">
                                                <div class="display-large" style="font-weight: bold;">{{ $theme2Title }}</div>
                                                <div>{{ $theme2Text }}</div>
                                            </div>
                                        </div>
                                        
                                        <!-- Second Row: Optimize (Centered) -->
                                        <div class="process-row">
                                            <div id="w-node-_8efcc128-325b-d2a3-c48e-54e32c384904-9697c3f8" class="circular-content-wrap optimize-centered">
                                                <div class="display-large" style="font-weight: bold;">{{ $theme3Title }}</div>
                                                <div style="text-align: start;">{{ $theme3Text }}</div>
                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section no-padding-top">
                        <div data-w-id="f7988306-afb2-c369-941e-dd85aaa3da27" style="-webkit-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="animation-up-0-1">
                            <div data-w-id="6a1d684e-2a2a-cca3-47ba-a9476d980cd4" class="image-wrapper-content">
                                <div class="background-image-wrapper">
                                    <div class="image-overlay"></div>
                                    @if($teamBackgroundImage)
                                    <img loading="eager" src="{{ $teamBackgroundImage }}" alt="" class="background-image"/>
                                    @endif
                                </div>
                                <div class="text-wrap">
                                    <div class="_50ch-headline-wrap">
                                        <h2 id="w-node-_6a1d684e-2a2a-cca3-47ba-a9476d980cda-9697c3f8" data-w-id="6a1d684e-2a2a-cca3-47ba-a9476d980cda" style="-webkit-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="display-4xl">
                                            {{ $teamTitle }}
                                        </h2>
                                    </div>
                                </div>
                                <!-- <a href="team.html" data-w-id="e9248fbd-0d06-135f-2a7f-0b05f927227e" class="button secondary w-inline-block">
                                    <div class="button-text">Explore Team</div>
                                    <div style="-webkit-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-100%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="button-background cover"></div>
                                    <div class="icon-wrapper">
                                        <div style="-webkit-transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="button-icon-arrow hover w-embed">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                <polyline points="12 5 19 12 12 19"></polyline>
                                            </svg>
                                        </div>
                                        <div class="button-icon-arrow w-embed">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                <polyline points="12 5 19 12 12 19"></polyline>
                                            </svg>
                                        </div>
                                    </div>
                                </a> -->
                            </div>
                        </div>
                    </div>
                    @include('partials.lets-connect')
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        let currentSlide = 1;
        const totalSlides = 2;
        const $wrapper = $('.hero-carousel-wrapper');
        const $dots = $('.carousel-dot');
        const autoPlayInterval = 5000; // 5 seconds
        let autoPlayTimer;
        
        // Initialize carousel to show slide 2
        $wrapper.css('transform', 'translateX(-50%)');

        function goToSlide(index) {
            if (index < 0) index = totalSlides - 1;
            if (index >= totalSlides) index = 0;
            
            currentSlide = index;
            const translateX = -currentSlide * 50;
            $wrapper.css('transform', `translateX(${translateX}%)`);
            
            // Update dots
            $dots.removeClass('active');
            $dots.eq(currentSlide).addClass('active');
            
            // Reset auto-play timer
            resetAutoPlay();
        }

        function nextSlide() {
            goToSlide(currentSlide + 1);
        }

        function prevSlide() {
            goToSlide(currentSlide - 1);
        }

        function resetAutoPlay() {
            clearInterval(autoPlayTimer);
            autoPlayTimer = setInterval(nextSlide, autoPlayInterval);
        }

        // Navigation dots
        $dots.on('click', function() {
            const slideIndex = $(this).data('slide');
            goToSlide(slideIndex);
        });

        // Keyboard navigation
        $(document).on('keydown', function(e) {
            if (e.key === 'ArrowLeft') {
                prevSlide();
            } else if (e.key === 'ArrowRight') {
                nextSlide();
            }
        });

        // Touch swipe support
        let touchStartX = 0;
        let touchEndX = 0;

        $('.hero-carousel').on('touchstart', function(e) {
            touchStartX = e.originalEvent.touches[0].clientX;
        });

        $('.hero-carousel').on('touchend', function(e) {
            touchEndX = e.originalEvent.changedTouches[0].clientX;
            handleSwipe();
        });

        function handleSwipe() {
            if (touchEndX < touchStartX - 50) {
                nextSlide();
            }
            if (touchEndX > touchStartX + 50) {
                prevSlide();
            }
        }

        // Start auto-play
        resetAutoPlay();

        // Pause auto-play on hover
        $('.hero-carousel').on('mouseenter', function() {
            clearInterval(autoPlayTimer);
        });

        $('.hero-carousel').on('mouseleave', function() {
            resetAutoPlay();
        });
    });
</script>
@endsection