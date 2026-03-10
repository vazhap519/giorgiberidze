<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [

        'contact_form_title',
        'contact_form_button',
        'service_form_title',
        'service_form_button',

        'name_placeholder',
        'email_placeholder',
        'phone_placeholder',
        'message_placeholder',
        'address_placeholder',

        'service_options',

        'section_bg',
        'section_opacity',
        'section_padding',
        'section_gradient_from',
        'section_gradient_to',

        'card_bg',
        'card_border',
        'card_border_width',
        'card_radius',
        'card_shadow',
        'card_opacity',

        'input_bg',
        'input_border',
        'input_border_width',
        'input_radius',
        'input_focus_color',
        'input_text_color',
        'input_placeholder_color',

        'button_bg_from',
        'button_bg_to',
        'button_text_color',
        'button_radius',
        'button_shadow',
        'button_opacity',

        'title_color',
        'title_size',
        'title_weight',
        'title_opacity',

        'text_color',
        'text_size',
        'text_opacity',
    ];

    protected $casts = [
        'service_options' => 'array',
    ];
}
