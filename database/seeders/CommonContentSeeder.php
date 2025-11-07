<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageContent;
use Illuminate\Support\Facades\Storage;

class CommonContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Store the "Let's Connect" section content as a common/shared section
        // This content will be used across all pages
        
        $contentEn = [
            'text' => 'Whether you are shaping strategy, launching initiatives, or building ecosystems—we\'re here to help turn your vision into measurable impact.'
        ];
        
        $contentAr = [
            'text' => 'سواء كنت تصوغ الاستراتيجية، أو تطلق المبادرات، أو تبني الأنظمة البيئية—نحن هنا لمساعدتك في تحويل رؤيتك إلى تأثير قابل للقياس.'
        ];
        
        // English version
        PageContent::updateOrCreate(
            [
                'page_name' => 'common',
                'section_key' => 'lets_connect_text',
                'language' => 'en',
            ],
            [
                'content_type' => 'textarea',
                'content' => json_encode($contentEn),
            ]
        );
        
        // Arabic version
        PageContent::updateOrCreate(
            [
                'page_name' => 'common',
                'section_key' => 'lets_connect_text',
                'language' => 'ar',
            ],
            [
                'content_type' => 'textarea',
                'content' => json_encode($contentAr),
            ]
        );
        
        $this->command->info('Common content (Let\'s Connect) seeded successfully!');
    }
}

