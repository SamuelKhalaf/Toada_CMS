@extends('layouts.app')

@section('title', 'Success Story')

@section('wf-page-id', '67acf295e3a0b3b4ca984a06')

@php
    $currentLang = app()->getLocale();
    $translation = $story->translation($currentLang);
    $category = $currentLang === 'ar' ? $story->category_ar : $story->category_en;
    $featuredImage = $story->featured_image ? asset('storage/' . $story->featured_image) : null;
    $publishedDate = $story->published_at ? $story->published_at->format('F Y') : null;
@endphp

@section('meta')
    <meta content="Toada Consulting" name="description"/>
@endsection

@section('page-specific-styles')
    <style type="text/css">
        .story-content-wrapper {
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
            padding: 0 2rem;
        }
        
        .blog-title-wrap {
            text-align: center;
            margin-bottom: 3rem;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .blog-title-wrap h1 {
            line-height: 1.2;
            margin-bottom: 1rem;
        }
        
        .blog-header-image-wrap {
            text-align: center;
            margin: 3rem 0 4rem 0;
            position: relative;
        }
        
        .blog-header-image {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        
        .blog-header-image:hover {
            transform: translateY(-5px);
        }
        
        .rich-text-wrap {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        
        .rich-text-wrap h4:first-of-type {
            margin-top: 0;
        }
        
        /* Hide the blog divider line */
        .blog-divider {
            display: none !important;
        }
        
        .rich-text-wrap p {
            margin-bottom: 1.5rem;
            line-height: 1.7;
            color: #555;
        }
        
        .rich-text-wrap ul {
            margin-bottom: 2rem;
            padding-left: 1.5rem;
        }
        
        .rich-text-wrap li {
            margin-bottom: 0.8rem;
            line-height: 1.6;
            color: #555;
        }
        
        @media (max-width: 768px) {
            .story-content-wrapper {
                padding: 0 1rem;
            }
            
            .blog-title-wrap {
                margin-bottom: 2rem;
            }
            
            .blog-header-image-wrap {
                margin: 2rem 0 3rem 0;
            }
            
            .rich-text-wrap {
                padding: 0;
            }
        }
        
        /* Story section headings styling */
        .rich-text-wrap h4 {
            color: #4C489D !important;
            font-weight: bold !important;
            margin-top: 2rem !important;
            margin-bottom: 1rem !important;
        }
        
        .rich-text-wrap h6 {
            color: #4C489D !important;
            font-weight: bold !important;
            margin-top: 1.5rem !important;
            margin-bottom: 0.8rem !important;
        }
    </style>
@endsection

@section('content')
                <!-- <div class="background-grid">
                    <div id="w-node-f8d76460-ceb6-9caf-54e4-aedb65a4ac12-ca984a06" class="blog-divider"></div>
                </div> -->
                <div id="work" class="section intro">
                    <div class="container">
                        <div data-w-id="4931ee25-d6c0-4b04-c58c-4a7e2e6ba1e8" style="-webkit-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="animation-up-0-1">
                            <div class="story-content-wrapper">
                                @if($translation)
                                <div class="blog-title-wrap">
                                    <h1 class="display-4xl">{{ $translation->title }}</h1>
                                </div>
                                @if($featuredImage)
                                <div class="blog-header-image-wrap">
                                    <img loading="lazy" src="{{ $featuredImage }}" alt="{{ $translation->title }}" class="blog-header-image"/>
                                </div>
                                @endif
                                <div class="rich-text-wrap">
                                    <div id="w-node-_4931ee25-d6c0-4b04-c58c-4a7e2e6ba203-ca984a06" class="rich-text w-richtext">
                                        {!! $translation->body !!}
                                    </div>
                                </div>
                                @endif
                                <a href="{{ route('insights') }}" data-w-id="024c639b-f726-5006-5060-e59343ef8069" class="go-back-button w-inline-block">
                                    <img src="{{ asset('images/blog-description/left-arrow.svg') }}" loading="lazy" alt="Back arrow" class="back-arrow-icon"/>
                                    <div class="display-xs">{{ __('common.view_all') }}</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @include('partials.lets-connect', ['paddingStyle' => ''])
@endsection

@section('scripts')
@endsection
