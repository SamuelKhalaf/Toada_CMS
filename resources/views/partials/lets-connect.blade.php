@php
    $contentService = app(\App\Services\ContentService::class);
    $currentLang = app()->getLocale();
    
    // Get the content
    $connectText = $contentService->getContent('common', 'lets_connect_text', $currentLang);
    if (is_array($connectText) && isset($connectText['text'])) {
        $connectText = $connectText['text'];
    }
    $connectText = $connectText ?? 'Whether you are shaping strategy, launching initiatives, or building ecosystems—we\'re here to help turn your vision into measurable impact.';
    
    // Allow custom padding-top style, default to empty
    $paddingStyle = $paddingStyle ?? 'padding-top: 0 !important;';
@endphp

<div class="section let-s-connect" style="{{ $paddingStyle }}">
    <div class="container">
        <div data-w-id="71fa9479-8d68-34a5-a522-c4e650c2eda9" class="animation-up-0-1">
            <div class="_12-column-grid">
                <div id="w-node-_6dd116de-d0b6-461f-60d6-5b54b526b451-b526b44e" class="let-s-connect-content">
                    <!-- <div class="display-large black">
                        Let's Shape What's Next<br/>
                    </div> -->
                    <div>
                        {!! nl2br(e($connectText)) !!}<br/>
                    </div>
                </div>
                <div id="w-node-_6dd116de-d0b6-461f-60d6-5b54b526b458-b526b44e" class="let-s-connect-divider"></div>
                <div id="w-node-_6dd116de-d0b6-461f-60d6-5b54b526b459-b526b44e" class="block">
                    <a href="{{ route('contact') }}" data-w-id="e90632fc-e163-01eb-cc83-2af0651199b1" class="let-s-connect-button w-inline-block">
                        <div>Let &#x27;s Connect</div>
                        <div class="button-bottom-line"></div>
                        <div class="hover-line"></div>
                        <div class="arrows-container">
                            <div class="arrow-right w-embed">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </div>
                            <div class="arrow-right-hover w-embed">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

