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
            return str_replace($labelData['highlight'], '<span style="color: #4C489D; font-size: 1.5rem; font-weight: bold;">' . $labelData['highlight'] . '</span>', $labelData['text']);
        }
        return $labelData['text'];
    };
@endphp

@section('meta')
    <meta content="Contact" property="og:title"/>
    <meta content="Contact" property="twitter:title"/>
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
                                            <a href="https://www.instagram.com/toada_consulting/" target="_blank" class="social-icon-link w-inline-block">
                                                <div class="icon-embed w-embed">
                                                    <svg width="100%" height="100%" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16 3H8C5.23858 3 3 5.23858 3 8V16C3 18.7614 5.23858 21 8 21H16C18.7614 21 21 18.7614 21 16V8C21 5.23858 18.7614 3 16 3ZM19.25 16C19.2445 17.7926 17.7926 19.2445 16 19.25H8C6.20735 19.2445 4.75549 17.7926 4.75 16V8C4.75549 6.20735 6.20735 4.75549 8 4.75H16C17.7926 4.75549 19.2445 6.20735 19.25 8V16ZM16.75 8.25C17.3023 8.25 17.75 7.80228 17.75 7.25C17.75 6.69772 17.3023 6.25 16.75 6.25C16.1977 6.25 15.75 6.69772 15.75 7.25C15.75 7.80228 16.1977 8.25 16.75 8.25ZM12 7.5C9.51472 7.5 7.5 9.51472 7.5 12C7.5 14.4853 9.51472 16.5 12 16.5C14.4853 16.5 16.5 14.4853 16.5 12C16.5027 10.8057 16.0294 9.65957 15.1849 8.81508C14.3404 7.97059 13.1943 7.49734 12 7.5ZM9.25 12C9.25 13.5188 10.4812 14.75 12 14.75C13.5188 14.75 14.75 13.5188 14.75 12C14.75 10.4812 13.5188 9.25 12 9.25C10.4812 9.25 9.25 10.4812 9.25 12Z" fill="CurrentColor"/>
                                                    </svg>
                                                </div>
                                            </a>
                                            <a href="https://x.com/ToadaConsulting" target="_blank" class="social-icon-link w-inline-block">
                                                <div class="icon-embed w-embed">
                                                    <svg width="100%" height="100%" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M17.1761 4H19.9362L13.9061 10.7774L21 20H15.4456L11.0951 14.4066L6.11723 20H3.35544L9.80517 12.7508L3 4H8.69545L12.6279 9.11262L17.1761 4ZM16.2073 18.3754H17.7368L7.86441 5.53928H6.2232L16.2073 18.3754Z" fill="CurrentColor"/>
                                                    </svg>
                                                </div>
                                            </a>
                                            <a href="https://www.linkedin.com/company/toada-consulting" target="_blank" class="social-icon-link w-inline-block">
                                                <div class="icon-embed w-embed">
                                                    <svg width="100%" height="100%" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.5 3C3.67157 3 3 3.67157 3 4.5V19.5C3 20.3284 3.67157 21 4.5 21H19.5C20.3284 21 21 20.3284 21 19.5V4.5C21 3.67157 20.3284 3 19.5 3H4.5ZM8.52076 7.00272C8.52639 7.95897 7.81061 8.54819 6.96123 8.54397C6.16107 8.53975 5.46357 7.90272 5.46779 7.00413C5.47201 6.15897 6.13998 5.47975 7.00764 5.49944C7.88795 5.51913 8.52639 6.1646 8.52076 7.00272ZM12.2797 9.76176H9.75971H9.7583V18.3216H12.4217V18.1219C12.4217 17.742 12.4214 17.362 12.4211 16.9819V16.9818V16.9816V16.9815V16.9812C12.4203 15.9674 12.4194 14.9532 12.4246 13.9397C12.426 13.6936 12.4372 13.4377 12.5005 13.2028C12.7381 12.3253 13.5271 11.7586 14.4074 11.8979C14.9727 11.9864 15.3467 12.3141 15.5042 12.8471C15.6013 13.1803 15.6449 13.5389 15.6491 13.8863C15.6605 14.9339 15.6589 15.9815 15.6573 17.0292V17.0294C15.6567 17.3992 15.6561 17.769 15.6561 18.1388V18.3202H18.328V18.1149C18.328 17.6629 18.3278 17.211 18.3275 16.7591V16.759V16.7588C18.327 15.6293 18.3264 14.5001 18.3294 13.3702C18.3308 12.8597 18.276 12.3563 18.1508 11.8627C17.9638 11.1286 17.5771 10.5211 16.9485 10.0824C16.5027 9.77019 16.0133 9.5691 15.4663 9.5466C15.404 9.54401 15.3412 9.54062 15.2781 9.53721L15.2781 9.53721L15.2781 9.53721C14.9984 9.52209 14.7141 9.50673 14.4467 9.56066C13.6817 9.71394 13.0096 10.0641 12.5019 10.6814C12.4429 10.7522 12.3852 10.8241 12.2991 10.9314L12.2991 10.9315L12.2797 10.9557V9.76176ZM5.68164 18.3244H8.33242V9.76733H5.68164V18.3244Z" fill="CurrentColor"/>
                                                    </svg>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div id="w-node-f9b00758-aabe-d981-389b-a8764368e257-18570370">{!! $renderLabel($yourInfoLabelData) !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
