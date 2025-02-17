<?php

namespace App\Filament\Resources\ContractProductResource\Pages;

use App\Filament\Resources\ContractProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContractProducts extends ListRecords
{
    protected static string $resource = ContractProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
