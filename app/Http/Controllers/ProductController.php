<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Filter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        $driver = DB::connection()->getDriverName();

        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search, $driver) {

                if ($driver === 'pgsql') {

                    $q->where('title', 'ILIKE', "%{$search}%")
                        ->orWhere('description', 'ILIKE', "%{$search}%");

                } else {

                    $q->where('title', 'LIKE', "%{$search}%")
                        ->orWhere('description', 'LIKE', "%{$search}%");

                }

            });

        }

        /*
        |--------------------------------------------------------------------------
        | FILTERS
        |--------------------------------------------------------------------------
        */

        if ($request->filled('filters')) {

            foreach ($request->filters as $slug => $values) {

                $query->where(function ($q) use ($slug, $values, $driver) {

                    foreach ($values as $value) {

                        if ($driver === 'pgsql') {

                            $q->orWhereRaw(
                                "features::jsonb @> ?::jsonb",
                                [json_encode([[
                                    'filter' => $slug,
                                    'value' => $value
                                ]])]
                            );

                        } else {

                            $q->orWhereJsonContains('features', [
                                'filter' => $slug,
                                'value' => $value
                            ]);

                        }

                    }

                });

            }

        }

        /*
        |--------------------------------------------------------------------------
        | PRODUCTS
        |--------------------------------------------------------------------------
        */
        $products = $query
            ->latest()
            ->paginate(12)
            ->withQueryString()
            ->through(function ($product) {
                return $product->append('image_url');
            });


        /*
        |--------------------------------------------------------------------------
        | FILTER VALUES
        |--------------------------------------------------------------------------
        */

        $filters = Filter::where('is_active', true)
            ->orderBy('sort')
            ->get()
            ->map(function ($filter) {

                $values = Product::whereNotNull('features')
                    ->get(['features'])
                    ->pluck('features')
                    ->flatten(1)
                    ->where('filter', $filter->slug)
                    ->pluck('value')
                    ->unique()
                    ->values()
                    ->toArray();

                $filter->values = $values;

                return $filter;

            });

        return inertia('ProductPage', [

            'products' => $products,
            'filters' => $filters,
            'activeFilters' => $request->filters ?? [],
            'search' => $request->search

        ]);
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)
            ->firstOrFail()
            ->append(['image_url','gallery','downloads']);

        return inertia('ProductDetailsPage', [
            'product' => $product
        ]);
    }
}
