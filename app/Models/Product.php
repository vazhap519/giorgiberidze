<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

use App\Models\Filter;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [

        'title',
        'description',
        'features',
        'specs',
        'slug',

        'card_bg',
        'card_border',
        'card_radius',
        'card_shadow',
        'card_hover_effect',

        'image_bg',

        'title_color',
        'title_size',
        'title_weight',

        'description_color',
        'description_size',

        'overlay_bg_from',
        'overlay_bg_via',
        'overlay_bg_to',
        'overlay_text_color',
        'overlay_title_size',
        'overlay_title_weight',

        'feature_icon_color',
        'feature_text_color',
        'feature_icon_size',
        'feature_text_size',

        'download_btn_bg',
        'download_btn_hover',
        'download_btn_text',
        'download_btn_radius',
        'download_btn_size',
    ];

    /*
    |--------------------------------------------------------------------------
    | Casts
    |--------------------------------------------------------------------------
    */

    protected $casts = [
        'features' => 'array',
        'specs' => 'array',
    ];

    /*
    |--------------------------------------------------------------------------
    | Appended attributes
    |--------------------------------------------------------------------------
    */

    protected $appends = [
        'image_url',
        'gallery',
        'downloads'
    ];

    /*
    |--------------------------------------------------------------------------
    | Media Collections
    |--------------------------------------------------------------------------
    */

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->singleFile();

        $this->addMediaCollection('gallery');

        $this->addMediaCollection('downloads');
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
    | Main Image URL
    |--------------------------------------------------------------------------
    */

    public function getImageUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('image', 'webp');
    }

    /*
    |--------------------------------------------------------------------------
    | Gallery Images
    |--------------------------------------------------------------------------
    */

    public function getGalleryAttribute()
    {
        return $this->getMedia('gallery')->map(fn ($media) => [
            'url' => $media->getUrl(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Download Files
    |--------------------------------------------------------------------------
    */

    public function getDownloadsAttribute()
    {
        return $this->getMedia('downloads')->map(fn ($media) => [
            'name' => $media->name,
            'url' => $media->getUrl(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Product Filters
    |--------------------------------------------------------------------------
    */

    public function filters()
    {
        if (!$this->features) {
            return collect();
        }

        $slugs = collect($this->features)
            ->pluck('filter')
            ->filter()
            ->unique()
            ->values();

        return Filter::whereIn('slug', $slugs)->get();
    }

    /*
    |--------------------------------------------------------------------------
    | Get Feature Value
    |--------------------------------------------------------------------------
    */

    public function getFeatureValue($slug)
    {
        if (!$this->features) {
            return null;
        }

        $feature = collect($this->features)
            ->firstWhere('filter', $slug);

        return $feature['value'] ?? null;
    }

    /*
    |--------------------------------------------------------------------------
    | Feature List
    |--------------------------------------------------------------------------
    */

    public function getFeaturesListAttribute(): string
    {
        if (!$this->features) {
            return '-';
        }

        return collect($this->features)
            ->pluck('value')
            ->filter()
            ->implode(', ');
    }
}
