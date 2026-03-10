<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutFeature extends Model
{

protected $fillable = [

'about_section_id',

'title',
'description',

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

public function about()
{
return $this->belongsTo(AboutSection::class);
}

}
