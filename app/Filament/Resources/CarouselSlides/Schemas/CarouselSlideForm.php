<?php

namespace App\Filament\Resources\CarouselSlides\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class CarouselSlideForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                /*
                |--------------------------------------------------------------------------
                | კონტენტი
                |--------------------------------------------------------------------------
                */

                Section::make('კონტენტი')
                    ->schema([

                        TextInput::make('title')
                            ->label('სათაური')
                            ->required(),

                        Textarea::make('subtitle')
                            ->label('ქვესათაური'),

                        TextInput::make('button_text')
                            ->label('პირველი ღილაკის ტექსტი')
                            ->required(),

                        TextInput::make('button_url')
                            ->label('პირველი ღილაკის ლინკი')
                            ->url(),

                        TextInput::make('button2_text')
                            ->label('მეორე ღილაკის ტექსტი'),

                        TextInput::make('button2_url')
                            ->label('მეორე ღილაკის ლინკი')
                            ->url(),

                        Toggle::make('is_active')
                            ->label('აქტიური')
                            ->default(true),

                    ])
                    ->columns(2),


                /*
                |--------------------------------------------------------------------------
                | სურათები
                |--------------------------------------------------------------------------
                */

                Section::make('სურათები')
                    ->schema([

                        SpatieMediaLibraryFileUpload::make('background')
                            ->label('ფონის სურათი')
                            ->collection('background')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->conversion('webp')
                            ->responsiveImages(),

                        SpatieMediaLibraryFileUpload::make('image')
                            ->label('პროდუქტის სურათი')
                            ->collection('image')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->conversion('webp')
                            ->responsiveImages()
                            ->helperText('მცურავი პროდუქტის სურათი'),

                    ])
                    ->columns(2),


                /*
                |--------------------------------------------------------------------------
                | სექციის სტილები
                |--------------------------------------------------------------------------
                */

                Section::make('სექციის სტილები')
                    ->schema([

                        ColorPicker::make('styles.section_bg')
                            ->label('სექციის ფონის ფერი'),

                        Select::make('styles.padding')
                            ->label('შიდა დაშორება (Padding px)')
                            ->options([
                                24 => 24,
                                48 => 48,
                                64 => 64,
                                96 => 96,
                            ]),

                        Select::make('styles.opacity')
                            ->label('ფონის გამჭვირვალობა')
                            ->options([
                                60 => '60%',
                                70 => '70%',
                                80 => '80%',
                                90 => '90%',
                                100 => '100%',
                            ]),

                        ColorPicker::make('styles.gradient_from')
                            ->label('გრადიენტის საწყისი ფერი'),

                        ColorPicker::make('styles.gradient_to')
                            ->label('გრადიენტის საბოლოო ფერი'),

                    ])
                    ->columns(3),


                /*
                |--------------------------------------------------------------------------
                | სათაურის სტილები
                |--------------------------------------------------------------------------
                */

                Section::make('სათაურის სტილები')
                    ->schema([

                        ColorPicker::make('styles.title_color')
                            ->label('სათაურის ფერი'),

                        Select::make('styles.title_size')
                            ->label('სათაურის ზომა')
                            ->options([
                                'text-4xl' => '4XL',
                                'text-5xl' => '5XL',
                                'text-6xl' => '6XL',
                                'text-7xl' => '7XL',
                            ]),

                        ColorPicker::make('styles.subtitle_color')
                            ->label('ქვესათაურის ფერი'),

                    ])
                    ->columns(3),


                /*
                |--------------------------------------------------------------------------
                | ღილაკის სტილები
                |--------------------------------------------------------------------------
                */

                Section::make('ღილაკის სტილები')
                    ->schema([

                        ColorPicker::make('styles.button_bg')
                            ->label('ღილაკის ფონის ფერი'),

                        ColorPicker::make('styles.button_text')
                            ->label('ღილაკის ტექსტის ფერი'),

                        ColorPicker::make('styles.button_border_color')
                            ->label('ბორდერის ფერი'),

                        Select::make('styles.button_border_width')
                            ->label('ბორდერის სისქე')
                            ->options([
                                0 => '0px',
                                1 => '1px',
                                2 => '2px',
                                3 => '3px',
                            ])
                            ->formatStateUsing(fn ($state) => $state ?? 0),

                        Select::make('styles.button_radius')
                            ->label('კუთხის დამრგვალება')
                            ->options([
                                0 => '0px',
                                8 => '8px',
                                12 => '12px',
                                20 => '20px',
                                30 => '30px',
                            ])
                            ->formatStateUsing(fn ($state) => $state ?? 12),

                        Select::make('styles.button_font_size')
                            ->label('ტექსტის ზომა')
                            ->options([
                                14 => '14px',
                                16 => '16px',
                                18 => '18px',
                                20 => '20px',
                                24 => '24px',
                            ])
                            ->formatStateUsing(fn ($state) => $state ?? 16),

                        Select::make('styles.button_opacity')
                            ->label('გამჭვირვალობა')
                            ->options([
                                70 => '70%',
                                80 => '80%',
                                90 => '90%',
                                100 => '100%',
                            ])
                            ->formatStateUsing(fn ($state) => $state ?? 100),

                        /*
                        |--------------------------------------------------------------------------
                        | მეორე ღილაკი
                        |--------------------------------------------------------------------------
                        */

                        ColorPicker::make('styles.button2_bg')
                            ->label('მეორე ღილაკის ფონის ფერი'),

                        ColorPicker::make('styles.button2_text')
                            ->label('მეორე ღილაკის ტექსტის ფერი'),

                        ColorPicker::make('styles.button2_border')
                            ->label('მეორე ღილაკის ბორდერის ფერი'),

                    ])
                    ->columns(3)

            ]);
    }
}
