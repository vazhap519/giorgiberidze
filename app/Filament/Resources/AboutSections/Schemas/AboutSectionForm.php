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

                    Section::make('ჩვენს შესახებ საერთო აღწერა')
                        ->schema([

                            TextInput::make('title')
                                ->label('სათაური')
                                ->required(),

                            Textarea::make('description')
                                ->label('აღწერა')
                                ->rows(4)
                                ->required(),

                            SpatieMediaLibraryFileUpload::make('about_image')
                                ->label('სურათები')
                                ->collection('about_image')
                                ->reorderable()
                                ->image()
                                ->imageEditor()
                                ->disk('public')
                                ->conversion('webp')
                                ->responsiveImages(),

                            TextInput::make('experience_years')
                                ->label('გამოცდილების წლები'),

                            TextInput::make('experience_label')
                                ->label('გამოცდილების ტექსტი'),

                        ])->columns(2),

                    Toggle::make('is_active')
                        ->label('აქტიურია')
                        ->default(true),

                    /*
                    |--------------------------------------------------------------------------
                    | სექციის სტილები
                    |--------------------------------------------------------------------------
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
                                ->label('Hover ფერი')
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
                                ->label('ბარათის კუთხე')
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
                                ->default(120),

                        ])
                        ->columns(2)

                ]),
            Section::make('პიროვნებები')->schema([
                Repeater::make('people')
                    ->relationship()
                    ->label('პიროვნებები')
                    ->schema([

                        TextInput::make('person_name')
                            ->label('სახელი გვარი')
                            ->required(),

                        TextInput::make('person_position')
                            ->label('პოზიცია'),

                        TextInput::make('person_experience_years')
                            ->label('გამოცდილების წლები'),

                        Textarea::make('person_experience_description')
                            ->label('აღწერა'),

                        SpatieMediaLibraryFileUpload::make('person_images')
                            ->label('სურათები')
                            ->collection('person_images')
                            ->multiple()
                            ->reorderable()
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->conversion('webp')
                            ->responsiveImages(),

                        ColorPicker::make('person_text_color')
                            ->default('#ffffff'),

                        ColorPicker::make('person_overlay_color')
                            ->default('#000000'),

                        TextInput::make('person_overlay_opacity')
                            ->numeric()
                            ->default(0.7),

                        Select::make('person_text_align')
                            ->options([
                                'left' => 'Left',
                                'center' => 'Center',
                                'right' => 'Right'
                            ])
                            ->default('center'),

                    ])
                    ->columns(2)
                    ->columnSpanFull()

            ])
        ]);
    }
}
