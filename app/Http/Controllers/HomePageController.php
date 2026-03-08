<?php

namespace App\Http\Controllers;

use App\Models\CarouselSlide;
use App\Models\Product;
use App\Models\Service;
use App\Models\Project;
use App\Models\AboutSection;
use Inertia\Inertia;

class HomePageController extends Controller
{
    // public function index()
    // {
    //     $slides = CarouselSlide::query()
    //         ->where('is_active', true)
    //         ->orderBy('sort_order')
    //         ->get()
    //         ->append(['background_url','image_url']);

    //     $products = Product::query()
    //         ->latest()
    //         ->get()
    //         ->append(['image_url']);

    //     $services = Service::query()
    //         ->latest()
    //         ->get()
    //         ->append(['image_url']);

    //     $projects = Project::query()
    //         ->where('is_active', true)
    //         ->latest()
    //         ->get()
    //         ->append(['cover_image']);

    //     return Inertia::render('Home', [
    //         'slides' => $slides,
    //         'products' => $products,
    //         'services' => $services,
    //         'projects' => $projects
    //     ]);
    // }

    public function index()
{
    $slides = CarouselSlide::query()
        ->where('is_active', true)
        ->orderBy('sort_order')
        ->get()
        ->append(['background_url','image_url']);

    $products = Product::query()
        ->latest()
        ->get()
        ->append(['image_url']);

    $services = Service::query()
        ->latest()
        ->get()
        ->append(['image_url']);

    $projects = Project::query()
        ->where('is_active', true)
        ->latest()
        ->get()
        ->append(['cover_image']);

    $about = AboutSection::query()
        ->where('is_active', true)
        ->with('features')
        ->first()
        ?->append(['image_url']);

    return Inertia::render('Home', [
        'slides' => $slides,
        'products' => $products,
        'services' => $services,
        'projects' => $projects,
        'about' => $about
    ]);
}
}
