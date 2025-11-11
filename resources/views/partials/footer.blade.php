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
    
    // Get hero title for footer slogan
    $heroTitle = $getContent('hero_title', 'LIFE-CHANGING EXPERIENCES');
@endphp

<!-- Footer -->
<div class="toada-footer">
    <div class="container">
        <div class="toada-footer-content">
            <div class="toada-footer-columns">
                <!-- Left Column -->
                <div class="toada-footer-column toada-footer-left">
                    <div class="toada-footer-logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('images/toada-white.png') }}" alt="Toada">
                        </a>
                    </div>
                    <div class="toada-footer-slogan">
                        {{ $heroTitle }}
                    </div>
                </div>
                
                <!-- Center Column -->
                <div class="toada-footer-column toada-footer-center">
                    <div class="toada-footer-links-row">
                        <a href="{{ route('about') }}">{{ __('pages.about') }}</a>
                        <a href="{{ route('services') }}">{{ __('pages.services') }}</a>
                        <a href="{{ route('insights') }}">{{ __('navigation.insights_impact') }}</a>
                    </div>
                </div>
                
                <!-- Right Column -->
                <div class="toada-footer-column toada-footer-right">
                    <div class="toada-social-icons">
                        @include('partials.social-media-icons', [
                            'linkClass' => '',
                            'iconWrapperClass' => '',
                            'iconClass' => '',
                            'svgSize' => '20'
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

