<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Get;
use Filament\Forms\Set;

use Illuminate\Database\Eloquent\Builder;

class Contract extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'contract_date' => 'date',
        'customer_id' => 'integer',
        'contact_id' => 'integer',
        'contract_amount' => 'decimal:2',
        'contract_tax_rate' => 'decimal:2',
        'contract_amount_wtax' => 'decimal:2',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }

    public function attachments(): HasMany
    {
        return $this->hasMany(Attachment::class);
    }

    public function productThroughs(): BelongsToMany
    {
        return $this->belongsToMany(ContractProduct::class);
    }

    static function getForm(): array
    {

        return [
            TextInput::make('contract_no')
                ->required()
                ->maxLength(255),
            TextInput::make('contract_region')
                ->required()
                ->maxLength(255)
                ->default('CD'),
            DatePicker::make('contract_date')
                ->required(),
            TextInput::make('contract_class')
                ->required()
                ->maxLength(255)
                ->default('VC'),
            TextInput::make('contract_sales')
                ->required()
                ->maxLength(255)
                ->default('ML'),
            Select::make('customer_id')
                ->searchable()
                ->live()
                ->relationship('customer', 'name_chs')
                // ->getOptionLabelFromRecordUsing(fn(Customer $record): string => "{$record->name_chs} - {$record->name_eng}")
                ->required(),
            Select::make('contact_id')
                ->searchable()
                ->preload()
                ->relationship('contact', 'name', modifyQueryUsing: function (Builder $query, Get $get) {
                    return $query->where('customer_id', $get('customer_id'));
                })
                ->required(),
            TextInput::make('contract_amount')
                ->required()
                ->numeric()
                ->default(0),
            TextInput::make('contract_tax_rate')
                ->required()
                ->numeric()
                ->default(13),
            TextInput::make('contract_amount_wtax')
                ->required()
                ->numeric()
                ->default(0),
            Textarea::make('terms_origin')
                ->required()
                ->columnSpanFull(),
            Textarea::make('terms_delivery')
                ->required()
                ->columnSpanFull(),
            Textarea::make('terms_place_delivery')
                ->required()
                ->columnSpanFull(),
            TextInput::make('delivery_estimated')
                ->required()
                ->numeric()
                ->default(0),
            Textarea::make('terms_payment')
                ->required()
                ->columnSpanFull(),
        ];
    }
}
