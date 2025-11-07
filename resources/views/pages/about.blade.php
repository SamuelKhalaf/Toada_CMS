@extends('layouts.app')

@section('title', 'About')

@section('wf-page-id', '67ac1f8dffceaa0540b39374')

@php
    $contentService = app(\App\Services\ContentService::class);
    $currentLang = app()->getLocale();
    
    // Helper function to get content
    $getContent = function($sectionKey, $default = '') use ($contentService, $currentLang) {
        $content = $contentService->getContent('about', $sectionKey, $currentLang);
        if (is_array($content) && isset($content['text'])) {
            return $content['text'];
        }
        return is_string($content) ? $content : $default;
    };
    
    // Helper function to get image
    $getImage = function($sectionKey) use ($contentService, $currentLang) {
        return $contentService->getImage('about', $sectionKey, $currentLang);
    };
    
    // Get content with highlights
    $getContentWithHighlight = function($sectionKey) use ($contentService, $currentLang) {
        $content = $contentService->getContent('about', $sectionKey, $currentLang);
        if (is_array($content)) {
            return $content;
        }
        return ['text' => $content, 'highlight' => null];
    };
    
    // Load all content once
    $heroTitleData = $getContentWithHighlight('hero_title');
    $heroBackgroundImage = $getImage('hero_background_image');
    
    $whoWeAreTitleData = $getContentWithHighlight('who_we_are_title');
    $whoWeAreText = $getContent('who_we_are_text', '');
    
    $visionTitleData = $getContentWithHighlight('vision_title');
    $visionText = $getContent('vision_text', '');
    
    $missionTitleData = $getContentWithHighlight('mission_title');
    $missionText = $getContent('mission_text', '');
    
    $sectionImage = $getImage('section_image');
    
    $valuesTitle = $getContent('values_title', 'Our Values');
    
    $value1Data = $contentService->getContent('about', 'value_1_title', $currentLang);
    $value1Title = is_array($value1Data) && isset($value1Data['text']) ? $value1Data['text'] : 'Humanize';
    $value1Number = is_array($value1Data) && isset($value1Data['number']) ? $value1Data['number'] : '01';
    $value1Image = $getImage('value_1_image');
    
    $value2Data = $contentService->getContent('about', 'value_2_title', $currentLang);
    $value2Title = is_array($value2Data) && isset($value2Data['text']) ? $value2Data['text'] : 'Collaborate';
    $value2Number = is_array($value2Data) && isset($value2Data['number']) ? $value2Data['number'] : '02';
    $value2Image = $getImage('value_2_image');
    
    $value3Data = $contentService->getContent('about', 'value_3_title', $currentLang);
    $value3Title = is_array($value3Data) && isset($value3Data['text']) ? $value3Data['text'] : 'Innovate';
    $value3Number = is_array($value3Data) && isset($value3Data['number']) ? $value3Data['number'] : '03';
    $value3Image = $getImage('value_3_image');
    
    $value4Data = $contentService->getContent('about', 'value_4_title', $currentLang);
    $value4Title = is_array($value4Data) && isset($value4Data['text']) ? $value4Data['text'] : 'Sustain';
    $value4Number = is_array($value4Data) && isset($value4Data['number']) ? $value4Data['number'] : '04';
    $value4Image = $getImage('value_4_image');
    
    $shape1Icon = $getImage('shape_1_icon');
    $shape2Icon = $getImage('shape_2_icon');
    
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
    <meta content="About" property="og:title"/>
    <meta content="About" property="twitter:title"/>
@endsection

