<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Service Options
            |--------------------------------------------------------------------------
            */

            $table->json('service_options')->nullable();


            /*
            |--------------------------------------------------------------------------
            | Section Styles
            |--------------------------------------------------------------------------
            */

            $table->string('section_bg')->default('#f8fafc');

            $table->integer('section_opacity')->default(100);

            $table->integer('section_padding')->default(96);

            $table->string('section_gradient_from')->nullable();

            $table->string('section_gradient_to')->nullable();


            /*
            |--------------------------------------------------------------------------
            | Card Styles
            |--------------------------------------------------------------------------
            */

            $table->string('card_bg')->default('#ffffff')->nullable();

            $table->string('card_border')->default('#e5e7eb')->nullable();

            $table->integer('card_border_width')->default(1)->nullable();

            $table->integer('card_radius')->default(16)->nullable();

            $table->string('card_shadow')->default('lg')->nullable();

            $table->integer('card_opacity')->default(100)->nullable();


            /*
            |--------------------------------------------------------------------------
            | Input Styles
            |--------------------------------------------------------------------------
            */

            $table->string('input_bg')->default('#ffffff');

            $table->string('input_border')->default('#e5e7eb');

            $table->integer('input_border_width')->default(1);

            $table->integer('input_radius')->default(12);

            $table->string('input_focus_color')->default('#3b82f6');

            $table->string('input_text_color')->default('#111827');

            $table->string('input_placeholder_color')->default('#9ca3af');


            /*
            |--------------------------------------------------------------------------
            | Button Styles
            |--------------------------------------------------------------------------
            */

            $table->string('button_bg_from')->default('#2563eb');

            $table->string('button_bg_to')->default('#1d4ed8');

            $table->string('button_text_color')->default('#ffffff');

            $table->integer('button_radius')->default(12);

            $table->string('button_shadow')->default('md');

            $table->integer('button_opacity')->default(100);

            $table->string('button_hover_from')->nullable();

            $table->string('button_hover_to')->nullable();


            /*
            |--------------------------------------------------------------------------
            | Title Typography
            |--------------------------------------------------------------------------
            */

            $table->string('title_color')->default('#1f2937');

            $table->integer('title_size')->default(20);

            $table->string('title_weight')->default('600');

            $table->integer('title_opacity')->default(100);


            /*
            |--------------------------------------------------------------------------
            | Text Typography
            |--------------------------------------------------------------------------
            */

            $table->string('text_color')->default('#6b7280');

            $table->integer('text_size')->default(14);

            $table->integer('text_opacity')->default(100);


            /*
            |--------------------------------------------------------------------------
            | Animation / Effects
            |--------------------------------------------------------------------------
            */

            $table->string('animation')->nullable();

            $table->integer('animation_duration')->default(300);

            $table->string('transition')->default('ease');


            /*
            |--------------------------------------------------------------------------
            | Contact Texts
            |--------------------------------------------------------------------------
            */

            $table->string('contact_form_title')->default('მოგვწერეთ');

            $table->string('contact_form_button')->default('გაგზავნა');

            $table->string('service_form_title')->default('სერვისის მოთხოვნა');

            $table->string('service_form_button')->default('მოთხოვნის გაგზავნა');

            $table->string('name_placeholder')->default('სახელი');

            $table->string('email_placeholder')->default('იმეილი');

            $table->string('phone_placeholder')->default('ტელეფონი');

            $table->string('message_placeholder')->default('ტექსტი');

            $table->string('address_placeholder')->default('მისამართი');


            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
