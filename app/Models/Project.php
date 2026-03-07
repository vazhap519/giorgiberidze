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

        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

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
}
