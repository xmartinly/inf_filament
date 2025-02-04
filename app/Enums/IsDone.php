<?php
/*
 * @Author: xmartinly 778567144@qq.com
 * @Date: 2025-02-04 14:43:03
 * @LastEditors: xmartinly 778567144@qq.com
 * @LastEditTime: 2025-02-04 14:46:53
 * @FilePath: \inf_filament\app\Enums\ServiceType copy.php
 * @Description: 这是默认设置,请设置`customMade`, 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 */

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum IsDone: int implements HasLabel
{
    case Done = 1;
    case InProcess = 0;

    public function getLabel(): ?string
    {
        return $this->name;
    }
}
