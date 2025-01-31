<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Enums\ProductClass;

class Report extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cst_sap_no' => 'integer',
        'in_date' => 'date',
        'done_date' => 'date',
        'spare_usage' => 'array',
        'product_class' => ProductClass::class
    ];

    public function attachments(): HasMany
    {
        return $this->hasMany(Attachment::class);
    }
}
