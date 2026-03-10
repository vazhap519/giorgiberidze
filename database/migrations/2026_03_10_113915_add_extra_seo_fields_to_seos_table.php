<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('seos', function (Blueprint $table) {

            $table->string('robots')
                ->nullable()
                ->after('twitter_description');

            $table->string('twitter_card')
                ->default('summary_large_image')
                ->after('robots');

            $table->string('schema_type')
                ->nullable()
                ->after('twitter_card');

        });
    }

    public function down(): void
    {
        Schema::table('seos', function (Blueprint $table) {

            $table->dropColumn([
                'robots',
                'twitter_card',
                'schema_type'
            ]);

        });
    }
};
