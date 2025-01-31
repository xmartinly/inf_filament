<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ServiceType: string implements HasLabel
{
    case Warranty = 'warranty';
    case PaidService = 'paidservice';
    case Goodwill = 'goodwill';

    public function getLabel(): ?string
    {
        return $this->name;
    }
}
