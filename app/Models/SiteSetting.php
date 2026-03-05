<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class SiteSetting extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'site_settings';

    protected $fillable = [
        'site_name',
        'products_title'
    ];

    protected $appends = [
        'favicon_url',
        'logo_url',
    ];

    /**
     * Media collections
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('favicon')->singleFile();
        $this->addMediaCollection('logo')->singleFile();
    }

    /**
     * WebP conversion
     */
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('webp')
            ->format('webp')
            ->quality(85)
            ->nonQueued();
    }

    /**
     * Accessors
     */
    public function getFaviconUrlAttribute(): ?string
    {
        $media = $this->getFirstMedia('favicon');

        return $media?->hasGeneratedConversion('webp')
            ? $media->getUrl('webp')
            : $media?->getUrl();
    }

    public function getLogoUrlAttribute(): ?string
    {
        $media = $this->getFirstMedia('logo');

        return $media?->hasGeneratedConversion('webp')
            ? $media->getUrl('webp')
            : $media?->getUrl();
    }

    /**
     * Clear cache
     */
    protected static function booted(): void
    {
        static::saved(fn () => cache()->forget('site_settings'));
        static::deleted(fn () => cache()->forget('site_settings'));
    }
}
