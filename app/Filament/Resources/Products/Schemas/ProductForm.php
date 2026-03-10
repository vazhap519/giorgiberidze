<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            /*
            |--------------------------------------------------------------------------
            | ძირითადი ინფორმაცია
            |--------------------------------------------------------------------------
            */

            Section::make('პროდუქტის ინფორმაცია')
                ->schema([

                    TextInput::make('title')
                        ->label('პროდუქტის სახელი')
                        ->required(),

                    Textarea::make('description')
                        ->label('აღწერა'),

                    SpatieMediaLibraryFileUpload::make('image')
                        ->collection('image')
                        ->image()
                        ->imageEditor()
                        ->conversion('webp')
                        ->disk('public')
                        ->responsiveImages()
                        ->label('პროდუქტის ფოტო'),

                ]),


            /*
            |--------------------------------------------------------------------------
            | მახასიათებლები
            |--------------------------------------------------------------------------
            */

            Section::make('მახასიათებლები')
                ->schema([

                    Repeater::make('features')
                        ->label('მახასიათებლები')
                        ->schema([

                            TextInput::make('feature')
                                ->label('მახასიათებელი')
                                ->required(),

                        ])
                        ->defaultItems(3)
                        ->collapsible()
                        ->reorderable()

                ]),


            /*
            |--------------------------------------------------------------------------
            | ბარათის დიზაინი
            |--------------------------------------------------------------------------
            */

            Section::make('ბარათის დიზაინი')
                ->schema([

                    ColorPicker::make('card_bg')
                        ->label('ბარათის ფონი'),

                    ColorPicker::make('card_border')
                        ->label('ჩარჩოს ფერი'),

                    Select::make('card_radius')
                        ->label('კუთხეების მომრგვალება')
                        ->options([
                            12 => '12px',
                            16 => '16px',
                            20 => '20px',
                            24 => '24px'
                        ]),

                    Select::make('card_shadow')
                        ->label('ჩრდილი')
                        ->options([
                            'sm' => 'Small',
                            'md' => 'Medium',
                            'lg' => 'Large',
                            'xl' => 'XL'
                        ]),

                ])
                ->columns(2),


            /*
            |--------------------------------------------------------------------------
            | სათაურის სტილები
            |--------------------------------------------------------------------------
            */

            Section::make('სათაურის სტილები')
                ->schema([

                    ColorPicker::make('title_color')
                        ->label('სათაურის ფერი'),

                    Select::make('title_size')
                        ->label('ფონტის ზომა')
                        ->options([
                            16 => '16px',
                            18 => '18px',
                            20 => '20px',
                            24 => '24px'
                        ]),

                    Select::make('title_weight')
                        ->label('Font Weight')
                        ->options([
                            400 => 'Normal',
                            500 => 'Medium',
                            600 => 'SemiBold',
                            700 => 'Bold'
                        ]),

                ])
                ->columns(2),


            /*
            |--------------------------------------------------------------------------
            | Overlay დიზაინი
            |--------------------------------------------------------------------------
            */

            Section::make('Overlay დიზაინი')
                ->schema([

                    ColorPicker::make('overlay_bg_from')
                        ->label('Gradient From'),

                    ColorPicker::make('overlay_bg_via')
                        ->label('Gradient Via'),

                    ColorPicker::make('overlay_bg_to')
                        ->label('Gradient To'),

                    ColorPicker::make('overlay_text_color')
                        ->label('Overlay ტექსტის ფერი'),

                ])
                ->columns(2),


            /*
            |--------------------------------------------------------------------------
            | Feature Styles
            |--------------------------------------------------------------------------
            */

            Section::make('Feature სტილები')
                ->schema([

                    ColorPicker::make('feature_icon_color')
                        ->label('Icon ფერი'),

                    ColorPicker::make('feature_text_color')
                        ->label('ტექსტის ფერი'),

                    Select::make('feature_icon_size')
                        ->label('Icon ზომა')
                        ->options([
                            14=>'14px',
                            16=>'16px',
                            18=>'18px',
                            20=>'20px'
                        ]),

                    Select::make('feature_text_size')
                        ->label('ტექსტის ზომა')
                        ->options([
                            12=>'12px',
                            14=>'14px',
                            16=>'16px'
                        ])

                ])
                ->columns(2)

        ]);
    }
}
