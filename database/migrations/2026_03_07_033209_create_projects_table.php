<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Content
            |--------------------------------------------------------------------------
            */

            $table->string('title');

            $table->longText('description')->nullable();

            $table->string('project_overview_title')->nullable();

            $table->string('project_gallery_title')->nullable();

            $table->boolean('is_active')->default(true);


            /*
            |--------------------------------------------------------------------------
            | Card Styles
            |--------------------------------------------------------------------------
            */

            $table->string('card_bg')->default('#ffffff');

            $table->string('card_border')->default('#e5e7eb');

            $table->integer('card_radius')->default(16);

            $table->string('card_shadow')->default('lg');


            /*
            |--------------------------------------------------------------------------
            | Typography
            |--------------------------------------------------------------------------
            */

            $table->string('title_color')->default('#111827');

            $table->integer('title_size')->default(20);

            $table->string('title_weight')->default('600');

            $table->string('description_color')->default('#6b7280');

            $table->integer('description_size')->default(16);


            /*
            |--------------------------------------------------------------------------
            | Overlay Styles
            |--------------------------------------------------------------------------
            */

            $table->string('overlay_bg_from')->default('#1d4ed8');

            $table->string('overlay_bg_via')->default('#2563eb');

            $table->string('overlay_bg_to')->default('#3b82f6');

            $table->string('overlay_text_color')->default('#ffffff');


            /*
            |--------------------------------------------------------------------------
            | Feature Icons
            |--------------------------------------------------------------------------
            */

            $table->string('icon_color')->default('#22c55e');

            $table->integer('icon_size')->default(18);

            /*
 |--------------------------------------------------------------------------
 | UI Texts
 |--------------------------------------------------------------------------
 */

            $table->string('project_label')->default('პროექტი');
            $table->string('cta_text')->default('დეტალურად');
            $table->string('video_section_title')->default('ვიდეო');
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
