<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrder extends EditRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Calcular el total del pedido basado en los items
        $total = collect($data['items'] ?? [])->sum(function ($item) {
            $breakfast = \App\Models\Breakfast::find($item['breakfast_id']);
            $quantity = $item['quantity'];
            $unit_price = $breakfast->base_price;
            $discount_percentage = \App\Models\OrderItem::calculateDiscountPercentage($quantity);
            $discounted_unit_price = $unit_price * (1 - ($discount_percentage / 100));
            
            return $quantity * $discounted_unit_price;
        });

        $data['total_amount'] = $total;

        return $data;
    }
} 