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
        Schema::create('site_settings', function (Blueprint $table) {


            $table->id();

            $table->string('site_name')->nullable();

            $table->string('products_title')->nullable();
            $table->string('services_header')->nullable();
            $table->string('about_header')->nullable();
            $table->string('project_header')->nullable();

            $table->string('contact_header')->nullable();
            $table->string('contact_form_title')->nullable();
            $table->string('contact_service_title')->nullable();

            $table->string('contact_form_button')->nullable();
            $table->string('contact_service_button')->nullable();

            $table->text('footer_description')->nullable();
            $table->string('footer_navigation_title')->nullable();
            $table->string('footer_contact_title')->nullable();
            $table->string('footer_social_title')->nullable();
            $table->string('footer_copyright')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Product Page
            |--------------------------------------------------------------------------
            */

            $table->string('products_page_title')->default('IP Cameras');
            $table->string('filter_title')->default('Filter by Features');
            $table->string('clear_filters_text')->default('Clear Filters');

            /*
            |--------------------------------------------------------------------------
            | Colors
            |--------------------------------------------------------------------------
            */

            $table->string('accent_color')->default('#dc2626');
            $table->string('dark_color')->default('#111827');
            $table->string('product_overview')->nullable();
            $table->string('product_Features')->nullable();
            $table->string('Downloads_Features')->nullable();
            $table->timestamps();



        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
