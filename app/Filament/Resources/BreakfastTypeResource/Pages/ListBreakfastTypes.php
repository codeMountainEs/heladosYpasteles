<?php

namespace App\Filament\Resources\BreakfastTypeResource\Pages;

use App\Filament\Resources\BreakfastTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBreakfastTypes extends ListRecords
{
    protected static string $resource = BreakfastTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
} 