<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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

        'indexable',
    ];

    protected $casts = [
        'indexable' => 'boolean',
    ];

    protected $appends = [
        'og_image_url'
    ];

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

    public function getOgImageUrlAttribute(): ?string
    {
        $media = $this->getFirstMedia('og_image');

        return $media?->hasGeneratedConversion('webp')
            ? $media->getUrl('webp')
            : $media?->getUrl();
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    public function scopeForPage($query, $page = null)
    {
        return $query->where('page', $page)->first();
    }

    public static function homepage()
    {
        return static::whereNull('page')->first();
    }
}
