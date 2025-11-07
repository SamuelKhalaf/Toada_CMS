<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageContent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class IndexPageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure storage directory exists
        $storagePath = storage_path('app/public/content/index');
        if (!File::exists($storagePath)) {
            File::makeDirectory($storagePath, 0755, true);
        }

        // Copy images from public/images/index to storage/app/public/content/index
        $sourceDir = public_path('images/index');
        $targetDir = storage_path('app/public/content/index');
        
        $imagesToCopy = [
            'hero-image3.jpeg',
            'service-card-1.jpeg',
            'service-card-2.jpeg',
            'service-card-3.jpg',
            'triangle-quad-icon.svg',
            'square-stretch-icon.svg',
            'checker-icon.svg',
            'circular-process-svg.svg',
            'team-background.jpeg',
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
        
        // Store content in database for Arabic (using same content for now, you can update later)
        $this->seedArabicContent();
        
        $this->command->info('Index page content seeded successfully!');
    }

    private function seedEnglishContent(): void
    {
        // Hero Section
        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'hero_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'LIFE-CHANGING EXPERIENCES']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'hero_intro_text', 'language' => 'en'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'Toada is a premier consultancy that translates cultural and event visions into human-centric experiences,where culture drives action, identity fuels communities, and impact delivers sustainable growth.']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'hero_image', 'language' => 'en'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/index/hero-image3.jpeg',
            ]
        );

        // Philosophy Section
        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'philosophy_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Our Philosophy', 'highlight' => 'Philosophy']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'philosophy_text', 'language' => 'en'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => '"Toada" rooted in the Arabic language, it signifies thoughtfulness and deliberation, embodying a deeply considered and measured approach.']),
                'image_path' => null,
            ]
        );

        // Services Section
        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'services_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Core Services', 'highlight' => 'Services']),
                'image_path' => null,
            ]
        );

        // Service 1: Strategize
        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'service_1_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Strategize']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'service_1_text', 'language' => 'en'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'Simplifying complexity with clear roadmaps aligning stakeholders, priorities, risks, and opportunities with global benchmarking, market analysis, AI and digital solutions to drive sustainable growth.']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'service_1_image', 'language' => 'en'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/index/service-card-1.jpeg',
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'service_1_icon', 'language' => 'en'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/index/triangle-quad-icon.svg',
            ]
        );

        // Service 2: Conceptualize
        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'service_2_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Conceptualize']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'service_2_text', 'language' => 'en'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'Turning vision into actionable design. Crafting human-centric experiences, commercialization models, and capacity frameworks that empower teams and communities.']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'service_2_image', 'language' => 'en'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/index/service-card-2.jpeg',
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'service_2_icon', 'language' => 'en'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/index/square-stretch-icon.svg',
            ]
        );

        // Service 3: Perform
        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'service_3_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Perform']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'service_3_text', 'language' => 'en'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'Delivering impact with precision. Overseeing execution, monitoring performance through KPIs and AI-driven insights, and ensuring every initiative scales with excellence and lasting value.']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'service_3_image', 'language' => 'en'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/index/service-card-3.jpg',
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'service_3_icon', 'language' => 'en'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/index/checker-icon.svg',
            ]
        );

        // Key Themes Section
        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'themes_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Key Themes And Personae']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'theme_1_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Culture Driven']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'theme_1_text', 'language' => 'en'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'Culture is both the starting point and the destination, shaping identity, elevating perception, and defining how communities connect with the world around them.']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'theme_2_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Human-Centric']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'theme_2_text', 'language' => 'en'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'We put people at the center. That\'s why human-centricity is the lens through which every solution is conceived ensuring relevance, resonance, and real impact for both individuals and communities.']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'theme_3_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Trend-Setter']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'theme_3_text', 'language' => 'en'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'In a world of fleeting moments, Toada sets new benchmarks. We design experiences where culture becomes action, identity builds communities, and impact becomes a catalyst for change.']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'themes_circular_image', 'language' => 'en'],
            [
                'content_type' => 'image',
                'content' => json_encode(['caption' => 'Our DNA']),
                'image_path' => 'content/index/circular-process-svg.svg',
            ]
        );

        // Team Section
        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'team_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Meet the Minds Behind the impact']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'team_background_image', 'language' => 'en'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/index/team-background.jpeg',
            ]
        );

        // Let's Connect Section
        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'connect_text', 'language' => 'en'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'Whether you are shaping strategy, launching initiatives, or building ecosystems. we\'re here to help turn your vision into measurable impact.']),
                'image_path' => null,
            ]
        );
    }

    private function seedArabicContent(): void
    {
        // Hero Section (Arabic translations - you can update these with actual Arabic content)
        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'hero_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'تجارب تغير الحياة']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'hero_intro_text', 'language' => 'ar'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'تودا هي استشارات رائدة تحول رؤى الثقافة والفعاليات إلى تجارب تركز على الإنسان، حيث تقود الثقافة العمل، ويغذي الهوية المجتمعات، ويوفر التأثير نمواً مستداماً.']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'hero_image', 'language' => 'ar'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/index/hero-image3.jpeg',
            ]
        );

        // Philosophy Section
        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'philosophy_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'فلسفتنا', 'highlight' => 'فلسفة']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'philosophy_text', 'language' => 'ar'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => '"تودا" متجذرة في اللغة العربية، تدل على التفكير والتأمل، تجسد نهجاً مدروساً ومقيساً بعمق.']),
                'image_path' => null,
            ]
        );

        // Services Section
        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'services_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'خدماتنا الأساسية', 'highlight' => 'خدمات']),
                'image_path' => null,
            ]
        );

        // Service 1: Strategize
        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'service_1_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'التخطيط الاستراتيجي']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'service_1_text', 'language' => 'ar'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'تبسيط التعقيد بخارطة طريق واضحة تتماشى مع أصحاب المصلحة والأولويات والمخاطر والفرص مع المعايير العالمية وتحليل السوق والحلول الذكية والرقمية لدفع النمو المستدام.']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'service_1_image', 'language' => 'ar'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/index/service-card-1.jpeg',
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'service_1_icon', 'language' => 'ar'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/index/triangle-quad-icon.svg',
            ]
        );

        // Service 2: Conceptualize
        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'service_2_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'التصور']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'service_2_text', 'language' => 'ar'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'تحويل الرؤية إلى تصميم قابل للتنفيذ. صياغة تجارب تركز على الإنسان ونماذج تجارية وإطارات قدرات تمكن الفرق والمجتمعات.']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'service_2_image', 'language' => 'ar'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/index/service-card-2.jpeg',
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'service_2_icon', 'language' => 'ar'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/index/square-stretch-icon.svg',
            ]
        );

        // Service 3: Perform
        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'service_3_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'التنفيذ']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'service_3_text', 'language' => 'ar'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'تقديم التأثير بدقة. الإشراف على التنفيذ ومراقبة الأداء من خلال مؤشرات الأداء الرئيسية والرؤى المدعومة بالذكاء الاصطناعي، وضمان أن كل مبادرة تتوسع بالتميز والقيمة الدائمة.']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'service_3_image', 'language' => 'ar'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/index/service-card-3.jpg',
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'service_3_icon', 'language' => 'ar'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/index/checker-icon.svg',
            ]
        );

        // Key Themes Section
        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'themes_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'المحاور الرئيسية والشخصيات']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'theme_1_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'مدفوع بالثقافة']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'theme_1_text', 'language' => 'ar'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'الثقافة هي نقطة البداية والوجهة، تشكل الهوية وترفع التصور وتحدد كيف تتصل المجتمعات بالعالم من حولها.']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'theme_2_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'مرتكز على الإنسان']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'theme_2_text', 'language' => 'ar'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'نضع الناس في المقدمة. لهذا السبب فإن التركيز على الإنسان هو العدسة التي يتم من خلالها تصور كل حل لضمان الصلة والصدى والتأثير الحقيقي للأفراد والمجتمعات.']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'theme_3_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'رائد الاتجاهات']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'theme_3_text', 'language' => 'ar'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'في عالم من اللحظات العابرة، تضع تودا معايير جديدة. نصمم تجارب تصبح فيها الثقافة عملاً، وتبني الهوية المجتمعات، ويصبح التأثير محفزاً للتغيير.']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'themes_circular_image', 'language' => 'ar'],
            [
                'content_type' => 'image',
                'content' => json_encode(['caption' => 'حمضنا النووي']),
                'image_path' => 'content/index/circular-process-svg.svg',
            ]
        );

        // Team Section
        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'team_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'تعرف على العقول وراء التأثير']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'team_background_image', 'language' => 'ar'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/index/team-background.jpeg',
            ]
        );

        // Let's Connect Section
        PageContent::updateOrCreate(
            ['page_name' => 'index', 'section_key' => 'connect_text', 'language' => 'ar'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'سواء كنت تشكل الاستراتيجية، أو تطلق المبادرات، أو تبني النظم البيئية. نحن هنا لمساعدتك في تحويل رؤيتك إلى تأثير قابل للقياس.']),
                'image_path' => null,
            ]
        );
    }
}
