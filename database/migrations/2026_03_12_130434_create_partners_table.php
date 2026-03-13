<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();

            $table->boolean('active')->default(true);

            $table->string('title');
            $table->string('url')->nullable();

            $table->json('styles')->default(json_encode([

                "height" => 80,
                "width" => null,

                "radius" => 12,
                "padding" => 10,
                "margin" => 0,

                "opacity" => 1,
                "zIndex" => 1,

                "position" => "relative",

                "background" => "transparent",
                "backgroundHover" => null,

                "borderType" => "none",
                "borderWidth" => 0,
                "borderColor" => "#e5e7eb",

                "boxShadow" => "none",
                "boxShadowHover" => null,

                "scale" => 1,
                "scaleHover" => 1.05,

                "rotate" => 0,
                "rotateHover" => 0,

                "translateY" => 0,
                "translateYHover" => -5,

                "transition" => 300,

                "filters" => [
                    "grayscale" => 60,
                    "blur" => 0,
                    "brightness" => 100,
                    "contrast" => 100,
                    "saturate" => 100,
                    "sepia" => 0
                ]

            ]));

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
