<?php

namespace App\Models;

use App\Enums\ProductClass;
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

    public static function getForm(): array
    {
        return [
            TextInput::make('pn')
                ->required()
                ->maxLength(255),
            Textarea::make('description')
                ->required()
                ->columnSpanFull(),
            TextInput::make('price')
                ->numeric()
                ->prefix('$'),
            TextInput::make('class')
                ->required()
                ->maxLength(255),
            TextInput::make('year')
                ->required()
                ->numeric(),
        ];;
    }
}
