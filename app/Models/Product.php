<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'list_price' => 'decimal:4',
        'target_price' => 'decimal:4',
        'limit_price' => 'decimal:4',
        'year' => 'integer',
    ];
}
