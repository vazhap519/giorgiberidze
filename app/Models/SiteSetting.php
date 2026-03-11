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

        'products_title',
        'services_header',
        'about_header',
        'project_header',

        'contact_header',
        'contact_form_title',
        'contact_service_title',

        'contact_form_button',
        'contact_service_button',

        'footer_description',
        'footer_navigation_title',
        'footer_contact_title',
        'footer_social_title',
        'footer_copyright',

        /* Product page texts */

        'products_page_title',
        'filter_title',
        'clear_filters_text',

        /* Styles */

        'accent_color',
        'dark_color',
'product_overview',
'product_Features',
'Downloads_Features',
    ];

    protected $appends = [
        'favicon_url',
        'logo_url',
    ];

    /*
    |--------------------------------------------------------------------------
    | Media Collections
    |--------------------------------------------------------------------------
    */

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('favicon')->singleFile();
        $this->addMediaCollection('logo')->singleFile();
    }

    /*
    |--------------------------------------------------------------------------
    | Media Conversions
    |--------------------------------------------------------------------------
    */

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('webp')
            ->format('webp')
            ->quality(85)
            ->nonQueued();
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
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

    /*
    |--------------------------------------------------------------------------
    | Clear cache
    |--------------------------------------------------------------------------
    */

    protected static function booted(): void
    {
        static::saved(fn () => cache()->forget('site_settings'));
        static::deleted(fn () => cache()->forget('site_settings'));
    }
}
