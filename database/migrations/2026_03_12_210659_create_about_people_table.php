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
        Schema::create('about_people', function (Blueprint $table) {
            $table->id();
            $table->foreignId('about_section_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('person_name')->nullable();
            $table->string('person_position')->nullable();
            $table->string('person_experience_years')->nullable();
            $table->string('person_experience_description')->nullable();
            /*
            |--------------------------------------------------------------------------
            | Person Card Styles
            |--------------------------------------------------------------------------
            */

            $table->string('person_text_color')->default('#ffffff');

            $table->string('person_overlay_color')->default('#000000');

            $table->float('person_overlay_opacity')->default(0.7);

            $table->integer('person_card_radius')->default(24);

            $table->string('person_shadow')->default('0 20px 40px rgba(0,0,0,0.25)');

            $table->integer('person_blur')->default(0);

            $table->string('person_text_align')->default('center');

            $table->integer('person_name_size')->default(26);

            $table->integer('person_position_size')->default(16);

            $table->integer('experience_size')->default(24);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_people');
    }
};
