<?php


use App\Http\Controllers\Web\Frontend\ResetController;
use App\Http\Controllers\Web\Frontend\PageController;
use App\Http\Controllers\Web\Frontend\SwitchPortfolioController;
use Illuminate\Support\Facades\Route;

//! Route for Reset Database and Optimize Clear
Route::get('/reset', [ResetController::class, 'RunMigrations'])->name('reset');
Route::get('/composer', [ResetController::class, 'composer'])->name('composer');
Route::get('/migrate', [ResetController::class, 'migrate'])->name('migrate');
Route::get('/storage', [ResetController::class, 'storage'])->name('storage');

//Dynamic Page
Route::get('/page/privacy-and-policy', [PageController::class, 'privacyAndPolicy'])->name('dynamicPage.privacyAndPolicy');


// Portfolio Switch Routes
Route::get('/switch/laravel', [SwitchPortfolioController::class, 'switchToLaravel'])->name('switch.laravel');
Route::get('/switch/software', [SwitchPortfolioController::class, 'switchToSoftware'])->name('switch.software');
