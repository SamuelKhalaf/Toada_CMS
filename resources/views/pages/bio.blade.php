@extends('layouts.app')

@section('title', 'Team Member Bio')

@section('wf-page-id', '67acf28edf034f4ea2bcb7b6')

@section('meta')
    <meta content="Head of Operations" name="description"/>
@endsection

@section('page-specific-styles')
        <style type="text/css">
            /* Team member name styling */
            .bio-header h2 {
                color: #4C489D !important;
                font-weight: bold !important;
            }
        </style>
@endsection

@section('content')
                <div class="section no-padding">
                    <div data-w-id="2ac27fb3-69b2-1880-aa4e-006ef142e057" style="-webkit-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 20px, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="animation-up-0-1">
                        <div class="team-sticky-wrap">
                            <div class="left-wrap">
                                <div class="team-page-background">
                                    <div class="purple-block"></div>
                                    <div class="white-block"></div>
                                </div>
                                <div class="team-image-wrap">
                                    <img src="{{ asset('images/bio/team-member-headshot.webp') }}" loading="lazy" alt="" class="team-member-image"/>
                                </div>
                            </div>
                            <div class="right-wrap">
                                <div class="team-bio">
                                    <div class="bio-header">
                                        <h2 class="display-2xl">David Adam</h2>
                                        <div>Consultant</div>
                                    </div>
                                    <div class="w-richtext">
                                        <p></p>
                                    </div>
                                    <!-- <a href="team.html" data-w-id="f8845b3e-9818-d83c-a61d-6093cf2867d8" class="go-back-button w-inline-block">
                                        <img src="{{ asset('images/bio/left-arrow.svg" loading="lazy" style="-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);transform-style:preserve-3d" alt="" class="back-arrow-icon"/>
                                        <div class="display-xs">View All</div>
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('partials.lets-connect', ['paddingStyle' => ''])
@endsection

