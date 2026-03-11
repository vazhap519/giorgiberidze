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
                        ->label('ფუტერის აღწერა'),

                    TextInput::make('footer_navigation_title')
                        ->label('ნავიგაციის სათაური'),

                    TextInput::make('footer_contact_title')
                        ->label('კონტაქტის სათაური'),

                    TextInput::make('footer_social_title')
                        ->label('სოციალური ქსელების სათაური'),

                    TextInput::make('footer_follow_text')
                        ->label('გამოგვყევით ტექსტი'),

                    TextInput::make('footer_copyright')
                        ->label('ქოფირაიტი'),

                ])
                ->columns(2),

            /*
            |--------------------------------------------------------------------------
            | Contact Section
            |--------------------------------------------------------------------------
            */

            Section::make('კონტაქტის სექცია')
                ->schema([
                    Repeater::make('contact_items')
                        ->label('კონტაქტები')
                        ->schema([

                            Select::make('type')
                                ->label('კონტაქტის ტიპი')
                                ->options([
                                    'phone' => 'ტელეფონი',
                                    'email' => 'იმეილი',
                                    'address' => 'მისამართი',
                                ])
                                ->required()
                                ->live(),

                            TextInput::make('value')
                                ->label('მნიშვნელობა')
                                ->required()
                                ->live()

                                ->rules(fn ($get) => match ($get('type')) {
                                    'phone' => ['required', 'digits:9'],
                                    'email' => ['required', 'email'],
                                    default => ['required', 'string'],
                                })

                                ->maxLength(fn ($get) => $get('type') === 'phone' ? 9 : null)
                                ->minLength(fn ($get) => $get('type') === 'phone' ? 9 : null)

                        ])
                        ->columns(2)
                        ->addActionLabel('კონტაქტის დამატება'),
                ]),


            /*
            |--------------------------------------------------------------------------
            | Social Links
            |--------------------------------------------------------------------------
            */

            Section::make('სოციალური ბმულები')
                ->schema([

                    Repeater::make('footer_social_links')
                        ->label('სოციალური ქსელები')
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
                        ])->required(),

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

        ]);
    }
}
