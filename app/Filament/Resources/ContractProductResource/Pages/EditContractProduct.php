<?php

namespace App\Filament\Resources\ContractProductResource\Pages;

use App\Filament\Resources\ContractProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContractProduct extends EditRecord
{
    protected static string $resource = ContractProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
