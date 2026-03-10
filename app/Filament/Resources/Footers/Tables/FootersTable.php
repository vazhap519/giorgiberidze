<?php

namespace App\Filament\Resources\Footers\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class FootersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('footer_navigation_title')
                    ->label('Navigation'),

                TextColumn::make('footer_contact_title')
                    ->label('Contact'),

                TextColumn::make('footer_social_title')
                    ->label('Social'),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Created'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([]);
    }
}
