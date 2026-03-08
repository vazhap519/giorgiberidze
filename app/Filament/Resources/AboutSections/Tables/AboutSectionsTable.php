<?php

namespace App\Filament\Resources\AboutSections\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class AboutSectionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('title')
                    ->label('სათაური')
                    ->searchable(),

                TextColumn::make('experience_years')
                    ->label('გამოცდილება'),

                IconColumn::make('is_active')
                    ->label('აქტიური')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label('შექმნის თარიღი')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),

            ]);
    }
}