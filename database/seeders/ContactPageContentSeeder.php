<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageContent;
use Illuminate\Support\Facades\File;

class ContactPageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure storage directory exists
        $storagePath = storage_path('app/public/content/contact');
        if (!File::exists($storagePath)) {
            File::makeDirectory($storagePath, 0755, true);
        }

        // Copy images from public/images/contact to storage/app/public/content/contact
        $sourceDir = public_path('images/contact');
        $targetDir = storage_path('app/public/content/contact');
        
        $imagesToCopy = [
            'contact-hero-image.jpeg',
            'circle-text.svg',
            'contact-form-image.webp',
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
        
        $this->command->info('Contact page content seeded successfully!');
    }

    private function seedEnglishContent(): void
    {
        // Hero Section
        PageContent::updateOrCreate(
            ['page_name' => 'contact', 'section_key' => 'hero_title', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Connect With Us', 'highlight' => 'Connect']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'contact', 'section_key' => 'hero_image', 'language' => 'en'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/contact/contact-hero-image.jpeg',
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'contact', 'section_key' => 'circle_text_icon', 'language' => 'en'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/contact/circle-text.svg',
            ]
        );

        // Contact Form Image
        PageContent::updateOrCreate(
            ['page_name' => 'contact', 'section_key' => 'contact_form_image', 'language' => 'en'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/contact/contact-form-image.webp',
            ]
        );

        // Contact Details
        PageContent::updateOrCreate(
            ['page_name' => 'contact', 'section_key' => 'contact_label', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Contact', 'highlight' => 'Contact']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'contact', 'section_key' => 'contact_email', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'hello@toada.consulting']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'contact', 'section_key' => 'careers_label', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Careers', 'highlight' => 'Careers']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'contact', 'section_key' => 'careers_email', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'careers@toada.consulting']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'contact', 'section_key' => 'business_hours_label', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Business Hours', 'highlight' => 'Business Hours']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'contact', 'section_key' => 'business_hours_text', 'language' => 'en'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => "Sunday - Thursday\n9am - 5pm"]),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'contact', 'section_key' => 'social_media_label', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Social Media', 'highlight' => 'Social Media']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'contact', 'section_key' => 'your_info_label', 'language' => 'en'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'Your Info', 'highlight' => 'Your Info']),
                'image_path' => null,
            ]
        );
    }

    private function seedArabicContent(): void
    {
        // Hero Section
        PageContent::updateOrCreate(
            ['page_name' => 'contact', 'section_key' => 'hero_title', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'تواصل معنا', 'highlight' => 'تواصل']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'contact', 'section_key' => 'hero_image', 'language' => 'ar'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/contact/contact-hero-image.jpeg',
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'contact', 'section_key' => 'circle_text_icon', 'language' => 'ar'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/contact/circle-text.svg',
            ]
        );

        // Contact Form Image
        PageContent::updateOrCreate(
            ['page_name' => 'contact', 'section_key' => 'contact_form_image', 'language' => 'ar'],
            [
                'content_type' => 'image',
                'content' => null,
                'image_path' => 'content/contact/contact-form-image.webp',
            ]
        );

        // Contact Details
        PageContent::updateOrCreate(
            ['page_name' => 'contact', 'section_key' => 'contact_label', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'اتصل', 'highlight' => 'اتصل']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'contact', 'section_key' => 'contact_email', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'hello@toada.consulting']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'contact', 'section_key' => 'careers_label', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'الوظائف', 'highlight' => 'الوظائف']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'contact', 'section_key' => 'careers_email', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'careers@toada.consulting']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'contact', 'section_key' => 'business_hours_label', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'ساعات العمل', 'highlight' => 'ساعات العمل']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'contact', 'section_key' => 'business_hours_text', 'language' => 'ar'],
            [
                'content_type' => 'textarea',
                'content' => json_encode(['text' => "الأحد - الخميس\n9 صباحاً - 5 مساءً"]),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'contact', 'section_key' => 'social_media_label', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'وسائل التواصل الاجتماعي', 'highlight' => 'وسائل التواصل الاجتماعي']),
                'image_path' => null,
            ]
        );

        PageContent::updateOrCreate(
            ['page_name' => 'contact', 'section_key' => 'your_info_label', 'language' => 'ar'],
            [
                'content_type' => 'text',
                'content' => json_encode(['text' => 'معلوماتك', 'highlight' => 'معلوماتك']),
                'image_path' => null,
            ]
        );
    }
}
