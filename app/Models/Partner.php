<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Partner extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'active',
        'styles',
        'title',
        'url'
    ];

    protected $casts = [
        'styles' => 'array',
        'active' => 'boolean'
    ];

    protected $attributes = [
        'styles' => '{
            "height":80,
            "width":null,
            "radius":12,
            "padding":10,
            "margin":0,
            "opacity":1,
            "zIndex":1,
            "position":"relative",
            "background":"transparent",
            "backgroundHover":null,
            "borderType":"none",
            "borderWidth":0,
            "borderColor":"#e5e7eb",
            "boxShadow":"none",
            "boxShadowHover":null,
            "scale":1,
            "scaleHover":1.05,
            "rotate":0,
            "rotateHover":0,
            "translateY":0,
            "translateYHover":-5,
            "transition":300,
            "filters":{
                "grayscale":60,
                "blur":0,
                "brightness":100,
                "contrast":100,
                "saturate":100,
                "sepia":0
            }
        }'
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
    | Accessor
    |--------------------------------------------------------------------------
    */

    public function getImageUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('image', 'webp');
    }
}
