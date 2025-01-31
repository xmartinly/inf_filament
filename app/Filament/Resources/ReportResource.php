<?php

namespace App\Filament\Resources;


use App\Filament\Resources\ReportResource\Pages;
use App\Filament\Resources\ReportResource\RelationManagers;
use App\Models\Report;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

use Illuminate\Support\Facades\Auth;
use App\Enums\ProductClass;
use App\Enums\ServiceType;
use App\Models\ProductModel;
use Filament\Forms\Get;

class ReportResource extends Resource
{
    protected static ?string $model = Report::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
       
        return $form
            ->schema(Report::getForm());
    }

    public static function table(Table $table): Table
    {

        return $table
            ->columns([
                Tables\Columns\TextColumn::make('engineer_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('job_region')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cst_sap_no')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cst_name_chs')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cst_name_eng')
                    ->searchable(),
                Tables\Columns\TextColumn::make('product_model')
                    ->searchable(),
                Tables\Columns\TextColumn::make('product_class')
                    ->searchable(),
                Tables\Columns\TextColumn::make('product_errcode')
                    ->searchable(),
                Tables\Columns\TextColumn::make('product_catsn')
                    ->searchable(),
                Tables\Columns\TextColumn::make('job_notes')
                    ->searchable(),
                Tables\Columns\TextColumn::make('in_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('done_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('service_type')
                    ->searchable(),
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
            'index' => Pages\ListReports::route('/'),
            'create' => Pages\CreateReport::route('/create'),
            'edit' => Pages\EditReport::route('/{record}/edit'),
        ];
    }
}
