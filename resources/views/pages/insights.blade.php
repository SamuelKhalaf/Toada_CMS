@extends('layouts.app')

@section('title', 'Insights')

@section('wf-page-id', '67afd2c1a4f74d69c47d89ea')

@php
    $contentService = app(\App\Services\ContentService::class);
    $currentLang = app()->getLocale();
    
    // Helper function to get content
    $getContent = function($sectionKey, $default = '') use ($contentService, $currentLang) {
        $content = $contentService->getContent('insights', $sectionKey, $currentLang);
        if (is_array($content) && isset($content['text'])) {
            return $content['text'];
        }
        return is_string($content) ? $content : $default;
    };
    
    // Helper function to get image
    $getImage = function($sectionKey) use ($contentService, $currentLang) {
        return $contentService->getImage('insights', $sectionKey, $currentLang);
    };
    
    // Get content with highlights
    $getContentWithHighlight = function($sectionKey) use ($contentService, $currentLang) {
        $content = $contentService->getContent('insights', $sectionKey, $currentLang);
        if (is_array($content)) {
            return $content;
        }
        return ['text' => $content, 'highlight' => null];
    };
    
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
    
    // Load all content once
    $heroTitleData = $getContentWithHighlight('hero_title');
    if (empty($heroTitleData['text'])) {
        $heroTitleData = ['text' => 'Insights & Impact', 'highlight' => null];
    }
    $heroDescription1 = $getContent('hero_description_1', '');
    $heroDescription2 = $getContent('hero_description_2', '');
    $heroBackgroundImage = $getImage('hero_background_image');
    $latestInsightsTitle = $getContent('latest_insights_title', 'Latest Insights');
@endphp

@section('meta')
    <meta content="Insights" property="og:title"/>
    <meta content="Insights" property="twitter:title"/>
@endsection

