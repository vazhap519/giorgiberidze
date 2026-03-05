<?php

namespace App\Models;

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
        'sort_order',
        'is_active',

    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected $appends = [
        'background_url',
        'image_url'
    ];

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
