<?php

namespace App\Filament\Resources\Seos\Schemas;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\Facades\Route;
class SeoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([



                Select::make('page')
                    ->label('გვერდი')
                    ->options(function () {

                        return collect(Route::getRoutes())
                            ->filter(function ($route) {

                                $name = $route->getName();
                                $uri = $route->uri();
                                $methods = $route->methods();

                                if (!in_array('GET', $methods)) {
                                    return false;
                                }

                                if (!$name) {
                                    return false;
                                }

                                if (
                                    str_starts_with($name, 'filament') ||
                                    str_starts_with($name, 'livewire') ||
                                    str_contains($uri, 'livewire') ||
                                    str_contains($uri, '_ignition') ||
                                    str_contains($uri, 'storage') ||
                                    str_starts_with($uri, 'admin')
                                ) {
                                    return false;
                                }

                                return true;

                            })
                            ->mapWithKeys(function ($route) {

                                return [
                                    $route->getName() => $route->uri()
                                ];

                            })
                            ->toArray();

                    })
                    ->searchable()
                    ->required()
                    ->unique(ignoreRecord: true)

                    ->live()

                    ->afterStateUpdated(function ($state, callable $set) {

                        if (!$state) {
                            return;
                        }

                        try {

                            $url = route($state);

                            $set('canonical_url', $url);

                        } catch (\Exception $e) {

                            $set('canonical_url', url('/'));

                        }

                    }),

                Tabs::make('SEO')
                    ->tabs([

                        /*
                        |--------------------------------------------------------------------------
                        | Meta
                        |--------------------------------------------------------------------------
                        */

                        Tabs\Tab::make('Meta')
                            ->schema([

                                TextInput::make('meta_title')
                                    ->label('Meta სათაური')
                                    ->maxLength(60)
                                    ->helperText('რეკომენდებულია 50-60 სიმბოლო'),

                                Textarea::make('meta_description')
                                    ->label('Meta აღწერა')
                                    ->maxLength(160)
                                    ->rows(3)
                                    ->helperText('რეკომენდებულია 140-160 სიმბოლო'),

                                TextInput::make('canonical_url')
                                    ->label('Canonical URL')
                                    ->placeholder('https://example.com/page')
                                    ->url()
                                    ->disabled(fn ($get) => filled($get('canonical_url')))
                                    ->helperText('ავტომატურად გენერირდება არჩეული გვერდის მიხედვით'),

                                Toggle::make('indexable')
                                    ->label('Indexable (Google Index)')
                                    ->default(true),

                            ]),

                        /*
                        |--------------------------------------------------------------------------
                        | Open Graph
                        |--------------------------------------------------------------------------
                        */

                        Tabs\Tab::make('Open Graph')
                            ->schema([

                                TextInput::make('og_title')
                                    ->label('OG სათაური'),

                                Textarea::make('og_description')
                                    ->label('OG აღწერა'),

                                SpatieMediaLibraryFileUpload::make('og_image')
                                    ->collection('og_image')
                                    ->label('OG სურათი')
                                    ->image()
                                    ->imageEditor()
                                    ->disk('public')
                                    ->conversion('webp')
                                    ->responsiveImages()
                                    ->helperText('რეკომენდებული ზომა: 1200x630')
                                    ->columnSpanFull(),

                            ]),

                        /*
                        |--------------------------------------------------------------------------
                        | Twitter
                        |--------------------------------------------------------------------------
                        */

                        Tabs\Tab::make('Twitter')
                            ->schema([

                                TextInput::make('twitter_title')
                                    ->label('Twitter სათაური'),

                                Textarea::make('twitter_description')
                                    ->label('Twitter აღწერა'),

                                Select::make('twitter_card')
                                    ->label('Twitter Card ტიპი')
                                    ->options([
                                        'summary' => 'Summary',
                                        'summary_large_image' => 'Summary Large Image',
                                        'app' => 'App',
                                        'player' => 'Player',
                                    ])
                                    ->default('summary_large_image'),

                            ]),

                        /*
                        |--------------------------------------------------------------------------
                        | Advanced SEO
                        |--------------------------------------------------------------------------
                        */

                        Tabs\Tab::make('Advanced')
                            ->schema([

                                Select::make('robots')
                                    ->label('Robots Meta')
                                    ->options([
                                        'index,follow' => 'index,follow',
                                        'noindex,nofollow' => 'noindex,nofollow',
                                        'noindex,follow' => 'noindex,follow',
                                        'index,nofollow' => 'index,nofollow',
                                    ])
                                    ->placeholder('Auto'),

                                Select::make('schema_type')
                                    ->label('Schema Type')
                                    ->options([
                                        'website' => 'Website',
                                        'article' => 'Article',
                                        'product' => 'Product',
                                        'organization' => 'Organization',
                                    ])
                                    ->placeholder('Auto'),

                            ]),

                    ])

            ]);
    }
}
