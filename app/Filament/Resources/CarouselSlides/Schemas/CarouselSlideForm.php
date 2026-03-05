<?php

namespace App\Filament\Resources\CarouselSlides\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class CarouselSlideForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('title')
                    ->label('Title'),

                Textarea::make('subtitle')
                    ->label('Subtitle'),

                TextInput::make('button_text')
                    ->label('Button Text'),

//                TextInput::make('button_url')
//                    ->label('Button URL'),

                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),

                Toggle::make('is_active')
                    ->label('Active')
                    ->default(true),

                SpatieMediaLibraryFileUpload::make('background')
                    ->collection('background')
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->conversion('webp')
                    ->responsiveImages()
                    ->columnSpanFull(),

                SpatieMediaLibraryFileUpload::make('image')
                    ->collection('image')
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->conversion('webp')
                    ->responsiveImages()
                    ->helperText('Floating product image')
                    ->columnSpanFull(),

            ]);
    }
}
