<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SocialMedia;

class SocialMediaLinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if social media links already exist
        if (SocialMedia::count() > 0) {
            $this->command->info('Social media links already exist. Skipping seeder.');
            return;
        }

        $socialMediaLinks = [
            [
                'platform' => 'Instagram',
                'url' => 'https://www.instagram.com/toada_consulting/',
                'icon_path' => null,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'platform' => 'Twitter',
                'url' => 'https://x.com/ToadaConsulting',
                'icon_path' => null,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'platform' => 'LinkedIn',
                'url' => 'https://www.linkedin.com/company/toada-consulting',
                'icon_path' => null,
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($socialMediaLinks as $link) {
            SocialMedia::create($link);
        }

        $this->command->info('Social media links seeded successfully!');
    }
}
