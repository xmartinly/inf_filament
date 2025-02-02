<?php
/*
 * @Author: xmartinly 778567144@qq.com
 * @Date: 2025-02-02 11:18:32
 * @LastEditors: xmartinly 778567144@qq.com
 * @LastEditTime: 2025-02-02 13:37:52
 * @FilePath: \inf_filament\app\Models\Customer.php
 * @Description: 这是默认设置,请设置`customMade`, 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 */

namespace App\Models;

use App\Casts\IntString;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sap_no' => IntString::class,
        'group' => 'integer',
    ];
}
