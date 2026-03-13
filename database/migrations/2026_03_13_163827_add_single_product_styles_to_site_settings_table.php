<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {

            // IMAGE
            $table->integer('single_image_radius')->default(12);
            $table->integer('single_image_max_height')->default(500);

            // GALLERY
            $table->integer('single_gallery_thumb_width')->default(80);
            $table->integer('single_gallery_thumb_height')->default(80);
            $table->string('single_gallery_border_color')->default('#e5e7eb');
            $table->string('single_gallery_hover_border')->default('#ef4444');

            // TITLE
            $table->integer('single_title_font_size')->default(24);
            $table->string('single_title_color')->default('#000000');

            // DESCRIPTION
            $table->string('single_description_color')->default('#6b7280');
            $table->integer('single_description_font_size')->default(16);

            // FEATURES
            $table->string('single_feature_icon_color')->default('#22c55e');
            $table->integer('single_feature_font_size')->default(15);

            // TABS
            $table->string('single_tabs_border_color')->default('#e5e7eb');
            $table->string('single_tabs_active_border')->default('#000000');
            $table->integer('single_tabs_font_size')->default(16);

            // TABLE
            $table->string('single_spec_table_border')->default('#e5e7eb');
            $table->string('single_spec_label_bg')->default('#f9fafb');

            // DOWNLOAD BUTTON
            $table->string('single_download_btn_bg')->nullable();
            $table->string('single_download_btn_hover')->nullable();
            $table->string('single_download_btn_text')->nullable();
            $table->integer('single_download_btn_radius')->default(6);
            $table->integer('single_download_btn_size')->default(14);

            // DOWNLOAD CARD
            $table->integer('single_download_card_radius')->default(6);
            $table->string('single_download_card_border')->default('#e5e7eb');
            $table->string('single_download_card_hover')->default('#f9fafb');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {

            $table->dropColumn([

                'single_image_radius',
                'single_image_max_height',

                'single_gallery_thumb_width',
                'single_gallery_thumb_height',
                'single_gallery_border_color',
                'single_gallery_hover_border',

                'single_title_font_size',
                'single_title_color',

                'single_description_color',
                'single_description_font_size',

                'single_feature_icon_color',
                'single_feature_font_size',

                'single_tabs_border_color',
                'single_tabs_active_border',
                'single_tabs_font_size',

                'single_spec_table_border',
                'single_spec_label_bg',

                'single_download_btn_bg',
                'single_download_btn_hover',
                'single_download_btn_text',
                'single_download_btn_radius',
                'single_download_btn_size',

                'single_download_card_radius',
                'single_download_card_border',
                'single_download_card_hover',

            ]);

        });
    }
};
