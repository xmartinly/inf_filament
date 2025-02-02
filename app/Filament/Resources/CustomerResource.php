<?php
/*
 * @Author: xmartinly 778567144@qq.com
 * @Date: 2025-02-01 17:52:36
 * @LastEditors: xmartinly 778567144@qq.com
 * @LastEditTime: 2025-02-02 19:33:19
 * @FilePath: \inf_filament\app\Filament\Resources\CustomerResource.php
 * @Description: 这是默认设置,请设置`customMade`, 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 */

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

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'carbon-user-data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('sap_no')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('name_chs')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name_eng')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('locate')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('group')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sap_no')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name_chs')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name_eng')
                    ->searchable(),
                Tables\Columns\TextColumn::make('locate')
                    ->searchable(),
                Tables\Columns\TextColumn::make('group')
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
