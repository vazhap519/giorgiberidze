<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Project extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [

        'title',
        'description',
        'project_overview_title',
        'project_gallery_title',
        'slug',
        'is_active',

        /*
        |--------------------------------------------------------------------------
        | Card
        |--------------------------------------------------------------------------
        */

        'card_bg',
        'card_border',
        'card_radius',
        'card_shadow',

        /*
        |--------------------------------------------------------------------------
        | Typography
        |--------------------------------------------------------------------------
        */

        'title_color',
        'title_size',
        'title_weight',
        'description_color',
        'description_size',

        /*
        |--------------------------------------------------------------------------
        | Overlay
        |--------------------------------------------------------------------------
        */

        'overlay_bg_from',
        'overlay_bg_via',
        'overlay_bg_to',
        'overlay_text_color',

        /*
        |--------------------------------------------------------------------------
        | Icons
        |--------------------------------------------------------------------------
        */

        'icon_color',
        'icon_size',
        'project_label',
        'cta_text',
        'video_section_title',

    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    protected $appends = [
        'cover_image',
        'images',
        'videos',
    ];

    /*
    |--------------------------------------------------------------------------
    | Media Collections
    |--------------------------------------------------------------------------
    */

    public function registerMediaCollections(): void
    {
        // Cover Image (single)
        $this->addMediaCollection('cover_image')
            ->singleFile();

        // Gallery Images
        $this->addMediaCollection('images');

        // Videos
        $this->addMediaCollection('videos');
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

    public function getCoverImageAttribute(): ?string
    {
        $media = $this->getFirstMedia('cover_image');

        if (!$media) {
            return null;
        }

        return $media->hasGeneratedConversion('webp')
            ? $media->getUrl('webp')
            : $media->getUrl();
    }

    public function getImagesAttribute()
    {
        return $this->getMedia('images')->map(function ($media) {

            if ($media->hasGeneratedConversion('webp')) {
                return $media->getUrl('webp');
            }

            return $media->getUrl();
        });
    }

    public function getVideosAttribute()
    {
        return $this->getMedia('videos')->map(function ($media) {
            return $media->getUrl();
        });
    }

    protected $attributes = [

        'card_bg' => '#ffffff',
        'card_border' => '#e5e7eb',
        'card_radius' => 16,
        'card_shadow' => 'lg',

        'title_color' => '#111827',
        'title_size' => 20,
        'title_weight' => '600',

        'description_color' => '#6b7280',
        'description_size' => 16,

        'overlay_bg_from' => '#1d4ed8',
        'overlay_bg_via' => '#2563eb',
        'overlay_bg_to' => '#3b82f6',

        'icon_color' => '#22c55e',
        'icon_size' => 18,

    ];
}
