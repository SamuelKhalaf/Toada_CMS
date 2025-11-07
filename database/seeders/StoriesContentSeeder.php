<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Story;
use App\Models\StoryTranslation;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class StoriesContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure storage directory exists
        $storagePath = storage_path('app/public/content/stories');
        if (!File::exists($storagePath)) {
            File::makeDirectory($storagePath, 0755, true);
        }

        $sourceDir = public_path('images/success-stories');
        $targetDir = storage_path('app/public/content/stories');

        // Define stories data
        $stories = [
            [
                'slug' => 'ksa-china-culture-forum',
                'title_en' => 'KSA–China Culture, Tourism & Commerce Forum',
                'title_ar' => 'منتدى المملكة العربية السعودية والصين للثقافة والسياحة والتجارة',
                'description_en' => 'The Shanghai signing of a landmark Memorandum of Understanding marked more than an agreement—it was a pivot from aspiration to execution.',
                'description_ar' => 'شكل التوقيع في شنغهاي على مذكرة تفاهم تاريخية أكثر من مجرد اتفاق - كان نقطة تحول من الطموح إلى التنفيذ.',
                'category_en' => 'Cultural Diplomacy',
                'category_ar' => 'دبلوماسية ثقافية',
                'body_en' => '<h4>About:</h4>
<p><strong>Client:</strong> Strategic Collaboration – Toada Consulting, BOP Consulting (UK), and Key Chinese Partners</p>
<p><strong>Scope:</strong> Cultural Diplomacy, Representation, and MoU Facilitation | June 2025</p>

<h4>The Opportunity:</h4>
<p>The Shanghai signing of a landmark Memorandum of Understanding marked more than an agreement—it was a pivot from aspiration to execution. By aligning Saudi Arabia, the UK, and China in a trilateral partnership, the MoU established a shared platform to advance cultural diplomacy, unlock economic opportunities, and drive creative innovation on a global scale.</p>

<h4>Our Contribution:</h4>
<h6>Toada positioned Saudi Arabia\'s creative economy at the forefront of Asia\'s most influential MCN and digital commerce ecosystem. We:</h6>
<ul>
<li>Represented the Kingdom on a global stage, showcasing Vision 2030\'s cultural and creative transformation.</li>
<li>Co-designed and delivered the special panel discussion for KSA–China Culture, Tourism & Commerce Forum, spotlighting investment potential.</li>
<li>Provided thought leadership on cultural transformation as a driver of economic growth.</li>
<li>Enabled direct engagement with 100+ global leaders, 150+ brands, and top-tier MCN agencies.</li>
<li>Facilitated a trilateral cultural policy and business work plan that bridges Saudi–UK–China priorities.</li>
</ul>
<h4>The Impact:</h4>
<p>What began as diplomacy is now a blueprint for cultural and commercial collaboration. By connecting Saudi Arabia\'s creative economy with international players, Toada helped transform a strategic dialogue into a living platform—one that advances national ambitions, strengthens global partnerships, and sets the stage for new industries to emerge.</p>',
                'body_ar' => '<h4>حول:</h4>
<p><strong>العميل:</strong> تعاون استراتيجي - توادا للاستشارات، BOP للاستشارات (المملكة المتحدة)، وشركاء صينيون رئيسيون</p>
<p><strong>النطاق:</strong> الدبلوماسية الثقافية والتمثيل وتسهيل مذكرة التفاهم | يونيو 2025</p>

<h4>الفرصة:</h4>
<p>شكل التوقيع في شنغهاي على مذكرة تفاهم تاريخية أكثر من مجرد اتفاق - كان نقطة تحول من الطموح إلى التنفيذ. من خلال مواءمة المملكة العربية السعودية والمملكة المتحدة والصين في شراكة ثلاثية، أنشأت مذكرة التفاهم منصة مشتركة لتطوير الدبلوماسية الثقافية، وإطلاق الفرص الاقتصادية، ودفع الابتكار الإبداعي على نطاق عالمي.</p>',
                'image' => 'ksa-china-culture-forum.jpg',
                'published_at' => '2025-06-01',
                'order' => 1,
            ],
            [
                'slug' => 'learn-program',
                'title_en' => 'LEARN',
                'title_ar' => 'تعلم',
                'description_en' => 'LEARN emerged as a national platform to advance lifelong learning—positioned at the intersection of education, innovation, and policy.',
                'description_ar' => 'ظهر LEARN كمنصة وطنية لتطوير التعلم مدى الحياة - موضع في تقاطع التعليم والابتكار والسياسة.',
                'category_en' => 'Program Design',
                'category_ar' => 'تصميم البرنامج',
                'body_en' => '<h4>About:</h4>
<p><strong>Client:</strong> Enterprise</p>
<p><strong>Scope:</strong> Program Design & Concept Development | 2024–2025</p>

<h4>The Opportunity:</h4>
<p>LEARN emerged as a national platform to advance lifelong learning—positioned at the intersection of education, innovation, and policy. For Saudi Arabia it was a chance to establish a sustained dialogue on learning as an engine of national development. Toada was engaged to shape the program\'s foundation and bring forward a concept that would not only convene stakeholders but also catalyze future partnerships and systemic change.</p>

<h4>Our Contribution:</h4>
<h6>Toada delivered an end-to-end design that transformed LEARN into a future-focused knowledge ecosystem:</h6>
<ul>
<li>Developed the strategic concept and content architecture for both the inaugural 2024 and second 2025 editions.</li>
<li>Curated a full program design, from keynote themes and panel topics to interactive, experience-driven formats.</li>
<li>Designed an experience aligned with national learning and innovation objectives, ensuring resonance across audiences.</li>
<li>Built a stakeholder-centered framework to engage educators, policymakers, government partners, and corporate leaders.</li>
<li>Integrated multisector partnerships to position LEARN as a collaborative platform shaping the future of education.</li>
</ul>
<h4>The Impact:</h4>
<p>LEARN is now recognized as a national dialogue on lifelong learning—anchoring education in Saudi Arabia\'s innovation agenda. By uniting cross-sector voices and aligning outcomes with Vision 2030 priorities, Toada helped establish LEARN as a strategic platform for partnership, innovation, and future-ready talent development.</p>',
                'body_ar' => '<h4>حول:</h4>
<p><strong>العميل:</strong> المؤسسة</p>
<p><strong>النطاق:</strong> تصميم البرنامج وتطوير المفهوم | 2024–2025</p>

<h4>الفرصة:</h4>
<p>ظهر LEARN كمنصة وطنية لتطوير التعلم مدى الحياة - موضع في تقاطع التعليم والابتكار والسياسة. بالنسبة للمملكة العربية السعودية، كانت فرصة لإقامة حوار مستدام حول التعلم كمحرك للتنمية الوطنية.</p>',
                'image' => 'learn-program.jpg',
                'published_at' => '2024-01-01',
                'order' => 2,
            ],
            [
                'slug' => 'unesco-creativity-report',
                'title_en' => 'Reshaping Policies for Creativity Report – Addressing culture as a global public good',
                'title_ar' => 'إعادة تشكيل السياسات للإبداع - معالجة الثقافة كسلعة عامة عالمية',
                'description_en' => 'UNESCO\'s Global Creativity Report serves as a global benchmark for policies that safeguard and advance the creative and cultural sectors.',
                'description_ar' => 'يخدم تقرير اليونسكو العالمي للإبداع كمعيار عالمي للسياسات التي تحمي وتطور القطاعات الإبداعية والثقافية.',
                'category_en' => 'Research',
                'category_ar' => 'بحوث',
                'body_en' => '<h4>About:</h4>
<p><strong>Client:</strong> UNESCO</p>
<p><strong>Scope:</strong> Research, 2021-2022</p>

<h4>The Opportunity:</h4>
<p>UNESCO\'s Global Creativity Report serves as a global benchmark for policies that safeguard and advance the creative and cultural sectors. For its second edition, UNESCO sought deeper insights into how nations are structuring frameworks to support resilience, growth, and sustainability across cultural industries. Our Team was engaged to bring methodological rigor and analytical depth to the research, ensuring evidence-based insights that inform global cultural policy.</p>

<h4>Our Contribution:</h4>
<h6>A research program that combined robust data analysis with narrative clarity:</h6>
<ul>
<li>Developed the workplan and strategy for data collection, validation, and comparative analysis.</li>
<li>Conducted data analysis and visualizations across multiple datasets, enhancing accessibility and clarity for global stakeholders.</li>
<li>Produced dataset narratives that contextualized findings and aligned them with broader policy themes.</li>
<li>Presented interim findings to the editorial board, shaping refinement of the report\'s structure and emphasis.</li>
<li>Delivered revised and final datasets meeting international research standards.</li>
<li>Contributed directly to chapter development, embedding analytical insights into the published report.</li>
</ul>
<h4>The Impact:</h4>
<p>The second edition of UNESCO\'s Global Creativity Report is now recognized as a definitive reference point for cultural policy worldwide. Our contribution ensured the report combined data-driven insights with compelling narratives, supporting policymakers, cultural leaders, and international organizations in shaping strategies that safeguard and grow the creative economy.</p>',
                'body_ar' => '<h4>حول:</h4>
<p><strong>العميل:</strong> اليونسكو</p>
<p><strong>النطاق:</strong> البحوث، 2021-2022</p>

<h4>الفرصة:</h4>
<p>يخدم تقرير اليونسكو العالمي للإبداع كمعيار عالمي للسياسات التي تحمي وتطور القطاعات الإبداعية والثقافية.</p>',
                'image' => 'unesco-creativity-report.webp',
                'published_at' => '2022-12-31',
                'order' => 3,
            ],
            [
                'slug' => 'world-cities-culture-forum',
                'title_en' => 'World Cities Culture Forum',
                'title_ar' => 'منتدى ثقافة المدن العالمية',
                'description_en' => 'The Greater London Authority sought to position cities as leaders in shaping global cultural policy and international cooperation.',
                'description_ar' => 'سعت هيئة لندن الكبرى إلى وضع المدن كقادة في تشكيل السياسة الثقافية العالمية والتعاون الدولي.',
                'category_en' => 'Research & Facilitation',
                'category_ar' => 'البحوث والتيسير',
                'body_en' => '<h4>About:</h4>
<p><strong>Client:</strong> Greater London Authority (GLA)</p>
<p><strong>Scope:</strong> Research & Facilitation| 2012-2022</p>

<h4>The Opportunity:</h4>
<p>The Greater London Authority sought to position cities as leaders in shaping global cultural policy and international cooperation. The initiative provided a unique platform for urban centers worldwide to share data, exchange best practices, and co-create innovative solutions. Our team contributed research, facilitation, and strategic guidance to advance cultural policy as a driver of urban development and global collaboration.</p>

<h4>Our Contribution:</h4>
<h6>Our role centered on enabling cities to connect knowledge with action:</h6>
<ul>
<li>Produced comparative analysis of cultural policy across global cities, published as a series of influential reports.</li>
<li>Designed and facilitated annual gatherings of city leaders, creating dialogue on cultural resilience, inclusion, and innovation.</li>
<li>Supported partnerships with member cities for continuous cultural data collection and reporting.</li>
<li>Delivered policy recommendations to integrate culture into urban economic development, strengthening culture\'s role in shaping vibrant and competitive cities.</li>
</ul>
<h4>The Impact:</h4>
<p>The initiative established culture as a recognized pillar of urban development and international relations. By connecting city leaders through evidence, dialogue, and collaboration, we helped create a global framework where cultural policy informs economic planning, enhances social cohesion, and drives innovation in cities worldwide.</p>',
                'body_ar' => '<h4>حول:</h4>
<p><strong>العميل:</strong> هيئة لندن الكبرى (GLA)</p>
<p><strong>النطاق:</strong> البحوث والتيسير | 2012-2022</p>

<h4>الفرصة:</h4>
<p>سعت هيئة لندن الكبرى إلى وضع المدن كقادة في تشكيل السياسة الثقافية العالمية والتعاون الدولي.</p>',
                'image' => 'world-cities-culture-forum.png',
                'published_at' => '2022-12-31',
                'order' => 4,
            ],
            [
                'slug' => 'tencent-hq',
                'title_en' => 'Tencent HQ',
                'title_ar' => 'مقر تينسنت',
                'description_en' => 'Tencent sought to leverage its multisector capabilities and financial resources to design a forward-looking cultural strategy with strong implementation potential.',
                'description_ar' => 'سعت تينسنت للاستفادة من قدراتها متعددة القطاعات والموارد المالية لتصميم استراتيجية ثقافية ذات رؤية مستقبلية بإمكانات تنفيذية قوية.',
                'category_en' => 'Strategy & Planning',
                'category_ar' => 'الاستراتيجية والتخطيط',
                'body_en' => '<h4>About:</h4>
<p><strong>Client:</strong> Tencent</p>
<p><strong>Scope:</strong> Strategy and Planning, 2022-2023</p>

<h4>The Opportunity:</h4>
<p>Tencent sought to leverage its multisector capabilities and financial resources to design a forward-looking cultural strategy with strong implementation potential. The ambition was to create a destination that combined innovation, entertainment, and cultural value—anchored in a vision that could attract global partners and set new benchmarks for placemaking and creative ecosystems.</p>

<h4>Our Contribution:</h4>
<h6>We partnered with Tencent to shape a comprehensive cultural development strategy:</h6>
<ul>
<li>Delivered conceptual planning for a next-generation destination of innovation and cultural entertainment.</li>
<li>Developed a clear cultural strategy, vision, and positioning to guide long-term growth.</li>
<li>Designed a placemaking masterplan integrating mixed-use programming across culture, commerce, and community.</li>
<li>Built a detailed operational and implementation roadmap to ensure feasibility and sustainability.</li>
<li>Recommended a portfolio of IP cases and global partners to strengthen Tencent\'s cultural ecosystem.</li>
</ul>
<h4>The Impact:</h4>
<p>The strategy provided Tencent with a blueprint for cultural leadership and global positioning. By uniting vision, planning, and execution, our team helped transform ambition into a structured path forward, delivering a scalable model for cultural destinations that blend innovation, entertainment, and enduring economic value.</p>',
                'body_ar' => '<h4>حول:</h4>
<p><strong>العميل:</strong> تينسنت</p>
<p><strong>النطاق:</strong> الاستراتيجية والتخطيط، 2022-2023</p>

<h4>الفرصة:</h4>
<p>سعت تينسنت للاستفادة من قدراتها متعددة القطاعات والموارد المالية لتصميم استراتيجية ثقافية ذات رؤية مستقبلية بإمكانات تنفيذية قوية.</p>',
                'image' => 'tencent-hq.webp',
                'published_at' => '2023-12-31',
                'order' => 5,
            ],
            [
                'slug' => 'king-abdullah-sports-city',
                'title_en' => 'King Abdullah Sports City',
                'title_ar' => 'مدينة الملك عبدالله الرياضية',
                'description_en' => 'The inauguration of the King Abdullah Sports City Stadium in Jeddah was envisioned as a national milestone—a cultural and sporting showcase for 85,000 spectators.',
                'description_ar' => 'تم تصور حفل افتتاح ملعب مدينة الملك عبدالله الرياضية في جدة كمعلم وطني - عرض ثقافي ورياضي لـ 85,000 متفرج.',
                'category_en' => 'Events',
                'category_ar' => 'فعاليات',
                'body_en' => '<h4>About:</h4>
<p><strong>Client:</strong> ECA2 & Comeanddo</p>
<p><strong>Scope:</strong> Strategic Advisory & Program Oversight</p>

<h4>The Opportunity:</h4>
<p>The inauguration of the King Abdullah Sports City Stadium in Jeddah was envisioned as a national milestone—a cultural and sporting showcase for 85,000 spectators within Saudi Arabia\'s most advanced sports complex. The challenge lay in delivering an event of monumental scale under accelerated timelines, requiring flawless orchestration across disciplines.</p>

<h4>Our Contribution:</h4>
<h6>Our team acted as a strategic advisory partner, ensuring that the inauguration was not only a technical feat but also a cultural milestone. We:</h6>
<ul>
<li>Provided program oversight and stakeholder alignment, bridging international production teams with local authorities.</li>
<li>Guided the narrative framing and cultural integration to ensure the event reflected Saudi identity alongside global spectacle.</li>
<li>Established delivery governance, mitigating risks and enabling execution under accelerated timelines.</li>
<li>Supported the coordination of creative, technical, and operational streams to guarantee consistency and impact.</li>
</ul>
<h4>The Impact:</h4>
<p>The ceremony set a new benchmark for large-scale cultural productions in the Kingdom. By embedding cultural relevance into an international-standard show, we helped transform the inauguration into a moment of national pride—demonstrating Saudi Arabia\'s readiness to stage world-class events and paving the way for future mega-productions.</p>',
                'body_ar' => '<h4>حول:</h4>
<p><strong>العميل:</strong> ECA2 و Comeanddo</p>
<p><strong>النطاق:</strong> الاستشارة الاستراتيجية والإشراف على البرنامج</p>

<h4>الفرصة:</h4>
<p>تم تصور حفل افتتاح ملعب مدينة الملك عبدالله الرياضية في جدة كمعلم وطني - عرض ثقافي ورياضي لـ 85,000 متفرج داخل مجمع الرياضة الأكثر تطوراً في المملكة العربية السعودية.</p>',
                'image' => 'king-abdullah-sports-city.jpg',
                'published_at' => '2024-01-01',
                'order' => 6,
            ],
            [
                'slug' => 'rugby-world-cup-2023',
                'title_en' => 'Rugby World Cup 2023 Opening',
                'title_ar' => 'افتتاح كأس العالم للرجبي 2023',
                'description_en' => 'The Rugby World Cup 2023 in France required an opening ceremony that would resonate globally while celebrating national culture.',
                'description_ar' => 'تطلب كأس العالم للرجبي 2023 في فرنسا حفل افتتاح يتردد صداه عالميًا مع الاحتفال بالثقافة الوطنية.',
                'category_en' => 'Sports',
                'category_ar' => 'رياضة',
                'body_en' => '<h4>About:</h4>
<p><strong>Client:</strong> Rugby World Cup 2023 Organizing Committee</p>
<p><strong>Scope:</strong> Program Design, Cultural Strategy & Delivery Oversight | 2023</p>

<h4>The Opportunity:</h4>
<p>The Rugby World Cup 2023 in France required an opening ceremony that would resonate globally while celebrating national culture. The ambition was to showcase French identity through a narrative that combined sport, gastronomy, and art—balancing simplicity with emotional depth. Our team was engaged to ensure the ceremony aligned with strategic objectives, delivered cultural authenticity, and translated seamlessly into a global broadcast experience.</p>

<h4>Our Contribution:</h4>
<h6>We provided strategic advisory and program alignment to transform a creative concept into an operational success:</h6>
<ul>
<li>Partnered with artistic leadership, including Oscar-winning actor Jean Dujardin, to embed cultural storytelling into the show\'s design.</li>
<li>Guided the integration of 40 cultural personalities, 33 professional dancers, acrobats, and 300 volunteers into a coherent performance structure.</li>
<li>Ensured narrative authenticity, grounding the production in "Ovalie"—an imaginative village inspired by 1950s France, symbolizing the nation\'s first victory over the All Blacks.</li>
<li>Oversaw governance, risk management, and delivery oversight, enabling flawless execution under the spotlight of a global audience.</li>
</ul>
<h4>The Impact:</h4>
<p>The ceremony became a landmark of French cultural diplomacy, blending humor, elegance, and generosity in a way that resonated with both local audiences and millions worldwide. By uniting cultural heritage with global spectacle, Toada ensured the Rugby World Cup opened not only with emotion, but with a narrative that strengthened France\'s identity on the international stage.</p>',
                'body_ar' => '<h4>حول:</h4>
<p><strong>العميل:</strong> اللجنة المنظمة لكأس العالم للرجبي 2023</p>
<p><strong>النطاق:</strong> تصميم البرنامج والاستراتيجية الثقافية والإشراف على التنفيذ | 2023</p>

<h4>الفرصة:</h4>
<p>تطلب كأس العالم للرجبي 2023 في فرنسا حفل افتتاح يتردد صداه عالميًا مع الاحتفال بالثقافة الوطنية.</p>',
                'image' => 'rugby-world-cup-2023.jpg',
                'published_at' => '2023-09-01',
                'order' => 7,
            ],
            [
                'slug' => 'fina-swimming-championship',
                'title_en' => 'FINA Swimming World Championship',
                'title_ar' => 'بطولة العالم للسباحة',
                'description_en' => 'The FINA World Swimming Championships is one of the most prestigious aquatic sports events globally, drawing elite athletes, international spectators, and extensive media coverage.',
                'description_ar' => 'بطولة العالم للسباحة هي واحدة من أرقى أحداث الرياضات المائية عالميًا، تجذب النخبة من الرياضيين والمتفرجين الدوليين وتغطية إعلامية واسعة.',
                'category_en' => 'Sports',
                'category_ar' => 'رياضة',
                'body_en' => '<h4>About:</h4>
<p><strong>Client:</strong> FINA World Swimming Championships</p>
<p><strong>Scope:</strong> Strategic Advisory, Program Design & Governance</p>

<h4>The Opportunity:</h4>
<p>The FINA World Swimming Championships is one of the most prestigious aquatic sports events globally, drawing elite athletes, international spectators, and extensive media coverage. The opening ceremony represented more than entertainment—it was a unique opportunity to position the host nation on the world stage, using culture and storytelling to reinforce identity, pride, and global visibility. Our team was engaged to ensure that the ceremony moved beyond production to become a strategic platform for cultural diplomacy and national branding.</p>

<h4>Our Contribution:</h4>
<h6>We provided strategic oversight and consulting guidance that transformed a complex event into a long-term value driver:</h6>
<ul>
<li>Defined the narrative and cultural framework, ensuring the ceremony authentically reflected national identity while appealing to global audiences.</li>
<li>Designed the experience architecture, aligning multimedia, performance, and staging within a cohesive storytelling strategy.</li>
<li>Established governance, risk management, and stakeholder engagement structures, enabling collaboration across international creative and operational partners.</li>
<li>Advised on global broadcast positioning, ensuring the ceremony resonated with millions worldwide and reinforced the nation\'s cultural brand.</li>
</ul>
<h4>The Impact:</h4>
<p>The opening of the FINA World Swimming Championships became a benchmark in international sports ceremonies, blending artistic innovation with cultural resonance. Through our strategic input, the event transcended spectacle to function as a cultural and diplomatic showcase, strengthening the host nation\'s identity, enhancing its reputation for world-class events, and setting new standards for how global championships integrate culture and sport.</p>',
                'body_ar' => '<h4>حول:</h4>
<p><strong>العميل:</strong> بطولة العالم للسباحة</p>
<p><strong>النطاق:</strong> الاستشارة الاستراتيجية وتصميم البرنامج والحوكمة</p>

<h4>الفرصة:</h4>
<p>بطولة العالم للسباحة هي واحدة من أرقى أحداث الرياضات المائية عالميًا.</p>',
                'image' => 'fina-swimming-championship.jpg',
                'published_at' => '2024-01-01',
                'order' => 8,
            ],
            [
                'slug' => 'ramadan-season-2024',
                'title_en' => 'Ramadan Season',
                'title_ar' => 'موسم رمضان',
                'description_en' => 'Ramadan Season represented an opportunity to elevate one of the Kingdom\'s most cherished traditions into a national cultural platform.',
                'description_ar' => 'مثل موسم رمضان فرصة لرفع واحدة من أعرق تقاليد المملكة إلى منصة ثقافية وطنية.',
                'category_en' => 'Ministry of Culture',
                'category_ar' => 'وزارة الثقافة',
                'body_en' => '<h4>About:</h4>
<p><strong>Client:</strong> Ministry of Culture</p>
<p><strong>Scope:</strong> Program Design & PMO</p>

<h4>The Opportunity:</h4>
<p>Ramadan Season represented an opportunity to elevate one of the Kingdom\'s most cherished traditions into a national cultural platform. The aim was not simply to celebrate, but to create an enduring seasonal experience—one that could blend spirituality, heritage, and contemporary storytelling into a unified framework of cultural memory and participation. Our team was engaged to design the program, craft its identity, and oversee its execution at scale.</p>

<h4>Our Contribution:</h4>
<h6>Toada translated vision into a month-long cultural infrastructure:</h6>
<ul>
<li>Developed the seasonal identity, fusing traditional Ramadan motifs with modern storytelling to inspire reflection, nostalgia, and togetherness across all touchpoints.</li>
<li>Designed a holistic program of cultural, educational, and entertainment activations, positioning Ramadan as more than an event—an immersive experience embedded in the national cultural calendar.</li>
<li>Delivered performance management and PMO oversight, ensuring alignment, governance, and flawless execution across stakeholders.</li>
</ul>
<h4>The Impact:</h4>
<p>Ramadan Season has become a model for culturally rooted future-oriented event platforms. By reframing tradition through innovation, we enabled the Ministry of Culture to transform a spiritual season into a sustainable cultural asset—strengthening collective identity, deepening community connection, and advancing Saudi Arabia\'s cultural leadership.</p>',
                'body_ar' => '<h4>حول:</h4>
<p><strong>العميل:</strong> وزارة الثقافة</p>
<p><strong>النطاق:</strong> تصميم البرنامج وإدارة مكتب المشروع</p>

<h4>الفرصة:</h4>
<p>مثل موسم رمضان فرصة لرفع واحدة من أعرق تقاليد المملكة إلى منصة ثقافية وطنية.</p>',
                'image' => 'ramadan-season-2024.jpg',
                'published_at' => '2024-03-01',
                'order' => 9,
            ],
        ];

        foreach ($stories as $index => $storyData) {
            // Copy image
            $sourceImage = $sourceDir . '/' . $storyData['image'];
            $targetImage = $targetDir . '/' . $storyData['image'];
            
            if (File::exists($sourceImage)) {
                File::copy($sourceImage, $targetImage);
                $this->command->info("Copied story image: {$storyData['image']}");
            } else {
                $this->command->warn("Image not found: {$storyData['image']}");
            }

            // Create story
            $story = Story::updateOrCreate(
                ['slug' => $storyData['slug']],
                [
                    'featured_image' => 'content/stories/' . $storyData['image'],
                    'category_en' => $storyData['category_en'],
                    'category_ar' => $storyData['category_ar'],
                    'published_at' => Carbon::parse($storyData['published_at']),
                    'order' => $storyData['order'],
                    'status' => 'published',
                ]
            );

            // Create English translation
            StoryTranslation::updateOrCreate(
                ['story_id' => $story->id, 'language' => 'en'],
                [
                    'title' => $storyData['title_en'],
                    'description' => $storyData['description_en'],
                    'body' => $storyData['body_en'],
                ]
            );

            // Create Arabic translation
            StoryTranslation::updateOrCreate(
                ['story_id' => $story->id, 'language' => 'ar'],
                [
                    'title' => $storyData['title_ar'],
                    'description' => $storyData['description_ar'],
                    'body' => $storyData['body_ar'],
                ]
            );
        }

        $this->command->info('Stories content seeded successfully!');
    }
}
