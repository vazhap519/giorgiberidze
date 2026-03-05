<?php

namespace App\Http\Controllers;

use App\Models\CarouselSlide;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomePageController extends Controller
{
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

        return Inertia::render('Home', [
            'slides' => $slides,
            'products' => $products,
        ]);
    }
}
