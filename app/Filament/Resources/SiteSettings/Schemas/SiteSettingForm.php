<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                /*
                |--------------------------------------------------------------------------
                | Basic
                |--------------------------------------------------------------------------
                */

                Section::make('საიტის ძირითადი ინფორმაცია')
                    ->schema([

                        TextInput::make('site_name')
                            ->label('Site Name')
                            ->required()
                            ->maxLength(255),

                        SpatieMediaLibraryFileUpload::make('favicon')
                            ->collection('favicon')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->conversion('webp')
                            ->responsiveImages()
                            ->helperText('Recommended 32x32 or 64x64')
                            ->required(),

                        SpatieMediaLibraryFileUpload::make('logo')
                            ->collection('logo')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->conversion('webp')
                            ->responsiveImages()
                            ->required(),

                    ])->columns(2),


                /*
                |--------------------------------------------------------------------------
                | Section Titles
                |--------------------------------------------------------------------------
                */

                Section::make('საიტის სექციების სათაურები')
                    ->schema([



                        TextInput::make('services_header')
                            ->label('სერვისების სათაური'),

                        TextInput::make('about_header')
                            ->label('ჩვენს შესახებ სათაური'),

                        TextInput::make('project_header')
                            ->label('პროექტების სათაური'),







                    ])->columns(2),
Section::make('პროდუქტები')->schema([
    TextInput::make('products_title')
        ->label('პროდუქტების სათაური (მთავარ გვერე)'),
    TextInput::make('product_overview')
        ->label('პროექტების განხილვა'),

    TextInput::make('Downloads_Features')
        ->label('პროდუქტის გადმოსაწერი მასალები'),
    TextInput::make('product_Features')
        ->label('პროდუქტის მახასიათებლები')
]),

                /*
                |--------------------------------------------------------------------------
                | Product Page Texts
                |--------------------------------------------------------------------------
                */

                Section::make('პროდუქტების გვერდი')
                    ->schema([

                        TextInput::make('products_page_title')
                            ->label('Products Page Title')
                            ->default('IP Cameras'),

                        TextInput::make('filter_title')
                            ->label('Filter Title')
                            ->default('Filter by Features'),

                        TextInput::make('clear_filters_text')
                            ->label('Clear Filters Text')
                            ->default('Clear Filters'),

                    ])->columns(2),


                /*
                |--------------------------------------------------------------------------
                | Colors
                |--------------------------------------------------------------------------
                */

                Section::make('ფერები')
                    ->schema([

                        ColorPicker::make('accent_color')
                            ->label('Accent Color (Red)')
                            ->default('#dc2626'),

                        ColorPicker::make('dark_color')
                            ->label('Dark Color')
                            ->default('#111827'),

                    ])->columns(2),

            ]);
    }
}
