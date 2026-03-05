<?php

namespace App\Filament\Resources\CarouselSlides\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\EditAction;

class CarouselSlidesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('background_url')
                    ->label('Background'),

                TextColumn::make('title'),

                TextColumn::make('sort_order'),

                TextColumn::make('is_active')
                    ->badge(),

            ])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
