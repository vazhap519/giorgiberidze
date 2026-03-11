<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Filter extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'sort',
        'is_active',
        'styles'
    ];

    protected $casts = [
        'styles' => 'array',
        'is_active' => 'boolean'
    ];

    /*
    |--------------------------------------------------------------------------
    | Products using this filter
    |--------------------------------------------------------------------------
    */

    public function products()
    {
        return Product::whereRaw(
            "JSON_SEARCH(features, 'one', ?, NULL, '$[*].filter') IS NOT NULL",
            [$this->slug]
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Style helpers
    |--------------------------------------------------------------------------
    */

    public function getAccentColorAttribute()
    {
        return $this->styles['accent_color'] ?? '#dc2626';
    }

    public function getDarkColorAttribute()
    {
        return $this->styles['dark_color'] ?? '#111827';
    }

    public function getTitleColorAttribute()
    {
        return $this->styles['title_color'] ?? '#111827';
    }

    public function getItemColorAttribute()
    {
        return $this->styles['item_color'] ?? '#374151';
    }
}
