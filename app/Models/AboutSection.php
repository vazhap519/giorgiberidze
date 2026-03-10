<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AboutSection extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'description',

        'experience_years',
        'experience_label',

        'is_active',

        'bg_color',
        'title_color',
        'description_color',

        'card_bg',
        'card_border',
        'card_hover_color',

        'experience_bg',
        'experience_text_color',

        'title_size',
        'description_size',

        'card_radius',

        'blur',
        'opacity',

        'padding_top',
        'padding_bottom'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    protected $appends = [
        'image_url'
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function features()
    {
        return $this->hasMany(AboutFeature::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Media Collections
    |--------------------------------------------------------------------------
    */

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('about_image')
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
        return $this->getFirstMediaUrl('about_image', 'webp');
    }
}
