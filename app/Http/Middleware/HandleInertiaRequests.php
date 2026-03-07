<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use App\Models\Seo;
use App\Models\SiteSetting;
use App\Models\Contact;

class HandleInertiaRequests extends Middleware
{
    protected $rootView = 'app';

    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    public function share(Request $request): array
    {
        return [
            ...parent::share($request),

            /*
            |--------------------------------------------------------------------------
            | Site Settings
            |--------------------------------------------------------------------------
            */

            'siteSettings' => fn () => cache()->remember(
                'site_settings',
                3600,
                fn () => SiteSetting::first()
            ),

            /*
            |--------------------------------------------------------------------------
            | Contact Settings
            |--------------------------------------------------------------------------
            */

            'contact' => fn () => cache()->remember(
                'contact_settings',
                3600,
                fn () => Contact::first()
            ),

            /*
            |--------------------------------------------------------------------------
            | SEO
            |--------------------------------------------------------------------------
            */

            'seo' => fn () => $this->resolveSeo($request),
        ];
    }

    protected function resolveSeo(Request $request): ?array
    {
        $routeName = $request->route()?->getName() ?? 'home';

        /*
        |--------------------------------------------------------------------------
        | 1. exact match
        |--------------------------------------------------------------------------
        */

        $seo = Seo::where('page', $routeName)->first();

        /*
        |--------------------------------------------------------------------------
        | 2. fallback for dynamic routes
        | example:
        | projects.show -> projects
        |--------------------------------------------------------------------------
        */

        if (!$seo && str_contains($routeName, '.')) {
            $baseRoute = explode('.', $routeName)[0];
            $seo = Seo::where('page', $baseRoute)->first();
        }

        /*
        |--------------------------------------------------------------------------
        | 3. final fallback (homepage)
        |--------------------------------------------------------------------------
        */

        if (!$seo) {
            $seo = Seo::where('page', 'home')->first();
        }

        return $seo?->toArray();
    }
}
