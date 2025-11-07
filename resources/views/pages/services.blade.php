@extends('layouts.app')

@section('title', 'Services')

@section('wf-page-id', '67ad58483d4109d4ac746428')

@php
    $contentService = app(\App\Services\ContentService::class);
    $currentLang = app()->getLocale();
    
    // Helper function to get content
    $getContent = function($sectionKey, $default = '') use ($contentService, $currentLang) {
        $content = $contentService->getContent('services', $sectionKey, $currentLang);
        if (is_array($content) && isset($content['text'])) {
            return $content['text'];
        }
        return is_string($content) ? $content : $default;
    };
    
    // Helper function to get image
    $getImage = function($sectionKey) use ($contentService, $currentLang) {
        return $contentService->getImage('services', $sectionKey, $currentLang);
    };
    
    // Get content with highlights
    $getContentWithHighlight = function($sectionKey) use ($contentService, $currentLang) {
        $content = $contentService->getContent('services', $sectionKey, $currentLang);
        if (is_array($content)) {
            return $content;
        }
        return ['text' => $content, 'highlight' => null];
    };
    
    // Get sub-service content
    $getSubService = function($serviceNum, $subNum) use ($contentService, $currentLang) {
        $content = $contentService->getContent('services', "service_{$serviceNum}_sub_{$subNum}", $currentLang);
        if (is_array($content)) {
            return $content;
        }
        return ['title' => '', 'description' => ''];
    };
    
    // Load all content once
    $heroTitleData = $getContentWithHighlight('hero_title');
    $headerIcon = $getImage('header_icon');
    $introText = $getContent('intro_text', '');
    $introHeroImage = $getImage('intro_hero_image');
    
    $service1Title = $getContent('service_1_title', 'Strategize');
    $service1Description = $getContent('service_1_description', '');
    $service1Sub1 = $getSubService(1, 1);
    $service1Sub2 = $getSubService(1, 2);
    $service1Sub3 = $getSubService(1, 3);
    
    $service2Title = $getContent('service_2_title', 'Conceptualize');
    $service2Description = $getContent('service_2_description', '');
    $service2Sub1 = $getSubService(2, 1);
    $service2Sub2 = $getSubService(2, 2);
    $service2Sub3 = $getSubService(2, 3);
    $service2Sub4 = $getSubService(2, 4);
    
    $service3Title = $getContent('service_3_title', 'Perform');
    $service3Description = $getContent('service_3_description', '');
    $service3Sub1 = $getSubService(3, 1);
    $service3Sub2 = $getSubService(3, 2);
    $service3Sub3 = $getSubService(3, 3);
    
    $backgroundImage = $getImage('background_image');
    
    $transformationTitleData = $getContentWithHighlight('transformation_title');
    $transformationText = $getContent('transformation_text', '');
    
    $stat1Value = $getContent('stat_1_value', '+ 3.7B $');
    $stat1Description = $getContent('stat_1_description', '');
    $stat1Graph = $getImage('stat_1_graph');
    
    $stat2Value = $getContent('stat_2_value', '32%');
    $stat2Description = $getContent('stat_2_description', '');
    $stat2Graph = $getImage('stat_2_graph');
    
    $stat3Value = $getContent('stat_3_value', '3%');
    $stat3Description = $getContent('stat_3_description', '');
    $stat3Graph = $getImage('stat_3_graph');
    
    $faqTitle = $getContent('faq_title', "FAQ's");
    $faq1Question = $getContent('faq_1_question', '');
    $faq1Answer = $getContent('faq_1_answer', '');
    $faq2Question = $getContent('faq_2_question', '');
    $faq2Answer = $getContent('faq_2_answer', '');
    $faq3Question = $getContent('faq_3_question', '');
    $faq3Answer = $getContent('faq_3_answer', '');
    $faq4Question = $getContent('faq_4_question', '');
    $faq4Answer = $getContent('faq_4_answer', '');
    
    // Helper to render title with highlights
    $renderTitle = function($titleData) {
        if (isset($titleData['highlight'])) {
            if (is_array($titleData['highlight'])) {
                $text = $titleData['text'];
                foreach ($titleData['highlight'] as $highlight) {
                    $text = str_replace($highlight, '<span style="color: #4C489D; font-weight: bold;">' . $highlight . '</span>', $text);
                }
                return $text;
            } else {
                return str_replace($titleData['highlight'], '<span style="color: #4C489D; font-weight: bold;">' . $titleData['highlight'] . '</span>', $titleData['text']);
            }
        }
        return $titleData['text'];
    };
