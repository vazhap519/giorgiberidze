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
        Schema::table('carousel_slides', function (Blueprint $table) {
            $table->json('styles')->nullable()->after('is_active');
            $table->string('button_url')->nullable()->after('button_text');

            $table->string('button2_text')->nullable()->after('button_url');

            $table->string('button2_url')->nullable()->after('button2_text');
        });
    }

    public function down(): void
    {
        Schema::table('carousel_slides', function (Blueprint $table) {
            $table->dropColumn('styles');
        });
    }
};
