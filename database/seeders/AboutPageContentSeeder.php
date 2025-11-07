<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageContent;
use Illuminate\Support\Facades\File;

class AboutPageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure storage directory exists
        $storagePath = storage_path('app/public/content/about');
        if (!File::exists($storagePath)) {
            File::makeDirectory($storagePath, 0755, true);
        }

        // Copy images from public/images/about to storage/app/public/content/about
        $sourceDir = public_path('images/about');
        $targetDir = storage_path('app/public/content/about');
        
        $imagesToCopy = [
            'about-hero-background.jpeg',
            'about-section-image.jpeg',
            'values-image-1.jpg',
            'values-image-2.jpg',
            'values-image-3.jpeg',
            'values-image-4.jpeg',
            'shape-1.svg',
            'shape-2.svg',
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
        
        $this->command->info('About page content seeded successfully!');
    }

    private function seedEnglishContent(): void
    {
        // Hero Section
        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'hero_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Our Story and Values', 'highlight' => ['Story', 'Values']]),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'hero_background_image', 'language' => 'en'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/about/about-hero-background.jpeg',
            ]
        );

        // Who We Are Section
        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'who_we_are_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Who We Are', 'highlight' => 'We Are']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'who_we_are_text', 'language' => 'en'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => "Toada is a Saudi-based boutique consultancy dedicated to designing and delivering life changing \"cultural and event\" experiences.\n\nWe operate where culture, creativity, and commerce intersect partnering with governments, corporates, and communities to initiate meaningful changes through the power of human-centric experiences.\n\nAt Toada, we define experience as more than an event or a moment. For us, experience is a curated journey, a fusion of narrative, environment, interaction, and impact. Every experience we design is a strategic tool for cultural storytelling, economic growth, and societal connection."]),
                'image_path' => null,
            ]
        );

        // Our Vision Section
        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'vision_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Our Vision', 'highlight' => 'Vision']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'vision_text', 'language' => 'en'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'We envision a future where cultural assets and event ecosystems move beyond isolated projects to become interconnected engines of economic diversification, global positioning, and shared prosperity.']),
                'image_path' => null,
            ]
        );

        // Our Mission Section
        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'mission_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Our Mission', 'highlight' => 'Mission']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'mission_text', 'language' => 'en'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'We combine strategic advisory excellence with deep cultural insight and operational expertise to design actionable frameworks that transform national vision into sustainable outcomes. By building governance, capacity, and resilient ecosystems, we enable long-term value creation and strengthen global competitiveness.']),
                'image_path' => null,
            ]
        );

        // Section Image
        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'section_image', 'language' => 'en'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/about/about-section-image.jpeg',
            ]
        );

        // Our Values Section
        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'values_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Our Values']),
                'image_path' => null,
            ]
        );

        // Value 1: Humanize
        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'value_1_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Humanize', 'number' => '01']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'value_1_image', 'language' => 'en'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/about/values-image-1.jpg',
            ]
        );

        // Value 2: Collaborate
        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'value_2_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Collaborate', 'number' => '02']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'value_2_image', 'language' => 'en'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/about/values-image-3.jpeg',
            ]
        );

        // Value 3: Innovate
        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'value_3_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Innovate', 'number' => '03']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'value_3_image', 'language' => 'en'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/about/values-image-2.jpg',
            ]
        );

        // Value 4: Sustain
        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'value_4_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Sustain', 'number' => '04']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'value_4_image', 'language' => 'en'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/about/values-image-4.jpeg',
            ]
        );

        // Shape Icons
        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'shape_1_icon', 'language' => 'en'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/about/shape-1.svg',
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'shape_2_icon', 'language' => 'en'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/about/shape-2.svg',
            ]
        );

        // Let's Connect Section
        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'connect_text', 'language' => 'en'],
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
            ['page_name' => 'about', 'section_key' => 'hero_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'قصتنا وقيمنا', 'highlight' => ['قصة', 'قيم']]),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'hero_background_image', 'language' => 'ar'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/about/about-hero-background.jpeg',
            ]
        );

        // Who We Are Section
        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'who_we_are_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'من نحن', 'highlight' => 'نحن']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'who_we_are_text', 'language' => 'ar'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => "تودا هي استشارات سعودية متخصصة مكرسة لتصميم وتقديم تجارب \"ثقافية وفعاليات\" تغير الحياة.\n\nنعمل حيث تتقاطع الثقافة والإبداع والتجارة، متعاونين مع الحكومات والشركات والمجتمعات لبدء تغييرات ذات معنى من خلال قوة التجارب التي تركز على الإنسان.\n\nفي تودا، نعرّف التجربة بأنها أكثر من فعالية أو لحظة. بالنسبة لنا، التجربة هي رحلة منظمة، مزيج من السرد والبيئة والتفاعل والتأثير. كل تجربة نصممها هي أداة استراتيجية لسرد القصص الثقافية والنمو الاقتصادي والاتصال المجتمعي."]),
                'image_path' => null,
            ]
        );

        // Our Vision Section
        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'vision_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'رؤيتنا', 'highlight' => 'رؤية']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'vision_text', 'language' => 'ar'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'نتصور مستقبلاً حيث تتحرك الأصول الثقافية ونظم الفعاليات البيئية إلى ما بعد المشاريع المعزولة لتصبح محركات مترابطة للتنويع الاقتصادي والموقع العالمي والازدهار المشترك.']),
                'image_path' => null,
            ]
        );

        // Our Mission Section
        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'mission_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'مهمتنا', 'highlight' => 'مهمة']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'mission_text', 'language' => 'ar'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'نجمع بين التميز الاستشاري الاستراتيجي مع البصيرة الثقافية العميقة والخبرة التشغيلية لتصميم أطر قابلة للتنفيذ تحول الرؤية الوطنية إلى نتائج مستدامة. من خلال بناء الحوكمة والقدرة والنظم البيئية المرنة، نمكن إنشاء قيمة طويلة الأجل ونقوي القدرة التنافسية العالمية.']),
                'image_path' => null,
            ]
        );

        // Section Image
        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'section_image', 'language' => 'ar'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/about/about-section-image.jpeg',
            ]
        );

        // Our Values Section
        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'values_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'قيمنا']),
                'image_path' => null,
            ]
        );

        // Value 1: Humanize
        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'value_1_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'إنسانية', 'number' => '01']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'value_1_image', 'language' => 'ar'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/about/values-image-1.jpg',
            ]
        );

        // Value 2: Collaborate
        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'value_2_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'تعاون', 'number' => '02']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'value_2_image', 'language' => 'ar'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/about/values-image-3.jpeg',
            ]
        );

        // Value 3: Innovate
        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'value_3_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'ابتكار', 'number' => '03']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'value_3_image', 'language' => 'ar'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/about/values-image-2.jpg',
            ]
        );

        // Value 4: Sustain
        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'value_4_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'استدامة', 'number' => '04']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'value_4_image', 'language' => 'ar'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/about/values-image-4.jpeg',
            ]
        );

        // Shape Icons
        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'shape_1_icon', 'language' => 'ar'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/about/shape-1.svg',
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'shape_2_icon', 'language' => 'ar'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/about/shape-2.svg',
            ]
        );

        // Let's Connect Section
        PageContent::updateOrCreate(
            ['page_name' => 'about', 'section_key' => 'connect_text', 'language' => 'ar'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'سواء كنت تشكل الاستراتيجية، أو تطلق المبادرات، أو تبني النظم البيئية. نحن هنا لمساعدتك في تحويل رؤيتك إلى تأثير قابل للقياس.']),
                'image_path' => null,
            ]
        );
    }
}