@section('scripts')
        <script type="text/javascript">
            // Team member data
            const teamMembers = {
                'mohammed-allan': {
                    name: 'Mohammed Allan',
                    title: 'Managing Partner',
                    image: '{{ asset('images/team/Mohammed-Allan.jpg') }}',
                    bio: 'Managing Partner of Toada and one of Saudi Arabia’s foremost leaders in event strategy and execution, with over 25 years of experience shaping the kingdom’s events landscape. As a seasoned executive, he has led the creation and delivery of some of Saudi Arabia’s largest and most prestigious business, social, and cultural events.'
                },
                'thanayan-al-thanayan': {
                    name: 'Thanayan Al-Thanayan',
                    title: 'Business Unit Director',
                    image: '{{ asset('images/team/Thunayan.jpg') }}',
                    bio: 'Business Unit Director and a recognized leader in strategic planning and innovation. With over 16 years of experience in PMO establishment, initiative design, and SME development, he drives transformative projects across sectors. PMP and RMP certified, and a UNCTAD-accredited national facilitator.'
                },
                'rasha-dbeissy': {
                    name: 'Rasha Dbeissy',
                    title: 'Arts and Culture Director',
                    image: '{{ asset('images/team/Rasha--Dbeissy1.jpg') }}',
                    bio: 'Toada\'s Arts and Culture Director, a creative economy specialist with 15 years of experience in theatre, cultural programming, and performance art. She leads cultural initiatives that foster community engagement, empower local talent, and drive sustainable growth, positioning Saudi culture on the global stage.'
                },
                'hala-al-mezainy': {
                    name: 'Hala Al-Mezainy',
                    title: 'Account Director',
                    image: '{{ asset('images/team/Hala-Almezainy.jpg') }}',
                    bio: 'Account Director, with over 18 years of experience in event business development and project management. With a strong background in information technology, she has delivered high-impact projects across banking, healthcare, and technology sectors, known for driving operational excellence and efficient delivery.'
                },
                'reem-alharbi': {
                    name: 'Reem Alharbi',
                    title: 'Manager, Digital Solutions',
                    image: '{{ asset('images/team/Reem-Alharbi.jpg') }}',
                    bio: 'Digital Solutions Manager, specializing in digital transformation and innovation. With 19 years of experience, she leads digital assessments, crafts technology-driven strategies, and drives transformation initiatives that deliver sustainable, high-impact results.'
                },
                'abdulhadi-saqor': {
                    name: 'Abdulhadi Saqor',
                    title: 'Senior Manager Consultancy',
                    image: '{{ asset('images/team/saqor.jpg') }}',
                    bio: 'Senior Consulting Manager, with over 10 years of experience in project management, organizational development, and change management. Holding a Master’s from Saudi Electronic University and multiple certifications in strategy and performance measurement, he leads high-impact transformation initiatives focused on operational excellence and sustainable growth.'
                },
                'reham-tarbouch': {
                    name: 'Reham Tarbouch',
                    title: 'Project Director',
                    image: '{{ asset('images/team/Reham-Tarboush.jpg') }}',
                    bio: 'Toada’s Project Director and a seasoned event consultant with over 20 years of experience across events, hospitality, and marketing. She has led major national and global events including Misk Global Forum, Saudi Founding Day, and Expo 2020 Dubai. Reham specializes in strategic planning and stakeholder engagement, delivering world-class experiences aligned with national priorities.'
                },
                'nadim-saab': {
                    name: 'Nadim Saab',
                    title: 'Marketing Director',
                    image: '{{ asset('images/team/Nadim Saab.jpeg') }}',
                    bio: 'Marketing Director, with over 20 years of experience in branding, digital marketing, and strategic communication. He specializes in driving brand growth, audience engagement, and digital presence across platforms. Known for his expertise in content creation, video production, and brand positioning, Nadim leads marketing strategies that amplify cultural and social impact.'
                },
                'zhanna-ihoshyna': {
                    name: 'Zhanna Ihoshyna',
                    title: 'Business Development Strategist',
                    image: '{{ asset('images/team/Zhanna-Ihoshyna.jpg') }}',
                    bio: 'Business Development Strategist with over 15 years of combined experience, including 8 years in innovative startups, retail, and the events industry. With a PhD in Middle Eastern Studies and 7 years of academic experience, she is recognized for bridging strategy and research in fastmoving environments.'
                },
                'marina-guo': {
                    name: 'Marina Guo',
                    title: 'Consultant',
                    image: '{{ asset('images/team/Marina-Guo.jpg') }}',
                    bio: 'Cultural Strategist and Entrepreneur with international experience in cultural and creative industries. Dr. Marina Guo is based in Shanghai and Toronto and serves as Associate Director at BOP Consulting. She advises public and private sector clients on CCI development, business strategy, and cultural policy, and chairs the China Innovation Service Alliance for Culture & Technology.'
                },
                'david-adam': {
                    name: 'David Adam',
                    title: 'Consultant',
                    image: '{{ asset('images/team/David-Adam.jpg') }}',
                    bio: 'International Relations and Cultural Strategy Expert with a strong background in economic development, soft power, and global branding. David Adam has led initiatives in cities such as London, Moscow, and Shanghai, and serves as Adjunct Professor at the University of Southern California, focusing on the intersection of culture, investment, and global influence.'
                },
                'paul-owens': {
                    name: 'Paul Owens',
                    title: 'Consultant',
                    image: '{{ asset('images/team/Paul-Owens.jpg') }}',
                    bio: 'International Cultural Policy and Creative Economy Advisor with decades of experience in cultural strategy and urban policy. As Co-Founder of BOP, Paul Owens is recognized for establishing the World Cities Culture Forum and advising global cities on embedding culture within development frameworks.'
                },
                'renato-santos': {
                    name: 'Renato Santos',
                    title: 'Training Consultant',
                    image: '{{ asset('images/team/Renato-Santos.jpg') }}',
                    bio: 'Brazil-based entrepreneurship advisor and venture capital executive with 10+ years in business development and startup investment. Renato is Managing Partner at Moai Participações, managing a diverse portfolio in retail, logistics, finance, and renewable energy. Co-author of UNCTAD’s global Empretec workshop, supporting 500,000+ entrepreneurs worldwide. Also recognized for his role on “The Apprentice Brazil” and regular radio features on entrepreneurship and innovation.'
                },
                'jean-gaby-ghabro': {
                    name: 'Jean Gaby Ghabro',
                    title: 'Graphic Designer and Content Creator',
                    image: '{{ asset('images/team/Jean Ghabro.jpg') }}',
                    bio: 'Multidisciplinary visual artist and designer with an architectural background and a focus on visual communication. Jean blends storytelling with a strategic approach to branding, identity, and content—delivering clear, engaging designs for varied audiences. His art and design experience supports a consistent goal: creating visually compelling work that effectively communicates and enhances brand presence.'
                },
                'joanna-el-kai': {
                    name: 'Joanna El Kai',
                    title: 'Senior Copywriter',
                    image: '{{ asset('images/team/Joanna El Kai.png') }}',
                    bio: 'Senior bilingual copywriter and translator with 9+ years of experience in content development, communication, and SEO-driven digital copy. Skilled in creating brand-aligned messaging that resonates across Arabic and English markets. With 8 years in leading agencies, Joanna has managed teams, delivered regional campaigns, and led content for high-profile government accounts.'
                },
                'ferass-al-tubi': {
                    name: 'Ferass Al-Tubi',
                    title: 'Project Consultant',
                    image: '{{ asset('images/team/Ferass-Al-Tubi.jpeg') }}',
                    bio: 'A cultural management specialist with over a decade of experience in cultural programming, education, and strategic development. Ferass excels in designing and delivering engaging educational and cultural initiatives for diverse audiences, from International institutions like the Institut francais in France to artistic organizations like the Royal Opera House Muscat. His expertise includes developing strategic frameworks, fostering cross-cultural partnerships, and enhancing audience engagement. He was a key member of Oman\'s first national cultural and creative industries mapping project, contributing to sector analysis and policy. He holds an MA in Cultural Management from EAC Paris.'
                },
                'alaa-hammodah': {
                    name: 'Alaa Hammodah',
                    title: 'Director of Business Development',
                    image: '{{ asset('images/team/Alaa-Hammodah.jpeg') }}',
                    bio: 'Alaa has over 18 years of diverse and extensive experience in the fields of: financial consulting, credit, Learning & Talent Development, Project Management, and Capacity Building. He has worked across several sectors: consulting, banking, technology, entrepreneurship, culture, and manufacturing. He holds a Bachelor\'s degree in Finance and a PROSCI Certificate in Change Management and Mini MBA.'
                }
            };

            // Function to get slug from URL path
            function getSlugFromPath() {
                const path = window.location.pathname;
                // Extract slug from /bio/{slug} pattern
                const match = path.match(/\/bio\/([^\/]+)/);
                return match ? match[1] : '';
            }

            // Function to update bio content
            function updateBioContent() {
                const memberId = getSlugFromPath();
                let member = teamMembers[memberId];
                
                // If no member found or invalid member ID, use the first team member as default
                if (!member) {
                    const firstMemberKey = Object.keys(teamMembers)[0];
                    member = teamMembers[firstMemberKey];
                    console.log('Team member not found:', memberId, '- Using default:', firstMemberKey);
                }
                
                if (member) {
                    // Update page title
                    document.title = member.name;
                    
                    // Update meta description
                    const metaDescription = document.querySelector('meta[name="description"]');
                    if (metaDescription) {
                        metaDescription.setAttribute('content', member.title);
                    }
                    
                    // Update team member image
                    const teamImage = document.querySelector('.team-member-image');
                    if (teamImage) {
                        teamImage.src = member.image;
                        teamImage.alt = member.name;
                    }
                    
                    // Update name and title
                    const nameElement = document.querySelector('.bio-header h2');
                    if (nameElement) {
                        nameElement.textContent = member.name;
                    }
                    
                    const titleElement = document.querySelector('.bio-header div');
                    if (titleElement) {
                        titleElement.textContent = member.title;
                    }
                    
                    // Update bio content
                    const bioContent = document.querySelector('.w-richtext');
                    if (bioContent) {
                        bioContent.innerHTML = '<p>' + member.bio + '</p>';
                    }
                }
            }

            // Update content when page loads
            document.addEventListener('DOMContentLoaded', function() {
                updateBioContent();
            });
        </script>
@endsection
