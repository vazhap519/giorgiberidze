<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('title')
                    ->label('სათაური')
                    ->required()
                    ->maxLength(255),
                TextInput::make('read_more_text')
                    ->label('შეიტყვე მეტი ღილაკის ტექსტი')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('აღწერა')
                    ->rows(4)
                    ->required(),

                SpatieMediaLibraryFileUpload::make('image')
                    ->collection('image')
                    ->label('სურათი')
                    ->image()
                    ->imageEditor()
                    ->conversion('webp')
                ->disk('public')
                    ->required(),
            ]);
    }
}
