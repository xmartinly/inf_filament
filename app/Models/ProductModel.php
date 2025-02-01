<?php
/*
 * @Author: xmartinly 778567144@qq.com
 * @Date: 2025-02-01 17:52:36
 * @LastEditors: xmartinly 778567144@qq.com
 * @LastEditTime: 2025-02-01 17:55:52
 * @FilePath: \inf_filament\app\Models\ProductModel.php
 * @Description: 这是默认设置,请设置`customMade`, 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 */

namespace App\Models;

use App\Enums\ProductClass;
use Filament\Forms\Components\Select;
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
            TextInput::make('name')
                ->required()
                ->maxLength(255),
            Select::make('class')
                ->required()
                ->options(ProductClass::class),
        ];
    }

    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
