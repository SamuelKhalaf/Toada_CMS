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
                                            @if($flipbooks->count() > 0)
                                                <link rel="stylesheet" href="{{ asset('css/heyzine.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
                                            @endif
                                            @foreach($flipbooks as $flipbook)
                                                @php
                                                    $translation = $flipbook->translation($currentLang);
                                                    $coverImage = $flipbook->cover_image ? $flipbook->cover_image : asset('images/cover.png');
                                                    $title = $translation ? $translation->title : '';
                                                    $subtitle = $translation ? $translation->subtitle : '';
                                                @endphp
                                                <div role="listitem" class="w-dyn-item" style="display: flex; justify-content: center; align-items: center;">
                                                    <div class="heyzine-fold fp-w fp-fh responsive-heyzine-height" style="width: 100%;">
                                                        <img src="{{ $coverImage }}" class="img-front fp-thumb" alt="{{ $title }}">
                                                        <div class="heyzine-fold-caption">
                                                            <div>
                                                                <h2 class="fp-title">{{ $title }}</h2>
                                                            </div>
                                                            <div>
                                                                <p class="fp-subtitle">{{ $subtitle }}</p>
                                                                <div class="heyzine-curl"></div>
                                                            </div>
                                                            <a href="{{ $flipbook->heyzine_url }}" target="_TOP" class="heyzine-link fp-link"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
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
                @if(isset($projects) && $projects->count() > 0)
                <div id="projects" class="section recent-projects-section">
                    <div class="container">
                        <div data-w-id="recent-projects-section" style="-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:1" class="animation-up-0-1">
                            <div class="projects-header">
                                <h2 class="projects-title">{{ __('common.recent_projects') }}</h2>
                                <p class="projects-subtitle">{{ __('common.discover_latest_initiatives') }}</p>
                            </div>
                            
                            <div class="projects-grid">
                                @foreach($projects as $project)
                                    @php
                                        $translation = $project->translation(app()->getLocale());
                                    @endphp
                                    <div class="project-card">
                                        <div class="project-card-inner">
                                            <div class="project-image-wrapper">
                                                @if($translation && $translation->badge_text)
                                                    <div class="project-badge">
                                                        <span class="badge-text">{{ $translation->badge_text }}</span>
                                                    </div>
                                                @endif
                                                @if($project->featured_image)
                                                    <img src="{{ asset('storage/' . $project->featured_image) }}" alt="{{ $translation ? $translation->title : '' }}" class="project-image" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                                @endif
                                                <div class="project-image-placeholder" style="display: none;">
                                                    <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                                        <polyline points="21 15 16 10 5 21"></polyline>
                                                    </svg>
                                                </div>
                                            </div>
                                            
                                            <div class="project-content">
                                                <div class="project-date-location">
                                                    <div class="date-icon">
                                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                            <line x1="16" y1="2" x2="16" y2="6"></line>
                                                            <line x1="8" y1="2" x2="8" y2="6"></line>
                                                            <line x1="3" y1="10" x2="21" y2="10"></line>
                                                        </svg>
                                                    </div>
                                                    <div class="date-info">
                                                        @if($project->date_range)
                                                            <div class="date-range">{{ $project->date_range }}</div>
                                                        @endif
                                                        @if($project->location_text && $project->location_url)
                                                            <a href="{{ $project->location_url }}" target="_blank" rel="noopener noreferrer" class="location">
                                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                                                    <circle cx="12" cy="10" r="3"></circle>
                                                                </svg>
                                                                <span>{{ $project->location_text }}</span>
                                                            </a>
                                                        @elseif($project->location_text)
                                                            <div class="location">
                                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                                                    <circle cx="12" cy="10" r="3"></circle>
                                                                </svg>
                                                                <span>{{ $project->location_text }}</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                
                                                @if($translation)
                                                    <h3 class="project-title">{{ $translation->title }}</h3>
                                                    
                                                    <p class="project-description">{{ $translation->description }}</p>
                                                @endif
                                                
                                                <div class="project-footer">
                                                    @if($project->tags && is_array($project->tags) && count($project->tags) > 0)
                                                        <div class="project-tags">
                                                            @foreach($project->tags as $tag)
                                                                <span class="tag">{{ $tag }}</span>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                    @php
                                                        $registerUrl = app()->getLocale() === 'ar' ? $project->register_url_ar : $project->register_url_en;
                                                    @endphp
                                                    @if($registerUrl)
                                                        <a href="{{ $registerUrl }}" 
                                                           target="_blank" 
                                                           class="project-register-button"
                                                           data-project-slug="{{ $project->slug }}"
                                                           data-project-title="{{ $translation ? $translation->title : $project->slug }}"
                                                           data-project-location="{{ $project->location_text ?? '' }}"
                                                           data-ga-track="register-button">
                                                            {{ __('common.register_now') }}
                                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                <polyline points="12 5 19 12 12 19"></polyline>
                                                            </svg>
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="project-card-overlay"></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div id="subscribe" class="section subscription-section-modern">
                    <div class="container">
                        <div data-w-id="subscription-section" style="-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:1" class="animation-up-0-1">
                            <div class="subscription-content-wrapper">
                                <div class="subscription-header">
                                    <h2 class="subscription-title">{{ __('common.stay_updated') }}</h2>
                                    <p class="subscription-description">{{ __('common.subscribe_description') }}</p>
                                </div>
                                <div class="subscription-form-wrapper">
                                    <form id="subscription-form" action="{{ route('subscribe') }}" method="POST" class="subscription-form">
                                        @csrf
                                        <div class="subscription-input-group">
                                            <input 
                                                type="email" 
                                                name="email" 
                                                id="subscription-email" 
                                                class="subscription-input" 
                                                placeholder="{{ __('common.enter_email') }}" 
                                                required
                                                autocomplete="email"
                                            />
                                            <button type="submit" id="subscription-submit" class="subscription-button">
                                                <span class="button-text">{{ __('common.subscribe') }}</span>
                                                <span class="button-loader" style="display: none;">
                                                    <svg class="spinner" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" stroke-opacity="0.25"></circle>
                                                        <path fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                    </svg>
                                                </span>
                                            </button>
                                        </div>
                                        <div id="subscription-message" class="subscription-message" style="display: none;"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('partials.lets-connect')
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('subscription-form');
    const emailInput = document.getElementById('subscription-email');
    const submitButton = document.getElementById('subscription-submit');
    const messageDiv = document.getElementById('subscription-message');
    const buttonText = submitButton.querySelector('.button-text');
    const buttonLoader = submitButton.querySelector('.button-loader');

    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const email = emailInput.value.trim();
            
            // Basic email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!email || !emailRegex.test(email)) {
                showMessage('Please enter a valid email address.', 'error');
                return;
            }

            // Disable form
            submitButton.disabled = true;
            buttonText.style.display = 'none';
            buttonLoader.style.display = 'inline-block';
            messageDiv.style.display = 'none';

            // Get CSRF token from form or meta tag
            const csrfToken = form.querySelector('input[name="_token"]')?.value || 
                             document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || 
                             '';

            // Submit via AJAX
            fetch(form.action, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ email: email })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    showMessage(data.message || 'Thank you for subscribing!', 'success');
                    emailInput.value = '';
                } else {
                    showMessage(data.message || 'Something went wrong. Please try again.', 'error');
                }
            })
            .catch(error => {
                showMessage('Something went wrong. Please try again later.', 'error');
            })
            .finally(() => {
                // Re-enable form
                submitButton.disabled = false;
                buttonText.style.display = 'inline';
                buttonLoader.style.display = 'none';
            });
        });
    }

    function showMessage(message, type) {
        messageDiv.textContent = message;
        messageDiv.className = 'subscription-message ' + (type === 'success' ? 'success' : 'error');
        messageDiv.style.display = 'block';
        
        // Auto-hide after 5 seconds
        setTimeout(() => {
            messageDiv.style.display = 'none';
        }, 5000);
    }

    // Google Analytics tracking for register button clicks
    const registerButtons = document.querySelectorAll('[data-ga-track="register-button"]');
    registerButtons.forEach(function(button) {
        button.addEventListener('click', function(e) {
            const projectSlug = this.getAttribute('data-project-slug') || '';
            const projectTitle = this.getAttribute('data-project-title') || '';
            const projectLocation = this.getAttribute('data-project-location') || '';
            const registerUrl = this.getAttribute('href') || '';

            // Check if Google Analytics is loaded
            if (typeof gtag !== 'undefined') {
                // Track the register button click event
                gtag('event', 'register_button_click', {
                    'event_category': 'Project Registration',
                    'event_label': projectTitle || projectSlug,
                    'project_slug': projectSlug,
                    'project_title': projectTitle,
                    'project_location': projectLocation,
                    'register_url': registerUrl,
                    'value': 1
                });

                // Special tracking for "Made in Saudi" project
                if (projectSlug === 'made-in-saudi-2025' || projectTitle.toLowerCase().includes('made in saudi')) {
                    gtag('event', 'made_in_saudi_register_click', {
                        'event_category': 'Made in Saudi Project',
                        'event_label': 'Register Button Click - Made in Saudi 2025',
                        'project_slug': projectSlug,
                        'project_title': projectTitle,
                        'project_location': projectLocation,
                        'register_url': registerUrl,
                        'value': 1
                    });
                }
            }
        });
    });
});
</script>
<style>

