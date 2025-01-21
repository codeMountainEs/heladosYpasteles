<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BreakfastResource\Pages;
use App\Filament\Resources\BreakfastResource\RelationManagers;
use App\Models\Breakfast;
use App\Models\Ingredient;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BreakfastResource extends Resource
{
    protected static ?string $model = Breakfast::class;

    protected static ?string $navigationIcon = 'heroicon-o-cake';
    protected static ?string $navigationGroup = 'Desayunos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('breakfast_type_id')
                    ->relationship('breakfastType', 'name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('base_price')
                    ->required()
                    ->numeric()
                    ->prefix('€'),
                Forms\Components\Toggle::make('active')
                    ->required(),
                Forms\Components\Section::make('Ingredientes')
                    ->schema([
                        Forms\Components\Repeater::make('ingredients')
                        ->label('Informacion ingredientes')
                            ->relationship('breakfastIngredients')
                            ->schema([
                                Forms\Components\Select::make('ingredient_id')
                                ->label('Ingrediente')
                                ->options(Ingredient::pluck('name', 'id')->toArray())
                                // We are disabling the option if it's already selected in another Repeater row
                               //                        ->disableOptionsWhenSelectedInSiblingRepeaterItems() 

                                ->disableOptionWhen(function ($value, $state, Get $get) {
                                    return collect($get('../*.ingredient_id'))
                                        ->reject(fn($id) => $id == $state)
                                        ->filter()
                                        ->contains($value);
                                })
                                ->live()
                                ->required(),
                                Forms\Components\TextInput::make('quantity')
                                    ->required()
                                    ->numeric(),
                                Forms\Components\Select::make('unit')
                                    ->options([
                                        'unidad' => 'Unidad',
                                        'gr' => 'Gramos',
                                        'ml' => 'Mililitros',
                                    ])
                                    ->required(),
                            ])
                            ->columns(3),
                    ]),
                Forms\Components\Section::make('Imágenes')
                    ->schema([
                        Forms\Components\Repeater::make('images')
                            ->relationship()
                            ->schema([
                                Forms\Components\FileUpload::make('image_path')
                                    ->image()
                                    ->directory('breakfasts')
                                    ->required(),
                                Forms\Components\TextInput::make('title')
                                    ->required(),
                                Forms\Components\Textarea::make('description')
                                    ->rows(2),
                            ])
                            ->columns(3),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('breakfastType.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('base_price')
                    ->money('EUR')
                    ->sortable(),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('ingredients_count')
                    ->counts('ingredients')
                    ->label('Ingredientes'),
                Tables\Columns\TextColumn::make('images_count')
                    ->counts('images')
                    ->label('Imágenes'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('breakfast_type')
                    ->relationship('breakfastType', 'name'),
                Tables\Filters\TernaryFilter::make('active'),
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
            RelationManagers\IngredientsRelationManager::class,
            RelationManagers\ImagesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBreakfasts::route('/'),
            'create' => Pages\CreateBreakfast::route('/create'),
            'edit' => Pages\EditBreakfast::route('/{record}/edit'),
        ];
    }
}
