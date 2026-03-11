<?php

namespace App\Filament\Resources\Filters\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Select;
use Illuminate\Support\Str;

class FilterForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            /*
            |--------------------------------------------------------------------------
            | Basic
            |--------------------------------------------------------------------------
            */

            Section::make('Filter')
                ->schema([

                    TextInput::make('name')
                        ->label('სახელი')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(function ($state, $set) {
                            $set('slug', Str::slug($state));
                        }),
                    TextInput::make('slug')
                        ->label('Slug')
                        ->required(),

                    TextInput::make('sort')
                        ->label('Sort')
                        ->numeric()
                        ->default(0),

                    Toggle::make('is_active')
                        ->label('აქტიური')
                        ->default(true),

                ])
                ->columns(2),


            /*
            |--------------------------------------------------------------------------
            | Title Styles
            |--------------------------------------------------------------------------
            */

            Section::make('სათაურის სტილი')
                ->schema([

                    ColorPicker::make('styles.title_color')
                        ->label('ფერი')
                        ->default('#111827'),

                    Select::make('styles.title_size')
                        ->label('ზომა')
                        ->options([
                            14=>'14px',
                            16=>'16px',
                            18=>'18px'
                        ])
                        ->default(16),

                    Select::make('styles.title_weight')
                        ->label('სისქე')
                        ->options([
                            400=>'Normal',
                            500=>'Medium',
                            600=>'SemiBold',
                            700=>'Bold'
                        ])
                        ->default(600),

                ])
                ->columns(3),


            /*
            |--------------------------------------------------------------------------
            | Item Styles
            |--------------------------------------------------------------------------
            */

            Section::make('Filter Item სტილი')
                ->schema([

                    ColorPicker::make('styles.item_color')
                        ->label('ტექსტის ფერი')
                        ->default('#374151'),

                    ColorPicker::make('styles.item_hover_color')
                        ->label('Hover ფერი')
                        ->default('#2563eb'),

                    Select::make('styles.item_size')
                        ->label('ტექსტის ზომა')
                        ->options([
                            12=>'12px',
                            14=>'14px',
                            16=>'16px'
                        ])
                        ->default(14),

                ])
                ->columns(3),


            /*
            |--------------------------------------------------------------------------
            | Box Styles
            |--------------------------------------------------------------------------
            */

            Section::make('Box Style')
                ->schema([

                    ColorPicker::make('styles.bg_color')
                        ->label('ფონი')
                        ->default('#ffffff'),

                    ColorPicker::make('styles.border_color')
                        ->label('Border')
                        ->default('#e5e7eb'),

                    Select::make('styles.border_radius')
                        ->label('Radius')
                        ->options([
                            6=>'6px',
                            8=>'8px',
                            12=>'12px'
                        ])
                        ->default(8),

                ])
                ->columns(3),

        ]);
    }
}
