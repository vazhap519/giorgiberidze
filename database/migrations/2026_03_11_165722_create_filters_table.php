<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

            Schema::create('filters', function (Blueprint $table) {

                $table->id();

                $table->string('name');
                $table->string('slug')->unique();

                $table->integer('sort')->default(0);
                $table->boolean('is_active')->default(true);

                /*
                |--------------------------------------------------------------------------
                | Styles
                |--------------------------------------------------------------------------
                */

                $table->json('styles')->default(json_encode([

                    "title_color" => "#111827",
                    "title_size" => 16,
                    "title_weight" => 600,

                    "item_color" => "#374151",
                    "item_size" => 14,

                    "item_hover_color" => "#2563eb",

                    "bg_color" => "#ffffff",

                    "border_color" => "#e5e7eb",
                    "border_radius" => 8,

                    "active_color" => "#2563eb",
                    "active_bg" => "#eff6ff",

                    "padding_x" => 12,
                    "padding_y" => 6,

                    "gap" => 6

                ]));

                $table->timestamps();

            });


    }

    public function down(): void
    {
        Schema::dropIfExists('filters');
    }
};
