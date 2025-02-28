<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('sap_no')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('name_chs')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name_eng')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('file_no')
                    ->maxLength(255)
                    ->default(0),
                Forms\Components\TextInput::make('locate')
                    ->required()
                    ->maxLength(255)
                    ->default('n/a'),
                Forms\Components\TextInput::make('group')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sap_no')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name_chs')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name_eng')
                    ->searchable(),
                Tables\Columns\TextColumn::make('file_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('locate')
                    ->searchable(),
                Tables\Columns\TextColumn::make('group')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
