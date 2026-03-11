<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Section;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Illuminate\Support\Str;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            /*
            |--------------------------------------------------------------------------
            | Project Titles
            |--------------------------------------------------------------------------
            */

            Section::make('პროექტის სათაურები')
                ->columns(3)
                ->schema([

                    TextInput::make('title')
                        ->label('პროექტის სათაური')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(function (Set $set, ?string $state) {
                            $set('slug', Str::slug($state));
                        }),

                    TextInput::make('slug')
                        ->label('Slug')
                        ->required()
                        ->unique(ignoreRecord: true),

                    TextInput::make('project_overview_title')
                        ->label('პროექტის მიმოხილვის სათაური')
                        ->maxLength(255),

                    TextInput::make('project_gallery_title')
                        ->label('პროექტის გალერიის სათაური')
                        ->maxLength(255),

                ]),

            /*
            |--------------------------------------------------------------------------
            | Description
            |--------------------------------------------------------------------------
            */

            Section::make('აღწერა')
                ->schema([

                    Textarea::make('description')
                        ->label('აღწერა')
                        ->rows(5)
                        ->columnSpanFull(),

                ]),

            Toggle::make('is_active')
                ->label('აქტიურია')
                ->default(true),

            /*
            |--------------------------------------------------------------------------
            | Media
            |--------------------------------------------------------------------------
            */

            Tabs::make('Media')
                ->tabs([

                    Tabs\Tab::make('Cover Image')
                        ->schema([

                            SpatieMediaLibraryFileUpload::make('cover_image')
                                ->collection('cover_image')
                                ->image()
                                ->imageEditor()
                                ->disk('public')
                                ->columnSpanFull(),

                        ]),

                    Tabs\Tab::make('Gallery')
                        ->schema([

                            SpatieMediaLibraryFileUpload::make('images')
                                ->collection('images')
                                ->multiple()
                                ->reorderable()
                                ->image()
                                ->imageEditor()
                                ->disk('public')
                                ->responsiveImages()
                                ->columnSpanFull(),

                        ]),

                    Tabs\Tab::make('Videos')
                        ->schema([

                            SpatieMediaLibraryFileUpload::make('videos')
                                ->collection('videos')
                                ->multiple()
                                ->reorderable()
                                ->disk('public')
                                ->maxSize(1024000)
                                ->acceptedFileTypes([
                                    'video/mp4',
                                    'video/webm',
                                    'video/quicktime',
                                    'video/x-msvideo',
                                    'video/x-matroska'
                                ])
                                ->columnSpanFull(),

                        ]),

                ]),

            /*
            |--------------------------------------------------------------------------
            | UI Texts
            |--------------------------------------------------------------------------
            */

            Section::make('ტექსტები')
                ->columns(3)
                ->schema([

                    TextInput::make('project_label')
                        ->label('Card Label ტექსტი')
                        ->default('პროექტი'),

                    TextInput::make('cta_text')
                        ->label('ღილაკის ტექსტი')
                        ->default('დეტალურად'),

                    TextInput::make('video_section_title')
                        ->label('ვიდეო სექციის სათაური')
                        ->default('ვიდეო'),

                ]),

            /*
            |--------------------------------------------------------------------------
            | Card Styles
            |--------------------------------------------------------------------------
            */

            Section::make('ბარათის სტილები')
                ->columns(2)
                ->schema([

                    ColorPicker::make('card_bg')
                        ->label('ბარათის ფონი')
                        ->default('#ffffff'),

                    ColorPicker::make('card_border')
                        ->label('ჩარჩოს ფერი')
                        ->default('#e5e7eb'),

                    Select::make('card_radius')
                        ->label('კუთხეების მომრგვალება')
                        ->options([
                            12 => '12px',
                            16 => '16px',
                            20 => '20px',
                            24 => '24px'
                        ])
                        ->default(16),

                    Select::make('card_shadow')
                        ->label('ჩრდილი')
                        ->options([
                            'sm' => 'Small',
                            'md' => 'Medium',
                            'lg' => 'Large',
                            'xl' => 'XL'
                        ])
                        ->default('lg'),

                ]),

            /*
            |--------------------------------------------------------------------------
            | Typography
            |--------------------------------------------------------------------------
            */

            Section::make('Typography')
                ->columns(2)
                ->schema([

                    ColorPicker::make('title_color')
                        ->label('სათაურის ფერი')
                        ->default('#111827'),

                    Select::make('title_size')
                        ->label('სათაურის ზომა')
                        ->options([
                            16 => '16px',
                            18 => '18px',
                            20 => '20px',
                            24 => '24px'
                        ])
                        ->default(20),

                    Select::make('title_weight')
                        ->label('Font Weight')
                        ->options([
                            400 => 'Normal',
                            500 => 'Medium',
                            600 => 'SemiBold',
                            700 => 'Bold'
                        ])
                        ->default(600),

                    ColorPicker::make('description_color')
                        ->label('აღწერის ფერი')
                        ->default('#6b7280'),

                    Select::make('description_size')
                        ->label('აღწერის ზომა')
                        ->options([
                            14 => '14px',
                            16 => '16px',
                            18 => '18px'
                        ])
                        ->default(16),

                ]),

            /*
            |--------------------------------------------------------------------------
            | Overlay
            |--------------------------------------------------------------------------
            */

            Section::make('Overlay')
                ->columns(2)
                ->schema([

                    ColorPicker::make('overlay_bg_from')
                        ->label('Gradient From')
                        ->default('#1d4ed8'),

                    ColorPicker::make('overlay_bg_via')
                        ->label('Gradient Via')
                        ->default('#2563eb'),

                    ColorPicker::make('overlay_bg_to')
                        ->label('Gradient To')
                        ->default('#3b82f6'),

                    ColorPicker::make('overlay_text_color')
                        ->label('ტექსტის ფერი')
                        ->default('#ffffff'),

                ]),

            /*
            |--------------------------------------------------------------------------
            | Icon Styles
            |--------------------------------------------------------------------------
            */

            Section::make('Icon Styles')
                ->columns(2)
                ->schema([

                    ColorPicker::make('icon_color')
                        ->label('Icon ფერი')
                        ->default('#22c55e'),

                    Select::make('icon_size')
                        ->label('Icon ზომა')
                        ->options([
                            14 => '14px',
                            16 => '16px',
                            18 => '18px',
                            20 => '20px'
                        ])
                        ->default(18),

                ]),

        ]);
    }
}
