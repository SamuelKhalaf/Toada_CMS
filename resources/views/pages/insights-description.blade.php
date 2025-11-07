@extends('layouts.app')

@section('title', 'Insights Description')

@section('wf-page-id', '67acf295e3a0b3b4ca984a06')

@php
    $currentLang = app()->getLocale();
    $translation = $insight->translation($currentLang);
    $category = $currentLang === 'ar' ? $insight->category_ar : $insight->category_en;
    $featuredImage = $insight->featured_image ? asset('storage/' . $insight->featured_image) : null;
    $publishedDate = $insight->published_at ? $insight->published_at->format('d.m.Y') : null;
@endphp

@section('meta')
    <meta content="David Browne" name="description"/>
@endsection

@section('page-specific-styles')
    <style>
        /* Table styling with borders and padding */
        .table-striped {
            border-collapse: collapse;
            width: 100%;
        }
        
        .table-striped th,
        .table-striped td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        
        .table-striped th {
            background-color: #f9f9f9;
            font-weight: 600;
        }

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
                    <div class="blog-container">
                        <div data-w-id="4931ee25-d6c0-4b04-c58c-4a7e2e6ba1e8" style="-webkit-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="animation-up-0-1">
                            <div class="w-layout-grid _12-column-grid">
                                <div id="w-node-_4931ee25-d6c0-4b04-c58c-4a7e2e6ba1ea-ca984a06" class="sticky-wrap">
                                    <!-- <div class="blog-details-wrap">
                                        <div class="articles-top">
                                            <div id="w-node-_4931ee25-d6c0-4b04-c58c-4a7e2e6ba1f3-ca984a06" class="author-wrap">
                                                <div class="display-xs">By</div>
                                                <div class="article-author">
                                                    <div class="display-xs">David Browne</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="date-length">
                                        @if($publishedDate)
                                        <div class="display-xs">{{ $publishedDate }}</div>
                                        <div class="label-square"></div>
                                        @endif
                                        <div class="display-xs">{{ $category }}</div>
                                    </div>
                                </div>
                                <div id="w-node-_4931ee25-d6c0-4b04-c58c-4a7e2e6ba200-ca984a06" class="articles-right">
                                    @if($translation)
                                    <div class="blog-title-wrap" style="max-width: 100%;">
                                        <h1 class="display-4xl">{{ $translation->title }}</h1>
                                    </div>
                                    @if($featuredImage)
                                    <div id="w-node-_4931ee25-d6c0-4b04-c58c-4a7e2e6ba201-ca984a06" class="blog-header-image-wrap">
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
                                        <img src="{{ asset('images/blog-description/left-arrow.svg') }}" loading="lazy" style="-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);transform-style:preserve-3d" alt="" class="back-arrow-icon"/>
                                        <div class="display-xs">View All</div>
                                    </a>
                                </div>
                                <div id="w-node-_052d1ee4-38bb-6a19-838a-b57e7f53f681-ca984a06" data-w-id="052d1ee4-38bb-6a19-838a-b57e7f53f681" style="width:0%" class="divider"></div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('partials.lets-connect', ['paddingStyle' => 'padding-top: 50px !important;'])
@endsection

@section('scripts')
@endsection
