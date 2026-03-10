<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Content
            |--------------------------------------------------------------------------
            */

            $table->string('title');

            $table->string('read_more_text')->nullable();

            $table->text('description')->nullable();


            /*
            |--------------------------------------------------------------------------
            | Card Styles
            |--------------------------------------------------------------------------
            */

            $table->string('card_bg')->default('#ffffff');

            $table->string('card_border')->default('#e5e7eb');

            $table->string('card_hover_shadow')->default('2xl');

            $table->integer('card_radius')->default(16);

            $table->integer('card_padding')->default(24);


            /*
            |--------------------------------------------------------------------------
            | Typography
            |--------------------------------------------------------------------------
            */

            $table->string('title_color')->default('#111827');

            $table->string('title_hover_color')->default('#2563eb');

            $table->string('description_color')->default('#4b5563');


            /*
            |--------------------------------------------------------------------------
            | Image
            |--------------------------------------------------------------------------
            */

            $table->string('image_bg')->default('#f9fafb');


            /*
            |--------------------------------------------------------------------------
            | Button
            |--------------------------------------------------------------------------
            */

            $table->string('button_bg')->default('#2563eb');

            $table->string('button_hover_bg')->default('#1d4ed8');

            $table->string('button_text_color')->default('#ffffff');


            /*
            |--------------------------------------------------------------------------
            | Section Settings
            |--------------------------------------------------------------------------
            */

            $table->integer('cards_per_row')->default(3);

            $table->string('section_bg')->default('#ffffff');

            $table->integer('section_padding_top')->default(120);

            $table->integer('section_padding_bottom')->default(120);

            $table->integer('section_blur')->default(0);

            $table->float('section_opacity')->default(1);

            $table->string('animation')->default('fade-up');

            $table->string('card_hover_effect')->default('lift');


            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
