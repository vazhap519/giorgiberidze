<?php

namespace App\Filament\Resources\Services\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class ServicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                SpatieMediaLibraryImageColumn::make('image')
                    ->collection('image')
                    ->label('სურათი')
                    ->circular(),

                TextColumn::make('title')
                    ->label('სათაური')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('description')
                    ->label('აღწერა')
                    ->limit(50),

                TextColumn::make('created_at')
                    ->label('შექმნის თარიღი')
                    ->dateTime('d.m.Y')
                    ->sortable(),

            ])

            ->filters([
                //
            ])

            ->recordActions([
                EditAction::make(),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}