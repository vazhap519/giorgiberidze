<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

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
Section::make('საიტის სექციების სათაურები')->schema([
    TextInput::make('products_title')->label('პროდუქტები')
])
            ]);
    }
}