@section('page-specific-styles')
    <style>
        /* Custom line break for the heading */
        .custom-line-break {
            max-width: none !important;
            overflow: visible !important;
        }
        
        .values-text-wrap {
            flex-direction: column !important;
            align-items: center !important;
            justify-content: center !important;
        }
        
        .values-header-row {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }
        
        .values-header-row h3 {
            margin: 0;
        }
        
        .values-text-wrap p {
            padding-left: 8rem;
            padding-right: 8rem;
        }
        
        @media (min-width: 992px) {
            html.w-mod-js:not(.w-mod-ix) [data-w-id="0b515fd6-3ecb-f4d9-3deb-670bf228a015"] {
                -webkit-transform:translate3d(0, 101%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -moz-transform: translate3d(0, 101%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -ms-transform: translate3d(0, 101%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                transform: translate3d(0, 101%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
            }

            html.w-mod-js:not(.w-mod-ix) [data-w-id="2a4c13b0-5b2f-c59f-bacd-b33780c62056"] {
                -webkit-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -moz-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -ms-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                filter: brightness(100%);
            }
        }

        @media (max-width: 991px) and (min-width:768px) {
            html.w-mod-js:not(.w-mod-ix) [data-w-id="0b515fd6-3ecb-f4d9-3deb-670bf228a015"] {
                -webkit-transform:translate3d(0, 101%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -moz-transform: translate3d(0, 101%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -ms-transform: translate3d(0, 101%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                transform: translate3d(0, 101%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
            }

            html.w-mod-js:not(.w-mod-ix) [data-w-id="2a4c13b0-5b2f-c59f-bacd-b33780c62056"] {
                -webkit-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -moz-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -ms-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                filter: brightness(100%);
            }
        }

        @media (max-width: 767px) and (min-width:480px) {
            html.w-mod-js:not(.w-mod-ix) [data-w-id="0b515fd6-3ecb-f4d9-3deb-670bf228a015"] {
                -webkit-transform:translate3d(0, 101%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -moz-transform: translate3d(0, 101%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -ms-transform: translate3d(0, 101%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                transform: translate3d(0, 101%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
            }

            html.w-mod-js:not(.w-mod-ix) [data-w-id="2a4c13b0-5b2f-c59f-bacd-b33780c62056"] {
                -webkit-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -moz-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                -ms-transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                transform: translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);
                filter: brightness(100%);
            }
        }
    </style>
@endsection

@section('content')
                <div class="section about-intro" style="padding-top: 6em !important;">
                    <div class="container">
                        <div data-w-id="121736a0-b9e2-2a14-d833-a08a204adcde" style="-webkit-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0;font-size: 48px !important;" class="animation-up-0-1">
                            <div class="w-layout-grid _12-column-grid">
                                <div id="w-node-_121736a0-b9e2-2a14-d833-a08a204adce0-40b39374" class="text-wrap">
                                    <div class="_60-ch-headline-wrap">
                                        <h1 id="w-node-_121736a0-b9e2-2a14-d833-a08a204adce2-40b39374" data-w-id="121736a0-b9e2-2a14-d833-a08a204adce2" style="-webkit-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);font-size: 48px !important;">
                                            {!! $renderTitle($heroTitleData) !!}
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section no-padding">
                    <div data-w-id="9cbe67e1-6fe3-b7d6-d254-9660c549a06e" class="image-wrapper-content">
                        <div class="background-image-wrapper">
                            @if($heroBackgroundImage)
                            <img loading="eager" src="{{ $heroBackgroundImage }}" alt="" class="background-image"/>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="section" style="padding-top: 100px !important;padding-bottom: 25px !important;">
                    <div class="container">
                        <div class="_12-column-grid">
                            <div style="grid-row-gap: 0.5em !important;" id="w-node-_0c61a6aa-5ef2-6ab3-f1b1-89d9e7621b18-40b39374" class="about-wrap">
                                {!! nl2br(e($whoWeAreText)) !!}
                            </div>
                            <div id="w-node-aa840f8a-538b-7289-d932-27e045ba9f87-40b39374" class="label-wrap">
                                <div id="w-node-aa840f8a-538b-7289-d932-27e045ba9f88-40b39374" style="font-size: 2.2rem;">
                                    {!! $renderTitle($whoWeAreTitleData) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section" style="padding-top: 25px !important;padding-bottom: 25px !important;">
                    <div class="container">
                        <div class="_12-column-grid">
                            <div id="w-node-_0c61a6aa-5ef2-6ab3-f1b1-89d9e7621b18-40b39374" class="about-wrap">
                                <p>{{ $visionText }}</p>
                            </div>
                            <div id="w-node-aa840f8a-538b-7289-d932-27e045ba9f87-40b39374" class="label-wrap">
                                <div id="w-node-aa840f8a-538b-7289-d932-27e045ba9f88-40b39374" style="font-size: 2.2rem;">
                                    {!! $renderTitle($visionTitleData) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section" style="padding-top: 25px !important;padding-bottom: 100px !important;">
                    <div class="container">
                        <div class="_12-column-grid">
                            <div id="w-node-_0c61a6aa-5ef2-6ab3-f1b1-89d9e7621b18-40b39374" class="about-wrap">
                                <p>{{ $missionText }}</p>
                            </div>
                            <div id="w-node-aa840f8a-538b-7289-d932-27e045ba9f87-40b39374" class="label-wrap">
                                <div id="w-node-aa840f8a-538b-7289-d932-27e045ba9f88-40b39374" style="font-size: 2.2rem;">
                                    {!! $renderTitle($missionTitleData) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section no-padding">
                    <div class="_12-column-grid">
                        <div id="w-node-f97b509d-8553-1c68-15f7-372dd8674e8c-40b39374" class="image-wrap">
                            @if($sectionImage)
                            <img src="{{ $sectionImage }}" loading="lazy" alt="" class="image"/>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- <div class="section" style="padding-bottom: 100px !important;">
                    <div class="container">
                        <div class="_12-column-grid">
                            <div id="w-node-_0c61a6aa-5ef2-6ab3-f1b1-89d9e7621b18-40b39374" class="about-wrap">
                                <p>Our leaders are strategists, innovators, and cultural pioneers. They bring together decades of experience in strategy, cultural development, and event ecosystems. As trusted advisors and cultural architects, they guide Toada’s mission to design life-changing experiences that move beyond moments,building systems, shaping industries, and enabling sustainable growth.</p>
                            </div>
                            <div id="w-node-aa840f8a-538b-7289-d932-27e045ba9f87-40b39374" class="label-wrap">
                                <div id="w-node-aa840f8a-538b-7289-d932-27e045ba9f88-40b39374" style="font-size: 2.2rem;">
                                    Meet <span style="color: #4C489D; font-weight: bold;">Our Leaders</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- --------------------- start here ------------------------>
                <!-- <div class="section" style="padding-top: 50px !important;padding-bottom: 25px !important;">
                    <div class="content-wrap large"> -->
                <!-- --------------------- end here ------------------------>
                        <!-- <div class="container">
                            <div class="_12-column-grid">
                                <div id="w-node-_2ede8962-e2b6-dccb-4733-fa2ab9b57625-40b39374" class="_50ch-headline-wrap">
                                    <div class="text-wrap">
                                        <h2 id="w-node-_2ede8962-e2b6-dccb-4733-fa2ab9b57627-40b39374" data-w-id="2ede8962-e2b6-dccb-4733-fa2ab9b57627" style="-webkit-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="display-4xl">Meet <span style="color: #4C489D; font-weight: bold;">Our Leaders</span></h2>
                                    </div>
                                </div>
                                <div id="w-node-_98255512-46a0-ada1-1f91-1ff52022ca7e-40b39374" class="team-text-wrap">
                                    <div class="_30-ch-text-block">
                                        <div>Our leaders are strategists, innovators, and cultural pioneers. They bring together decades of experience in strategy, cultural development, and event ecosystems. As trusted advisors and cultural architects, they guide Toada’s mission to design life-changing experiences that move beyond moments—building systems, shaping industries, and enabling sustainable growth.</div>
                                    </div>
                                    <div class="_30-ch-text-block">
                                        <div>With a commitment to excellence and a vision for transformation, our leaders combine global perspective with deep Saudi insight to inspire teams, empower communities, and collaborate with partners to deliver impact that lasts.</div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
    <!-- --------------------- start here ------------------------>
                        <!-- <div class="_12-column-grid">
                            <div id="w-node-_509ca980-7bc4-8fbe-ef0e-def5f0513921-40b39374" class="team-collection-wrap w-dyn-list">
                                <div role="list" class="team-collection-list w-dyn-items">
                                    <div role="listitem" class="team-collection-item w-dyn-item">
                                        <a data-w-id="809ab456-2dc7-c463-9821-22ab37f09bd3" href="{{ route('bio', 'mohammed-allan') }}" class="team-member-link-block w-inline-block">
                                            <div class="team-card">
                                                <div class="headshot-wrap">
                                                    <img src="{{ asset('images/team/Mohammed-Allan.jpg') }}" loading="lazy" data-w-id="2a4c13b0-5b2f-c59f-bacd-b33780c62056" alt="Mohammed Allan" sizes="(max-width: 991px) 131.078125px, 13vw" class="headshot"/>
                                                    <div data-w-id="0b515fd6-3ecb-f4d9-3deb-670bf228a015" class="read-more-wrap">
                                                        <div class="display-xs">Read Bio</div>
                                                        <img src="{{ asset('images/arrow-white.svg') }}" loading="lazy" alt="" class="read-more-arrow"/>
                                                    </div>
                                                </div>
                                                <div class="team-member-info">
                                                    <div class="team-top">
                                                        <div class="display-large">Mohammed Allan</div>
                                                        <div>Managing Partner</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div role="listitem" class="team-collection-item w-dyn-item">
                                        <a data-w-id="809ab456-2dc7-c463-9821-22ab37f09bd3" href="{{ route('bio', 'thanayan-al-thanayan') }}" class="team-member-link-block w-inline-block">
                                            <div class="team-card">
                                                <div class="headshot-wrap">
                                                    <img src="{{ asset('images/team/Thunayan.jpg') }}" loading="lazy" data-w-id="2a4c13b0-5b2f-c59f-bacd-b33780c62056" alt="Thanayan Al-Thanayan" sizes="(max-width: 991px) 131.078125px, 13vw" class="headshot"/>
                                                    <div data-w-id="0b515fd6-3ecb-f4d9-3deb-670bf228a015" class="read-more-wrap">
                                                        <div class="display-xs">Read Bio</div>
                                                        <img src="{{ asset('images/arrow-white.svg') }}" loading="lazy" alt="" class="read-more-arrow"/>
                                                    </div>
                                                </div>
                                                <div class="team-member-info">
                                                    <div class="team-top">
                                                        <div class="display-large">Thanayan Al-Thanayan</div>
                                                        <div>Business Unit Director</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div role="listitem" class="team-collection-item w-dyn-item">
                                        <a data-w-id="809ab456-2dc7-c463-9821-22ab37f09bd3" href="{{ route('bio', 'rasha-dbeissy') }}" class="team-member-link-block w-inline-block">
                                            <div class="team-card">
                                                <div class="headshot-wrap">
                                                    <img src="{{ asset('images/team/Rasha--Dbeissy1.jpg') }}" loading="lazy" data-w-id="2a4c13b0-5b2f-c59f-bacd-b33780c62056" alt="Rasha Dbeissy" sizes="(max-width: 991px) 131.078125px, 13vw" class="headshot"/>
                                                    <div data-w-id="0b515fd6-3ecb-f4d9-3deb-670bf228a015" class="read-more-wrap">
                                                        <div class="display-xs">Read Bio</div>
                                                        <img src="{{ asset('images/arrow-white.svg') }}" loading="lazy" alt="" class="read-more-arrow"/>
                                                    </div>
                                                </div>
                                                <div class="team-member-info">
                                                    <div class="team-top">
                                                        <div class="display-large">Rasha Dbeissy</div>
                                                        <div>Arts and Culture Director</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div role="listitem" class="team-collection-item w-dyn-item">
                                        <a data-w-id="809ab456-2dc7-c463-9821-22ab37f09bd3" href="{{ route('bio', 'alaa-hammodah') }}" class="team-member-link-block w-inline-block">
                                            <div class="team-card">
                                                <div class="headshot-wrap">
                                                    <img src="{{ asset('images/team/Alaa-Hammodah.jpeg') }}" loading="lazy" data-w-id="2a4c13b0-5b2f-c59f-bacd-b33780c62056" alt="Hala Al-Mezainy" sizes="(max-width: 991px) 131.078125px, 13vw" class="headshot"/>
                                                    <div data-w-id="0b515fd6-3ecb-f4d9-3deb-670bf228a015" class="read-more-wrap">
                                                        <div class="display-xs">Read Bio</div>
                                                        <img src="{{ asset('images/arrow-white.svg') }}" loading="lazy" alt="" class="read-more-arrow"/>
                                                    </div>
                                                </div>
                                                <div class="team-member-info">
                                                    <div class="team-top">
                                                        <div class="display-large">Alaa Hammodah</div>
                                                        <div>Director of Business Development</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div role="listitem" class="team-collection-item w-dyn-item">
                                        <a data-w-id="809ab456-2dc7-c463-9821-22ab37f09bd3" href="{{ route('bio', 'reem-alharbi') }}" class="team-member-link-block w-inline-block">
                                            <div class="team-card">
                                                <div class="headshot-wrap">
                                                    <img src="{{ asset('images/team/Reem-Alharbi.jpg') }}" loading="lazy" data-w-id="2a4c13b0-5b2f-c59f-bacd-b33780c62056" alt="Reem Alharbi" sizes="(max-width: 991px) 131.078125px, 13vw" class="headshot"/>
                                                    <div data-w-id="0b515fd6-3ecb-f4d9-3deb-670bf228a015" class="read-more-wrap">
                                                        <div class="display-xs">Read Bio</div>
                                                        <img src="{{ asset('images/arrow-white.svg') }}" loading="lazy" alt="" class="read-more-arrow"/>
                                                    </div>
                                                </div>
                                                <div class="team-member-info">
                                                    <div class="team-top">
                                                        <div class="display-large">Reem Alharbi</div>
                                                        <div>Manager, Digital Solutions</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div role="listitem" class="team-collection-item w-dyn-item">
                                        <a data-w-id="809ab456-2dc7-c463-9821-22ab37f09bd3" href="{{ route('bio', 'abdulhadi-saqor') }}" class="team-member-link-block w-inline-block">
                                            <div class="team-card">
                                                <div class="headshot-wrap">
                                                    <img src="{{ asset('images/team/saqor.jpg') }}" loading="lazy" data-w-id="2a4c13b0-5b2f-c59f-bacd-b33780c62056" alt="Abdulhadi Saqor" sizes="(max-width: 991px) 131.078125px, 13vw" class="headshot"/>
                                                    <div data-w-id="0b515fd6-3ecb-f4d9-3deb-670bf228a015" class="read-more-wrap">
                                                        <div class="display-xs">Read Bio</div>
                                                        <img src="{{ asset('images/arrow-white.svg') }}" loading="lazy" alt="" class="read-more-arrow"/>
                                                    </div>
                                                </div>
                                                <div class="team-member-info">
                                                    <div class="team-top">
                                                        <div class="display-large">Abdulhadi Saqor</div>
                                                        <div>Senior Manager Consultancy</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div id="w-node-d42fcc46-e706-71d3-cd6a-20aace6c035e-40b39374" class="margin-left">
                                <div id="w-node-_3ec04823-8ab3-459c-279a-ae70096e5d96-40b39374" class="button-wrap"> -->
        <!----------------------- end here ------------------------>
                                    <!-- <a href="team.html" data-w-id="3ec04823-8ab3-459c-279a-ae70096e5d97" class="button w-inline-block">
                                        <div class="button-text">View All</div>
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
    <!-- --------------------- start here ------------------------>
                                <!-- </div>
                            </div>
                        </div>
                    </div>
                </div> -->
    <!----------------------- end here ------------------------>
                <div class="section relative">
                    <div data-w-id="0bee5ac5-cf8e-7992-31bf-4d42caeee019" class="huge-icon-wrap">
                        @if($shape1Icon)
                        <img src="{{ $shape1Icon }}" loading="lazy" data-w-id="5caf62c3-d8ff-5f48-4fa6-7eb16f6e8493" alt="" class="huge-icon-left"/>
                        @endif
                        @if($shape2Icon)
                        <img src="{{ $shape2Icon }}" loading="lazy" data-w-id="8d241c56-7cf0-da3b-b72f-ee8df7b8216c" alt="" class="huge-icon-right"/>
                        @endif
                    </div>
                    <div class="content-wrap" style="row-gap: 0;">
                        <div class="container">
                            <div id="w-node-_72c51750-6a89-3455-b05a-a1a9c1a7f03d-40b39374" class="text-wrap">
                                <div class="align-center">
                                    <div class="testimonial-heading">
                                        <h2 id="w-node-_72c51750-6a89-3455-b05a-a1a9c1a7f040-40b39374" data-w-id="72c51750-6a89-3455-b05a-a1a9c1a7f040" style="-webkit-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="display-6xl">
                                            {{ $valuesTitle }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-w-id="92169c49-f5df-7623-df66-32829ecc8974" class="values-wrap">
                            <div class="values-column">
                                <div class="values-image-wrap">
                                    <div class="values-text-wrap">
                                        <div class="values-header-row">
                                            <div>
                                                {{ $value1Number }}<br/>
                                            </div>
                                            <h3>{{ $value1Title }}</h3>
                                        </div>
                                    </div>
                                    @if($value1Image)
                                    <img src="{{ $value1Image }}" loading="lazy" alt="{{ $value1Title }}" class="values-image"/>
                                    @endif
                                </div>
                                <div id="w-node-d213529c-d95f-15ae-4e5a-2e823fcaf4ab-40b39374" class="values-image-wrap _4-5">
                                    @if($value3Image)
                                    <img src="{{ $value3Image }}" loading="lazy" alt="{{ $value3Title }}" class="values-image"/>
                                    @endif
                                    <div class="values-text-wrap">
                                        <div class="values-header-row">
                                            <div>{{ $value3Number }}</div>
                                            <h3>{{ $value3Title }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="values-column">
                                <div id="w-node-aaad0706-32a0-d798-a350-d3b2e8ab39e0-40b39374" class="values-image-wrap _4-5">
                                    @if($value2Image)
                                    <img src="{{ $value2Image }}" loading="lazy" alt="{{ $value2Title }}" class="values-image"/>
                                    @endif
                                    <div class="values-text-wrap">
                                        <div class="values-header-row">
                                            <div>{{ $value2Number }}</div>
                                            <h3>{{ $value2Title }}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="values-image-wrap">
                                    @if($value4Image)
                                    <img src="{{ $value4Image }}" loading="lazy" alt="{{ $value4Title }}" class="values-image"/>
                                    @endif
                                    <div class="values-text-wrap">
                                        <div class="values-header-row">
                                            <div>{{ $value4Number }}</div>
                                            <h3>{{ $value4Title }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('partials.lets-connect')
@endsection