@endphp

@section('meta')
    <meta content="Services" property="og:title"/>
    <meta content="Services" property="twitter:title"/>
@endsection

@section('page-specific-styles')
    <style type="text/css">
        /* 3-Column Services Layout */
        .services-row {
            display: flex !important;
            gap: 2rem !important;
            align-items: flex-start !important;
            margin-bottom: 4rem !important;
        }
        
        .services-title-column {
            flex: 0 0 20% !important;
            min-width: 200px !important;
        }
        
        .services-description-column {
            flex: 0 0 30% !important;
            min-width: 250px !important;
        }
        
        /* Sticky behavior for large screens only (laptop and larger) */
        @media (min-width: 1024px) {
            .services-title-column {
                position: sticky !important;
                top: 5rem !important;
                align-self: flex-start !important;
                z-index: 10 !important;
            }
            
            .services-description-column {
                position: sticky !important;
                top: 5rem !important;
                align-self: flex-start !important;
                z-index: 10 !important;
            }
        }
        
        .services-details-column {
            flex: 1 !important;
            min-width: 300px !important;
        }
        
        .service-title-wrap {
            margin-bottom: 0 !important;
        }
        
        .service-description-wrap {
            margin-bottom: 0 !important;
        }
        
        .service-description {
            text-align: left !important;
            line-height: 1.6 !important;
            margin: 0 !important;
        }
        
        /* Responsive adjustments */
        @media (max-width: 1200px) {
            .services-row {
                flex-direction: column !important;
                gap: 1.5rem !important;
            }
            
            .services-title-column,
            .services-description-column,
            .services-details-column {
                flex: none !important;
                width: 100% !important;
            }
        }
    </style>
@endsection

