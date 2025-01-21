<?php

namespace App\Filament\Resources\CustomerResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class OrdersRelationManager extends RelationManager
{
    protected static string $relationship = 'orders';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('delivery_street_address')
                    ->label('Dirección de entrega')
                    ->required(),
                Forms\Components\TextInput::make('delivery_postal_code')
                    ->label('Código Postal')
                    ->required(),
                Forms\Components\TextInput::make('delivery_city')
                    ->label('Ciudad')
                    ->required(),
                Forms\Components\TextInput::make('delivery_province')
                    ->label('Provincia')
                    ->required(),
                Forms\Components\DatePicker::make('delivery_date')
                    ->label('Fecha de entrega')
                    ->required(),
                Forms\Components\TimePicker::make('delivery_time')
                    ->label('Hora de entrega')
                    ->required(),
                Forms\Components\Select::make('payment_method')
                    ->label('Método de pago')
                    ->options([
                        'efectivo' => 'Efectivo',
                        'tarjeta' => 'Tarjeta',
                        'bizum' => 'Bizum',
                    ])
                    ->required(),
                Forms\Components\Select::make('payment_status')
                    ->label('Estado del pago')
                    ->options([
                        'pendiente' => 'Pendiente',
                        'pagado' => 'Pagado',
                        'fallido' => 'Fallido',
                    ])
                    ->required(),
                Forms\Components\Select::make('order_status')
                    ->label('Estado del pedido')
                    ->options([
                        'pendiente' => 'Pendiente',
                        'preparando' => 'Preparando',
                        'en_camino' => 'En camino',
                        'entregado' => 'Entregado',
                        'cancelado' => 'Cancelado',
                    ])
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('delivery_date')
                    ->label('Fecha de entrega')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('delivery_time')
                    ->label('Hora')
                    ->time()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_amount')
                    ->label('Total')
                    ->money('EUR')
                    ->sortable(),
                Tables\Columns\SelectColumn::make('payment_status')
                    ->label('Estado del pago')
                    ->options([
                        'pendiente' => 'Pendiente',
                        'pagado' => 'Pagado',
                        'fallido' => 'Fallido',
                    ])
                    ->sortable(),
                Tables\Columns\SelectColumn::make('order_status')
                    ->label('Estado del pedido')
                    ->options([
                        'pendiente' => 'Pendiente',
                        'preparando' => 'Preparando',
                        'en_camino' => 'En camino',
                        'entregado' => 'Entregado',
                        'cancelado' => 'Cancelado',
                    ])
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
} 