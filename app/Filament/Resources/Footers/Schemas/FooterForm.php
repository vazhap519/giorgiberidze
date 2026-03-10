<?php

namespace App\Filament\Resources\Footers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FooterForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            /*
            |--------------------------------------------------------------------------
            | Footer Content
            |--------------------------------------------------------------------------
            */

            Section::make('ფუტერის კონტენტი')
                ->schema([

                    Textarea::make('footer_description')
                        ->label('ფუტერის აღწერა')
                        ->nullable(),

                    TextInput::make('footer_navigation_title')
                        ->label('ნავიგაციის სათაური')
                        ->nullable(),

                    TextInput::make('footer_contact_title')
                        ->label('კონტაქტის სათაური')
                        ->nullable(),

                    TextInput::make('footer_social_title')
                        ->label('სოციალური ქსელების სათაური')
                        ->nullable(),

                    TextInput::make('footer_follow_text')
                        ->label('გამოგვყევით ტექსტი')
                        ->nullable(),

                    TextInput::make('footer_copyright')
                        ->label('ქოფირაიტი')
                        ->nullable(),

                ])->columns(2),

            /*
            |--------------------------------------------------------------------------
            | Social Links
            |--------------------------------------------------------------------------
            */

            Section::make('სოციალური ბმულები')
                ->schema([

                    Repeater::make('footer_social_links')
                        ->label('სოციალური ქსელები')
                        ->default([])
                        ->schema([

                            Select::make('platform')
                                ->label('პლატფორმა')
                                ->options([
                                    'facebook' => 'Facebook',
                                    'instagram' => 'Instagram',
                                    'linkedin' => 'LinkedIn',
                                    'twitter' => 'Twitter',
                                    'youtube' => 'YouTube',
                                ])
                                ->required(),

                            TextInput::make('url')
                                ->label('ბმული')
                                ->required(),

                        ])
                        ->columns(2)

                ]),

            /*
            |--------------------------------------------------------------------------
            | Footer Colors
            |--------------------------------------------------------------------------
            */

            Section::make('ფუტერის ფერები')
                ->schema([

                    ColorPicker::make('footer_bg_color')
                        ->label('ფონის ფერი')
                        ->default('#0f172a'),

                    ColorPicker::make('footer_text_color')
                        ->label('ტექსტის ფერი')
                        ->default('#cbd5f5'),

                    ColorPicker::make('footer_link_color')
                        ->label('ბმულის ფერი')
                        ->default('#94a3b8'),

                    ColorPicker::make('footer_hover_color')
                        ->label('Hover ფერი')
                        ->default('#ffffff'),

                ])
                ->columns(2),

            /*
            |--------------------------------------------------------------------------
            | Follow Text Style
            |--------------------------------------------------------------------------
            */

            Section::make('გამოგვყევით ტექსტის სტილი')
                ->schema([

                    ColorPicker::make('footer_follow_color')
                        ->label('ტექსტის ფერი')
                        ->default('#94a3b8'),

                    Select::make('footer_follow_size')
                        ->label('ფონტის ზომა')
                        ->default(14)
                        ->options([
                            12 => '12px',
                            14 => '14px',
                            16 => '16px',
                            18 => '18px',
                        ]),

                    Select::make('footer_follow_weight')
                        ->label('ფონტის სისქე')
                        ->default(400)
                        ->options([
                            300 => 'მსუბუქი',
                            400 => 'ნორმალური',
                            500 => 'საშუალო',
                            600 => 'ნახევრად სქელი',
                            700 => 'სქელი',
                        ]),

                    Select::make('footer_follow_opacity')
                        ->label('გამჭვირვალობა')
                        ->default(0.8)
                        ->options([
                            1 => '1',
                            0.9 => '0.9',
                            0.8 => '0.8',
                            0.7 => '0.7',
                        ]),

                ])
                ->columns(2),

            /*
            |--------------------------------------------------------------------------
            | Social Icon Style
            |--------------------------------------------------------------------------
            */

            Section::make('სოციალური აიქონების სტილი')
                ->schema([

                    ColorPicker::make('footer_social_bg')
                        ->label('აიქონის ფონი')
                        ->default('#1e293b'),

                    ColorPicker::make('footer_social_color')
                        ->label('აიქონის ფერი')
                        ->default('#cbd5f5'),

                    ColorPicker::make('footer_social_hover_bg')
                        ->label('Hover ფონი')
                        ->default('#2563eb'),

                    ColorPicker::make('footer_social_hover_color')
                        ->label('Hover აიქონის ფერი')
                        ->default('#ffffff'),

                ])
                ->columns(2),

            /*
            |--------------------------------------------------------------------------
            | Typography
            |--------------------------------------------------------------------------
            */

            Section::make('ტიპოგრაფია')
                ->schema([

                    Select::make('footer_title_size')
                        ->label('სათაურის ზომა')
                        ->default(18)
                        ->options([
                            16 => '16px',
                            18 => '18px',
                            20 => '20px',
                            24 => '24px'
                        ]),

                    Select::make('footer_text_size')
                        ->label('ტექსტის ზომა')
                        ->default(14)
                        ->options([
                            12 => '12px',
                            14 => '14px',
                            16 => '16px'
                        ]),

                ])
                ->columns(2),

            /*
            |--------------------------------------------------------------------------
            | Layout
            |--------------------------------------------------------------------------
            */

            Section::make('ლაიაუტი')
                ->schema([

                    Select::make('footer_position')
                        ->label('პოზიცია')
                        ->default('relative')
                        ->options([
                            'relative' => 'Relative',
                            'fixed' => 'Fixed',
                            'sticky' => 'Sticky'
                        ]),

                    Select::make('footer_z_index')
                        ->label('Z ინდექსი')
                        ->default(10)
                        ->options([
                            10 => '10',
                            20 => '20',
                            50 => '50',
                            100 => '100'
                        ]),

                    Select::make('footer_blur')
                        ->label('ბლარი')
                        ->default(0)
                        ->options([
                            0 => '0px',
                            10 => '10px',
                            20 => '20px'
                        ]),

                    Select::make('footer_opacity')
                        ->label('გამჭვირვალობა')
                        ->default(1)
                        ->options([
                            1 => '1',
                            0.9 => '0.9',
                            0.8 => '0.8'
                        ]),

                    Select::make('footer_padding_top')
                        ->label('ზედა Padding')
                        ->default(80)
                        ->options([
                            40 => '40px',
                            60 => '60px',
                            80 => '80px',
                            100 => '100px'
                        ]),

                    Select::make('footer_padding_bottom')
                        ->label('ქვედა Padding')
                        ->default(40)
                        ->options([
                            20 => '20px',
                            40 => '40px',
                            60 => '60px'
                        ])

                ])
                ->columns(2),

            Section::make('ლოგოს სტილი')
                ->schema([

                    Select::make('footer_logo_size')
                        ->label('ლოგოს ზომა')
                        ->default(48)
                        ->options([
                            32 => '32px',
                            40 => '40px',
                            48 => '48px',
                            56 => '56px',
                            64 => '64px'
                        ]),

                    ColorPicker::make('footer_logo_text_color')
                        ->label('საიტის სახელის ფერი')
                        ->default('#ffffff'),

                    Select::make('footer_logo_text_size')
                        ->label('საიტის სახელის ზომა')
                        ->default(18)
                        ->options([
                            14 => '14px',
                            16 => '16px',
                            18 => '18px',
                            20 => '20px',
                            24 => '24px'
                        ]),

                    Select::make('footer_logo_text_weight')
                        ->label('ფონტის სისქე')
                        ->default(600)
                        ->options([
                            400 => 'ნორმალური',
                            500 => 'საშუალო',
                            600 => 'ნახევრად სქელი',
                            700 => 'სქელი'
                        ]),

                    ColorPicker::make('footer_description_color')
                        ->label('აღწერის ფერი')
                        ->default('#94a3b8'),

                ])
                ->columns(2),

        ]);
    }
}
