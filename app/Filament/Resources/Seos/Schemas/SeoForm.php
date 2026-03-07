<?php

namespace App\Filament\Resources\Seos\Schemas;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;

class SeoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('page')
                    ->label('Page')
                    ->options([
                        'home' => 'Homepage',
                        'projects' => 'Projects',
                    ])
                    ->required()
                    ->unique(ignoreRecord: true),

                Tabs::make('SEO')
                    ->tabs([

                        Tabs\Tab::make('Meta')
                            ->schema([

                                TextInput::make('meta_title')
                                    ->label('Meta Title')
                                    ->maxLength(60),

                                Textarea::make('meta_description')
                                    ->label('Meta Description')
                                    ->maxLength(160),

                                Toggle::make('indexable')
                                    ->label('Indexable')
                                    ->default(true),
                            ]),


                        Tabs\Tab::make('Twitter')
                            ->schema([

                                TextInput::make('twitter_title')
                                    ->label('Twitter Title'),

                                Textarea::make('twitter_description')
                                    ->label('Twitter Description'),

                            ]),
                        Tabs\Tab::make('Open Graph')
                            ->schema([

                                TextInput::make('og_title')
                                    ->label('OG Title'),

                                Textarea::make('og_description')
                                    ->label('OG Description'),

                                SpatieMediaLibraryFileUpload::make('og_image')
                                    ->collection('og_image')
                                    ->image()
                                    ->imageEditor()
                                    ->disk('public')
                                    ->conversion('webp')
                                    ->responsiveImages()
                                    ->helperText('Recommended size: 1200x630')
                                    ->columnSpanFull(),

                            ]),
                    ])

            ]);
    }
}
