<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AboutPerson extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [

        'person_name',
        'person_position',

        'person_experience_years',
        'person_experience_description',

        /*
        |--------------------------------------------------------------------------
        | Styles
        |--------------------------------------------------------------------------
        */

        'person_text_color',
        'person_overlay_color',
        'person_overlay_opacity',

        'person_card_radius',
        'person_shadow',
        'person_blur',

        'person_text_align',

        'person_name_size',
        'person_position_size',
        'experience_size',

    ];

    protected $appends = [
        'images'
    ];

    /*
    |--------------------------------------------------------------------------
    | Media Collections
    |--------------------------------------------------------------------------
    */

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('person_images');
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

    public function getImagesAttribute()
    {
        return $this->getMedia('person_images')
            ->map(fn ($media) => $media->getUrl('webp'))
            ->values();
    }
}
