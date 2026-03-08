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
    TextInput::make('products_title')->label('პროდუქტების სათაური'),
    TextInput::make('services_header')->label('სერვისების სათაური'),

    TextInput::make('about_header')->label('ჩვენს შესახებ სათაური'),
   TextInput::make('project_header')->label('პროექტების სათაური'),

]),

              Section::make('კონტაქტის სექციის სათაურები და ღილაკების ტექსტები')->schema([

                  TextInput::make('contact_header')
                      ->label('კონტაქტის მთავარი სათაური'),

                  TextInput::make('contact_left_title')
                      ->label('მარცხენა ბლოკის სათაური'),

                  TextInput::make('contact_form_title')
                      ->label('ფორმის სათაური'),

                  TextInput::make('contact_service_title')
                      ->label('სერვისის მოთხოვნის სათაური'),

                  TextInput::make('contact_form_button')
                      ->label('ფორმის ღილაკის ტექსტი'),

                  TextInput::make('contact_service_button')
                      ->label('სერვისის მოთხოვნის ღილაკი'),

              ]),
              Section::make('Footer')->schema([

    TextInput::make('footer_navigation_title')
        ->label('Footer Navigation Title'),

    TextInput::make('footer_contact_title')
        ->label('Footer Contact Title'),

    TextInput::make('footer_social_title')
        ->label('Footer Social Title'),

    TextInput::make('footer_copyright')
        ->label('Footer Copyright'),

    TextInput::make('footer_description')
        ->label('Footer Description'),

])
            ]);
    }
}
