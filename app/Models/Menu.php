<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'title',
        'route',
        'section',
        'order',

        'nav_bg_color',
        'nav_link_color',
        'nav_hover_color',
        'nav_blur',
        'nav_opacity',
        'nav_z_index',

        'cta_text',
        'cta_link',
        'cta_bg_color',
        'cta_text_color',
        'cta_hover_color',
        'cta_radius'
    ];
}
