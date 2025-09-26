<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Introduction;

class IntroductionSeeder extends Seeder
{
    public function run()
    {
        Introduction::create([
            'title' => 'Hello, I’m',
            'subtitle' => 'Fahim',
        ]);
    }
}
