<?php

namespace App\Filament\Resources\Partners\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Select;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class PartnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            Section::make('ძირითადი ინფორმაცია')
                ->schema([

                    TextInput::make('title')
                        ->required()
                        ->label('პარტნიორის სახელი'),

                    TextInput::make('url')
                        ->url()
                        ->label('პარტნიორის ბმული'),

                    SpatieMediaLibraryFileUpload::make('image')
                        ->collection('image')
                        ->image()
                        ->imageEditor()
                        ->disk('public')
                        ->conversion('webp')
                        ->responsiveImages()
                        ->required()
                        ->label('ლოგო'),

                    Toggle::make('active')
                        ->default(true)

                ])
                ->columns(2),

            Section::make('სტილის პარამეტრები')
                ->schema([

                    TextInput::make('styles.height')->numeric()->default(80),
                    TextInput::make('styles.width')->numeric()->default(null),

                    TextInput::make('styles.radius')->numeric()->default(12),
                    TextInput::make('styles.padding')->numeric()->default(10),
                    TextInput::make('styles.margin')->numeric()->default(0),

                    TextInput::make('styles.opacity')->numeric()->default(1),
                    TextInput::make('styles.zIndex')->numeric()->default(1),

                    Select::make('styles.position')
                        ->options([
                            'static' => 'Static',
                            'relative' => 'Relative',
                            'absolute' => 'Absolute',
                            'fixed' => 'Fixed',
                        ])
                        ->default('relative'),

                    ColorPicker::make('styles.background')
                        ->default('#ffffff'),

                    ColorPicker::make('styles.backgroundHover'),

                    Select::make('styles.borderType')
                        ->options([
                            'none' => 'None',
                            'solid' => 'Solid',
                            'dashed' => 'Dashed',
                            'dotted' => 'Dotted',
                        ])
                        ->default('none'),

                    TextInput::make('styles.borderWidth')
                        ->numeric()
                        ->default(0),

                    ColorPicker::make('styles.borderColor')
                        ->default('#e5e7eb'),

                    TextInput::make('styles.boxShadow')
                        ->default('none'),

                    TextInput::make('styles.boxShadowHover'),

                    TextInput::make('styles.scale')->numeric()->default(1),
                    TextInput::make('styles.scaleHover')->numeric()->default(1.05),

                    TextInput::make('styles.rotate')->numeric()->default(0),
                    TextInput::make('styles.rotateHover')->numeric()->default(0),

                    TextInput::make('styles.translateY')->numeric()->default(0),
                    TextInput::make('styles.translateYHover')->numeric()->default(-5),

                    TextInput::make('styles.transition')->numeric()->default(300),

                ])
                ->columns(3),

            Section::make('ფილტრები')
                ->schema([

                    TextInput::make('styles.filters.grayscale')
                        ->numeric()
                        ->default(60),

                    TextInput::make('styles.filters.blur')
                        ->numeric()
                        ->default(0),

                    TextInput::make('styles.filters.brightness')
                        ->numeric()
                        ->default(100),

                    TextInput::make('styles.filters.contrast')
                        ->numeric()
                        ->default(100),

                    TextInput::make('styles.filters.saturate')
                        ->numeric()
                        ->default(100),

                    TextInput::make('styles.filters.sepia')
                        ->numeric()
                        ->default(0),

                ])
                ->columns(3)

        ]);
    }
}
