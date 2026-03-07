<?php

namespace App\Filament\Resources\Seos\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;

class SeosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('page')
                    ->label('Page')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn ($state) =>
                    $state === 'home'
                        ? 'Homepage'
                        : ucfirst($state)
                    ),

                TextColumn::make('meta_title')
                    ->label('Meta Title')
                    ->limit(50)
                    ->searchable(),

                TextColumn::make('meta_description')
                    ->label('Meta Description')
                    ->limit(80),

                IconColumn::make('indexable')
                    ->label('Indexable')
                    ->boolean(),

                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime()
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
