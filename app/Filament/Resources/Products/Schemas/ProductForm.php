<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('title')
                    ->label('პროდუქტის სახელი')
                    ->required()
                    ->maxLength(255),

                SpatieMediaLibraryFileUpload::make('image')
                    ->collection('image')
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->conversion('webp')
                    ->responsiveImages()
                    ->label('პროდუქტის ფოტო'),


                Repeater::make('features')
                    ->label('მახასიათებლები')
                    ->schema([

                        TextInput::make('feature')
                            ->label('მახასიათებელი')
                            ->required(),

                    ])
                    ->defaultItems(3)
                    ->collapsible()
                    ->reorderable(),

            ]);
    }
}
