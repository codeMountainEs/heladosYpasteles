<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Filament\Resources\OrderResource\RelationManagers;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationGroup = 'Pedidos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('customer_id')
                    ->relationship('customer', 'email')
                    ->searchable()
                    ->preload()
                    ->required(),
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
                Forms\Components\Textarea::make('notes')
                    ->label('Notas')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Section::make('Desayunos')
                    ->schema([
                        Forms\Components\Repeater::make('items')
                            ->relationship()
                            ->schema([
                                Forms\Components\Select::make('breakfast_id')
                                    ->relationship('breakfast', 'name')
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(fn ($state, Forms\Set $set, ?string $old) => 
                                        $state && $old !== $state ? 
                                        $set('unit_price', \App\Models\Breakfast::find($state)->base_price) : null
                                    ),
                                Forms\Components\TextInput::make('quantity')
                                    ->numeric()
                                    ->default(1)
                                    ->required()
                                    ->reactive(),
                                Forms\Components\TextInput::make('unit_price')
                                    ->numeric()
                                    ->prefix('€')
                                    ->disabled()
                                    ->dehydrated()
                                    ->required(),
                            ])
                            ->columns(3),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('customer.full_name')
                    ->label('Cliente')
                    ->searchable(['first_name', 'last_name']),
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
                Tables\Filters\SelectFilter::make('payment_status')
                    ->options([
                        'pendiente' => 'Pendiente',
                        'pagado' => 'Pagado',
                        'fallido' => 'Fallido',
                    ]),
                Tables\Filters\SelectFilter::make('order_status')
                    ->options([
                        'pendiente' => 'Pendiente',
                        'preparando' => 'Preparando',
                        'en_camino' => 'En camino',
                        'entregado' => 'Entregado',
                        'cancelado' => 'Cancelado',
                    ]),
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

    public static function getRelations(): array
    {
        return [
            RelationManagers\ItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
} 