#projects, #subscribe {
    scroll-margin-top: 100px;
}
/* Recent Projects Section */
.recent-projects-section {
    padding: 6rem 0;
    background: #ffffff;
    position: relative;
}

.recent-projects-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent, #e0e0e0, transparent);
}

.projects-header {
    text-align: center;
    margin-bottom: 4rem;
}

.projects-title {
    font-size: clamp(2rem, 5vw, 3rem);
    font-weight: 600;
    color: #1a1a1a;
    margin: 0 0 1rem 0;
    line-height: 1.2;
    letter-spacing: -0.02em;
}

.projects-subtitle {
    font-size: 1.125rem;
    line-height: 1.7;
    color: #666;
    margin: 0;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.projects-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    max-width: 1200px;
    margin: 0 auto;
}

.project-card {
    position: relative;
    height: 100%;
}

.project-card-inner {
    position: relative;
    background: #ffffff;
    border-radius: 16px;
    overflow: hidden;
    height: 100%;
    display: flex;
    flex-direction: column;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border: 1px solid #f0f0f0;
}

@media (min-width: 768px) {
    .project-card-inner {
        flex-direction: row;
        height: auto;
        min-height: 350px;
    }
}

.project-card-inner:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 40px rgba(76, 72, 157, 0.15);
    border-color: #4C489D;
}

