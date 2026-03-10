<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {

            $table->id();

            $table->string('title');

            $table->string('route')->nullable();

            $table->string('section')->nullable();

            $table->integer('order')->default(0);

            /*
            |--------------------------------------------------------------------------
            | Navbar Theme
            |--------------------------------------------------------------------------
            */

            $table->string('nav_bg_color')->nullable()->default('#d0d1d5');

            $table->string('nav_link_color')->nullable()->default('#9ba4b1');

            $table->string('nav_hover_color')->nullable()->default('#475569');

            $table->integer('nav_blur')->nullable()->default(20);

            $table->float('nav_opacity')->nullable()->default(0.6);

            $table->integer('nav_z_index')->nullable()->default(50);

            /*
            |--------------------------------------------------------------------------
            | CTA Button
            |--------------------------------------------------------------------------
            */

            $table->string('cta_text')->nullable()->default('დაგვიკავშირდი');

            $table->string('cta_link')->nullable()->default('#contact');

            $table->string('cta_bg_color')->nullable()->default('#2563eb');

            $table->string('cta_text_color')->nullable()->default('#ffffff');

            $table->string('cta_hover_color')->nullable()->default('#1d4ed8');

            $table->integer('cta_radius')->nullable()->default(12);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
