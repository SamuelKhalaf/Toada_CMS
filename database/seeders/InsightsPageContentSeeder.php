<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageContent;
use Illuminate\Support\Facades\File;

class InsightsPageContentSeeder extends Seeder
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

        // Copy images from public/images/blog to storage/app/public/content/insights
        $sourceDir = public_path('images/blog');
        $targetDir = storage_path('app/public/content/insights');
        
        $imagesToCopy = [
            'blog-hero-background.jpeg',
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
        
        $this->command->info('Insights page content seeded successfully!');
    }

    private function seedEnglishContent(): void
    {
        // Hero Section
        PageContent::updateOrCreate(
            ['page_name' => 'insights', 'section_key' => 'hero_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Insights & Impact']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'insights', 'section_key' => 'hero_description_1', 'language' => 'en'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'Stay ahead with Toada\'s latest updates on culture, creativity, and events. From major initiatives to transformative partnerships, we share how experiences are shaping industries and driving national priorities forward.']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'insights', 'section_key' => 'hero_description_2', 'language' => 'en'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'Our insights go beyond headlines—delivering analysis, foresight, and thought leadership on the cultural and event economy. Here, strategy meets storytelling, giving you a window into the trends, innovations, and ideas redefining impact in Saudi Arabia and beyond.']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'insights', 'section_key' => 'hero_background_image', 'language' => 'en'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/insights/blog-hero-background.jpeg',
            ]
        );

        // Latest Insights Section Title
        PageContent::updateOrCreate(
            ['page_name' => 'insights', 'section_key' => 'latest_insights_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Latest Insights']),
                'image_path' => null,
            ]
        );

        // Let's Connect Section
        PageContent::updateOrCreate(
            ['page_name' => 'insights', 'section_key' => 'connect_text', 'language' => 'en'],
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
            ['page_name' => 'insights', 'section_key' => 'hero_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'الرؤى والتأثير']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'insights', 'section_key' => 'hero_description_1', 'language' => 'ar'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'ابقَ في المقدمة مع آخر تحديثات تودا حول الثقافة والإبداع والفعاليات. من المبادرات الكبرى إلى الشراكات التحويلية، نشارك كيف تشكل التجارب الصناعات وتدفع الأولويات الوطنية إلى الأمام.']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'insights', 'section_key' => 'hero_description_2', 'language' => 'ar'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'رؤانا تتجاوز العناوين الرئيسية—تقديم التحليل والبصيرة والقيادة الفكرية حول الاقتصاد الثقافي وفعاليات. هنا، تلتقي الاستراتيجية بسرد القصص، مما يمنحك نافذة على الاتجاهات والابتكارات والأفكار التي تعيد تعريف التأثير في المملكة العربية السعودية وما بعدها.']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'insights', 'section_key' => 'hero_background_image', 'language' => 'ar'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/insights/blog-hero-background.jpeg',
            ]
        );

        // Latest Insights Section Title
        PageContent::updateOrCreate(
            ['page_name' => 'insights', 'section_key' => 'latest_insights_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'أحدث الرؤى']),
                'image_path' => null,
            ]
        );

        // Let's Connect Section
        PageContent::updateOrCreate(
            ['page_name' => 'insights', 'section_key' => 'connect_text', 'language' => 'ar'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'سواء كنت تشكل الاستراتيجية، أو تطلق المبادرات، أو تبني النظم البيئية. نحن هنا لمساعدتك في تحويل رؤيتك إلى تأثير قابل للقياس.']),
                'image_path' => null,
            ]
        );
    }
}
