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
                <div class="section subscription-section-modern">
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
});
</script>
<style>
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
