<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if project already exists
        $existingProject = Project::where('slug', 'made-in-saudi-2025')->first();
        
        if ($existingProject) {
            $this->command->info('Project "Made in Saudi 2025" already exists. Skipping...');
            return;
        }

        // Create the project
        $project = Project::create([
            'slug' => 'made-in-saudi-2025',
            'featured_image' => null, // Using public image path
            'date_range' => 'December 15-17, 2025',
            'location_text' => 'Malham - Al-Riyadh, Saudi Arabia',
            'location_url' => 'https://www.google.com/maps/@25.2512178,46.3776644,8080m/data=!3m1!1e3?entry=ttu&g_ep=EgoyMDI1MTIwMS4wIKXMDSoASAFQAw%3D%3D',
            'register_url_ar' => 'https://toadacompany.systeme.io/f81feee3-4083ba42',
            'register_url_en' => 'https://toadacompany.systeme.io/f81feee3',
            'tags' => ['Event', 'Saudi Arabia', '2025'],
            'published_at' => now(),
            'order' => 0,
            'status' => 'published',
        ]);

        // Create English translation
        ProjectTranslation::create([
            'project_id' => $project->id,
            'language' => 'en',
            'title' => "Join Us at Made in Saudi 2025!\nToada x BOP - Empowering Saudi Arabia's Creative Economy",
            'description' => "We're excited to announce our participation at Made in Saudi, where Toada/BOP will present a comprehensive creative-economy program designed to inspire, educate, and activate the next generation of Saudi creators and cultural entrepreneurs.\n\nOur program connects global thought leadership with hands-on activation, positioning creative professions as a core engine in the Kingdom's evolving creative economy - fully aligned with the Cultural Development Fund's (CDF) mandate to enable sustainable cultural production and market expansion.",
            'badge_text' => 'Upcoming Event',
        ]);

        // Create Arabic translation
        ProjectTranslation::create([
            'project_id' => $project->id,
            'language' => 'ar',
            'title' => 'نص تجريبي لوريم إيبسوم',
            'description' => 'نص تجريبي لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي، عندما أخذت طابعة غير معروفة لوحاً من النوع وخلطته لصنع كتاب عينة.',
            'badge_text' => 'فعالية قادمة',
        ]);

        $this->command->info('Project "Made in Saudi 2025" seeded successfully!');
    }
}
