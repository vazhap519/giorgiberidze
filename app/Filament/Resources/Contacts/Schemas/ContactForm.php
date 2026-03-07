<?php

namespace App\Filament\Resources\Contacts\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class ContactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('აღწერა')
                    ->schema([
                        Textarea::make('description')
                            ->label('Contact აღწერა')
                            ->rows(3)
                            ->required(),
                    ]),

                Section::make('საკონტაქტო ინფორმაცია')
                    ->schema([

                        Repeater::make('contact_items')
                            ->label('Contact Items')
                            ->schema([

                                Select::make('type')
                                    ->label('ტიპი')
                                    ->options([
                                        'phone' => 'Phone',
                                        'email' => 'Email',
                                        'address' => 'Address',
                                    ])
                                    ->required(),

                                TextInput::make('value')
                                    ->label('მნიშვნელობა')
                                    ->required(),

                            ])
                            ->columns(2)
                            ->defaultItems(1)

                    ]),

                Section::make('სოციალური ქსელები')
                    ->schema([

                        Repeater::make('social_links')
                            ->schema([

                                Select::make('platform')
                                    ->label('Platform')
                                    ->options([
                                        'facebook' => 'Facebook',
                                        'instagram' => 'Instagram',
                                        'linkedin' => 'LinkedIn',
                                        'tiktok' => 'TikTok',
                                        'youtube' => 'YouTube',
                                        'twitter' => 'Twitter',
                                        'pinterest' => 'Pinterest',
                                        'telegram' => 'Telegram',
                                        'whatsapp' => 'WhatsApp',
                                    ])
                                    ->required(),

                                TextInput::make('url')
                                    ->label('URL')
                                    ->required(),

                            ])
                            ->columns(2)
                            ->defaultItems(1)

                    ]),

                Section::make('სერვისის არჩევის ვარიანტები')
                    ->schema([

                        Repeater::make('service_options')
                            ->schema([

                                TextInput::make('title')
                                    ->label('სერვისი')
                                    ->required(),

                            ])
                            ->defaultItems(1)

                    ]),

            ]);
    }
}
