<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Insight;
use App\Models\InsightTranslation;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class InsightsContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure storage directory exists
        $storagePath = storage_path('app/public/content/insights');
        if (!File::exists($storagePath)) {
            File::makeDirectory($storagePath, 0755, true);
        }

        $sourceDir = public_path('images/articals');
        $targetDir = storage_path('app/public/content/insights');

        // Define insights data
        $insights = [
            [
                'slug' => 'sustainable-manufacturing-solutions',
                'title_en' => 'Culture as Capital - Toada at the Cultural Investment Conference 2025',
                'title_ar' => 'الثقافة كرأسمال - توادا في مؤتمر الاستثمار الثقافي 2025',
                'description_en' => 'Under the patronage of HRH Crown Prince Mohammed bin Salman, the Cultural Investment Conference 2025 in Riyadh marked a defining moment in Saudi Arabia\'s ongoing cultural and economic transformation.',
                'description_ar' => 'تحت رعاية صاحب السمو الملكي ولي العهد الأمير محمد بن سلمان، شكل مؤتمر الاستثمار الثقافي 2025 في الرياض لحظة حاسمة في التحول الثقافي والاقتصادي المستمر للمملكة العربية السعودية.',
                'category_en' => 'Lead Perspective',
                'category_ar' => 'رؤية قيادية',
                'body_en' => '<h4>Reframing Culture as a Core Asset Class</h4>
<p>Under the patronage of HRH Crown Prince Mohammed bin Salman, the Cultural Investment Conference 2025 in Riyadh marked a defining moment in Saudi Arabia\'s ongoing cultural and economic transformation. The event placed culture firmly within the framework of investment - not as a cost, but as capital, a multiplier, and a pillar of sustainable development.</p>
<p>Over the two days, ministers, investors, and thought leaders examined how culture is shaping the Kingdom\'s next phase of growth. They explored its power to create jobs, boost global competitiveness, and strengthen the Kingdom\'s soft power - with the Ministry of Investment confirming $500 million in foreign investment and 1,700 international investors now active in the cultural and creative economy</p>
<p>The message was clear: culture is no longer peripheral to the economy. It is central to Saudi Arabia\'s diversification, diplomacy, and national identity.</p>
<h6>Toada x Mung Investments - Catalyzing Cultural Commercialization</h6>
<p>Toada Consulting, in collaboration with Mung Investments, joined the conference as part of a shared mission to accelerate the commercialization of culture and unlock tangible value within Saudi Arabia\'s creative economy. Together, the partners are designing frameworks that help transform cultural potential into investable opportunities - from policy design and PPP models to new vehicles for cultural entrepreneurship and creative SMEs.</p>
<p>Toada\'s participation emphasized the firm\'s position as a Saudi-born consultancy operating at the intersection of culture, creativity, and commerce. Toada\'s mission is to build strategic ecosystems that convert cultural initiatives into economic engines - while maintaining the authenticity and human-centered purpose that define Vision 2030.</p>
<h6>Insights from the Conference: From Policy to Infrastructure</h6>
<p>The opening session, "From Policy to Prosperity - Culture as a Strategic Investment," set the tone for Saudi Arabia\'s evolving creative economy. Moderated by Arab News Editor-in-Chief Faisal Abbas, the session featured H.E. Khalid Al-Falih, Minister of Investment, and H.E. Faisal Al-Ibrahim, Minister of Economy and Planning - two voices defining how culture will transition from expression to infrastructure.</p>
<h6>Culture as an Engine for Investment</h6>
<p>H.E. Khalid Al-Falih positioned culture as a viable asset class within the national investment landscape. He outlined the Ministry of Investment\'s framework to identify sector requirements, attract investors, provide financing, and organize workshops in close collaboration with the Ministry of Culture.</p>
<p>This collaboration has already produced over 40 investment opportunities, spanning both profitable ventures and high-potential projects. Parallel efforts are underway to streamline licensing procedures and activate engagement with governance bodies and donors - creating the regulatory clarity required for sustained private-sector participation.</p>
<p>His Excellency emphasized the impact of the cash and non-cash incentives introduced under the leadership of His Royal Highness the Crown Prince, noting their role in revitalizing the film industry and attracting global producers. He cited the Ignite digital content initiative, which now encompasses animation, short films, culinary arts, visual arts, music, and fashion, as a cornerstone of this momentum. These measures, he projected, will triple employment opportunities within the cultural ecosystem over the coming years as the private sector scales its contribution.</p>
<h6>Culture as Soft Infrastructure</h6>
<p>H.E. Faisal Al-Ibrahim reframed culture as soft infrastructure - a platform that draws talent, innovators, and investors while reinforcing national competitiveness. He underscored that the global creative economy is valued at $3.4 trillion, highlighting culture\'s pivotal role in economic diversification and resilience.</p>
<p>According to His Excellency, every $1 invested in culture can generate up to $2.5 in economic impact and create direct employment. Since the inception of Vision 2030, the Ministry of Culture and its ecosystem have trained around 5,000 professionals and sponsored thousands of students pursuing degrees in creative disciplines - a deliberate strategy to build the Kingdom\'s next generation of cultural leaders.</p>
<p>He reaffirmed that culture has already fueled the first wave of diversification across tourism, entertainment, culture, and sports, and will remain a structural pillar of Saudi Arabia\'s economic transformation.</p>
<h6>Global Lens: Culture as Strategic IP</h6>
<p>Offering an international benchmark, Lord Ed Vaizey, Toada\'s and BOP Consulting Advisor and former UK Minister for Culture, Communications and Creative Industries, provided a global perspective during the panel "Cultural Innovation as the New Oil" on September 30.</p>
<p>Drawing from his tenure leading one of the world\'s most mature creative economies, Lord Vaizey observed that culture is as strategically important as the James Bond IP to the British economy - "generating hundreds of millions in investment, sustaining thousands of high-value jobs, amplifying soft power, and creating ripple effects across adjacent sectors."</p>
<p>His reflection reinforced the defining purpose of the Cultural Investment Conference: to articulate and operationalize the business case for culture - where policy, creativity, and capital intersect to deliver measurable national advantage.</p>
<h6>A Blueprint for Investment in Culture</h6>
<p>The conference demonstrated that Saudi Arabia\'s approach to cultural investment has matured from narrative-building to system-building. Discussions across panels and sessions revealed a coherent framework for "Culture as Infrastructure", driven by five key levers:</p>
<ol>
<li>Public–Private Partnerships (PPPs) - Building collaborative funding models where private capital complements government leadership to de-risk investment.</li>
<li>Cultural Funds and Creative Financing - Introducing instruments such as fractional ownership, impact bonds, and venture capital tailored for cultural enterprises</li>
<li>Digital and AI Integration - Leveraging technology to expand access, manage IP, and scale creative products, exemplified by the Google Arts & Culture initiative for Jeddah Historic District, launched at the conference</li>
<li>Talent and Education Pipelines - Creating structured ecosystems for youth and women to participate as producers, not just consumers, of culture</li>
<li>Cultural Diplomacy and Export Readiness - Developing creative products, events, and experiences designed for global markets, ensuring local authenticity with international resonance.</li>
</ol>
<h6>Toada\'s Role: Bridging Vision with Implementation</h6>
<p>Toada\'s presence at the Cultural Investment Conference reaffirmed its role as a cultural architect and systems integrator for Saudi Arabia\'s creative future. Through its Trajectory Framework, Toada aligns culture-driven initiatives with measurable outcomes - from GDP contribution to social impact - helping partners design, perform, and measure transformation.</p>
<p>By engaging with policymakers, investors, and creative pioneers, Toada advocates for investability in culture: building the data, partnerships, and governance models required for sustainable scaling. The firm\'s readiness to engage in Public–Private Partnerships (PPPs) and impact-driven joint ventures positions it to operationalize the ambitions set out at the conference - translating vision into frameworks, and frameworks into long-term value.</p>
<h6>The New Cultural Economy</h6>
<p>Framed within Vision 2030, Saudi Arabia\'s cultural sector is projected to reach SAR 180 billion ($48 billion) by 2030, generating thousands of jobs and cementing its role as a global creative hub</p>
<p>The Cultural Investment Conference illuminated the pathways for this transformation - but Toada\'s work represents the next stage: turning strategic discourse into tangible ecosystems of growth.</p>
<p>For Toada, culture is not a byproduct of prosperity; it is its blueprint. And as Saudi Arabia pioneers the new model of the cultural economy, Toada stands ready to design the systems, partnerships, and experiences that will define the Kingdom\'s creative future.</p>',
                'body_ar' => '<h4>إعادة تصور الثقافة كفئة أصول أساسية</h4>
<p>تحت رعاية صاحب السمو الملكي ولي العهد الأمير محمد بن سلمان، شكل مؤتمر الاستثمار الثقافي 2025 في الرياض لحظة حاسمة في التحول الثقافي والاقتصادي المستمر للمملكة العربية السعودية. وضع الحدث الثقافة بشكل راسخ في إطار الاستثمار - ليس كتكلفة، ولكن كرأسمال ومضاعف وركيزة للتنمية المستدامة.</p>
<p>على مدى يومين، فحص الوزراء والمستثمرون وقادة الفكر كيف تشكل الثقافة المرحلة التالية من نمو المملكة. استكشفوا قوتها في خلق فرص العمل، وتعزيز القدرة التنافسية العالمية، وتعزيز القوة الناعمة للمملكة - مع تأكيد وزارة الاستثمار على 500 مليون دولار من الاستثمار الأجنبي و 1,700 مستثمر دولي نشط الآن في الاقتصاد الثقافي والإبداعي</p>
<p>الرسالة كانت واضحة: الثقافة لم تعد هامشية للاقتصاد. إنها مركزية لتنويع المملكة العربية السعودية والدبلوماسية والهوية الوطنية.</p>',
                'image' => 'Culture As Capital - Toada at CIC.jpg',
                'published_at' => '2025-10-01',
                'order' => 1,
            ],
            [
                'slug' => 'bridging-the-manufacturing-skills-gap',
                'title_en' => 'Culture as the Next Global Goal - Saudi Arabia to Host UNESCO MONDIACULT 2029',
                'title_ar' => 'الثقافة كهدف عالمي قادم - المملكة العربية السعودية تستضيف مؤتمر اليونسكو العالمي للسياسات الثقافية 2029',
                'description_en' => 'When UNESCO announced in Barcelona that the Kingdom of Saudi Arabia will host MONDIACULT 2029, it resonated far beyond the world of cultural diplomacy.',
                'description_ar' => 'عندما أعلنت اليونسكو في برشلونة أن المملكة العربية السعودية ستستضيف مؤتمر اليونسكو العالمي للسياسات الثقافية 2029، كان صدى ذلك أبعد بكثير من عالم الدبلوماسية الثقافية.',
                'category_en' => 'Global Trajectories',
                'category_ar' => 'المسارات العالمية',
                'body_en' => '<h4>A Defining Signal for the Next Decade</h4>
<p>When UNESCO announced in Barcelona that the Kingdom of Saudi Arabia will host MONDIACULT 2029, it resonated far beyond the world of cultural diplomacy.
The decision reflects how Saudi Arabia has moved from participating in global cultural conversations to shaping the frameworks that define them.</p>
<p>Minister of Culture Prince Bader bin Abdullah bin Farhan welcomed the announcement as recognition of the Kingdom\'s growing partnership with UNESCO and reaffirmed its commitment to embedding culture within sustainable development strategies worldwide.</p>
<p>For Saudi Arabia, this moment builds on a decade of consistent leadership.
From supporting Mexico in relaunching MONDIACULT 2022 to chairing Arab regional consultations and convening the first-ever G20 Culture Ministers\' Meeting during its 2020 presidency, the Kingdom has steadily expanded its cultural footprint. Each initiative has strengthened the foundation for what comes next - a new global era where culture performs as a measurable system of progress.</p>
<h6>Global Policy Momentum: Culture as the Missing SDG</h6>
<p>The announcement arrives alongside UNESCO\'s Global Report on Cultural Policies - Culture: The Missing SDG, developed through BOP Consulting\'s longstanding data partnership with UNESCO.</p>
<p>Drawing on 1,200 national reports and 200 case studies from 2019–2024, the report articulates a profound shift:</p>
<ul>
<li>"Culture is not a peripheral sector to be supported; it is a central force to be mobilized."</li>
</ul>
<p>This insight reframes culture as a structural enabler of growth, innovation, and inclusion - one that warrants recognition as a dedicated Sustainable Development Goal in the post-2030 agenda.</p>
<p>It validates the philosophy that underpins Vision 2030: culture is not a complement to the economy, but its connective tissue - linking industries, skills, and global perception into a unified growth system.</p>
<h6>From Policy to Practice: Aligning Global Vision with National Momentum</h6>
<p>By hosting MONDIACULT 2029, Saudi Arabia steps into the center of this global reorientation.
The conference will convene world leaders, policymakers, and cultural innovators to define how nations operationalize culture as an engine of sustainable development.</p>
<p>For the Kingdom, it represents an opportunity to:</p>
<ul>
<li>Translate national successes into a global policy model for creative-economy integration.</li>
<li>Lead international discussions on cultural financing, IP protection, and public–private collaboration.</li>
<li>Strengthen partnerships that expand Saudi culture\'s global reach while attracting investment and talent to the region.</li>
</ul>
<p>It also reinforces a broader ambition - to position Riyadh as the epicenter of global cultural dialogue, a city where economic vision and cultural intelligence converge.</p>',
                'body_ar' => '<h4>إشارة حاسمة للعقد القادم</h4>
<p>عندما أعلنت اليونسكو في برشلونة أن المملكة العربية السعودية ستستضيف مؤتمر اليونسكو العالمي للسياسات الثقافية 2029، كان صدى ذلك أبعد بكثير من عالم الدبلوماسية الثقافية.
يعكس القرار كيف انتقلت المملكة العربية السعودية من المشاركة في المحادثات الثقافية العالمية إلى تشكيل الأطر التي تحددها.</p>',
                'image' => 'UNESCO.jpg',
                'published_at' => '2025-10-07',
                'order' => 2,
            ],
            [
                'slug' => 'data-driven-manufacturing',
                'title_en' => 'Expo Osaka 2025 - Articulating Identity Through Culture-Centric Experience Design',
                'title_ar' => 'إكسبو أوساكا 2025 - التعبير عن الهوية من خلال تصميم التجربة المرتكز على الثقافة',
                'description_en' => 'The Saudi Pavilion at Expo Osaka 2025 marks a pivotal evolution in how nations engage with world expositions-transforming them from occasional showcases into scalable, experience-based systems.',
                'description_ar' => 'يمثل الجناح السعودي في إكسبو أوساكا 2025 تطورًا محوريًا في كيفية تفاعل الأمم مع المعارض العالمية - تحويلها من عروض عرض عرضية إلى أنظمة قابلة للتوسيع قائمة على التجربة.',
                'category_en' => 'Global Trajectories',
                'category_ar' => 'المسارات العالمية',
                'body_en' => '<p>The Saudi Pavilion at Expo Osaka 2025 marks a pivotal evolution in how nations engage with world expositions-transforming them from occasional showcases into scalable, experience-based systems that embody national identity and strategic foresight.</p>
<p>Designed by Foster + Partners, the Pavilion merges architectural storytelling with policy vision, converting Saudi Arabia\'s cultural heritage into interactive environments and its programmatic elements into living indicators of progress. Within its first 70 days, the Pavilion welcomed over one million visitors, becoming one of the most visited attractions at the Expo. On May 14, 2025, it recorded 18,000 visitors in a single day-a testament to its global resonance.</p>
<p>Its innovative fusion of design and diplomacy earned the Pavilion the Gold Prize for Cultural Architecture – Interactive and Experiential Spaces at the 2025 New York Architectural Design Awards, confirming Saudi Arabia\'s capability to create world-class cultural assets that move beyond aesthetics into systemic impact.</p>
<h6>Key Shifts Reflected in Pavilion Execution</h6>
<p>Purpose-Driven Spatial Strategy
The Pavilion reinterprets traditional Saudi architectural codes to guide visitors through spaces of reflection, interaction, and co-creation. By aligning visual power with environmental excellence, it mirrors the Kingdom\'s sustainability commitments and cultural depth.</p>
<p>Culture as a Systemic Enabler
Hosting over 1,100 activities, from panels on AI and creative industries to educational and sports programs, the Pavilion reframes culture as an economic catalyst, innovation accelerator, and talent builder-illustrating how cultural programming now functions as an engine of development.</p>
<p>Human-Centered Experience Design
Accessible multi-sensory tours connect themes of urban growth, marine preservation, and digital transformation through immersive storytelling. This inclusive design philosophy ensures that culture speaks not only through form but through empathy, equity, and experience.</p>
<p>Data-Driven Cultural Diplomacy
By tracking visitor flow, engagement levels, and sentiment in real time, the Pavilion applies a data-first approach to cultural policy-making, converting cultural engagement into measurable national capital-both quantitative and qualitative.</p>
<h6>Trend Analysis: Culture-Centric Experience as Strategic Necessity</h6>
<p>Saudi Arabia\'s participation at Expo Osaka aligns with a global movement that positions culture as the strategic backbone of national innovation, diplomacy, and growth.</p>
<ul>
<li>Narrative Sovereignty - Nations are reclaiming authorship of their stories through immersive, self-made environments that redefine international perception beyond legacy narratives.</li>
<li>Experience as Infrastructure - The success of modern pavilions now follows capital project logic, where cultural assets are evaluated not by footfall alone but by their long-term socio-economic and reputational returns.</li>
<li>Culture × Innovation Convergence - Culture now converges with education, AI, sustainability, and sport, shaping the foundations of global innovation ecosystems.</li>
<li>Localized Authenticity, Global Resonance - The Saudi Pavilion demonstrates how deeply rooted authenticity, when paired with universal themes, becomes a differentiating force in global dialogue.</li>
<li>Legacy-Embedded Design - By integrating strategic foresight into architecture and programming, the Pavilion ensures that cultural investment yields enduring economic, diplomatic, and reputational dividends.</li>
</ul>
<h4>Looking Ahead: From Osaka to Riyadh</h4>
<p>As Expo Osaka concluded on October 13, 2025, its final week set the stage for the next global gathering in Riyadh in 2030-highlighting the continuity of Saudi Arabia\'s cultural diplomacy and innovation leadership.</p>
<p>On October 10, the key talk "Expos in a New Era and the Significance of Theme Weeks" brought together global experts including Ridha Shaikh, Chief Officer of International Participants & Stakeholder Management at Expo 2030 Riyadh Company; Dr. Tarek Oliveira Shayya, former Executive Vice Chairman of Expo 2020 Dubai; and Dr. Hashizume Shinya, Theme Week Supervisor for Expo 2025 Osaka. The discussion explored how future Expos can serve as platforms for meaningful exchange and collective action in a rapidly changing world.</p>
<p>On October 12, BIE Day commemorated the Expo\'s achievements with speeches from BIE and Japanese officials, cultural performances by the organizing teams of Expo 2027 Belgrade and Expo 2030 Riyadh, and the Official Participant Awards Ceremony, where the winners of the Osaka–Kansai Expo Awards and recipients of the BIE Medals were announced.</p>
<p>The Closing Ceremony, held on October 13 at 2 p.m. (JST), was live-streamed globally and concluded with the Flag Parade - symbolizing the handover of the global stage from Osaka\'s celebration of cultural innovation to Riyadh\'s promise of shaping the next era of human progress through experience-led design.</p>',
                'body_ar' => '<p>يمثل الجناح السعودي في إكسبو أوساكا 2025 تطورًا محوريًا في كيفية تفاعل الأمم مع المعارض العالمية - تحويلها من عروض عرض عرضية إلى أنظمة قابلة للتوسيع قائمة على التجربة والتي تجسد الهوية الوطنية والرؤية الاستراتيجية.</p>',
                'image' => 'Saudi Pavilion at Expo Osaka 2025.jpg',
                'published_at' => '2025-10-15',
                'order' => 3,
            ],
            [
                'slug' => 'predictive-maintenance-the-game-changer',
                'title_en' => 'The Shanghai Trajectory and the Rise of Saudi Arabia\'s Cultural Economy',
                'title_ar' => 'مسار شنغهاي وصعود الاقتصاد الثقافي للمملكة العربية السعودية',
                'description_en' => 'Culture is rapidly emerging as one of the most dynamic drivers of economic transformation. Around the world, governments are discovering that investment in creativity and experience design can yield returns comparable to traditional sectors.',
                'description_ar' => 'تظهر الثقافة بسرعة كواحدة من أقوى محركات التحول الاقتصادي. في جميع أنحاء العالم، تكتشف الحكومات أن الاستثمار في الإبداع وتصميم التجربة يمكن أن يحقق عوائد مماثلة للقطاعات التقليدية.',
                'category_en' => 'Lead Perspective',
                'category_ar' => 'رؤية قيادية',
                'body_en' => '<p>Culture is rapidly emerging as one of the most dynamic drivers of economic transformation. Around the world, governments are discovering that investment in creativity and experience design can yield returns comparable to traditional sectors - stimulating innovation, attracting capital, and strengthening national influence.</p>
<p>Shanghai offers a compelling case study in how cultural programming can evolve into national economic infrastructure.
Over the past decade, the city has re-engineered its cultural economy around integration - linking events, investment zones, and innovation clusters into one continuous ecosystem.</p>
<h6>Key mechanisms define this model:</h6>
<ol>
<li>Policy Integration - Every cultural platform is tied to macroeconomic priorities: industrial innovation, trade, and cultural diplomacy.</li>
<li>Industrial Spillover - Arts festivals and expos are connected to business forums and trade flows, ensuring that creative expression drives measurable commercial outcomes.</li>
<li>Cultural Intelligence Infrastructure - Dedicated PMOs track not just attendance, but the creation of IP, startups, and exports. Data flows directly into policy formulation.</li>
</ol>
<p>Through this alignment, Shanghai turned culture into a renewable growth engine, not a seasonal spectacle - an approach that resonates deeply with Saudi Arabia\'s current transition.</p>
<h6>Evolution in Phases:</h6>
<table class="table-striped">
<thead>
<tr>
<th>Period</th>
<th>Phase</th>
<th>Defining Mechanism</th>
<th>Outcome</th>
</tr>
</thead>
<tbody>
<tr>
<td>2005–2010</td>
<td>Showcase</td>
<td>Hosting major expos (World Expo 2010, Arts Biennale)</td>
<td>Global branding, tourism inflow</td>
</tr>
<tr>
<td>2010–2015</td>
<td>Integration</td>
<td>Embedding events into five-year industrial plans</td>
<td>Alignment of culture with manufacturing and trade</td>
</tr>
<tr>
<td>2015–2020</td>
<td>Convergence</td>
<td>Linking cultural industries with tech, AI, and digital commerce</td>
<td>Expansion of creative GDP and new-media exports</td>
</tr>
<tr>
<td>2020–2025</td>
<td>Systemization</td>
<td>Creation of cross-ministerial governance (Culture, Commerce, Education) and data-driven PMOs</td>
<td>Cultural GDP exceeding USD 140 billion; culture as infrastructure</td>
</tr>
</tbody>
</table>
<p></p>
<p>This progression reflects China\'s shift from cultural diplomacy to cultural economics-positioning creativity as a measurable contributor to national productivity.</p>
<p>Each phase reinforced the previous, gradually moving from one-off events to a self-sustaining creative-industry ecosystem.</p>
<h6>Policy Integration as Economic Infrastructure</h6>
<p>Shanghai\'s system rests on three interlocking layers:</p>
<ol>
<li>Regulatory Embedding – Each event is mandated to align with national development goals: industrial upgrading, digital economy, and soft-power export.</li>
<li>Institutional Architecture – Dedicated coordination units connect ministries, investment funds, and private sector partners within a unified governance framework to ensure that major events evolve into long-term economic ecosystems.</li>
<li>Measurement Logic – Success is assessed via contribution to GDP, IP generation, SME formation, and export growth-not attendance numbers.</li>
</ol>
<p>This three-layer design converts temporary activity into structural economic assets.</p>
<h6>Data and Funding Architecture</h6>
<ul>
<li>Data Hubs: Real-time analytics track cultural spending, visitor engagement, and SME performance.</li>
<li>Funding Streams: Government seed funding transitions into venture co-funding and corporate sponsorships.</li>
<li>Knowledge Transfer: Partnerships with universities and innovation parks ensure research outputs inform commercial projects.</li>
</ul>
<p>This integration enables culture to operate as a renewable capital system-reinvesting creative outcomes into the broader economy.</p>
<h5>Comparative Lens: Saudi Arabia\'s Post-CIC Moment</h5>
<p>Structural Similarities</p>
<table class="table-striped">
<thead>
<tr>
<th>Dimension</th>
<th>Shanghai</th>
<th>Saudi Arabia (Post-CIC 2025)</th>
</tr>
</thead>
<tbody>
<tr>
<td>National Vision</td>
<td>"Cultural Power + Innovation Hub"</td>
<td>Vision 2030 - Diversification through culture and creativity</td>
</tr>
<tr>
<td>Governance Approach</td>
<td>Cross-ministerial coordination frameworks embedded in Five-Year Plans</td>
<td>Ministry of Culture + PIF + creative commissions coordination</td>
</tr>
<tr>
<td>Economic Drivers</td>
<td>Trade expos, digital commerce, art-tech</td>
<td>Giga-projects, cultural tourism, design and gaming sectors</td>
</tr>
<tr>
<td>Investment Mechanism</td>
<td>PPPs, venture culture funds</td>
<td>PPP readiness, Monsha\'at + private investment platforms</td>
</tr>
<tr>
<td>Measurement Focus</td>
<td>GDP share, IP generation, exports</td>
<td>Cultural GDP metrics, investment inflows, job creation</td>
</tr>
</tbody>
</table>
<p></p>
<h6>The Combined Impact</h6>
<p>Together, PPPs and IP frameworks form the core infrastructure of a mature cultural economy-one capable of transforming creative potential into systemic, measurable growth.
They are the architecture behind Vision 2030\'s next horizon: a Saudi economy where culture performs as capital and every creative act contributes to long-term national value.</p>
<h4>The Opportunity Landscape</h4>
<p>Saudi Arabia\'s creative-economy growth trajectory indicates five immediate opportunities for replication and adaptation:</p>
<ol>
<li>Cultural Special Economic Zones (C-SEZs) – integrating creative clusters with logistics and digital trade.</li>
<li>Integrated Event PMOs – transforming flagship events into legacy institutions with annualized economic targets.</li>
<li>Creative Export Frameworks – aligned with the new Guide for Importing and Exporting Cultural Products and Services announced at CIC.</li>
<li>Impact Investment Vehicles – channeling private capital into cultural IP through performance-linked returns.</li>
<li>Cross-Border Creative Corridors – structured partnerships (like Toada\'s MoU) bridging East-West innovation pipelines.</li>
</ol>
<h4>The Saudi–China Bridge: From Cultural Diplomacy to Economic Infrastructure</h4>
<p>The 2025 Shanghai International MCN Conference marked a defining moment in Saudi Arabia\'s emergence as a global creative powerhouse. Held on June 5–6 at the Shanghai Convention and Exhibition Center, the forum convened over 100 industry leaders, 150 global brands, and 50 top-tier MCN agencies to explore the intersection of culture, commerce, and digital innovation.</p>
<p>Among the key participants were Toada Consulting and BOP Consulting. Saudi Arabia\'s Vision 2030 transformation took center stage in the dedicated session "KSA–China Culture, Tourism & Commerce Forum," highlighting the Kingdom\'s accelerating progress in cultural investment, creative industries, and immersive technology.</p>
<p>At the conference, Toada Consulting, BOP Consulting (UK), CCPIT Shanghai (China Council for the Promotion of International Trade), and Illuthion formalized their collaboration through a Memorandum of Understanding. The MoU represents a strategic leap - turning cultural diplomacy into an economic infrastructure platform that connects Saudi Arabia\'s creative industries with Asia\'s most advanced digital commerce and MCN networks.</p>
<p>What began as diplomacy is now functioning as a new export model for Saudi creativity - an evolving ecosystem that monetizes narrative, amplifies identity, and accelerates diversification.</p>
<h4>The Strategic Lesson: Designing Cultural Capital Systems</h4>
<p>The Shanghai Trajectory highlights what Saudi Arabia is now poised to do next:
create cultural capital systems - frameworks where artistic expression, creative enterprise, and national policy operate as one synchronized economy.</p>
<p>This requires three imperatives:</p>
<ul>
<li>From Activation to Governance - Institutionalize legacy PMOs and embed "impact dashboards" into every event and initiative.</li>
<li>From Narrative to IP - Treat cultural storytelling as a pipeline for proprietary products, brands, and exportable formats.</li>
<li>From Policy to Platform - Build cross-sector alliances that convert regulatory readiness into investment flow.</li>
</ul>
<p>Through its Unified Experience Development Lifecycle (link to our services) and PMO-as-a-Service model, Toada enables this translation: transforming culture from inspiration into infrastructure, and events into enduring economic systems.</p>',
                'body_ar' => '<p>تظهر الثقافة بسرعة كواحدة من أقوى محركات التحول الاقتصادي. في جميع أنحاء العالم، تكتشف الحكومات أن الاستثمار في الإبداع وتصميم التجربة يمكن أن يحقق عوائد مماثلة للقطاعات التقليدية - تحفيز الابتكار، وجذب رأس المال، وتعزيز التأثير الوطني.</p>',
                'image' => 'Shanghai Trajectory.jpg',
                'published_at' => '2025-10-21',
                'order' => 4,
            ],
            [
                'slug' => 'ai-transforms-manufacturing',
                'title_en' => 'From Policy to Product: How Saudi Arabia Is Turning Culture Into Capital',
                'title_ar' => 'من السياسة إلى المنتج: كيف تحول المملكة العربية السعودية الثقافة إلى رأس مال',
                'description_en' => 'Saudi Arabia is entering a new chapter of economic transformation - one where culture is no longer viewed as a soft power instrument but as a strategic economic engine.',
                'description_ar' => 'تدخل المملكة العربية السعودية فصلاً جديدًا من التحول الاقتصادي - حيث لم تعد الثقافة تُنظر إليها كأداة للقوة الناعمة ولكن كمحرك اقتصادي استراتيجي.',
                'category_en' => 'Initiative Spotlight',
                'category_ar' => 'بؤرة المبادرة',
                'body_en' => '<h4>A Unified Vision for a Culture-Driven Economy</h4>
<p>Saudi Arabia is entering a new chapter of economic transformation - one where culture is no longer viewed as a soft power instrument but as a strategic economic engine.</p>
<p>At the Cultural Investment Conference in Riyadh, held under the patronage of HRH Crown Prince Mohammed bin Salman, the Ministry of Culture announced a major milestone: the forthcoming Guide for Importing and Exporting Cultural Products and Services.</p>
<p>This initiative marks a crucial step in enabling structured trade of cultural goods, signaling that the cultural and creative economy has matured into a sector with measurable export potential.
The guide will provide a knowledge-based framework for cultural practitioners, entrepreneurs, and investors - outlining pathways, partners, and mechanisms that bridge creativity and commerce.</p>
<p>By transforming culture into a codified, investable domain, the Ministry of Culture reinforces the central thesis of Vision 2030: culture is economy, and its growth can be strategically designed, measured, and scaled.</p>
<h4>From Vision to Systemic Design</h4>
<p>Saudi Arabia\'s cultural economy is already demonstrating measurable momentum.
In 2023, it contributed SAR 35 billion to the non-oil GDP - 1.49% of national output - and grew by over 10% year on year.
By 2030, it is expected to surpass SAR 180 billion, supported by cultural infrastructure projects, festivals, and the rising integration of creative industries with technology, tourism, and education.</p>
<p>The Ministry\'s new guide addresses the next barrier: systemic scalability.
It answers three critical needs that have historically limited global competitiveness in cultural sectors:</p>
<ol>
<li>Information asymmetry - lack of accessible data, trade frameworks, and procedural guidance.</li>
<br><li>Fragmented value chains - weak integration between creation, financing, and export.</li>
<br><li>Underdeveloped PPP mechanisms - insufficient collaboration between public ambition and private execution.</li>
</ol>
<p>By bridging these gaps, the guide becomes a structural enabler - aligning cultural ambition with economic architecture.</p>
<h4>Toada\'s Role: Translating Policy into Market Impact</h4>
<p>Where public policy sets the direction, Toada Consulting designs the mechanisms that turn direction into traction.
At the Cultural Investment Conference, Toada - in collaboration with Mung Investments, the Cultural Partner of the event - advanced a private-sector perspective: how commercialization frameworks can transform cultural potential into measurable economic returns.</p>
<p>Toada\'s position is rooted in a simple but profound premise:
culture is infrastructure.</p>
<p>It underpins industries, powers soft diplomacy, and enhances national competitiveness.
The challenge, therefore, is not creativity - it\'s conversion: the ability to design systems where ideas become assets, and assets generate sustainable value.</p>
<p>Through its Strategize–Design–Perform framework, Toada develops data-backed ecosystems that align cultural identity with investment logic. This involves defining monetization models for cultural IP, structuring PPPs that de-risk creative projects, and introducing metrics that measure cultural impact with the same precision as financial performance.</p>
<h4>From Gastronomy to Global IP: A Proof of Concept</h4>
<p>Toada\'s philosophy was put into practice through the launch of its first cultural product at Sirha Arabia 2025 - A Whole Story in One Bite.
Developed with acclaimed Saudi chef Rakan AlOraifi, the project demonstrates how local heritage can be productized into a scalable, exportable experience.</p>
<p>Each dish encapsulates a region of Saudi Arabia - not only through flavor but through narrative, design, and sustainable presentation.
In this model, gastronomy functions as cultural diplomacy, where identity becomes consumable, story-driven, and economically viable.</p>
<p>This launch represents a culinary initiative. It is a proof of concept for a broader market: how cultural production, when systematized, can evolve into a revenue-generating creative IP portfolio - a domain once dominated by entertainment and design, now expanding to include experiential heritage.</p>
<h4>The Cultural Economy\'s Next Frontier: Commercialization Ecosystems</h4>
<p>The intersection of policy and product defines the maturity of any creative economy.
Saudi Arabia is now building what can be described as a commercialization ecosystem for culture - a system that integrates regulation, financing, and innovation.
Three dynamics are central to this next phase:</p>
<ol>
<li>Policy as Enabler, Not Controller
The state defines the rules, but flexibility lies with the market. The new guide provides structure without limiting innovation - enabling creativity to scale responsibly.</li>
<br><li>Private Sector as Accelerator
Institutional investors and corporate partners are moving into culture-driven ventures, treating creative IP, immersive experiences, and design exports as new asset classes.</li>
<br><li>Measurement as Legitimization
Data - on participation, impact, and returns - legitimizes culture as a quantifiable sector, making it visible to global capital and credible to policymakers.</li>
</ol>
<p>Together, these elements form the backbone of the Saudi cultural commercialization framework: one that balances creative authenticity with financial viability, heritage with innovation, and local value with global reach.</p>
<h4>From Frameworks to Futures</h4>
<p>For Toada, the Cultural Investment Conference was a signal - that Saudi Arabia is ready to move from cultural investment to cultural performance.
The Ministry\'s guide sets the policy foundation; Toada\'s market initiatives bring it to life.</p>
<p>By combining analytical precision with cultural insight, Toada acts as both strategic advisor and creative producer, bridging government ambitions with private-sector delivery.
Its readiness for Public–Private Partnerships (PPPs) and impact-based collaborations positions it as a key enabler of the next evolution: a future where culture operates as a measurable, exportable, and self-sustaining economic system.</p>
<h4>The Saudi Advantage: Authenticity Meets System</h4>
<p>Globally, creative economies are often fragmented - strong in artistry, weak in structure.
Saudi Arabia\'s advantage lies in its ability to design both.</p>
<p>Its cultural identity is rich, young, and diverse; its economic model is systemic, data-driven, and ambitious.
The combination creates an unparalleled opportunity to lead a new global paradigm - where authentic culture, when organized through strategic design, becomes a renewable source of economic power.</p>
<p>Toada stands at the center of this intersection - building the bridges between policy and product, inspiration and infrastructure, creativity and capital.</p>',
                'body_ar' => '<h4>رؤية موحدة لاقتصاد مدفوع بالثقافة</h4>
<p>تدخل المملكة العربية السعودية فصلاً جديدًا من التحول الاقتصادي - حيث لم تعد الثقافة تُنظر إليها كأداة للقوة الناعمة ولكن كمحرك اقتصادي استراتيجي.</p>',
                'image' => 'From Policy to Product.png',
                'published_at' => '2025-10-27',
                'order' => 5,
            ],
        ];

        foreach ($insights as $index => $insightData) {
            // Copy image
            $sourceImage = $sourceDir . '/' . $insightData['image'];
            $targetImage = $targetDir . '/' . $insightData['image'];
            
            if (File::exists($sourceImage)) {
                File::copy($sourceImage, $targetImage);
                $this->command->info("Copied insight image: {$insightData['image']}");
            } else {
                $this->command->warn("Image not found: {$insightData['image']}");
            }

            // Create insight
            $insight = Insight::updateOrCreate(
                ['slug' => $insightData['slug']],
                [
                    'featured_image' => 'content/insights/' . $insightData['image'],
                    'category_en' => $insightData['category_en'],
                    'category_ar' => $insightData['category_ar'],
                    'published_at' => Carbon::parse($insightData['published_at']),
                    'order' => $insightData['order'],
                    'status' => 'published',
                ]
            );

            // Create English translation
            InsightTranslation::updateOrCreate(
                ['insight_id' => $insight->id, 'language' => 'en'],
                [
                    'title' => $insightData['title_en'],
                    'description' => $insightData['description_en'],
                    'body' => $insightData['body_en'],
                ]
            );

            // Create Arabic translation
            InsightTranslation::updateOrCreate(
                ['insight_id' => $insight->id, 'language' => 'ar'],
                [
                    'title' => $insightData['title_ar'],
                    'description' => $insightData['description_ar'],
                    'body' => $insightData['body_ar'],
                ]
            );
        }

        $this->command->info('Insights content seeded successfully!');
    }
}
