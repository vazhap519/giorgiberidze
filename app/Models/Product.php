<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [

        /*
        |--------------------------------------------------------------------------
        | Content
        |--------------------------------------------------------------------------
        */

        'title',
        'description',
        'features',


        /*
        |--------------------------------------------------------------------------
        | Card Styles
        |--------------------------------------------------------------------------
        */

        'card_bg',
        'card_border',
        'card_radius',
        'card_shadow',
        'card_hover_effect',


        /*
        |--------------------------------------------------------------------------
        | Image Styles
        |--------------------------------------------------------------------------
        */

        'image_bg',


        /*
        |--------------------------------------------------------------------------
        | Title Typography
        |--------------------------------------------------------------------------
        */

        'title_color',
        'title_size',
        'title_weight',


        /*
        |--------------------------------------------------------------------------
        | Description Typography
        |--------------------------------------------------------------------------
        */

        'description_color',
        'description_size',


        /*
        |--------------------------------------------------------------------------
        | Overlay Styles
        |--------------------------------------------------------------------------
        */

        'overlay_bg_from',
        'overlay_bg_via',
        'overlay_bg_to',
        'overlay_text_color',
        'overlay_title_size',
        'overlay_title_weight',


        /*
        |--------------------------------------------------------------------------
        | Feature Styles
        |--------------------------------------------------------------------------
        */

        'feature_icon_color',
        'feature_text_color',
        'feature_icon_size',
        'feature_text_size',

    ];

    protected $casts = [
        'features' => 'array',
    ];

    protected $appends = [
        'image_url'
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
    | Accessor
    |--------------------------------------------------------------------------
    */

    public function getImageUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('image', 'webp');
    }


    /*
    |--------------------------------------------------------------------------
    | Feature List (Table display helper)
    |--------------------------------------------------------------------------
    */

    public function getFeaturesListAttribute(): string
    {
        if (!$this->features) {
            return '-';
        }

        return collect($this->features)
            ->pluck('feature')
            ->filter()
            ->implode(', ');
    }
}
