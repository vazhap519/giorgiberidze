<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Seo extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'page',
        'meta_title',
        'meta_description',
        'canonical_url',

        'og_title',
        'og_description',

        'twitter_title',
        'twitter_description',
        'twitter_card',

        'robots',
        'schema_type',

        'indexable',
    ];

    protected $casts = [
        'indexable' => 'boolean',
    ];

    protected $appends = [
        'og_image_url',
    ];
    public function getRobotsAttribute($value)
    {
        if ($value) {
            return $value;
        }

        return $this->indexable ? 'index,follow' : 'noindex,nofollow';
    }public function getTwitterCardAttribute($value)
{
    return $value ?: 'summary_large_image';
}
    /*
    |--------------------------------------------------------------------------
    | Media
    |--------------------------------------------------------------------------
    */

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('og_image')->singleFile();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('webp')
            ->format('webp')
            ->quality(85)
            ->nonQueued();
    }

    /*
    |--------------------------------------------------------------------------
    | Accessor
    |--------------------------------------------------------------------------
    */

    public function getOgImageUrlAttribute(): ?string
    {
        $media = $this->getFirstMedia('og_image');

        if (! $media) {
            return null;
        }

        return $media->hasGeneratedConversion('webp')
            ? $media->getUrl('webp')
            : $media->getUrl();
    }

    /*
    |--------------------------------------------------------------------------
    | Canonical auto
    |--------------------------------------------------------------------------
    */

    public function getCanonicalUrlAttribute($value)
    {
        if ($value) {
            return $value;
        }

        if ($this->page === 'home') {
            return url('/');
        }

        if (\Route::has($this->page)) {
            return route($this->page);
        }

        return url('/');
    }

    /*
    |--------------------------------------------------------------------------
    | Cache
    |--------------------------------------------------------------------------
    */

    public static function getForPage(string $page)
    {
        return Cache::remember(
            "seo_$page",
            3600,
            fn () => static::where('page', $page)->first()
        );
    }

    protected static function booted()
    {
        static::saved(fn ($seo) => Cache::forget("seo_$seo->page"));
        static::deleted(fn ($seo) => Cache::forget("seo_$seo->page"));
    }
}
