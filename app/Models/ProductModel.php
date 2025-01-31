<?php

namespace App\Models;

use App\Enums\ProductClass;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ProductModel extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'class' => ProductClass::class,
    ];

    /**
     * getForm function
     *
     * @return array
     */
    public static function getForm(): array
    {
        return [
            TextInput::make('name')
                ->required()
                ->maxLength(255),
            Select::make('class')
                ->required()
                ->options(ProductClass::class),
        ];;
    }
}
