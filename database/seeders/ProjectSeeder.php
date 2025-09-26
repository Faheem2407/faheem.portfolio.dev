<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        Project::create([
            'title' => 'Online Booking Platform & POS',
            'description' => '<p>Fresha is a leading online booking platform and point-of-sale (POS) software designed for salons, spas, and wellness businesses. It helps service providers manage appointments, streamline client booking, handle payments, and track business operations—all from a single user-friendly platform. Fresha offers features like customizable booking pages, automated reminders, and integrated marketing tools, aiming to improve the customer experience and optimize business management for beauty and wellness professionals.</p>',
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
            'description' => '<p>Welcome to the Comedy Sharing Landing Page, the ultimate destination for comedy lovers! Whether you\'re a budding comedian or simply someone looking to enjoy some laughs, this platform brings together a community where comedy meets convenience. The landing page is designed to offer a smooth, entertaining experience with easy access to top-tier comedy content. Provided a fully customized admin dashboard built using laravel 12 for managing dynamic content.</p>',
            'link' => 'https://camedymic.net/',
            'image' => 'backend/images/projects/comedy_landing.png',
        ]);

        Project::create([
            'title' => 'Food Delivery App Backend',
            'description' => '<p>Multi-role platform (Admin, Customers, Delivery Boys) with real-time order tracking, Google Map API distance-based charges, and Twilio OTP verification.Fully customized admin dashboard for managing delivery assigning, order tracking, warehouse managing and lots of cool features. Tech: Laravel, Flutter, MySQL, Pusher.</p>',
            'link' => 'https://rapiddelivery07.softvencefsd.xyz/',
            'image' => 'backend/images/projects/rapiddelivery.png',
        ]);
    }
}