@section('content')
                <div class="section about-intro" style="padding-top: 6em !important;">
                    <div class="container">
                        <div data-w-id="cd28de12-10dc-11c5-da03-018571ff3872" style="-webkit-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="animation-up-0-1">
                            <div class="w-layout-grid _12-column-grid">
                                <div id="w-node-cd28de12-10dc-11c5-da03-018571ff3874-ac746428" class="text-wrap">
                                    <div class="_60-ch-headline-wrap">
                                        <h1 id="w-node-cd28de12-10dc-11c5-da03-018571ff3876-ac746428" data-w-id="cd28de12-10dc-11c5-da03-018571ff3876" style="-webkit-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="display-4xl">{!! $renderTitle($heroTitleData) !!}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-icon-wrap">
                        @if($headerIcon)
                        <img src="{{ $headerIcon }}" loading="lazy" alt="" class="header-icon"/>
                        @endif
                    </div>
                </div>
                <div class="section no-padding-top">
                    <div class="container no-padding">
                        <div data-w-id="e7b8a31d-39b1-caae-70a2-02ce59e3e0b1" style="-webkit-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="animation-up-0-1">
                            <div class="_12-column-grid">
                                <div id="w-node-_50269b6b-d9c0-cd68-afa7-307365983d0f-ac746428" class="services-intro">
                                    <div class="intro-left" style="font-size: 20px !important;">
                                        <div class="left-text-wrap">
                                            <!-- <div class="display-xl">STRATEGIZE. CONCEPTUALIZE. PERFORM. </div> -->
                                            <!-- <h5 style="padding-bottom: 40px;">Ahead. Wisely. Exceptionally.</h5> -->
                                            <p>{{ $introText }}</p>
                                        </div>
                                    </div>
                                    <div data-w-id="43bb8a23-16c6-7c77-a127-65398f53e0dc" class="intro-right">
                                        @if($introHeroImage)
                                        <img src="{{ $introHeroImage }}" loading="lazy" alt="" class="background-image"/>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="one" class="section relative" style="padding-top: 0 !important; padding-bottom: 90px;">
                    <div class="container">
                        <div data-w-id="848dfe10-8347-0aad-996b-fe070bde4015" style="-webkit-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="animation-up-0-1">
                            <div class="services-wrap">
                                <div class="services-row">
                                    <div class="services-title-column">
                                        <div class="service-title-wrap">
                                            <h2 style="color: #4C489D !important;font-size: 48px !important;">{{ $service1Title }}</h2>
                                        </div>
                                    </div>
                                    <div class="services-description-column">
                                        <div class="service-description-wrap">
                                            <p class="service-description">{{ $service1Description }}</p>
                                        </div>
                                    </div>
                                    <div class="services-details-column">
                                        <div class="service-details-wrap">
                                            <div class="sub-services-grid">
                                                <div class="sub-service-item">
                                                    <div class="sub-service-number">01</div>
                                                    <div class="sub-service-content">
                                                        <h3 class="sub-service-title">{{ $service1Sub1['title'] ?? '' }}</h3>
                                                        <p class="sub-service-description">{!! nl2br(e($service1Sub1['description'] ?? '')) !!}</p>
                                                    </div>
                                                </div>
                                                <div class="sub-service-item">
                                                    <div class="sub-service-number">02</div>
                                                    <div class="sub-service-content">
                                                        <h3 class="sub-service-title">{{ $service1Sub2['title'] ?? '' }}</h3>
                                                        <p class="sub-service-description">{!! nl2br(e($service1Sub2['description'] ?? '')) !!}</p>
                                                    </div>
                                                </div>
                                                <div class="sub-service-item">
                                                    <div class="sub-service-number">03</div>
                                                    <div class="sub-service-content">
                                                        <h3 class="sub-service-title">{{ $service1Sub3['title'] ?? '' }}</h3>
                                                        <p class="sub-service-description">{!! nl2br(e($service1Sub3['description'] ?? '')) !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="services-row">
                                    <div class="services-title-column">
                                        <div class="service-title-wrap">
                                            <h2 style="color: #4C489D !important;font-size: 43px !important;">{{ $service2Title }}</h2>
                                        </div>
                                    </div>
                                    <div class="services-description-column">
                                        <div class="service-description-wrap">
                                            <p class="service-description">{{ $service2Description }}</p>
                                        </div>
                                    </div>
                                    <div class="services-details-column">
                                        <div class="service-details-wrap">
                                            <div class="sub-services-grid">
                                                <div class="sub-service-item">
                                                    <div class="sub-service-number">01</div>
                                                    <div class="sub-service-content">
                                                        <h3 class="sub-service-title">{{ $service2Sub1['title'] ?? '' }}</h3>
                                                        <p class="sub-service-description">{!! nl2br(e($service2Sub1['description'] ?? '')) !!}</p>
                                                    </div>
                                                </div>
                                                <div class="sub-service-item">
                                                    <div class="sub-service-number">02</div>
                                                    <div class="sub-service-content">
                                                        <h3 class="sub-service-title">{{ $service2Sub2['title'] ?? '' }}</h3>
                                                        <p class="sub-service-description">{!! nl2br(e($service2Sub2['description'] ?? '')) !!}</p>
                                                    </div>
                                                </div>
                                                <div class="sub-service-item">
                                                    <div class="sub-service-number">03</div>
                                                    <div class="sub-service-content">
                                                        <h3 class="sub-service-title">{{ $service2Sub3['title'] ?? '' }}</h3>
                                                        <p class="sub-service-description">{!! nl2br(e($service2Sub3['description'] ?? '')) !!}</p>
                                                    </div>
                                                </div>
                                                <div class="sub-service-item">
                                                    <div class="sub-service-number">04</div>
                                                    <div class="sub-service-content">
                                                        <h3 class="sub-service-title">{{ $service2Sub4['title'] ?? '' }}</h3>
                                                        <p class="sub-service-description">{!! nl2br(e($service2Sub4['description'] ?? '')) !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="services-row">
                                    <div class="services-title-column">
                                        <div class="service-title-wrap">
                                            <h2 style="color: #4C489D !important;font-size: 48px !important;">{{ $service3Title }}</h2>
                                        </div>
                                    </div>
                                    <div class="services-description-column">
                                        <div class="service-description-wrap">
                                            <p class="service-description">{{ $service3Description }}</p>
                                        </div>
                                    </div>
                                    <div class="services-details-column">
                                        <div class="service-details-wrap">
                                            <div class="sub-services-grid">
                                                <div class="sub-service-item">
                                                    <div class="sub-service-number">01</div>
                                                    <div class="sub-service-content">
                                                        <h3 class="sub-service-title">{{ $service3Sub1['title'] ?? '' }}</h3>
                                                        <p class="sub-service-description">{!! nl2br(e($service3Sub1['description'] ?? '')) !!}</p>
                                                    </div>
                                                </div>
                                                <div class="sub-service-item">
                                                    <div class="sub-service-number">02</div>
                                                    <div class="sub-service-content">
                                                        <h3 class="sub-service-title">{{ $service3Sub2['title'] ?? '' }}</h3>
                                                        <p class="sub-service-description">{!! nl2br(e($service3Sub2['description'] ?? '')) !!}</p>
                                                    </div>
                                                </div>
                                                <div class="sub-service-item">
                                                    <div class="sub-service-number">03</div>
                                                    <div class="sub-service-content">
                                                        <h3 class="sub-service-title">{{ $service3Sub3['title'] ?? '' }}</h3>
                                                        <p class="sub-service-description">{!! nl2br(e($service3Sub3['description'] ?? '')) !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-w-id="a5fd3c31-6ee0-2b47-3bf8-a390dc862965" class="background-image-wrapper">
                        <div class="gradient-image-overlay"></div>
                        @if($backgroundImage)
                        <img loading="eager" src="{{ $backgroundImage }}" alt="" class="background-image"/>
                        @endif
                    </div>
                </div>
                <div class="section" style="padding-top: 0 !important;">
                    <div class="content-wrap">
                        <div class="container">
                            <div class="_12-column-grid">
                                <div id="w-node-f561da28-537b-de1d-c7dd-6d441d9e2c32-ac746428" class="_50ch-headline-wrap">
                                    <div class="text-wrap">
                                        <h2 id="w-node-f561da28-537b-de1d-c7dd-6d441d9e2c34-ac746428" data-w-id="f561da28-537b-de1d-c7dd-6d441d9e2c34" style="-webkit-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="display-4xl">
                                            {!! $renderTitle($transformationTitleData) !!}</h2>
                                    </div>
                                </div>
                                <div id="w-node-f561da28-537b-de1d-c7dd-6d441d9e2c36-ac746428" class="team-text-wrap">
                                    <div>
                                        <div>{{ $transformationText }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="_12-column-grid">
                            <div id="w-node-_92bbabbe-10ca-5fbf-4823-8d4ea964b7dd-ac746428" class="stats-content-wrap">
                                <div id="w-node-_950d4113-8794-d9a0-6b47-6cfc06f7d79c-ac746428" class="stats-top">
                                    <div class="stat-left">
                                        <div class="stat-heading-wrap">
                                            <h2 class="display-7xl">{{ $stat1Value }}</h2>
                                            <div style="padding-right: 8rem;padding-left: 8rem;padding-top: 3rem;">
                                                {{ $stat1Description }}
                                            </div>
                                        </div>
                                        <div class="bar-graph-wrap">
                                            @if($stat1Graph)
                                            <img src="{{ $stat1Graph }}" loading="lazy" alt="" class="bar-graph"/>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="stat-right">
                                        <div class="stat-heading-wrap">
                                            <h2 class="display-7xl">{{ $stat2Value }}</h2>
                                            <div style="padding-right: 8rem;padding-left: 8rem;padding-top: 3rem;">
                                                {{ $stat2Description }}
                                            </div>
                                        </div>
                                        <div class="dot-graph-wrap">
                                            @if($stat2Graph)
                                            <img src="{{ $stat2Graph }}" loading="lazy" alt="" class="dot-graph"/>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="stats-bottom">
                                    <div class="stat-heading-wrap">
                                        <h2 class="display-7xl">{{ $stat3Value }}</h2>
                                        <div>{{ $stat3Description }}</div>
                                    </div>
                                    <div class="chart-graph-wrap">
                                        @if($stat3Graph)
                                        <img src="{{ $stat3Graph }}" loading="lazy" alt="" class="chart-graph"/>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section" style="padding-top: 0 !important;">
                    <div class="container">
                        <div data-w-id="28dcfe00-6b2f-677c-c79b-1b2c305932d4" style="-webkit-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="animation-up-0-1">
                            <div class="_12-column-grid">
                                <div id="w-node-_6e1fe859-20d0-c8c6-693c-1af2390be381-ac746428" class="text-wrap">
                                    <div class="align-center">
                                        <h2 id="w-node-_6e1fe859-20d0-c8c6-693c-1af2390be384-ac746428" data-w-id="6e1fe859-20d0-c8c6-693c-1af2390be384" style="-webkit-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="display-6xl">{{ $faqTitle }}</h2>
                                    </div>
                                </div>
                                <div id="w-node-_2d95f186-092d-4fbe-3bdc-7247b1f48276-ac746428" class="accordion-wrap">
                                    <div data-click="faq" data-w-id="2d95f186-092d-4fbe-3bdc-7247b1f48277" class="accordion-row">
                                        <div class="accordion-top">
                                            <div class="accordion-top-wrap">
                                                <h3 class="display-2xl">{{ $faq1Question }}</h3>
                                            </div>
                                            <div class="accordion-top-icon">
                                                <div class="accordion-top-icon-wrap">
                                                    <div class="accordion-icon-stripe-1"></div>
                                                    <div class="accordion-icon-stripe-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-bottom">
                                            <div class="accordion-divider-wrap">
                                                <div class="accordion-divider"></div>
                                            </div>
                                            <div class="accordion-bottom-wrap">
                                                <p class="accordion-bottom-text">
                                                    {!! nl2br(e($faq1Answer)) !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-click="faq" class="accordion-row">
                                        <div class="accordion-top">
                                            <div class="accordion-top-wrap">
                                                <h2 class="display-2xl">{{ $faq2Question }}</h2>
                                            </div>
                                            <div class="accordion-top-icon">
                                                <div class="accordion-top-icon-wrap">
                                                    <div class="accordion-icon-stripe-1"></div>
                                                    <div class="accordion-icon-stripe-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-bottom">
                                            <div class="accordion-divider-wrap">
                                                <div class="accordion-divider"></div>
                                            </div>
                                            <div class="accordion-bottom-wrap">
                                                <p class="accordion-bottom-text">
                                                    {!! nl2br(e($faq2Answer)) !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-click="faq" class="accordion-row">
                                        <div class="accordion-top">
                                            <div class="accordion-top-wrap">
                                                <h3 class="display-2xl">{{ $faq3Question }}</h3>
                                            </div>
                                            <div class="accordion-top-icon">
                                                <div class="accordion-top-icon-wrap">
                                                    <div class="accordion-icon-stripe-1"></div>
                                                    <div class="accordion-icon-stripe-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-bottom">
                                            <div class="accordion-divider-wrap">
                                                <div class="accordion-divider"></div>
                                            </div>
                                            <div class="accordion-bottom-wrap">
                                                <p class="accordion-bottom-text">
                                                    {!! nl2br(e($faq3Answer)) !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-click="faq" class="accordion-row">
                                        <div class="accordion-top">
                                            <div class="accordion-top-wrap">
                                                <h3 class="display-2xl">{{ $faq4Question }}</h3>
                                            </div>
                                            <div class="accordion-top-icon">
                                                <div class="accordion-top-icon-wrap">
                                                    <div class="accordion-icon-stripe-1"></div>
                                                    <div class="accordion-icon-stripe-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-bottom">
                                            <div class="accordion-divider-wrap">
                                                <div class="accordion-divider"></div>
                                            </div>
                                            <div class="accordion-bottom-wrap">
                                                <p class="accordion-bottom-text">
                                                    {!! nl2br(e($faq4Answer)) !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('partials.lets-connect')
@endsection
