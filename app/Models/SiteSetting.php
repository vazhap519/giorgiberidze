<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class SiteSetting extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'site_settings';

    protected $fillable = [

        'site_name',

        'products_title',
        'services_header',
        'about_header',
        'project_header',
        'partner_title',
        'contact_header',
        'contact_form_title',
        'contact_service_title',

        'contact_form_button',
        'contact_service_button',

        'footer_description',
        'footer_navigation_title',
        'footer_contact_title',
        'footer_social_title',
        'footer_copyright',

        /* Product page texts */

        'products_page_title',
        'filter_title',
        'clear_filters_text',

        /* Styles */

        'accent_color',
        'dark_color',
'product_overview',
'product_Features',
'Downloads_Features',

        /*SITE MAIN STYLES*/
        'site_bg_color',
        'site_text_color',
        'site_container_width',
        'site_section_padding',
        'site_section_bg',
        'site_section_position',
        'site_section_padding_y',

        'site_section_gradient',
        'site_section_gradient_from',
        'site_section_gradient_to',

        'site_container_padding_x',
        'site_container_padding_mobile',
        'site_container_align',

        'site_primary_color',
        'site_button_radius',
        'site_button_shadow',

        'site_card_radius',
        'site_card_shadow',

        'partner_title',

        'site_logo_width',
        'site_logo_height',
        'site_logo_fit',
        'site_logo_radius',

        'site_header_text_color',
        'site_name_size',
        'site_name_weight',




        'single_image_radius',
        'single_image_max_height',

        'single_gallery_thumb_width',
        'single_gallery_thumb_height',
        'single_gallery_border_color',
        'single_gallery_hover_border',

        'single_title_font_size',
        'single_title_color',

        'single_description_color',
        'single_description_font_size',

        'single_feature_icon_color',
        'single_feature_font_size',

        'single_tabs_border_color',
        'single_tabs_active_border',
        'single_tabs_font_size',

        'single_spec_table_border',
        'single_spec_label_bg',

        'single_download_btn_bg',
        'single_download_btn_hover',
        'single_download_btn_text',
        'single_download_btn_radius',
        'single_download_btn_size',

        'single_download_card_radius',
        'single_download_card_border',
        'single_download_card_hover',
    ];

    protected $appends = [
        'favicon_url',
        'logo_url',
    ];

    /*
    |--------------------------------------------------------------------------
    | Media Collections
    |--------------------------------------------------------------------------
    */

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('favicon')->singleFile();
        $this->addMediaCollection('logo')->singleFile();
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

    public function getFaviconUrlAttribute(): ?string
    {
        $media = $this->getFirstMedia('favicon');

        return $media?->hasGeneratedConversion('webp')
            ? $media->getUrl('webp')
            : $media?->getUrl();
    }

    public function getLogoUrlAttribute(): ?string
    {
        $media = $this->getFirstMedia('logo');

        return $media?->hasGeneratedConversion('webp')
            ? $media->getUrl('webp')
            : $media?->getUrl();
    }

    /*
    |--------------------------------------------------------------------------
    | Clear cache
    |--------------------------------------------------------------------------
    */

    protected static function booted(): void
    {
        static::saved(fn () => cache()->forget('site_settings'));
        static::deleted(fn () => cache()->forget('site_settings'));
    }
}
