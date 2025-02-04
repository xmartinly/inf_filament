<?php
/*
 * @Author: xmartinly 778567144@qq.com
 * @Date: 2025-02-02 13:36:48
 * @LastEditors: xmartinly 778567144@qq.com
 * @LastEditTime: 2025-02-04 14:43:00
 * @FilePath: \inf_filament\app\Casts\IntString.php
 * @Description: 这是默认设置,请设置`customMade`, 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 */

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class IntString implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return $value ? str_replace(',', '', (string)$value) : 'na';
        // return $value;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return $value ? (int)$value : 0;
        // return $value;
    }
}
