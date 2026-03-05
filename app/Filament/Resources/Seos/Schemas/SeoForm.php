<?php

namespace App\Filament\Resources\Seos\Schemas;

use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class SeoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('page')
                    ->label('Page')
                    ->options([
                        '/' => 'Homepage',
                        'about' => 'About',
                        'contact' => 'Contact',
                        'blog' => 'Blog',
                    ])
                    ->nullable()
                    ->helperText('NULL = Homepage'),

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

                                TextInput::make('canonical_url')
                                    ->label('Canonical URL'),

                                Select::make('indexable')
                                    ->label('Indexing')
                                    ->options([
                                        true => 'Index',
                                        false => 'No Index'
                                    ])
                                    ->default(true),

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

                        Tabs\Tab::make('Twitter')
                            ->schema([

                                TextInput::make('twitter_title')
                                    ->label('Twitter Title'),

                                Textarea::make('twitter_description')
                                    ->label('Twitter Description'),

                            ]),

                    ])

            ]);
    }
}
