<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('footers', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Content
            |--------------------------------------------------------------------------
            */

            $table->text('footer_description')->nullable();

            $table->string('footer_navigation_title')->nullable();
            $table->string('footer_contact_title')->nullable();
            $table->string('footer_social_title')->nullable();

            $table->string('footer_follow_text')->nullable();

            $table->string('footer_copyright')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Social Links
            |--------------------------------------------------------------------------
            */

            $table->json('footer_social_links')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Colors
            |--------------------------------------------------------------------------
            */

            $table->string('footer_bg_color')->default('#0f172a');

            $table->string('footer_text_color')->default('#cbd5f5');

            $table->string('footer_link_color')->default('#94a3b8');

            $table->string('footer_hover_color')->default('#ffffff');

            /*
            |--------------------------------------------------------------------------
            | Follow text styles
            |--------------------------------------------------------------------------
            */

            $table->string('footer_follow_color')->nullable()->default('#94a3b8');
            $table->integer('footer_follow_size')->nullable()->default(14);

            $table->float('footer_follow_opacity')->nullable()->default(0.8);

            $table->string('footer_follow_weight')->nullable()->default('400');
            /*
            |--------------------------------------------------------------------------
            | Social Styles
            |--------------------------------------------------------------------------
            */

            $table->string('footer_social_bg')->default('#1e293b');

            $table->string('footer_social_color')->default('#cbd5f5');

            $table->string('footer_social_hover_bg')->default('#2563eb');

            $table->string('footer_social_hover_color')->default('#ffffff');

            /*
            |--------------------------------------------------------------------------
            | Typography
            |--------------------------------------------------------------------------
            */

            $table->integer('footer_title_size')->default(18);

            $table->integer('footer_text_size')->default(14);

            /*
            |--------------------------------------------------------------------------
            | Layout
            |--------------------------------------------------------------------------
            */

            $table->integer('footer_blur')->default(0);

            $table->float('footer_opacity')->default(1);

            $table->string('footer_position')->default('relative');

            $table->integer('footer_z_index')->default(10);

            $table->integer('footer_padding_top')->default(80);

            $table->integer('footer_padding_bottom')->default(40);
            $table->integer('footer_logo_size')->default(48);

            $table->string('footer_logo_text_color')->default('#ffffff');

            $table->integer('footer_logo_text_size')->default(18);

            $table->string('footer_logo_text_weight')->default('600');

            $table->string('footer_description_color')->default('#94a3b8');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('footers');
    }
};
