<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutFeature extends Model
{
    protected $fillable = [
        'about_section_id',
        'title',
        'description'
    ];

    public function about()
    {
        return $this->belongsTo(AboutSection::class);
    }
}