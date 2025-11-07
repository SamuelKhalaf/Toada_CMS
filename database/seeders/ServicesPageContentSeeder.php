<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageContent;
use Illuminate\Support\Facades\File;

class ServicesPageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure storage directory exists
        $storagePath = storage_path('app/public/content/services');
        if (!File::exists($storagePath)) {
            File::makeDirectory($storagePath, 0755, true);
        }

        // Copy images from public/images/solutions to storage/app/public/content/services
        $sourceDir = public_path('images/solutions');
        $targetDir = storage_path('app/public/content/services');
        
        $imagesToCopy = [
            'header-icon.svg',
            'solutions-hero.jpeg',
            'solutions-background.jpg',
            'bar-graph.svg',
            'dot-graph.svg',
            'chart-graph.svg',
        ];

        foreach ($imagesToCopy as $image) {
            $sourcePath = $sourceDir . '/' . $image;
            $targetPath = $targetDir . '/' . $image;
            
            if (File::exists($sourcePath)) {
                File::copy($sourcePath, $targetPath);
                $this->command->info("Copied: {$image}");
            } else {
                $this->command->warn("Image not found: {$image}");
            }
        }

        // Store content in database for English
        $this->seedEnglishContent();
        
        // Store content in database for Arabic
        $this->seedArabicContent();
        
        $this->command->info('Services page content seeded successfully!');
    }

    private function seedEnglishContent(): void
    {
        // Hero Section
        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'hero_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Unified Experience Development Lifecycle', 'highlight' => 'Experience Development']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'header_icon', 'language' => 'en'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/services/header-icon.svg',
            ]
        );

        // Intro Section
        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'intro_text', 'language' => 'en'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'At Toada, we turn vision into structured impact through a unified lifecycle approach. From defining strategy and aligning stakeholders, to conceptualizing transformative experiences, to executing with disciplined precision, we ensure that every cultural and event initiative is future-ready, measurable, and built for sustainable growth. Our lifecycle framework integrates foresight, creativity, and governance, transforming culture into action, identity into community, and impact into lasting change.']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'intro_hero_image', 'language' => 'en'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/services/solutions-hero.jpeg',
            ]
        );

        // Service 1: Strategize
        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_1_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Strategize']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_1_description', 'language' => 'en'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'Simplifying complexity with clear roadmaps aligning stakeholders, priorities, risks, and opportunities with global benchmarking, market analysis, AI and digital solutions to drive sustainable growth.']),
                'image_path' => null,
            ]
        );

        // Service 1 Sub-services
        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_1_sub_1', 'language' => 'en'],
            [
                'content_type' => 'richtext',
                'content' => json_encode([
                    'title' => 'Strategic Direction & Market Intelligence',
                    'description' => "1. Cultural Asset Mapping & Ecosystem Analysis\n2. Event Sector & Market Benchmarking\n3. Stakeholder Mapping (Policymakers, Creatives, Corporates)\n4. Community Architecture & Design\n5. Sector-Specific Trend Analysis & Forecasting\n6. DNA Analysis (Creative Industry Profiling)\n7. Topic Research & Highest-Best-Use Planning"
                ]),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_1_sub_2', 'language' => 'en'],
            [
                'content_type' => 'richtext',
                'content' => json_encode([
                    'title' => 'Strategy Development',
                    'description' => "1. Strategy Formulation & Roadmap Design\n2. Investment Feasibility & Business Case Development\n3. Risk Identification & Mitigation Frameworks\n4. Commercialization Readiness Assessment\n5. Strategic Goals Setting & OKR/KPI Definition\n6. Sustainability Opportunity Mapping & Assess ESG priorities"
                ]),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_1_sub_3', 'language' => 'en'],
            [
                'content_type' => 'richtext',
                'content' => json_encode([
                    'title' => 'Data-Driven & Digital Solutions',
                    'description' => "1. Data Management Strategy\n2. Digital Solutions\n3. Analytics Dashboard Planning\n4. AI, IoT, and digital platforms integration for audience insight, forecasting, and instant decision support"
                ]),
                'image_path' => null,
            ]
        );

        // Service 2: Conceptualize
        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_2_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Conceptualize']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_2_description', 'language' => 'en'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'Turning vision into actionable design crafting human-centric experiences, commercialization models, and capacity frameworks that empower teams and communities.']),
                'image_path' => null,
            ]
        );

        // Service 2 Sub-services
        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_2_sub_1', 'language' => 'en'],
            [
                'content_type' => 'richtext',
                'content' => json_encode([
                    'title' => 'Experience Design Roadmap',
                    'description' => "1. Visitor Journey Design (Events, Cultural Activations & Initiatives)\n2. Content & Product Development (Cultural Goods & IP Assets)\n3. Program & Activation Planning (Events / Cultural Programming)\n4. Communication & Engagement Development\n5. Sustainability-Integrated Design"
                ]),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_2_sub_2', 'language' => 'en'],
            [
                'content_type' => 'richtext',
                'content' => json_encode([
                    'title' => 'Business & Commercialization Models',
                    'description' => "1. IP Commercialization Frameworks\n2. Cultural Goods Producing\n3. Supplier Selection & Partnership Structuring (Events & Cultural sectors)\n4. Licensing & Deal Facilitation Models\n5. Strategic Matchmaking (B2B/B2G/B2C Connections)\n6. Co-Creation Blueprints for IP & Product Development"
                ]),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_2_sub_3', 'language' => 'en'],
            [
                'content_type' => 'richtext',
                'content' => json_encode([
                    'title' => 'Human Capital & Capacity Building',
                    'description' => "1. Skills Mapping & Workforce Strategy (Cultural & Event Sectors)\n2. Training, Talent Onboarding, & Expert Sourcing\n3. Governance Structuring for Event Teams & Cultural Institutions\n4. Organizational Design & Change Management\n5. Knowledge Transfer Programs"
                ]),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_2_sub_4', 'language' => 'en'],
            [
                'content_type' => 'richtext',
                'content' => json_encode([
                    'title' => 'Implementation & Resource Planning',
                    'description' => "1. Implementation Roadmap Development\n2. Scenario Planning & Resource Allocation\n3. Risk Management Planning\n4. RFP & Requirements Development\n5. AI-Enhanced Experience Architecture"
                ]),
                'image_path' => null,
            ]
        );

        // Service 3: Perform
        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_3_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Perform']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_3_description', 'language' => 'en'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'Delivering impact with precision overseeing execution, monitoring performance through KPIs and AI-driven insights, and ensuring every initiative scales with excellence and lasting value.']),
                'image_path' => null,
            ]
        );

        // Service 3 Sub-services
        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_3_sub_1', 'language' => 'en'],
            [
                'content_type' => 'richtext',
                'content' => json_encode([
                    'title' => 'Performance Management & Delivery Oversight',
                    'description' => "1. Dashboard Design & Monitoring\n2. KPI/OKR Tracking & Reporting\n3. PMO Setup for Events & Cultural Programs\n4. Risk Mitigation & Delivery Oversight\n5. Quality Assurance for Execution Phases"
                ]),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_3_sub_2', 'language' => 'en'],
            [
                'content_type' => 'richtext',
                'content' => json_encode([
                    'title' => 'Activation & Program Execution',
                    'description' => "1. End-to-End Event Production Oversight\n2. Cultural Goods Launch & IP Commercialization Execution\n3. Public Programming & Community Activation\n4. Stakeholder Communication & Visibility Management"
                ]),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_3_sub_3', 'language' => 'en'],
            [
                'content_type' => 'richtext',
                'content' => json_encode([
                    'title' => 'Impact Measurement & Continuous Scaling',
                    'description' => "1. Economic, Social & Cultural Impact Assessment\n2. Audience Reach, Engagement & Sectoral Growth Tracking\n3. Sustainability Reporting & ESG metrics, sustainability KPIs tracking\n4. AI-Powered Performance Monitoring to track engagement and optimize resource allocation\n5. Scaling Flagship Programs & Sector Initiatives"
                ]),
                'image_path' => null,
            ]
        );

        // Background Image
        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'background_image', 'language' => 'en'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/services/solutions-background.jpg',
            ]
        );

        // Transformation in Practice Section
        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'transformation_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Transformation in Practice', 'highlight' => 'Transformation']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'transformation_text', 'language' => 'en'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'Partnership with Toada means engaging in a lifecycle of impact—where vision turns into execution with clarity and discipline. Outcomes align with Vision 2030, national priorities, and global benchmarks, ensuring every initiative drives sustainable growth and competitiveness. Beyond strategy, our partnerships deliver operational rigor and cultural depth. With PMO excellence and disciplined execution, we enable seamless delivery while embedding narratives that shape industries, empower creative economy, and position Saudi Arabia at the forefront of global innovation.']),
                'image_path' => null,
            ]
        );

        // Stats Section
        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'stat_1_value', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => '+ 3.7B $']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'stat_1_description', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => "Saudi's event market growth."]),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'stat_1_graph', 'language' => 'en'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/services/bar-graph.svg',
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'stat_2_value', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => '32%']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'stat_2_description', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => "Saudi's creator economy surged."]),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'stat_2_graph', 'language' => 'en'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/services/dot-graph.svg',
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'stat_3_value', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => '3%']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'stat_3_description', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => "Saudi's cultural sector growth."]),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'stat_3_graph', 'language' => 'en'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/services/chart-graph.svg',
            ]
        );

        // FAQ Section
        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'faq_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => "FAQ's"]),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'faq_1_question', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'What industries do you serve?']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'faq_1_answer', 'language' => 'en'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => "We work at the intersection of culture, creativity, and commerce. Partnering with organizations across public and private sectors. From government and cultural institutions to insurance, technology, healthcare, AI and beyond, our expertise adapts to the unique context of each industry.\n\nEvery engagement is tailored: aligning with national programs, embedding cultural intelligence, and delivering measurable outcomes"]),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'faq_2_question', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'How long does it take to see the results?']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'faq_2_answer', 'language' => 'en'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => "Impact begins from the very first engagement. Our workshops are designed to generate immediate clarity, alignment, and actionable insights. From there, results continue to build throughout the project lifecycle. Depending on the scope and complexity, measurable outcomes typically emerge within weeks and evolve over several months, ensuring both quick wins and sustained, long-term value."]),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'faq_3_question', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'What sets your company apart from others?']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'faq_3_answer', 'language' => 'en'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => "Toada is a one-of-a-kind consultancy focused on redefining the future of cultural and event experiences. We go beyond delivery to architect ecosystems where culture drives economic growth, identity strengthens communities, and experiences create lasting transformation.\n\nOur distinction lies in combining strategic rigor, cultural insight, and executional discipline. Every engagement is designed to align with national priorities, achieve operational excellence, and generate enduring value. Positioning Saudi Arabia at the forefront of global innovation and creative leadership."]),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'faq_4_question', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'How do you measure the success of your partnerships?']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'faq_4_answer', 'language' => 'en'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => "At Toada, success is defined by impact that endures. We measure it through strategic, operational, and cultural lenses. Ensuring every initiative advances national priorities, delivers measurable efficiency, and resonates with people and communities.\n\nOur approach blends thoughtful KPIs with qualitative insight. From alignment with Vision 2030 objectives to stakeholder satisfaction and long-term ecosystem value, we track progress throughout the lifecycle. Continuous monitoring, feedback loops, and adaptive governance allow us to refine strategies in real time, ensuring our partners achieve outcomes that are both tangible and transformative."]),
                'image_path' => null,
            ]
        );

        // Let's Connect Section
        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'connect_text', 'language' => 'en'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'Whether you are shaping strategy, launching initiatives, or building ecosystems—we\'re here to help turn your vision into measurable impact.']),
                'image_path' => null,
            ]
        );
    }

    private function seedArabicContent(): void
    {
        // Hero Section
        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'hero_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'دورة حياة تطوير التجربة الموحدة', 'highlight' => 'تطوير التجربة']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'header_icon', 'language' => 'ar'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/services/header-icon.svg',
            ]
        );

        // Intro Section
        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'intro_text', 'language' => 'ar'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'في تودا، نحول الرؤية إلى تأثير منظم من خلال نهج دورة حياة موحدة. من تحديد الاستراتيجية وتنسيق أصحاب المصلحة، إلى تصور التجارب التحويلية، إلى التنفيذ بدقة منضبطة، نضمن أن كل مبادرة ثقافية وفعاليات جاهزة للمستقبل وقابلة للقياس ومبنية للنمو المستدام. إطار عمل دورة الحياة الخاص بنا يدمج البصيرة والإبداع والحوكمة، محولاً الثقافة إلى عمل والهوية إلى مجتمع والتأثير إلى تغيير دائم.']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'intro_hero_image', 'language' => 'ar'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/services/solutions-hero.jpeg',
            ]
        );

        // Service 1: Strategize
        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_1_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'التخطيط الاستراتيجي']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_1_description', 'language' => 'ar'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'تبسيط التعقيد بخارطة طريق واضحة تتماشى مع أصحاب المصلحة والأولويات والمخاطر والفرص مع المعايير العالمية وتحليل السوق والحلول الذكية والرقمية لدفع النمو المستدام.']),
                'image_path' => null,
            ]
        );

        // Service 1 Sub-services (Arabic translations)
        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_1_sub_1', 'language' => 'ar'],
            [
                'content_type' => 'richtext',
                'content' => json_encode([
                    'title' => 'الاتجاه الاستراتيجي وذكاء السوق',
                    'description' => "1. رسم الأصول الثقافية وتحليل النظام البيئي\n2. معايير قطاع الفعاليات والسوق\n3. رسم أصحاب المصلحة (صناع السياسات، المبدعون، الشركات)\n4. هندسة المجتمعات والتصميم\n5. تحليل الاتجاهات الخاصة بالقطاع والتوقعات\n6. تحليل الحمض النووي (توصيف الصناعة الإبداعية)\n7. البحث الموضوعي وتخطيط الاستخدام الأعلى والأفضل"
                ]),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_1_sub_2', 'language' => 'ar'],
            [
                'content_type' => 'richtext',
                'content' => json_encode([
                    'title' => 'تطوير الاستراتيجية',
                    'description' => "1. صياغة الاستراتيجية وتصميم خارطة الطريق\n2. جدوى الاستثمار وتطوير دراسة الجدوى\n3. تحديد المخاطر وأطر التخفيف\n4. تقييم جاهزية التجارية\n5. تحديد الأهداف الاستراتيجية وتعريف OKR/KPI\n6. رسم فرص الاستدامة وتقييم أولويات ESG"
                ]),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_1_sub_3', 'language' => 'ar'],
            [
                'content_type' => 'richtext',
                'content' => json_encode([
                    'title' => 'الحلول القائمة على البيانات والرقمية',
                    'description' => "1. استراتيجية إدارة البيانات\n2. الحلول الرقمية\n3. تخطيط لوحة تحليلات\n4. دمج الذكاء الاصطناعي وإنترنت الأشياء والمنصات الرقمية لرؤى الجمهور والتنبؤ ودعم القرار الفوري"
                ]),
                'image_path' => null,
            ]
        );

        // Service 2: Conceptualize
        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_2_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'التصور']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_2_description', 'language' => 'ar'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'تحويل الرؤية إلى تصميم قابل للتنفيذ وصياغة تجارب تركز على الإنسان ونماذج تجارية وإطارات قدرات تمكن الفرق والمجتمعات.']),
                'image_path' => null,
            ]
        );

        // Service 2 Sub-services (Arabic translations)
        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_2_sub_1', 'language' => 'ar'],
            [
                'content_type' => 'richtext',
                'content' => json_encode([
                    'title' => 'خارطة طريق تصميم التجربة',
                    'description' => "1. تصميم رحلة الزائر (الفعاليات والتفعيلات الثقافية والمبادرات)\n2. تطوير المحتوى والمنتج (السلع الثقافية وأصول الملكية الفكرية)\n3. تخطيط البرنامج والتفعيل (الفعاليات/البرمجة الثقافية)\n4. تطوير التواصل والمشاركة\n5. التصميم المتكامل للاستدامة"
                ]),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_2_sub_2', 'language' => 'ar'],
            [
                'content_type' => 'richtext',
                'content' => json_encode([
                    'title' => 'نماذج الأعمال والتجارية',
                    'description' => "1. أطر تجارية الملكية الفكرية\n2. إنتاج السلع الثقافية\n3. اختيار الموردين وهيكلة الشراكة (قطاعات الفعاليات والثقافة)\n4. نماذج الترخيص وتسهيل الصفقات\n5. المطابقة الاستراتيجية (اتصالات B2B/B2G/B2C)\n6. خطط المشاركة في الإبداع لتطوير الملكية الفكرية والمنتج"
                ]),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_2_sub_3', 'language' => 'ar'],
            [
                'content_type' => 'richtext',
                'content' => json_encode([
                    'title' => 'رأس المال البشري وبناء القدرات',
                    'description' => "1. رسم المهارات واستراتيجية القوى العاملة (قطاعات الثقافة والفعاليات)\n2. التدريب وتوظيف المواهب وتزويد الخبراء\n3. هيكلة الحوكمة لفرق الفعاليات والمؤسسات الثقافية\n4. التصميم التنظيمي وإدارة التغيير\n5. برامج نقل المعرفة"
                ]),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_2_sub_4', 'language' => 'ar'],
            [
                'content_type' => 'richtext',
                'content' => json_encode([
                    'title' => 'التنفيذ وتخطيط الموارد',
                    'description' => "1. تطوير خارطة طريق التنفيذ\n2. تخطيط السيناريو وتخصيص الموارد\n3. تخطيط إدارة المخاطر\n4. تطوير RFP والمتطلبات\n5. هندسة التجربة المحسّنة بالذكاء الاصطناعي"
                ]),
                'image_path' => null,
            ]
        );

        // Service 3: Perform
        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_3_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'التنفيذ']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_3_description', 'language' => 'ar'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'تقديم التأثير بدقة والإشراف على التنفيذ ومراقبة الأداء من خلال مؤشرات الأداء الرئيسية والرؤى المدعومة بالذكاء الاصطناعي، وضمان أن كل مبادرة تتوسع بالتميز والقيمة الدائمة.']),
                'image_path' => null,
            ]
        );

        // Service 3 Sub-services (Arabic translations)
        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_3_sub_1', 'language' => 'ar'],
            [
                'content_type' => 'richtext',
                'content' => json_encode([
                    'title' => 'إدارة الأداء والإشراف على التسليم',
                    'description' => "1. تصميم لوحة التحكم والمراقبة\n2. تتبع KPI/OKR والتقارير\n3. إعداد PMO للفعاليات والبرامج الثقافية\n4. التخفيف من المخاطر والإشراف على التسليم\n5. ضمان الجودة لمراحل التنفيذ"
                ]),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_3_sub_2', 'language' => 'ar'],
            [
                'content_type' => 'richtext',
                'content' => json_encode([
                    'title' => 'التفعيل وتنفيذ البرنامج',
                    'description' => "1. الإشراف الشامل على إنتاج الفعاليات\n2. إطلاق السلع الثقافية وتنفيذ تجارية الملكية الفكرية\n3. البرمجة العامة وتفعيل المجتمع\n4. التواصل مع أصحاب المصلحة وإدارة الرؤية"
                ]),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'service_3_sub_3', 'language' => 'ar'],
            [
                'content_type' => 'richtext',
                'content' => json_encode([
                    'title' => 'قياس التأثير والتوسع المستمر',
                    'description' => "1. تقييم التأثير الاقتصادي والاجتماعي والثقافي\n2. تتبع وصول الجمهور والمشاركة ونمو القطاع\n3. تقارير الاستدامة ومقاييس ESG، تتبع مؤشرات الأداء الرئيسية للاستدامة\n4. مراقبة الأداء المدعومة بالذكاء الاصطناعي لتتبع المشاركة وتحسين تخصيص الموارد\n5. توسيع البرامج الرائدة ومبادرات القطاع"
                ]),
                'image_path' => null,
            ]
        );

        // Background Image
        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'background_image', 'language' => 'ar'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/services/solutions-background.jpg',
            ]
        );

        // Transformation in Practice Section
        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'transformation_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'التحول في الممارسة', 'highlight' => 'التحول']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'transformation_text', 'language' => 'ar'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'الشراكة مع تودا تعني المشاركة في دورة حياة التأثير—حيث تتحول الرؤية إلى تنفيذ بوضوح وانضباط. النتائج تتماشى مع رؤية 2030 والأولويات الوطنية والمعايير العالمية، مما يضمن أن كل مبادرة تدفع النمو المستدام والقدرة التنافسية. إلى جانب الاستراتيجية، تقدم شراكاتنا الصرامة التشغيلية والعمق الثقافي. مع تميز PMO والتنفيذ المنضبط، نمكن التسليم السلس مع تضمين السرد الذي يشكل الصناعات ويمكّن الاقتصاد الإبداعي ويضع المملكة العربية السعودية في مقدمة الابتكار العالمي.']),
                'image_path' => null,
            ]
        );

        // Stats Section
        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'stat_1_value', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => '+ 3.7 مليار $']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'stat_1_description', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'نمو سوق الفعاليات السعودي.']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'stat_1_graph', 'language' => 'ar'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/services/bar-graph.svg',
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'stat_2_value', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => '32%']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'stat_2_description', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'ارتفع اقتصاد المبدعين السعودي.']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'stat_2_graph', 'language' => 'ar'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/services/dot-graph.svg',
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'stat_3_value', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => '3%']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'stat_3_description', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'نمو القطاع الثقافي السعودي.']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'stat_3_graph', 'language' => 'ar'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/services/chart-graph.svg',
            ]
        );

        // FAQ Section
        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'faq_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'الأسئلة الشائعة']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'faq_1_question', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'ما هي الصناعات التي تخدمونها؟']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'faq_1_answer', 'language' => 'ar'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => "نعمل عند تقاطع الثقافة والإبداع والتجارة. نتعاون مع المنظمات عبر القطاعات العامة والخاصة. من الحكومة والمؤسسات الثقافية إلى التأمين والتكنولوجيا والرعاية الصحية والذكاء الاصطناعي وما بعد ذلك، تتكيف خبرتنا مع السياق الفريد لكل صناعة.\n\nكل مشاركة مصممة خصيصاً: تتماشى مع البرامج الوطنية، وتضمين الذكاء الثقافي، وتقديم نتائج قابلة للقياس"]),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'faq_2_question', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'كم من الوقت يستغرق لرؤية النتائج؟']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'faq_2_answer', 'language' => 'ar'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'يبدأ التأثير من المشاركة الأولى. ورش العمل الخاصة بنا مصممة لتوليد الوضوح الفوري والمواءمة والرؤى القابلة للتنفيذ. من هناك، تستمر النتائج في البناء طوال دورة حياة المشروع. اعتماداً على النطاق والتعقيد، تظهر النتائج القابلة للقياس عادةً في غضون أسابيع وتتطور على مدى عدة أشهر، مما يضمن كلاً من الانتصارات السريعة والقيمة المستدامة طويلة الأجل.']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'faq_3_question', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'ما الذي يميز شركتكم عن غيرها؟']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'faq_3_answer', 'language' => 'ar'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => "تودا هي استشارات فريدة من نوعها تركز على إعادة تعريف مستقبل التجارب الثقافية والفعاليات. نتجاوز التسليم لبناء النظم البيئية حيث تقود الثقافة النمو الاقتصادي وتقوي الهوية المجتمعات وتخلق التجارب تحولاً دائمًا.\n\nتميزنا يكمن في الجمع بين الصرامة الاستراتيجية والبصيرة الثقافية والانضباط التنفيذي. كل مشاركة مصممة لتتماشى مع الأولويات الوطنية وتحقيق التميز التشغيلي وتوليد قيمة دائمة. وضع المملكة العربية السعودية في مقدمة الابتكار العالمي والقيادة الإبداعية."]),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'faq_4_question', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'كيف تقيسون نجاح شراكاتكم؟']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'faq_4_answer', 'language' => 'ar'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => "في تودا، يتم تعريف النجاح من خلال التأثير الذي يدوم. نقيسه من خلال العدسات الاستراتيجية والتشغيلية والثقافية. ضمان أن كل مبادرة تقدم الأولويات الوطنية وتقدم الكفاءة القابلة للقياس وتتردد مع الناس والمجتمعات.\n\nنهجنا يمزج مؤشرات الأداء الرئيسية المدروسة مع البصيرة النوعية. من المواءمة مع أهداف رؤية 2030 إلى رضا أصحاب المصلحة وقيمة النظام البيئي طويلة الأجل، نتتبع التقدم طوال دورة الحياة. المراقبة المستمرة وحلقات التغذية الراجعة والحوكمة التكيفية تسمح لنا بتحسين الاستراتيجيات في الوقت الفعلي، مما يضمن أن شركاءنا يحققون نتائج ملموسة وتحويلية."]),
                'image_path' => null,
            ]
        );

        // Let's Connect Section
        PageContent::updateOrCreate(
            ['page_name' => 'services', 'section_key' => 'connect_text', 'language' => 'ar'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'سواء كنت تشكل الاستراتيجية، أو تطلق المبادرات، أو تبني النظم البيئية. نحن هنا لمساعدتك في تحويل رؤيتك إلى تأثير قابل للقياس.']),
                'image_path' => null,
            ]
        );
    }
}
