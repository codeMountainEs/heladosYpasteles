<?php

namespace App\Filament\Resources\BreakfastResource\Pages;

use App\Filament\Resources\BreakfastResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBreakfast extends EditRecord
{
    protected static string $resource = BreakfastResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
