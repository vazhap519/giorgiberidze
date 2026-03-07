<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'description',
        'contact_items',
        'social_links',
        'service_options',
    ];

    protected $casts = [
        'contact_items' => 'array',
        'social_links' => 'array',
        'service_options' => 'array',
    ];
}
