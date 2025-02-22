<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'contract_amount' => 'decimal:4',
        'contract_tax_rate' => 'decimal:4',
        'contract_amount_wtax' => 'decimal:4',
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
        return $this->belongsToMany(ProductThrough::class, 'ContractProduct');
    }
}
