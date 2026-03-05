<?php

use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;

use Inertia\Inertia;

Route::get('/', [HomePageController::class, 'index']);
