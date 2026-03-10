<?php

namespace App\Filament\Resources\Menus\Schemas;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Route;

class MenuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('title')
                    ->label('მენიუს სათაური')
                    ->required()
                    ->maxLength(255),

                Select::make('route')
                    ->label('გვერდი (Route)')
                    ->options(function () {

                        return collect(Route::getRoutes())
                            ->filter(function ($route) {

                                $name = $route->getName();

                                if (!$name) {
                                    return false;
                                }

                                return
                                    !str_starts_with($name, 'filament') &&
                                    !str_starts_with($name, 'livewire') &&
                                    !str_starts_with($name, 'default-livewire') &&
                                    !str_starts_with($route->uri(), 'admin');

                            })
                            ->mapWithKeys(function ($route) {

                                return [
                                    $route->uri() => $route->getName()
                                ];

                            })
                            ->toArray();

                    })
                    ->searchable()
                    ->placeholder('აირჩიეთ გვერდი')
                    ->nullable(),

                Select::make('section')
                    ->label('სქროლის სექცია')
                    ->options([
                        'services' => 'სერვისების სექცია',
                        'products' => 'პროდუქტების სექცია',
                        'projects' => 'პროექტების სექცია',
                        'about' => 'ჩვენ შესახებ სექცია',
                        'contact' => 'კონტაქტის სექცია',
                    ])
                    ->searchable()
                    ->placeholder('აირჩიეთ სექცია')
                    ->helperText('გამოიყენება სქროლის ნავიგაციისთვის (#section)')
                    ->nullable(),

                TextInput::make('order')
                    ->numeric()
                    ->default(0)
                    ->label('მენიუს რიგითობა'),

                /*
                |--------------------------------------------------------------------------
                | მენიუს სტილი
                |--------------------------------------------------------------------------
                */

                Section::make('მენიუს სტილი')->schema([

                    ColorPicker::make('nav_bg_color')
                        ->label('ნავბარის ფონის ფერი'),

                    ColorPicker::make('nav_link_color')
                        ->label('ლინკის ფერი'),

                    ColorPicker::make('nav_hover_color')
                        ->label('ჰოვერის ფერი'),

                    Select::make('nav_blur')
                        ->label('ბლარი')
                        ->options([
                            0 => '0px',
                            5 => '5px',
                            10 => '10px',
                            20 => '20px',
                            30 => '30px',
                            40 => '40px',
                            50 => '50px',
                            60 => '60px',
                            70 => '70px',
                            80 => '80px',
                            90 => '90px',
                            100 => '100px',
                        ])
                        ->default(20),

                    Select::make('nav_opacity')
                        ->label('გამჭვირვალობა')
                        ->options([
                            1 => '1.0',
                            0.9 => '0.9',
                            0.8 => '0.8',
                            0.7 => '0.7',
                            0.6 => '0.6',
                            0.5 => '0.5',
                        ])
                        ->default(0.6),

                    Select::make('nav_z_index')
                        ->label('Z ინდექსი')
                        ->options([
                            10 => '10',
                            20 => '20',
                            30 => '30',
                            40 => '40',
                            50 => '50',
                            100 => '100',
                        ])
                        ->default(50)

                ]),

                /*
                |--------------------------------------------------------------------------
                | CTA ღილაკი
                |--------------------------------------------------------------------------
                */

                Section::make('CTA ღილაკი')->schema([

                    TextInput::make('cta_text')
                        ->label('ღილაკის ტექსტი'),

                    TextInput::make('cta_link')
                        ->label('ღილაკის ბმული')
                        ->placeholder('#contact'),

                    ColorPicker::make('cta_bg_color')
                        ->label('ღილაკის ფონის ფერი'),

                    ColorPicker::make('cta_text_color')
                        ->label('ღილაკის ტექსტის ფერი'),

                    ColorPicker::make('cta_hover_color')
                        ->label('ჰოვერის ფერი'),

                    Select::make('cta_radius')
                        ->label('კუთხის დამრგვალება')
                        ->options([
                            0 => '0px',
                            6 => '6px',
                            8 => '8px',
                            10 => '10px',
                            12 => '12px',
                            16 => '16px',
                            20 => '20px',
                        ])
                        ->default(12),

                ])
            ]);
    }
}
