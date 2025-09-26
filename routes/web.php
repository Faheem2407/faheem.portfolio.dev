<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Frontend\HomeController;
use App\Http\Controllers\Web\Backend\ContactController;


//! Route for Landing Page
Route::get('/', [HomeController::class, 'index'])->name('welcome');

//! Route for contact form
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');



require __DIR__.'/auth.php';
