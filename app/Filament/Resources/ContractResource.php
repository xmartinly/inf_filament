<?php

namespace App\Filament\Resources;


use Filament\Forms;
use Filament\Tables;
use App\Models\Contract;
use App\Models\Customer;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ContractResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ContractResource\RelationManagers;

class ContractResource extends Resource
{
    protected static ?string $model = Contract::class;

    protected static ?string $navigationLabel = '合同';

    protected static ?string $navigationIcon = 'carbon-document-multiple-01';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(Contract::getForm());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('contract_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contract_region')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contract_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('contract_class')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contract_sales')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('contact.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('contract_amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('contract_tax_rate')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('contract_amount_wtax')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('delivery_estimated')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListContracts::route('/'),
            'create' => Pages\CreateContract::route('/create'),
            'edit' => Pages\EditContract::route('/{record}/edit'),
        ];
    }
}