@section('page-specific-styles')
    <style>
        @media (min-width: 992px) {
            html.w-mod-js:not(.w-mod-ix) [data-w-id="51183ba4-c03f-93d2-728e-f6cfd3c6bc83"] {
                -webkit-transform:translate3d(0, 100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -moz-transform: translate3d(0, 100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -ms-transform: translate3d(0, 100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                transform: translate3d(0, 100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
            }

            html.w-mod-js:not(.w-mod-ix) [data-w-id="499455ca-44c1-24ac-43ee-e018379e1839"] {
                -webkit-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -moz-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -ms-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                filter: blur(0px);
            }
        }

        @media (max-width: 991px) and (min-width:768px) {
            html.w-mod-js:not(.w-mod-ix) [data-w-id="51183ba4-c03f-93d2-728e-f6cfd3c6bc83"] {
                -webkit-transform:translate3d(0, 100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -moz-transform: translate3d(0, 100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -ms-transform: translate3d(0, 100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                transform: translate3d(0, 100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
            }

            html.w-mod-js:not(.w-mod-ix) [data-w-id="499455ca-44c1-24ac-43ee-e018379e1839"] {
                -webkit-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -moz-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -ms-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                filter: blur(0px);
            }
        }

        @media (max-width: 767px) and (min-width:480px) {
            html.w-mod-js:not(.w-mod-ix) [data-w-id="51183ba4-c03f-93d2-728e-f6cfd3c6bc83"] {
                -webkit-transform:translate3d(0, 100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -moz-transform: translate3d(0, 100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -ms-transform: translate3d(0, 100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                transform: translate3d(0, 100%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
            }

            html.w-mod-js:not(.w-mod-ix) [data-w-id="499455ca-44c1-24ac-43ee-e018379e1839"] {
                -webkit-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -moz-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -ms-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                filter: blur(0px);
            }
        }
    </style>
@endsection

@section('content')
                <div class="section header">
                    <div class="container">
                        <div data-w-id="27a77915-427f-1b28-44b7-1dc7a81d0223" style="-webkit-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="animation-up-0-1">
                            <div class="w-layout-grid _12-column-grid">
                                <div id="w-node-_28ae02fc-d690-e6f6-e085-271509c8a88d-c47d89ea" class="text-wrap">
                                    <h2 id="w-node-_28ae02fc-d690-e6f6-e085-271509c8a88e-c47d89ea" data-w-id="28ae02fc-d690-e6f6-e085-271509c8a88e" style="-webkit-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="display-7xl">{!! $renderTitle($heroTitleData) !!}</h2>
                                </div>
                                <div id="w-node-d4a13f74-c2fe-0839-d8e1-a4c8c698229e-c47d89ea" class="team-text-wrap">
                                    <div class="_30-ch-text-block">
                                        <div>{{ $heroDescription1 }}</div>
                                    </div>
                                    <div class="_30-ch-text-block">
                                        <div>{{ $heroDescription2 }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-w-id="7be8f030-f346-d980-0c97-e1f7b66fa77e" class="header-image-wrapper">
                        <div class="image-overlay"></div>
                        @if($heroBackgroundImage)
                        <img loading="lazy" src="{{ $heroBackgroundImage }}" alt="" class="background-image"/>
                        @endif
                    </div>
                </div>
                <div class="section">
                    <div class="content-wrap large">
                        <div class="container">
                            <div data-w-id="bc313302-600d-781e-2e6b-435e1e09aabe" style="-webkit-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="animation-up-0-1">
                                <div class="_12-column-grid">
                                    <div id="w-node-_15697ade-52e4-b220-3bc1-02beae877cf7-c47d89ea" class="headline-divider">
                                        <div id="w-node-_6bd76f3f-8086-fa5b-71d7-60ae5e0db3c1-c47d89ea" data-w-id="6bd76f3f-8086-fa5b-71d7-60ae5e0db3c1" style="width:0%" class="divider"></div>
                                        <div id="w-node-cfdf3232-0c47-e13f-4dd2-97b1601b2378-c47d89ea" class="text-wrap">
                                            <h2 id="w-node-cfdf3232-0c47-e13f-4dd2-97b1601b2379-c47d89ea" data-w-id="cfdf3232-0c47-e13f-4dd2-97b1601b2379" style="-webkit-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="display-4xl">{{ $latestInsightsTitle }}</h2>
                                        </div>
                                    </div>
                                    <div id="w-node-_766d46bb-8db5-d76b-e072-7eee1ce6e0e7-c47d89ea" class="w-dyn-list">
                                        <div role="list" class="collection-list w-dyn-items">
                                            @foreach($insights as $insight)
                                                @php
                                                    $translation = $insight->translation($currentLang);
                                                    $category = $currentLang === 'ar' ? $insight->category_ar : $insight->category_en;
                                                    $featuredImage = $insight->featured_image ? asset('storage/' . $insight->featured_image) : null;
                                                @endphp
                                                @if($translation)
                                                <div role="listitem" class="w-dyn-item">
                                                    <a data-w-id="d30d9cc0-7701-ebb8-8f61-2be40c414cd7" href="{{ route('insights-description', $insight->slug) }}" class="blog-item w-inline-block">
                                                        <div class="blog-item-wrap">
                                                            <div class="blog-image-wrap">
                                                                @if($featuredImage)
                                                                <img src="{{ $featuredImage }}" loading="lazy" data-w-id="499455ca-44c1-24ac-43ee-e018379e1839" alt="{{ $translation->title }}" class="blog-image"/>
                                                                @endif
                                                                <div data-w-id="51183ba4-c03f-93d2-728e-f6cfd3c6bc83" class="read-more-wrap">
                                                                    <div class="display-xs">{{ __('common.read_more') ?? 'Read More' }}</div>
                                                                    <img src="{{ asset('images/arrow-white.svg') }}" loading="lazy" alt="" class="read-more-arrow"/>
                                                                </div>
                                                            </div>
                                                            <div class="blog-content">
                                                                <div>
                                                                    <div class="date-length">
                                                                        <div class="display-xs">{{ $category }}</div>
                                                                    </div>
                                                                </div>
                                                                <div class="">
                                                                    <div class="display-large">{{ $translation->title }}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                @endif
                                            @endforeach
                                            
                                            @foreach($stories as $story)
                                                @php
                                                    $translation = $story->translation($currentLang);
                                                    $category = $currentLang === 'ar' ? $story->category_ar : $story->category_en;
                                                    $featuredImage = $story->featured_image ? asset('storage/' . $story->featured_image) : null;
                                                @endphp
                                                @if($translation)
                                                <div role="listitem" class="w-dyn-item">
                                                    <a data-w-id="d30d9cc0-7701-ebb8-8f61-2be40c414cd7" href="{{ route('story-description', $story->slug) }}" class="blog-item w-inline-block">
                                                        <div class="blog-item-wrap">
                                                            <div class="blog-image-wrap">
                                                                @if($featuredImage)
                                                                <img src="{{ $featuredImage }}" loading="lazy" data-w-id="499455ca-44c1-24ac-43ee-e018379e1839" alt="{{ $translation->title }}" class="blog-image"/>
                                                                @endif
                                                                <div data-w-id="51183ba4-c03f-93d2-728e-f6cfd3c6bc83" class="read-more-wrap">
                                                                    <div class="display-xs">{{ __('common.read_more') ?? 'Read More' }}</div>
                                                                    <img src="{{ asset('images/arrow-white.svg') }}" loading="lazy" alt="" class="read-more-arrow"/>
                                                                </div>
                                                            </div>
                                                            <div class="blog-content">
                                                                <div class="">
                                                                    <div class="date-length">
                                                                        <div class="display-xs">{{ $category }}</div>
                                                                    </div>
                                                                </div>
                                                                <div class="">
                                                                    <div class="display-large">{{ $translation->title }}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('partials.lets-connect')
@endsection
