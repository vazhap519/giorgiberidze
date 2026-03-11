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
        Schema::table('products', function (Blueprint $table) {
            $table->json('specs')->nullable();
            $table->json('downloads')->nullable();
            $table->string('download_btn_bg')->default('#ef4444');
            $table->string('download_btn_hover')->default('#dc2626');
            $table->string('download_btn_text')->default('#ffffff');
            $table->integer('download_btn_radius')->default(6);
            $table->integer('download_btn_size')->default(14);


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
