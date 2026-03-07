<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Facades\Route;
use App\Models\Seo;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Generate sitemap.xml';

    public function handle()
    {
        $sitemap = Sitemap::create();

        /*
        |--------------------------------------------------------------------------
        | Crawl existing pages
        |--------------------------------------------------------------------------
        */

        $generated = SitemapGenerator::create(config('app.url'))->getSitemap();

        foreach ($generated->getTags() as $tag) {
            $sitemap->add($tag);
        }

        /*
        |--------------------------------------------------------------------------
        | SEO pages from Filament
        |--------------------------------------------------------------------------
        */

        Seo::query()
            ->whereNotNull('page')
            ->get()
            ->each(function ($seo) use ($sitemap) {

                $routeName = $seo->page;

                // homepage fix
                if ($routeName === '/') {
                    $routeName = 'home';
                }

                // თუ route არ არსებობს უბრალოდ skip
                if (!Route::has($routeName)) {
                    return;
                }

                $sitemap->add(
                    Url::create(route($routeName))
                        ->setLastModificationDate($seo->updated_at)
                        ->setPriority($routeName === 'home' ? 1.0 : 0.8)
                );
            });

        /*
        |--------------------------------------------------------------------------
        | Save sitemap
        |--------------------------------------------------------------------------
        */

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully!');
    }
}
