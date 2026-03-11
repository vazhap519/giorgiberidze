<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('footers', function (Blueprint $table) {

            $table->json('contact_items')
                ->default(json_encode([
                    [
                        "type" => "email",
                        "value" => "needhelp@company.com"
                    ],
                    [
                        "type" => "phone",
                        "value" => "+995 555 000 000"
                    ],
                    [
                        "type" => "address",
                        "value" => "Tbilisi, Georgia"
                    ]
                ]))
                ->after('footer_description');

            $table->json('footer_contact_styles')
                ->default(json_encode([
                    "icon_color" => "#3b82f6",
                    "icon_hover_color" => "#2563eb",

                    "text_color" => "#cbd5f5",
                    "text_hover_color" => "#ffffff",

                    "icon_size" => 16,
                    "text_size" => 14,

                    "gap" => 12,
                    "item_spacing" => 16,

                    "icon_background" => "transparent",
                    "icon_border_radius" => 6,

                    "padding_y" => 4,
                    "padding_x" => 0,

                    "opacity" => 0.8,
                    "hover_opacity" => 1
                ]))
                ->after('contact_items');

        });
    }

    public function down(): void
    {
        Schema::table('footers', function (Blueprint $table) {
            $table->dropColumn('contact_items');
            $table->dropColumn('footer_contact_styles');
        });
    }
};
