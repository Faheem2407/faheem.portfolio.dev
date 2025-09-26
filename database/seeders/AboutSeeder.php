<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    public function run()
    {
        About::create([
            'image' => 'backend/images/profile.jpeg',
            'description' => '<p>A Full-Stack Laravel Developer experienced in building scalable web applications and APIs using PHP, Laravel, and MySQL. Skilled in third-party API integrations (Stripe, Paypal, Razorpay, Perfect Corp AI, Twilio, Google Meet, Map, Calendar), authentication (JWT, Breeze), and deploying on cPanel with CI/CD. Passionate about writing clean, optimized, and maintainable code.I love coding, problem-solving, and learning new technologies.</p>',
        ]);
    }
}
