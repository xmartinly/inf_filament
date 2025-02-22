<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'price' => 'decimal:4',
        'year' => 'integer',
    ];

    public function contractThroughs(): BelongsToMany
    {
        return $this->belongsToMany(ContractThrough::class, 'ContractProduct');
    }
}
