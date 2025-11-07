<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageContent;
use Illuminate\Support\Facades\File;

class SuccessStoriesPageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure storage directory exists
        $storagePath = storage_path('app/public/content/success-stories');
        if (!File::exists($storagePath)) {
            File::makeDirectory($storagePath, 0755, true);
        }

        // Copy images from public/images/blog to storage/app/public/content/success-stories
        $sourceDir = public_path('images/blog');
        $targetDir = storage_path('app/public/content/success-stories');
        
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
        
        $this->command->info('Success Stories page content seeded successfully!');
    }

    private function seedEnglishContent(): void
    {
        // Hero Section
        PageContent::updateOrCreate(
            ['page_name' => 'success-stories', 'section_key' => 'hero_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Success Stories', 'highlight' => 'Stories']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'success-stories', 'section_key' => 'hero_description', 'language' => 'en'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'At Toada, success is measured by transformation. Our portfolio demonstrates how cultural and event experiences move beyond celebration and becoming engines of economic growth, cultural exchange, and global influence. Through bold strategies, seamless execution, and creative excellence, we\'ve helped partners reimagine possibilities and deliver impact that lasts. Each story captures how vision, culture, and innovation align to shape industries and position Saudi Arabia on the world stage.']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'success-stories', 'section_key' => 'hero_background_image', 'language' => 'en'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/success-stories/blog-hero-background.jpeg',
            ]
        );

        // Our Success Stories Section Title
        PageContent::updateOrCreate(
            ['page_name' => 'success-stories', 'section_key' => 'stories_section_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Our Success Stories', 'highlight' => 'Success Stories']),
                'image_path' => null,
            ]
        );
    }

    private function seedArabicContent(): void
    {
        // Hero Section
        PageContent::updateOrCreate(
            ['page_name' => 'success-stories', 'section_key' => 'hero_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'قصص النجاح', 'highlight' => 'قصص']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'success-stories', 'section_key' => 'hero_description', 'language' => 'ar'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => 'في تودا، يتم قياس النجاح من خلال التحول. يُظهر محفظتنا كيف تتحرك التجارب الثقافية والفعاليات إلى ما بعد الاحتفال لتصبح محركات للنمو الاقتصادي والتبادل الثقافي والتأثير العالمي. من خلال الاستراتيجيات الجريئة والتنفيذ السلس والتميز الإبداعي، ساعدنا الشركاء على إعادة تصور الاحتمالات وتقديم تأثير دائم. كل قصة تلتقط كيف تتماشى الرؤية والثقافة والابتكار لتشكيل الصناعات ووضع المملكة العربية السعودية على المسرح العالمي.']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'success-stories', 'section_key' => 'hero_background_image', 'language' => 'ar'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/success-stories/blog-hero-background.jpeg',
            ]
        );

        // Our Success Stories Section Title
        PageContent::updateOrCreate(
            ['page_name' => 'success-stories', 'section_key' => 'stories_section_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'قصص نجاحنا', 'highlight' => 'قصص النجاح']),
                'image_path' => null,
            ]
        );
    }
}
