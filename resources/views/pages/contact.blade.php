@extends('layouts.app')

@section('title', 'Contact')

@section('wf-page-id', '67b0f543aaf1e19b18570370')

@php
    $contentService = app(\App\Services\ContentService::class);
    $currentLang = app()->getLocale();
    
    // Helper function to get content
    $getContent = function($sectionKey, $default = '') use ($contentService, $currentLang) {
        $content = $contentService->getContent('contact', $sectionKey, $currentLang);
        if (is_array($content) && isset($content['text'])) {
            return $content['text'];
        }
        return is_string($content) ? $content : $default;
    };
    
    // Helper function to get image
    $getImage = function($sectionKey) use ($contentService, $currentLang) {
        return $contentService->getImage('contact', $sectionKey, $currentLang);
    };
    
    // Get content with highlights
    $getContentWithHighlight = function($sectionKey) use ($contentService, $currentLang) {
        $content = $contentService->getContent('contact', $sectionKey, $currentLang);
        if (is_array($content)) {
            return $content;
        }
        return ['text' => $content, 'highlight' => null];
    };
    
    // Load all content once
    $heroTitleData = $getContentWithHighlight('hero_title');
    $heroImage = $getImage('hero_image');
    $circleTextIcon = $getImage('circle_text_icon');
    $contactFormImage = $getImage('contact_form_image');
    
    $contactLabelData = $getContentWithHighlight('contact_label');
    $contactEmail = $getContent('contact_email', '');
    
    $careersLabelData = $getContentWithHighlight('careers_label');
    $careersEmail = $getContent('careers_email', '');
    
    $businessHoursLabelData = $getContentWithHighlight('business_hours_label');
    $businessHoursText = $getContent('business_hours_text', '');
    
    $socialMediaLabelData = $getContentWithHighlight('social_media_label');
    
    $yourInfoLabelData = $getContentWithHighlight('your_info_label');
    
    // Helper to render title with highlights (without font-size override)
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
    
    // Helper to render label with highlights (with font-size 1.5rem)
    $renderLabel = function($labelData) {
        if (isset($labelData['highlight'])) {
            if (is_array($labelData['highlight'])) {
                $text = $labelData['text'];
                foreach ($labelData['highlight'] as $highlight) {
                    $text = str_replace($highlight, '<span style="color: #4C489D; font-size: 1.5rem; font-weight: bold;">' . $highlight . '</span>', $text);
                }
                return $text;
            } else {
                return str_replace($labelData['highlight'], '<span style="color: #4C489D; font-size: 1.5rem; font-weight: bold;">' . $labelData['highlight'] . '</span>', $labelData['text']);
            }
        }
        return $labelData['text'];
    };
@endphp

@section('meta')
    <meta content="Contact" property="og:title"/>
    <meta content="Contact" property="twitter:title"/>
@endsection

@section('page-specific-styles')
    <style type="text/css">
        /* RTL support for circle container */
        [dir="rtl"] .circle-container {
            inset: -1em auto auto -1em !important;
        }
    </style>
@endsection

