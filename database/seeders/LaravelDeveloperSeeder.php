<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Introduction;
use App\Models\About;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Resume;

class LaravelDeveloperSeeder extends Seeder
{
    public function run(): void
    {
        // Introduction
        Introduction::truncate();
        Introduction::create([
            'title' => 'Hello, I’m',
            'subtitle' => 'Fahim',
            'description' => 'Laravel Developer | Backend Specialist | Problem Solver'
        ]);

        // About
        About::truncate();
        About::create([
            'image' => 'backend/images/fahim.jpg',
            'description' => '<p>A Full-Stack Laravel Developer experienced in building scalable web applications and APIs using PHP, Laravel, and MySQL. Skilled in third-party API integrations (Stripe, Paypal, Razorpay, Perfect Corp AI, Twilio, Google Meet, Map, Calendar), authentication (JWT, Breeze), and deploying on cPanel with CI/CD. Passionate about writing clean, optimized, and maintainable code. I love coding, problem-solving, and learning new technologies.</p>',
        ]);

        // Resume
        Resume::truncate();
        Resume::create([
            'title' => 'My Resume',
            'sub_title' => 'With 1.5+ years of experience in Laravel development, I have worked on numerous projects, ranging from small businesses to large-scale enterprise applications.',
            'file' => 'backend/resume/resume.pdf',
            'updated_year' => now()->year,
        ]);

        // Skills
        Skill::truncate();
        Skill::insert([
            ['title' => 'PHP (OOP)'],
            ['title' => 'Laravel'],
            ['title' => 'RESTful APIs'],
            ['title' => 'AI API Integration (OPEN AI / Gemini)'],
            ['title' => 'Authentication (JWT / Breeze / Sanctum / Passport)'],
            ['title' => 'Database (MySQL / SQLite / MongoDB / PostgreSQL)'],
            ['title' => 'JavaScript'],
            ['title' => 'Bootstrap'],
            ['title' => 'TailwindCSS'],
            ['title' => 'Git & GitHub'],
            ['title' => 'cPanel'],
        ]);

        // Projects
        Project::truncate();
        Project::create([
            'title' => 'Online Booking Platform & POS',
            'description' => '<p>Fresha is a leading online booking platform and point-of-sale (POS) software designed for salons, spas, and wellness businesses. It helps service providers manage appointments, streamline client booking, handle payments, and track business operations—all from a single user-friendly platform.</p>',
            'link' => 'https://waleed-bin-salmaa.netlify.app/',
            'image' => 'backend/images/projects/fresha.png',
        ]);

        Project::create([
            'title' => 'Tutor–Student Lesson Sharing Platform',
            'description' => '<p>Full system with onboarding, tutor/student/admin dashboards, Google Meet & Calendar API integration, Stripe payments, and real-time chat system. Built with Laravel, React.js, MySQL, Stripe, WebSockets.</p>',
            'link' => 'https://richardsteve756-mu.vercel.app/',
            'image' => 'backend/images/projects/tutor-platform.jpg',
        ]);

        Project::create([
            'title' => 'Comedy Sharing Landing Page',
            'description' => '<p>Welcome to the Comedy Sharing Landing Page, the ultimate destination for comedy lovers! Provided a fully customized admin dashboard built using Laravel 12 for managing dynamic content.</p>',
            'link' => 'https://camedymic.net/',
            'image' => 'backend/images/projects/comedy_landing.png',
        ]);

        Project::create([
            'title' => 'Food Delivery App Backend',
            'description' => '<p>Multi-role platform (Admin, Customers, Delivery Boys) with real-time order tracking, Google Map API distance-based charges, and Twilio OTP verification. Fully customized admin dashboard for managing delivery assigning, order tracking, warehouse managing, and lots of cool features. Tech: Laravel, Flutter, MySQL, Pusher.</p>',
            'link' => 'https://rapiddelivery07.softvencefsd.xyz/',
            'image' => 'backend/images/projects/rapiddelivery.png',
        ]);
    }
}
