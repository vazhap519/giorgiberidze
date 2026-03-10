<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

use Inertia\Inertia;

Route::get('/', [HomePageController::class, 'index'])
    ->name('home');


Route::post('/contact-send', [ContactController::class, 'sendContact']);
Route::post('/service-request-send', [ContactController::class, 'sendService']);
Route::get('/projects/{project}', [ProjectController::class, 'show'])
    ->name('projects.show');
