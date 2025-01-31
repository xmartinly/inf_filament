<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ProductClass: string implements HasLabel
{
    case VCP = 'VCP';
    case LDT = 'LDT';
    case ES = 'ES';
    case TF = 'TFC';
    case STC = 'STC';

    public function getLabel(): ?string
    {
        return $this->name;
    }
}
