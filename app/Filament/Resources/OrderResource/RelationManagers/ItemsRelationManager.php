<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    public function form(Form $form): Form
    {
        return $form
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
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('breakfast.name')
                    ->label('Desayuno'),
                Tables\Columns\TextColumn::make('quantity')
                    ->label('Cantidad'),
                Tables\Columns\TextColumn::make('unit_price')
                    ->label('Precio unitario')
                    ->money('EUR'),
                Tables\Columns\TextColumn::make('discount_percentage')
                    ->label('Descuento')
                    ->suffix('%'),
                Tables\Columns\TextColumn::make('discounted_unit_price')
                    ->label('Precio con descuento')
                    ->money('EUR'),
                Tables\Columns\TextColumn::make('subtotal')
                    ->money('EUR'),
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