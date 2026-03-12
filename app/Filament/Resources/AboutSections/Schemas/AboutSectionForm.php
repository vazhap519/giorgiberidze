<?php

namespace App\Filament\Resources\AboutSections\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class AboutSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            Section::make('About სექცია')
                ->schema([

                    TextInput::make('title')
                        ->label('სათაური')
                        ->required(),

                    Textarea::make('description')
                        ->label('აღწერა')
                        ->rows(4)
                        ->required(),

                    TextInput::make('experience_years')
                        ->label('გამოცდილების წლები'),

                    TextInput::make('experience_label')
                        ->label('გამოცდილების ტექსტი'),

                    Toggle::make('is_active')
                        ->label('აქტიურია')
                        ->default(true),

                    SpatieMediaLibraryFileUpload::make('about_image')
                        ->label('სურათი')
                        ->collection('about_image')
                        ->image()
                        ->imageEditor()
                        ->disk('public')
                        ->conversion('webp')
                        ->responsiveImages()

                ])->columns(2),

            /*
            |--------------------------------
            | მახასიათებლები
            |--------------------------------
            */

            Repeater::make('features')
                ->relationship()
                ->label('მახასიათებლები')
                ->schema([

                    TextInput::make('title')
                        ->label('სათაური')
                        ->required(),

                    Textarea::make('description')
                        ->label('აღწერა')
                        ->required(),

                    ColorPicker::make('card_bg')
                        ->label('ბარათის ფონი')
                        ->default('#ffffff'),

                    ColorPicker::make('card_border')
                        ->label('ბარათის საზღვარი')
                        ->default('#e5e7eb'),

                    ColorPicker::make('title_color')
                        ->label('სათაურის ფერი')
                        ->default('#111827'),

                    ColorPicker::make('description_color')
                        ->label('აღწერის ფერი')
                        ->default('#4b5563'),

                    Select::make('card_radius')
                        ->label('კუთხის მომრგვალება')
                        ->options([
                            12 => '12px',
                            16 => '16px',
                            20 => '20px',
                            24 => '24px'
                        ])
                        ->default(16),

                    Select::make('blur')
                        ->label('ბლური')
                        ->options([
                            0 => '0px',
                            10 => '10px',
                            20 => '20px'
                        ])
                        ->default(0),

                    Select::make('opacity')
                        ->label('გამჭვირვალობა')
                        ->options([
                            '1' => '1',
                            '0.9' => '0.9',
                            '0.8' => '0.8'
                        ])
                        ->default('1')

                ])
                ->columns(2)
                ->columnSpanFull(),

            /*
            |--------------------------------
            | სექციის სტილები
            |--------------------------------
            */

            Section::make('სექციის სტილები')
                ->schema([

                    ColorPicker::make('bg_color')
                        ->label('ფონის ფერი')
                        ->default('#ffffff'),

                    ColorPicker::make('title_color')
                        ->label('სათაურის ფერი')
                        ->default('#111827'),

                    ColorPicker::make('description_color')
                        ->label('აღწერის ფერი')
                        ->default('#4b5563'),

                    ColorPicker::make('card_bg')
                        ->label('ბარათის ფონი')
                        ->default('#ffffff'),

                    ColorPicker::make('card_border')
                        ->label('ბარათის საზღვარი')
                        ->default('#e5e7eb'),

                    ColorPicker::make('card_hover_color')
                        ->label('ბარათის Hover ფერი')
                        ->default('#2563eb'),

                    ColorPicker::make('experience_bg')
                        ->label('გამოცდილების ფონი')
                        ->default('#ffffff'),

                    ColorPicker::make('experience_text_color')
                        ->label('გამოცდილების ტექსტის ფერი')
                        ->default('#2563eb'),

                    Select::make('title_size')
                        ->label('სათაურის ზომა')
                        ->options([
                            32 => '32px',
                            40 => '40px',
                            48 => '48px',
                            56 => '56px'
                        ])
                        ->default(48),

                    Select::make('description_size')
                        ->label('აღწერის ზომა')
                        ->options([
                            14 => '14px',
                            16 => '16px',
                            18 => '18px',
                            20 => '20px'
                        ])
                        ->default(18),

                    Select::make('card_radius')
                        ->label('ბარათის კუთხის მომრგვალება')
                        ->options([
                            12 => '12px',
                            16 => '16px',
                            20 => '20px',
                            24 => '24px'
                        ])
                        ->default(16),

                    Select::make('blur')
                        ->label('ბლური')
                        ->options([
                            0 => '0px',
                            10 => '10px',
                            20 => '20px'
                        ])
                        ->default(0),

                    Select::make('opacity')
                        ->label('გამჭვირვალობა')
                        ->options([
                            '1' => '1',
                            '0.9' => '0.9',
                            '0.8' => '0.8'
                        ])
                        ->default('1'),

                    Select::make('padding_top')
                        ->label('ზედა დაშორება')
                        ->options([
                            80 => '80px',
                            120 => '120px',
                            160 => '160px'
                        ])
                        ->default(120),

                    Select::make('padding_bottom')
                        ->label('ქვედა დაშორება')
                        ->options([
                            80 => '80px',
                            120 => '120px',
                            160 => '160px'
                        ])
                        ->default(120)

                ])
                ->columns(2)

        ]);
    }
}
