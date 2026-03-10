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

            Section::make('About Section')
                ->schema([

                    TextInput::make('title')
                        ->label('სათაური')
                        ->required(),

                    Textarea::make('description')
                        ->label('აღწერა')
                        ->rows(4),

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
            | Features
            |--------------------------------
            */

            Repeater::make('features')
                ->relationship()
                ->label('Features')
                ->schema([

                    TextInput::make('title')
                        ->label('Feature Title'),

                    Textarea::make('description')
                        ->label('Feature Description'),

                    ColorPicker::make('card_bg')
                        ->label('Card Background'),

                    ColorPicker::make('card_border')
                        ->label('Card Border'),

                    ColorPicker::make('title_color')
                        ->label('Title Color'),

                    ColorPicker::make('description_color')
                        ->label('Description Color'),

                    Select::make('card_radius')
                        ->options([
                            12=>'12px',
                            16=>'16px',
                            20=>'20px',
                            24=>'24px'
                        ])
                        ->label('Border Radius'),

                    Select::make('blur')
                        ->options([
                            0=>'0px',
                            10=>'10px',
                            20=>'20px'
                        ]),

                    Select::make('opacity')
                        ->options([
                            1=>'1',
                            0.9=>'0.9',
                            0.8=>'0.8'
                        ])

                ])
                ->columns(2)
                ->columnSpanFull(),

            /*
            |--------------------------------
            | Section Styles
            |--------------------------------
            */

            Section::make('Section Styles')
                ->schema([

                    ColorPicker::make('bg_color'),

                    ColorPicker::make('title_color'),

                    ColorPicker::make('description_color'),

                    ColorPicker::make('card_bg'),

                    ColorPicker::make('card_border'),

                    ColorPicker::make('card_hover_color'),

                    ColorPicker::make('experience_bg'),

                    ColorPicker::make('experience_text_color'),

                    Select::make('title_size')->options([
                        32=>'32px',
                        40=>'40px',
                        48=>'48px',
                        56=>'56px'
                    ]),

                    Select::make('description_size')->options([
                        14=>'14px',
                        16=>'16px',
                        18=>'18px',
                        20=>'20px'
                    ]),

                    Select::make('card_radius')->options([
                        12=>'12px',
                        16=>'16px',
                        20=>'20px',
                        24=>'24px'
                    ]),

                    Select::make('blur')->options([
                        0=>'0px',
                        10=>'10px',
                        20=>'20px'
                    ]),

                    Select::make('opacity')->options([
                        1=>'1',
                        0.9=>'0.9',
                        0.8=>'0.8'
                    ]),

                    Select::make('padding_top')->options([
                        80=>'80px',
                        120=>'120px',
                        160=>'160px'
                    ]),

                    Select::make('padding_bottom')->options([
                        80=>'80px',
                        120=>'120px',
                        160=>'160px'
                    ])

                ])
                ->columns(2)

        ]);
    }
}
