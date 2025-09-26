<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    public function run()
    {
        Skill::create(['title' => 'Laravel']);
        Skill::create(['title' => 'PHP']);
        Skill::create(['title' => 'JavaScript']);
        Skill::create(['title' => 'Vue.js']);
        Skill::create(['title' => 'HTML/CSS']);
        Skill::create(['title' => 'MySQL']);
    }
}
