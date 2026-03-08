<?php

namespace App\Filament\Resources\AboutSections\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class AboutSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('title')
                    ->label('სათაური')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('აღწერა')
                    ->required()
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
                    ->columnSpanFull(),

                Repeater::make('features')
                    ->label('მახასიათებლები')
                    ->relationship()
                    ->schema([

                        TextInput::make('title')
                            ->label('სათაური')
                            ->required(),

                        Textarea::make('description')
                            ->label('აღწერა')
                            ->required(),

                    ])
                    ->columns(2)
                    ->columnSpanFull()

            ]);
    }
}