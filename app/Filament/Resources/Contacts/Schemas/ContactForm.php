<?php

namespace App\Filament\Resources\Contacts\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Select;

class ContactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            /*
            |--------------------------------------------------------------------------
            | ფორმის ტექსტები
            |--------------------------------------------------------------------------
            */

            Section::make('ფორმის ტექსტები')
                ->schema([

                    TextInput::make('contact_form_title')
                        ->label('კონტაქტის ფორმის სათაური')
                        ->default('მოგვწერეთ'),

                    TextInput::make('contact_form_button')
                        ->label('კონტაქტის ღილაკის ტექსტი')
                        ->default('გაგზავნა'),

                    TextInput::make('service_form_title')
                        ->label('სერვისის ფორმის სათაური')
                        ->default('სერვისის მოთხოვნა'),

                    TextInput::make('service_form_button')
                        ->label('სერვისის ღილაკის ტექსტი')
                        ->default('მოთხოვნის გაგზავნა'),

                    TextInput::make('name_placeholder')
                        ->label('სახელის ველის ტექსტი')
                        ->default('სახელი'),

                    TextInput::make('email_placeholder')
                        ->label('იმეილის ველის ტექსტი')
                        ->default('იმეილი'),

                    TextInput::make('phone_placeholder')
                        ->label('ტელეფონის ველის ტექსტი')
                        ->default('ტელეფონი'),

                    TextInput::make('message_placeholder')
                        ->label('შეტყობინების ველის ტექსტი')
                        ->default('ტექსტი'),

                    TextInput::make('address_placeholder')
                        ->label('მისამართის ველის ტექსტი')
                        ->default('მისამართი'),

                ])
                ->columns(2),


            /*
            |--------------------------------------------------------------------------
            | სერვისები
            |--------------------------------------------------------------------------
            */

            Section::make('სერვისების სია')
                ->schema([

                    Repeater::make('service_options')
                        ->label('სერვისები')
                        ->schema([
                            TextInput::make('title')
                                ->label('სერვისის დასახელება')
                                ->required(),
                        ])
                        ->defaultItems(1)

                ]),


            /*
            |--------------------------------------------------------------------------
            | სექციის სტილები
            |--------------------------------------------------------------------------
            */

            Section::make('სექციის სტილები')
                ->schema([

                    ColorPicker::make('section_bg')
                        ->label('სექციის ფონის ფერი')
                        ->default('#f8fafc'),

                    Select::make('section_padding')
                        ->label('შიდა დაშორება (Padding px)')
                        ->options(array_combine(range(1,50), range(1,50)))
                        ->default(20),

                    Select::make('section_opacity')
                        ->label('სექციის გამჭვირვალობა (%)')
                        ->options(array_combine(range(0,100), range(0,100)))
                        ->default(100),

                    ColorPicker::make('section_gradient_from')
                        ->label('გრადიენტის დასაწყისი'),

                    ColorPicker::make('section_gradient_to')
                        ->label('გრადიენტის დასასრული'),

                ])
                ->columns(2),


            /*
            |--------------------------------------------------------------------------
            | ბარათის სტილები
            |--------------------------------------------------------------------------
            */

            Section::make('ბარათის სტილები')
                ->schema([

                    ColorPicker::make('card_bg')
                        ->label('ბარათის ფონის ფერი')
                        ->default('#ffffff'),

                    ColorPicker::make('card_border')
                        ->label('ბარათის ჩარჩოს ფერი')
                        ->default('#e5e7eb'),

                    Select::make('card_border_width')
                        ->label('ჩარჩოს სისქე (px)')
                        ->options(array_combine(range(1,50), range(1,50)))
                        ->default(1),

                    Select::make('card_radius')
                        ->label('კუთხის დამრგვალება (px)')
                        ->options(array_combine(range(1,50), range(1,50)))
                        ->default(16),

                    Select::make('card_shadow')
                        ->label('ჩრდილის ზომა')
                        ->options([
                            'sm'=>'პატარა',
                            'md'=>'საშუალო',
                            'lg'=>'დიდი',
                            'xl'=>'ძალიან დიდი',
                            '2xl'=>'მაქსიმალური',
                        ])
                        ->default('lg'),

                    Select::make('card_opacity')
                        ->label('ბარათის გამჭვირვალობა (%)')
                        ->options(array_combine(range(0,100), range(0,100)))
                        ->default(100),

                ])
                ->columns(2),


            /*
            |--------------------------------------------------------------------------
            | ფორმის ველების სტილები
            |--------------------------------------------------------------------------
            */

            Section::make('ფორმის ველების სტილები')
                ->schema([

                    ColorPicker::make('input_bg')
                        ->label('ველის ფონის ფერი')
                        ->default('#ffffff'),

                    ColorPicker::make('input_border')
                        ->label('ველის ჩარჩოს ფერი')
                        ->default('#e5e7eb'),

                    Select::make('input_border_width')
                        ->label('ველის ჩარჩოს სისქე (px)')
                        ->options(array_combine(range(1,50), range(1,50)))
                        ->default(1),

                    Select::make('input_radius')
                        ->label('კუთხის დამრგვალება (px)')
                        ->options(array_combine(range(1,50), range(1,50)))
                        ->default(12),

                    ColorPicker::make('input_focus_color')
                        ->label('ფოკუსის ფერი')
                        ->default('#3b82f6'),

                    ColorPicker::make('input_text_color')
                        ->label('ტექსტის ფერი')
                        ->default('#111827'),

                    ColorPicker::make('input_placeholder_color')
                        ->label('Placeholder ტექსტის ფერი')
                        ->default('#9ca3af'),

                ])
                ->columns(2),


            /*
            |--------------------------------------------------------------------------
            | ღილაკის სტილები
            |--------------------------------------------------------------------------
            */

            Section::make('ღილაკის სტილები')
                ->schema([

                    ColorPicker::make('button_bg_from')
                        ->label('გრადიენტის დასაწყისი')
                        ->default('#2563eb'),

                    ColorPicker::make('button_bg_to')
                        ->label('გრადიენტის დასასრული')
                        ->default('#1d4ed8'),

                    ColorPicker::make('button_text_color')
                        ->label('ღილაკის ტექსტის ფერი')
                        ->default('#ffffff'),

                    Select::make('button_radius')
                        ->label('კუთხის დამრგვალება (px)')
                        ->options(array_combine(range(1,50), range(1,50)))
                        ->default(12),

                    Select::make('button_shadow')
                        ->label('ღილაკის ჩრდილი')
                        ->options([
                            'sm'=>'პატარა',
                            'md'=>'საშუალო',
                            'lg'=>'დიდი',
                            'xl'=>'ძალიან დიდი',
                            '2xl'=>'მაქსიმალური',
                        ])
                        ->default('md'),

                    Select::make('button_opacity')
                        ->label('ღილაკის გამჭვირვალობა (%)')
                        ->options(array_combine(range(0,100), range(0,100)))
                        ->default(100),

                ])
                ->columns(2),


            /*
            |--------------------------------------------------------------------------
            | ტიპოგრაფია
            |--------------------------------------------------------------------------
            */

            Section::make('ტიპოგრაფია')
                ->schema([

                    ColorPicker::make('title_color')
                        ->label('სათაურის ფერი')
                        ->default('#1f2937'),

                    Select::make('title_size')
                        ->label('სათაურის ზომა (px)')
                        ->options(array_combine(range(10,50), range(10,50)))
                        ->default(20),

                    Select::make('title_weight')
                        ->label('სათაურის სისქე')
                        ->options([
                            '400'=>'ნორმალური',
                            '500'=>'Medium',
                            '600'=>'ნახევრად სქელი',
                            '700'=>'სქელი',
                        ])
                        ->default('600'),

                    Select::make('title_opacity')
                        ->label('სათაურის გამჭვირვალობა (%)')
                        ->options(array_combine(range(0,100), range(0,100)))
                        ->default(100),

                    ColorPicker::make('text_color')
                        ->label('ტექსტის ფერი')
                        ->default('#6b7280'),

                    Select::make('text_size')
                        ->label('ტექსტის ზომა (px)')
                        ->options(array_combine(range(10,50), range(10,50)))
                        ->default(14),

                    Select::make('text_opacity')
                        ->label('ტექსტის გამჭვირვალობა (%)')
                        ->options(array_combine(range(0,100), range(0,100)))
                        ->default(100),

                ])
                ->columns(2),

        ]);
    }
}
