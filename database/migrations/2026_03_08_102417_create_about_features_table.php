<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_features', function (Blueprint $table) {

            $table->id();

            $table->foreignId('about_section_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('title');
            $table->text('description');

            /*
            |--------------------------------
            | Feature Styles
            |--------------------------------
            */

            $table->string('bg_color')->default('#ffffff');

            $table->string('title_color')->default('#111827');

            $table->string('description_color')->default('#4b5563');

            $table->string('card_bg')->default('#ffffff');

            $table->string('card_border')->default('#e5e7eb');

            $table->string('card_hover_color')->default('#2563eb');

            $table->string('experience_bg')->default('#ffffff');

            $table->string('experience_text_color')->default('#2563eb');

            $table->integer('title_size')->default(48);

            $table->integer('description_size')->default(18);

            $table->integer('card_radius')->default(16);

            $table->integer('blur')->default(0);

            $table->float('opacity')->default(1);

            $table->integer('padding_top')->default(120);

            $table->integer('padding_bottom')->default(120);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_features');
    }
};
