<?php

namespace App\Http\Controllers;

use App\Models\CarouselSlide;
use App\Models\Contact;
use App\Models\Partner;
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
        ->get()
        ->append(['background_url','image_url']);

    $products = Product::query()
        ->latest()
        ->take(8)
        ->get()
        ->append(['image_url']);

    $services = Service::query()
        ->latest()
        ->take(8)
        ->get()
        ->append(['image_url']);

    $projects = Project::query()
        ->where('is_active', true)
        ->latest()
        ->take(8)
        ->get()
        ->append(['cover_image']);

    $about = AboutSection::query()
        ->with('people.media')
        ->where('is_active', true)
        ->first()
        ?->append(['image_url']);
    $contact = Contact::first();
    $partners = Partner::where('active', true)
        ->get()
        ->map(fn ($p) => [
            'id' => $p->id,
            'title' => $p->title,
            'url' => $p->url,
            'styles' => $p->styles,
            'image_url' => $p->image_url
        ]);
    return Inertia::render('Home', [
        'slides' => $slides,
        'products' => $products,
        'services' => $services,
        'projects' => $projects,
        'about' => $about,
        'contact' => $contact,
        'partners' => $partners,
    ]);
}
}
