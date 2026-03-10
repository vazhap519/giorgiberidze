<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CarouselSlide extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [

        'title',
        'subtitle',
        'button_text',
        'is_active',
        'button_url',
'button2_text',
'button2_url',
        'styles'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'styles' => 'array',
    ];

    protected $appends = [
        'background_url',
        'image_url'
    ];
    protected function styles(): Attribute
    {
        return Attribute::make(
            get: function ($value) {

                if (is_string($value)) {
                    $value = json_decode($value, true);
                }

                if (!is_array($value)) {
                    $value = [];
                }

                return array_merge([
                    'button_border_width' => 0,
                    'button_font_size' => 16,
                    'button_opacity' => 100,
                    'button_radius' => 12,
                ], $value);
            }
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Media Collections
    |--------------------------------------------------------------------------
    */

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('background')->singleFile();

        $this->addMediaCollection('image')->singleFile();
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

    public function getBackgroundUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('background', 'webp');
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('image', 'webp');
    }
}