@section('content')
                <div class="section intro">
                    <div class="container">
                        <div data-w-id="121736a0-b9e2-2a14-d833-a08a204adcde" style="-webkit-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="animation-up-0-1">
                            <div class="w-layout-grid _12-column-grid">
                                <div id="w-node-_121736a0-b9e2-2a14-d833-a08a204adce0-18570370" class="text-wrap">
                                    <div class="_60-ch-headline-wrap">
                                        <h1 id="w-node-_121736a0-b9e2-2a14-d833-a08a204adce2-18570370" data-w-id="121736a0-b9e2-2a14-d833-a08a204adce2" style="-webkit-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 105%, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)" class="display-4xl">{!! $renderTitle($heroTitleData) !!}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section no-padding">
                    <div class="_12-column-grid">
                        <div id="w-node-_75b84332-8223-f858-f6a0-832c8d4a80f7-18570370" class="spacer"></div>
                        <div id="w-node-_125e8f90-c315-ac77-5222-1c141f2b77e1-18570370" class="image-wrap">
                            @if($heroImage)
                            <img src="{{ $heroImage }}" loading="lazy" alt="" class="image"/>
                            @endif
                            <div href="#" class="circle-container">
                                <div class="circle-wrap">
                                    @if($circleTextIcon)
                                    <img style="-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0deg) skew(0, 0)" loading="lazy" alt="" src="{{ $circleTextIcon }}" class="circular-text"/>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section">
                    <div class="container">
                        <div data-w-id="4fae1a59-0995-cbc8-2f48-c6d8c6b35125" style="-webkit-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="animation-up-0-1">
                            <div class="w-layout-grid _12-column-grid">
                                <div id="w-node-_4fae1a59-0995-cbc8-2f48-c6d8c6b3512d-18570370" class="form-block w-form">
                                    <form id="wf-form-Industry" name="wf-form-Industry" data-name="Industry" method="get" data-wf-page-id="67b0f543aaf1e19b18570370" data-wf-element-id="4fae1a59-0995-cbc8-2f48-c6d8c6b3512e">
                                        <div class="form-content-wrapper">
                                            <input class="form-input w-input" maxlength="256" name="First-Name" data-name="First Name" placeholder="First Name" type="text" id="First-Name"/>
                                            <input class="form-input w-input" maxlength="256" name="Last-Name" data-name="Last Name" placeholder="Last Name" type="text" id="Last-Name"/>
                                        </div>
                                        <input class="form-input w-input" maxlength="256" name="Phone" data-name="Phone" placeholder="Your Phone" type="tel" id="Phone"/>
                                        <input class="form-input w-input" maxlength="256" name="Email" data-name="Email" placeholder="Your Email" type="text" id="Email"/>
                                        <input class="form-input w-input" maxlength="256" name="Industry" data-name="Industry" placeholder="Industry" type="text" id="Industry-2"/>
                                        <textarea id="Message" name="Your-Message" maxlength="5000" data-name="Your Message" placeholder="Your Message" class="form-input w-input"></textarea>
                                        <div class="margin-top large">
                                            <input type="submit" data-wait="Please wait..." class="form-submit-button w-button" value="Submit"/>
                                        </div>
                                    </form>
                                    <div class="form-message-success w-form-done">
                                        <div>Thank you! Your submission has been received!</div>
                                    </div>
                                    <div class="form-message-error w-form-fail">
                                        <div>Oops! Something went wrong while submitting the form.</div>
                                    </div>
                                </div>
                                <div id="w-node-_4fae1a59-0995-cbc8-2f48-c6d8c6b3513d-18570370" class="contact-image-wrap">
                                    @if($contactFormImage)
                                    <img id="w-node-_4fae1a59-0995-cbc8-2f48-c6d8c6b3513e-18570370" loading="lazy" alt="" src="{{ $contactFormImage }}" class="contact-image"/>
                                    @endif
                                </div>
                                <div id="w-node-_4fae1a59-0995-cbc8-2f48-c6d8c6b3513f-18570370" class="contact-details-wrap">
                                    <div id="w-node-_4fae1a59-0995-cbc8-2f48-c6d8c6b35140-18570370" class="contact-detail">
                                        <div class="display-xs">{!! $renderLabel($contactLabelData) !!}</div>
                                        <a href="mailto:{{ $contactEmail }}" class="email-link">{{ $contactEmail }}</a>
                                    </div>
                                    <div id="w-node-_4fae1a59-0995-cbc8-2f48-c6d8c6b35148-18570370" class="contact-detail">
                                        <div class="display-xs">{!! $renderLabel($careersLabelData) !!}</div>
                                        <a href="mailto:{{ $careersEmail }}" class="email-link">{{ $careersEmail }}</a>
                                    </div>
                                    <div id="w-node-_4fae1a59-0995-cbc8-2f48-c6d8c6b3514e-18570370" class="contact-detail">
                                        <div class="display-xs">{!! $renderLabel($businessHoursLabelData) !!}</div>
                                        <div>
                                            {!! nl2br(e($businessHoursText)) !!}
                                        </div>
                                    </div>
                                    <div class="contact-detail">
                                        <div class="display-xs">{!! $renderLabel($socialMediaLabelData) !!}</div>
                                        <div class="w-layout-grid contact-icons-wrap">
                                            @include('partials.social-media-icons', [
                                                'linkClass' => 'social-icon-link w-inline-block',
                                                'iconWrapperClass' => 'icon-embed w-embed',
                                                'iconClass' => ''
                                            ])
                                        </div>
                                    </div>
                                </div>
                                <div id="w-node-f9b00758-aabe-d981-389b-a8764368e257-18570370">{!! $renderLabel($yourInfoLabelData) !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
