<?php

use App\Http\Controllers\Web\Backend\DashboardController;
use App\Http\Controllers\Web\Backend\FaqController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Backend\Portfolio\IntroductionController;
use App\Http\Controllers\Web\Backend\Portfolio\AboutController;
use App\Http\Controllers\Web\Backend\Portfolio\SkillController;
use App\Http\Controllers\Web\Backend\Portfolio\ProjectController;
use App\Http\Controllers\Web\Backend\Portfolio\ResumeController;


Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

//FAQ Routes
Route::controller(FaqController::class)->group(function () {
    Route::get('/faqs', 'index')->name('admin.faqs.index');
    Route::get('/faqs/create', 'create')->name('admin.faqs.create');
    Route::post('/faqs/store', 'store')->name('admin.faqs.store');
    Route::get('/faqs/edit/{id}', 'edit')->name('admin.faqs.edit');
    Route::post('/faqs/update/{id}', 'update')->name('admin.faqs.update');
    Route::post('/faqs/status/{id}', 'status')->name('admin.faqs.status');
    Route::post('/faqs/destroy/{id}', 'destroy')->name('admin.faqs.destroy');
});

Route::controller(IntroductionController::class)->group(function () {
    Route::get('/portfolio/introduction', 'index')->name('introduction.index');
    Route::post('/portfolio/introduction', 'update')->name('introduction.update');
});

Route::prefix('portfolio')->group(function () {
    Route::get('/about', [AboutController::class, 'edit'])->name('portfolio.about.edit');
    Route::post('/about/update', [AboutController::class, 'update'])->name('portfolio.about.update');
});

Route::prefix('portfolio')->group(function () {
    Route::get('/skill', [SkillController::class, 'index'])->name('portfolio.skill.index');
    Route::get('/skill/create', [SkillController::class, 'create'])->name('portfolio.skill.create');
    Route::post('/skill/store', [SkillController::class, 'store'])->name('portfolio.skill.store');
    Route::get('/skill/edit/{id}', [SkillController::class, 'edit'])->name('portfolio.skill.edit');
    Route::post('/skill/update/{id}', [SkillController::class, 'update'])->name('portfolio.skill.update');
    Route::get('/skill/status/{id}', [SkillController::class, 'status'])->name('portfolio.skill.status');
    Route::delete('/skill/destroy/{id}', [SkillController::class, 'destroy'])->name('portfolio.skill.destroy');
});

Route::controller(ProjectController::class)->group(function () {
    Route::get('/project', 'index')->name('project.index');
    Route::get('/project/create', 'create')->name('project.create');
    Route::post('/project/store', 'store')->name('project.store');
    Route::get('/project/edit/{id}', 'edit')->name('project.edit');
    Route::post('/project/update/{id}', 'update')->name('project.update');
    Route::get('/project/status/{id}', 'status')->name('project.status');
    Route::delete('/project/destroy/{id}', 'destroy')->name('project.destroy');
});

Route::controller(ResumeController::class)->group(function () {
    Route::get('/resume/edit', 'edit')->name('resume.edit');
    Route::post('/resume/update', 'update')->name('resume.update');
});