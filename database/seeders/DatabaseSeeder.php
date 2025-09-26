<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Introduction;
use App\Models\About;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Resume;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersTableSeeder::class);
        $this->call(SocialMediaSeeder::class);
        $this->call(SystemSettingSeeder::class);
        $this->call(DynamicPageSeeder::class);
        $this->call(FaqSeeder::class);
        
        $this->call(IntroductionSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(SkillSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(ResumeSeeder::class);
    }
}
