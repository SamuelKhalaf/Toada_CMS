<section id="Nav" class="navigation">
    <div class="nav-bar">
        <div class="container-nav">
            <a href="{{ route('home') }}" class="logo-link w-inline-block {{ request()->routeIs('home') ? 'w--current' : '' }}">
                <img src="{{ asset('images/toada-black.png') }}" loading="lazy" alt="" class="nav-logo" style="height:36px !important;"/>
            </a>
            
            <!-- Language Switcher -->
            <div class="language-switcher" style="position: absolute; top: 50%; transform: translateY(-50%); right: 120px; left: auto;">
                @php
                    $currentLang = app()->getLocale();
                    $nextLang = $currentLang === 'ar' ? 'en' : 'ar';
                    $nextLangDisplay = $currentLang === 'ar' ? 'English' : 'العربية';
                @endphp
                <a href="{{ route('language.switch', $nextLang) }}" 
                   class="language-switcher-button" 
                   style="display: flex; align-items: center; gap: 0.5rem; text-decoration: none; color: #000; font-size: 14px; font-weight: 500; transition: opacity 0.3s ease;"
                   onmouseover="this.style.opacity='0.7'" 
                   onmouseout="this.style.opacity='1'">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="2" y1="12" x2="22" y2="12"></line>
                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                    </svg>
                    <span>{{ $nextLangDisplay }}</span>
                </a>
            </div>
            
            <div data-w-id="f92eea92-e6c9-1d15-c689-1ea5b464fe52" class="button-menu">
                <div class="menu-icon-wrap">
                    <div class="menu-icon">
                        <div class="top-line"></div>
                        <div class="bottom-line"></div>
                    </div>
                </div>
            </div>
            <div class="nav-content">
                <div class="nav-link-list">
                    <div class="nav-link-item">
                        <div class="nav-link-wrapper _1">
                            <div class="display-xs">
                                01.<br/>
                            </div>
                            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'w--current' : '' }}">{{ __('navigation.home') }}</a>
                        </div>
                    </div>
                    <div class="nav-link-item">
                        <div class="nav-link-wrapper _2">
                            <div class="display-xs">02.</div>
                            <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'w--current' : '' }}">{{ __('pages.about') }}</a>
                        </div>
                    </div>
                    <div class="nav-link-item">
                        <div class="nav-link-wrapper _3">
                            <div class="display-xs">03.</div>
                            <a href="{{ route('services') }}" class="nav-link {{ request()->routeIs('services') ? 'w--current' : '' }}">{{ __('pages.services') }}</a>
                        </div>
                    </div>
                    <div class="nav-link-item">
                        <div class="nav-link-wrapper _5">
                            <div class="display-xs">04.</div>
                            <a href="{{ route('insights') }}" class="nav-link {{ request()->routeIs('insights*') ? 'w--current' : '' }}">{{ __('navigation.insights_impact') }}</a>
                        </div>
                    </div>
                    <div class="nav-link-item">
                        <div class="nav-link-wrapper _6">
                            <div class="display-xs">05.</div>
                            <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'w--current' : '' }}">{{ __('pages.contact') }}</a>
                        </div>
                    </div>
                </div>
                <div class="w-layout-grid social-icons-wrap">
                    @include('partials.social-media-icons', [
                        'linkClass' => 'social-icon-link w-inline-block',
                        'iconWrapperClass' => 'icon-embed w-embed',
                        'iconClass' => ''
                    ])
                </div>
            </div>
        </div>
    </div>
    <div class="menu-overlay"></div>
</section>

