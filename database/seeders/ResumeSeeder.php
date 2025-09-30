<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Resume;

class ResumeSeeder extends Seeder
{
    public function run()
    {
        Resume::create([
            'title' => 'My Resume',
            'sub_title' => 'With 1.5+ years of experience in Laravel development, I have worked on numerous projects, ranging from small businesses to large-scale enterprise applications.',
            'file' => 'backend/resume/resume.pdf',
            'updated_year' => now(),
        ]);
    }
}
