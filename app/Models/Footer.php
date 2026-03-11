<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{

    protected $fillable = [

        'footer_description',
        'footer_contact_info',
        'footer_navigation_title',
        'footer_contact_title',
        'footer_social_title',

        'footer_follow_text',

        'footer_copyright',

        'footer_social_links',

        'footer_bg_color',
        'footer_text_color',
        'footer_link_color',
        'footer_hover_color',

        'footer_follow_color',
        'footer_follow_size',
        'footer_follow_opacity',
        'footer_follow_weight',

        'footer_social_bg',
        'footer_social_color',
        'footer_social_hover_bg',
        'footer_social_hover_color',

        'footer_title_size',
        'footer_text_size',

        'footer_blur',
        'footer_opacity',
        'footer_position',
        'footer_z_index',

        'footer_padding_top',
        'footer_padding_bottom',
        'contact_items',
'footer_contact_styles'

    ];

    protected $casts = [

        'footer_social_links' => 'array',
          'contact_items' => 'array',
    'footer_contact_styles' => 'array',

    ];

}
