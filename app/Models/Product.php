<?php
/*
 * @Author: xmartinly 778567144@qq.com
 * @Date: 2025-02-01 13:10:49
 * @LastEditors: xmartinly 778567144@qq.com
 * @LastEditTime: 2025-02-01 15:01:12
 * @FilePath: \inf_filament\app\Models\Product.php
 * @Description: 这是默认设置,请设置`customMade`, 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 */

namespace App\Models;

use Filament\Forms\Components\Textarea;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'price' => 'decimal:2',
        'year' => 'integer',
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
        ];
    }

    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
