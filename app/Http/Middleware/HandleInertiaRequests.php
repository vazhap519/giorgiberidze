<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use App\Models\Seo;
use App\Models\SiteSetting;

class HandleInertiaRequests extends Middleware
{
    protected $rootView = 'app';

    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    public function share(Request $request): array
    {
        $path = trim($request->path(), '/');

        $seo = cache()->remember("seo_{$path}", 3600, function () use ($path) {

            if ($path === '') {
                return Seo::homepage();
            }

            return Seo::where('page', $path)->first();
        });

        return [
            ...parent::share($request),

            'siteSettings' => fn () =>
            cache()->remember(
                'site_settings',
                3600,
                fn () => SiteSetting::first()
            ),

            'seo' => $seo,
        ];
    }
}