.project-card-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(76, 72, 157, 0.05) 0%, rgba(58, 53, 120, 0.02) 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
    pointer-events: none;
}

.project-card-inner:hover .project-card-overlay {
    opacity: 1;
}

.project-image-wrapper {
    position: relative;
    width: 100%;
    height: 250px;
    overflow: hidden;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    flex-shrink: 0;
}

@media (min-width: 768px) {
    .project-image-wrapper {
        width: 45%;
        height: 100%;
        min-height: 350px;
    }
}

.project-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.project-card-inner:hover .project-image {
    transform: scale(1.05);
}

.project-image-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    color: #999;
}

.project-badge {
    position: absolute;
    top: 1.5rem;
    right: 1.5rem;
    z-index: 2;
}

.badge-text {
    display: inline-block;
    background: linear-gradient(135deg, #4C489D 0%, #3a3578 100%);
    color: #ffffff;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    box-shadow: 0 2px 10px rgba(76, 72, 157, 0.3);
}

.project-content {
    padding: 2rem;
    flex: 1;
    display: flex;
    flex-direction: column;
    position: relative;
    z-index: 1;
}

@media (min-width: 768px) {
    .project-content {
        width: 55%;
        padding: 2.5rem;
    }
}

.project-date-location {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    margin-bottom: 1.5rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid #f0f0f0;
}

.date-icon {
    flex-shrink: 0;
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, #4C489D 0%, #3a3578 100%);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ffffff;
}

.date-info {
    flex: 1;
}

.date-range {
    font-size: 1rem;
    font-weight: 600;
    color: #1a1a1a;
    margin-bottom: 0.5rem;
}

.location {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.9rem;
    color: #666;
}

.location svg {
    flex-shrink: 0;
    color: #4C489D;
}

.project-title {
    font-size: 1.75rem;
    font-weight: 600;
    color: #1a1a1a;
    margin: 0 0 1rem 0;
    line-height: 1.3;
}

.project-description {
    font-size: 1rem;
    line-height: 1.7;
    color: #666;
    margin: 0 0 1.5rem 0;
    flex: 1;
}

.project-footer {
    margin-top: auto;
    padding-top: 1.5rem;
    border-top: 1px solid #f0f0f0;
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.project-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.project-register-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #4C489D 0%, #3a3578 100%);
    color: #ffffff;
    padding: 0.875rem 1.75rem;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 2px 10px rgba(76, 72, 157, 0.3);
    width: 100%;
    text-align: center;
}

.project-register-button:hover {
    background: linear-gradient(135deg, #3a3578 0%, #2d2859 100%);
    box-shadow: 0 4px 20px rgba(76, 72, 157, 0.4);
    transform: translateY(-2px);
}

.project-register-button:active {
    transform: translateY(0);
}

.project-register-button svg {
    transition: transform 0.3s ease;
}

.project-register-button:hover svg {
    transform: translateX(4px);
}

[dir="rtl"] .project-register-button:hover svg {
    transform: translateX(-4px);
}

.tag {
    display: inline-block;
    background: #f8f9fa;
    color: #4C489D;
    padding: 0.375rem 0.875rem;
    border-radius: 20px;
    font-size: 0.875rem;
    font-weight: 500;
    border: 1px solid #e9ecef;
    transition: all 0.2s ease;
}

.tag:hover {
    background: #4C489D;
    color: #ffffff;
    border-color: #4C489D;
}

/* Ensure projects section is visible */
#recent-projects-section.animation-up-0-1,
[data-w-id="recent-projects-section"].animation-up-0-1 {
    opacity: 1 !important;
    transform: translate3d(0, 0, 0) !important;
    -webkit-transform: translate3d(0, 0, 0) !important;
    -moz-transform: translate3d(0, 0, 0) !important;
    -ms-transform: translate3d(0, 0, 0) !important;
}

.w-mod-js [data-w-id="recent-projects-section"] {
    opacity: 1 !important;
    transform: translate3d(0, 0, 0) !important;
}

/* Responsive Design */
@media (max-width: 991px) {
    .recent-projects-section {
        padding: 4rem 0;
    }
    
    .projects-header {
        margin-bottom: 3rem;
    }
    
    .projects-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
}

@media (max-width: 767px) {
    .recent-projects-section {
        padding: 3rem 0;
    }
    
    .projects-title {
        font-size: 1.75rem;
    }
    
    .projects-subtitle {
        font-size: 1rem;
        padding: 0 1rem;
    }
    
    .project-image-wrapper {
        height: 200px;
    }
    
    .project-content {
        padding: 1.5rem;
    }
    
    .project-title {
        font-size: 1.5rem;
    }
    
    .date-icon {
        width: 40px;
        height: 40px;
    }
    
    .date-icon svg {
        width: 18px;
        height: 18px;
    }
    
    .project-badge {
        top: 1rem;
        right: 1rem;
    }
    
    .badge-text {
        padding: 0.375rem 0.75rem;
        font-size: 0.7rem;
    }
    
    .project-register-button {
        padding: 0.75rem 1.5rem;
        font-size: 0.95rem;
    }
}

@media (min-width: 768px) {
    .project-footer {
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
    }
    
    .project-register-button {
        width: auto;
        min-width: 180px;
    }
}

/* Modern Subscription Section */
.subscription-section-modern {
    padding: 6rem 0;
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    position: relative;
}

.subscription-section-modern::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent, #e0e0e0, transparent);
}

.subscription-content-wrapper {
    max-width: 700px;
    margin: 0 auto;
    text-align: center;
}

.subscription-header {
    margin-bottom: 3rem;
}

.subscription-title {
    font-size: clamp(2rem, 5vw, 3rem);
    font-weight: 600;
    color: #1a1a1a;
    margin: 0 0 1.5rem 0;
    line-height: 1.2;
    letter-spacing: -0.02em;
}

.subscription-description {
    font-size: 1.125rem;
    line-height: 1.7;
    color: #666;
    margin: 0;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.subscription-form-wrapper {
    max-width: 100%;
    margin: 0 auto;
}

.subscription-form {
    width: 100%;
}

.subscription-input-group {
    display: flex;
    gap: 0.75rem;
    flex-wrap: wrap;
    background: #fff;
    padding: 0.5rem;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: box-shadow 0.3s ease;
}

.subscription-input-group:focus-within {
    box-shadow: 0 6px 30px rgba(76, 72, 157, 0.15);
}

.subscription-input {
    flex: 1;
    min-width: 200px;
    padding: 1.125rem 1.5rem;
    border: 2px solid transparent;
    border-radius: 8px;
    font-size: 1rem;
    background: transparent;
    color: #1a1a1a;
    transition: all 0.3s ease;
    font-family: inherit;
}

.subscription-input::placeholder {
    color: #999;
}

.subscription-input:focus {
    outline: none;
    border-color: #4C489D;
    background: #fafafa;
}

.subscription-button {
    padding: 1.125rem 2.5rem;
    background: #4C489D;
    color: #fff;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 1rem;
    font-weight: 600;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    white-space: nowrap;
    box-shadow: 0 2px 10px rgba(76, 72, 157, 0.3);
    position: relative;
    overflow: hidden;
}

.subscription-button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s ease;
}

.subscription-button:hover:not(:disabled)::before {
    left: 100%;
}

.subscription-button:hover:not(:disabled) {
    background: #3a3578;
    box-shadow: 0 4px 20px rgba(76, 72, 157, 0.4);
    transform: translateY(-1px);
}

.subscription-button:active:not(:disabled) {
    transform: translateY(0);
}

.subscription-button:disabled {
    opacity: 0.7;
    cursor: not-allowed;
    transform: none;
}

.subscription-message {
    margin-top: 1.25rem;
    padding: 1rem 1.5rem;
    border-radius: 8px;
    font-size: 0.95rem;
    text-align: center;
    animation: slideDown 0.3s ease;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.subscription-message.success {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.subscription-message.error {
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

.spinner {
    animation: spin 1s linear infinite;
}

@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

/* Responsive Design */
@media (max-width: 767px) {
    .subscription-section-modern {
        padding: 4rem 0;
    }
    
    .subscription-header {
        margin-bottom: 2rem;
    }
    
    .subscription-title {
        font-size: 1.75rem;
        margin-bottom: 1rem;
    }
    
    .subscription-description {
        font-size: 1rem;
        padding: 0 1rem;
    }
    
    .subscription-input-group {
        flex-direction: column;
        padding: 0.25rem;
        border-radius: 10px;
    }
    
    .subscription-input {
        width: 100%;
        min-width: unset;
        padding: 1rem 1.25rem;
    }
    
    .subscription-button {
        width: 100%;
        padding: 1rem 2rem;
    }
}

/* Ensure subscription section is visible */
#subscription-section.animation-up-0-1,
[data-w-id="subscription-section"].animation-up-0-1 {
    opacity: 1 !important;
    transform: translate3d(0, 0, 0) !important;
    -webkit-transform: translate3d(0, 0, 0) !important;
    -moz-transform: translate3d(0, 0, 0) !important;
    -ms-transform: translate3d(0, 0, 0) !important;
}

/* Fallback: ensure visibility after page load */
.w-mod-js [data-w-id="subscription-section"] {
    opacity: 1 !important;
    transform: translate3d(0, 0, 0) !important;
}
</style>
<script>
// Fallback: ensure subscription section is visible if animation doesn't trigger
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        const subscriptionSection = document.querySelector('[data-w-id="subscription-section"]');
        if (subscriptionSection && subscriptionSection.style.opacity === '0' || window.getComputedStyle(subscriptionSection).opacity === '0') {
            subscriptionSection.style.opacity = '1';
            subscriptionSection.style.transform = 'translate3d(0, 0, 0)';
        }
    }, 1000);
});
</script>
@endsection
