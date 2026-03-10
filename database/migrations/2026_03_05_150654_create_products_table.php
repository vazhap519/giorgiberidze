<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Content
            |--------------------------------------------------------------------------
            */

            $table->string('title');

            $table->text('description')->nullable();

            // Repeater features
            $table->json('features')->nullable();


            /*
            |--------------------------------------------------------------------------
            | Card Styles
            |--------------------------------------------------------------------------
            */

            $table->string('card_bg')->default('#ffffff');

            $table->string('card_border')->default('#e5e7eb');

            $table->integer('card_radius')->default(16);

            $table->string('card_shadow')->default('lg');

            $table->string('card_hover_effect')->default('lift');


            /*
            |--------------------------------------------------------------------------
            | Image Styles
            |--------------------------------------------------------------------------
            */

            $table->string('image_bg')->default('#ffffff');


            /*
            |--------------------------------------------------------------------------
            | Title Typography
            |--------------------------------------------------------------------------
            */

            $table->string('title_color')->default('#1f2937');

            $table->integer('title_size')->default(18);

            $table->string('title_weight')->default('600');


            /*
            |--------------------------------------------------------------------------
            | Description Typography
            |--------------------------------------------------------------------------
            */

            $table->string('description_color')->default('#6b7280');

            $table->integer('description_size')->default(14);


            /*
            |--------------------------------------------------------------------------
            | Overlay Styles
            |--------------------------------------------------------------------------
            */

            $table->string('overlay_bg_from')->default('#1d4ed8');

            $table->string('overlay_bg_via')->default('#2563eb');

            $table->string('overlay_bg_to')->default('#3b82f6');

            $table->string('overlay_text_color')->default('#ffffff');

            $table->integer('overlay_title_size')->default(22);

            $table->string('overlay_title_weight')->default('700');


            /*
            |--------------------------------------------------------------------------
            | Feature List Styles
            |--------------------------------------------------------------------------
            */

            $table->string('feature_icon_color')->default('#86efac');

            $table->string('feature_text_color')->default('#ffffff');

            $table->integer('feature_icon_size')->default(18);

            $table->integer('feature_text_size')->default(14);


            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
