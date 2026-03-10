<?php

namespace App\Filament\Resources\Footers\Pages;

use App\Filament\Resources\Footers\FooterResource;
use App\Models\Footer;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFooters extends ListRecords
{
    protected static string $resource = FooterResource::class;

    protected function getHeaderActions(): array
    {
        if (Footer::count()===0){
            return [
                CreateAction::make(),
            ];
        }else{
            return [];
        }

    }
}
