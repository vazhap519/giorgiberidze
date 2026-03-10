<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Service extends Model implements HasMedia
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
        'read_more_text',

        /*
        |--------------------------------------------------------------------------
        | Card Styles
        |--------------------------------------------------------------------------
        */

        'card_bg',
        'card_border',
        'card_hover_shadow',
        'card_radius',
        'card_padding',

        /*
        |--------------------------------------------------------------------------
        | Typography
        |--------------------------------------------------------------------------
        */

        'title_color',
        'title_hover_color',
        'description_color',

        /*
        |--------------------------------------------------------------------------
        | Image
        |--------------------------------------------------------------------------
        */

        'image_bg',

        /*
        |--------------------------------------------------------------------------
        | Button
        |--------------------------------------------------------------------------
        */

        'button_bg',
        'button_hover_bg',
        'button_text_color',

        /*
        |--------------------------------------------------------------------------
        | Section Settings
        |--------------------------------------------------------------------------
        */

        'cards_per_row',
        'section_bg',
        'section_padding_top',
        'section_padding_bottom',
        'section_blur',
        'section_opacity',
        'animation',
        'card_hover_effect'


    ];

    protected $appends = [
        'image_url',
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
}
