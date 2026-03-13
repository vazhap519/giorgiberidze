<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {

            /* -------------------------
             | Global Design
             -------------------------*/

            $table->string('site_bg_color')->default('#ffffff');
            $table->string('site_text_color')->default('#111827');
            $table->integer('site_container_width')->default(1280);


            /* -------------------------
             | Section Styles
             -------------------------*/

            $table->integer('site_section_padding')->default(120);
            $table->string('site_section_bg')->default('#ffffff');

            $table->string('site_section_position')->default('relative');

            $table->integer('site_section_padding_y')->default(112); // py-28


            /* -------------------------
             | Section Gradient
             -------------------------*/

            $table->boolean('site_section_gradient')->default(false);
            $table->string('site_section_gradient_from')->default('#ffffff');
            $table->string('site_section_gradient_to')->default('#f1f5f9');


            /* -------------------------
             | Container Layout
             -------------------------*/

            $table->integer('site_container_padding_x')->default(24); // px-6
            $table->integer('site_container_padding_mobile')->default(16);
            $table->string('site_container_align')->default('center');


            /* -------------------------
             | Buttons
             -------------------------*/

            $table->string('site_primary_color')->default('#2563eb');
            $table->integer('site_button_radius')->default(12);
            $table->boolean('site_button_shadow')->default(true);


            /* -------------------------
             | Cards
             -------------------------*/

            $table->integer('site_card_radius')->default(16);
            $table->boolean('site_card_shadow')->default(true);


            /* -------------------------
             | Section Titles
             -------------------------*/

            $table->string('partner_title')->default('პარტნიორები');


            /* -------------------------
             | Logo
             -------------------------*/

            $table->integer('site_logo_width')->default(120);
            $table->integer('site_logo_height')->default(40);
            $table->string('site_logo_fit')->default('contain');
            $table->integer('site_logo_radius')->default(0);


            /* -------------------------
             | Header
             -------------------------*/

            $table->string('site_header_text_color')->default('#1e293b');
            $table->integer('site_name_size')->default(18);
            $table->integer('site_name_weight')->default(600);

        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {

            $table->dropColumn([
                'site_bg_color',
                'site_text_color',
                'site_container_width',
                'site_section_padding',
                'site_section_bg',
                'site_section_position',
                'site_section_padding_y',

                'site_section_gradient',
                'site_section_gradient_from',
                'site_section_gradient_to',

                'site_container_padding_x',
                'site_container_padding_mobile',
                'site_container_align',

                'site_primary_color',
                'site_button_radius',
                'site_button_shadow',

                'site_card_radius',
                'site_card_shadow',

                'partner_title',

                'site_logo_width',
                'site_logo_height',
                'site_logo_fit',
                'site_logo_radius',

                'site_header_text_color',
                'site_name_size',
                'site_name_weight',
            ]);

        });
    }
};
