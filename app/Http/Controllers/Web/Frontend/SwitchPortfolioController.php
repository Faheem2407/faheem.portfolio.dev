<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Artisan;
use App\Traits\ApiResponse;

class SwitchPortfolioController extends Controller
{
    use ApiResponse;

    public function switchToLaravel(): JsonResponse
    {
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed', ['--class' => 'LaravelDeveloperSeeder']);
        Artisan::call('optimize:clear');

        return $this->success([], 'Switched to Laravel Developer Portfolio!', 200);
    }

    public function switchToSoftware(): JsonResponse
    {
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed', ['--class' => 'SoftwareEngineerSeeder']);
        Artisan::call('optimize:clear');

        return $this->success([], 'Switched to Software Engineer Portfolio!', 200);
    }
}
