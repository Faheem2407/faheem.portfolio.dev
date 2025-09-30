<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    public function run()
    {
        Skill::create(['title' => 'PHP(OOP)']);
        Skill::create(['title' => 'Laravel']);
        Skill::create(['title' => 'RESTful APIs']);
        Skill::create(['title' => 'AI API Integration(OPEN AI / Gemini)']);
        Skill::create(['title' => 'Authentication (JWT / Breeze / Sanctum / Passport)']);
        Skill::create(['title' => 'Database (MySQL / SQLite / MongoDB / PostgreSQL)']);
        Skill::create(['title' => 'JavaScript']);
        Skill::create(['title' => 'Bootstrap']);
        Skill::create(['title' => 'TailwindCSS']);
        Skill::create(['title' => 'Git & GitHub']);
        Skill::create(['title' => 'cPanel']);
    }
}
