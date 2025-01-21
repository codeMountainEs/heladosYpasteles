<?php

namespace App\Filament\Resources\BreakfastResource\Pages;

use App\Filament\Resources\BreakfastResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBreakfasts extends ListRecords
{
    protected static string $resource = BreakfastResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
