<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Select;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            /*
            |--------------------------------------------------------------------------
            | ძირითადი ინფორმაცია
            |--------------------------------------------------------------------------
            */

            Section::make('ძირითადი ინფორმაცია')
                ->schema([

                    TextInput::make('title')
                        ->label('სერვისის სათაური')
                        ->required(),

                    TextInput::make('read_more_text')
                        ->label('ღილაკის ტექსტი')
                        ->placeholder('შეიტყვე მეტი'),

                    Textarea::make('description')
                        ->label('სერვისის აღწერა')
                        ->rows(4),

                    SpatieMediaLibraryFileUpload::make('image')
                        ->collection('image')
                        ->label('სერვისის სურათი')
                        ->image()
                        ->imageEditor()
                        ->conversion('webp')
                        ->disk('public')
                        ->required(),

                ]),

            /*
            |--------------------------------------------------------------------------
            | ბარათის დიზაინი
            |--------------------------------------------------------------------------
            */

            Section::make('ბარათის დიზაინი')
                ->schema([

                    ColorPicker::make('card_bg')
                        ->label('ბარათის ფონი')
                        ->default('#ffffff'),

                    ColorPicker::make('card_border')
                        ->label('ბარათის ჩარჩოს ფერი')
                        ->default('#e5e7eb'),

                    Select::make('card_hover_shadow')
                        ->label('Hover ჩრდილი')
                        ->options([
                            'none' => 'არაფერი',
                            'md' => 'Medium',
                            'lg' => 'Large',
                            'xl' => 'XL',
                            '2xl' => '2XL'
                        ])
                        ->default('2xl'),

                    ColorPicker::make('image_bg')
                        ->label('სურათის ფონური ფერი')
                        ->default('#f9fafb'),

                    Select::make('card_radius')
                        ->label('კუთხეების მომრგვალება')
                        ->options([
                            12=>'12px',
                            16=>'16px',
                            20=>'20px',
                            24=>'24px'
                        ])
                        ->default(16),

                    Select::make('card_padding')
                        ->label('შიდა დაშორება')
                        ->options([
                            16=>'16px',
                            24=>'24px',
                            32=>'32px'
                        ])
                        ->default(24),

                ])
                ->columns(2),

            /*
            |--------------------------------------------------------------------------
            | ტექსტის სტილები
            |--------------------------------------------------------------------------
            */

            Section::make('ტექსტის სტილები')
                ->schema([

                    ColorPicker::make('title_color')
                        ->label('სათაურის ფერი')
                        ->default('#111827'),

                    ColorPicker::make('title_hover_color')
                        ->label('სათაურის Hover ფერი')
                        ->default('#2563eb'),

                    ColorPicker::make('description_color')
                        ->label('აღწერის ტექსტის ფერი')
                        ->default('#4b5563'),

                ])
                ->columns(2),

            /*
            |--------------------------------------------------------------------------
            | ღილაკის დიზაინი
            |--------------------------------------------------------------------------
            */

            Section::make('ღილაკის დიზაინი')
                ->schema([

                    ColorPicker::make('button_bg')
                        ->label('ღილაკის ფონი')
                        ->default('#2563eb'),

                    ColorPicker::make('button_hover_bg')
                        ->label('ღილაკის Hover ფონი')
                        ->default('#1d4ed8'),

                    ColorPicker::make('button_text_color')
                        ->label('ღილაკის ტექსტის ფერი')
                        ->default('#ffffff'),

                ])
                ->columns(2),

            /*
            |--------------------------------------------------------------------------
            | სექციის პარამეტრები
            |--------------------------------------------------------------------------
            */

            Section::make('სექციის პარამეტრები')
                ->schema([

                    Select::make('cards_per_row')
                        ->label('ბარათები ერთ რიგში')
                        ->options([
                            2=>'2 ბარათი',
                            3=>'3 ბარათი',
                            4=>'4 ბარათი'
                        ])
                        ->default(3),

                    ColorPicker::make('section_bg')
                        ->label('სექციის ფონი')
                        ->default('#ffffff'),

                    Select::make('section_padding_top')
                        ->label('ზედა დაშორება')
                        ->options([
                            80=>'80px',
                            120=>'120px',
                            160=>'160px'
                        ])
                        ->default(120),

                    Select::make('section_padding_bottom')
                        ->label('ქვედა დაშორება')
                        ->options([
                            80=>'80px',
                            120=>'120px',
                            160=>'160px'
                        ])
                        ->default(120),

                    Select::make('section_blur')
                        ->label('Blur ეფექტი')
                        ->options([
                            0=>'0px',
                            10=>'10px',
                            20=>'20px'
                        ])
                        ->default(0),

                    Select::make('section_opacity')
                        ->label('გამჭვირვალობა')
                        ->options([
                            1=>'1',
                            0.9=>'0.9',
                            0.8=>'0.8'
                        ])
                        ->default(1),

                ])
                ->columns(2),

            /*
            |--------------------------------------------------------------------------
            | ანიმაცია და ეფექტები
            |--------------------------------------------------------------------------
            */

            Section::make('ეფექტები')
                ->schema([

                    Select::make('animation')
                        ->label('ანიმაცია')
                        ->options([
                            'none'=>'არაფერი',
                            'fade-up'=>'Fade Up',
                            'fade-down'=>'Fade Down',
                            'zoom-in'=>'Zoom In'
                        ])
                        ->default('fade-up'),

                    Select::make('card_hover_effect')
                        ->label('Hover ეფექტი')
                        ->options([
                            'none'=>'არაფერი',
                            'lift'=>'Lift',
                            'scale'=>'Scale',
                            'shadow'=>'Shadow'
                        ])
                        ->default('lift'),

                ])

        ]);
    }
}
