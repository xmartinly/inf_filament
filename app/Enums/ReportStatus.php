<?php
/*
 * @Author: xmartinly 778567144@qq.com
 * @Date: 2025-02-03 09:07:21
 * @LastEditors: xmartinly 778567144@qq.com
 * @LastEditTime: 2025-02-03 09:08:06
 * @FilePath: \inf_filament\app\Enums\ReportStatus.php
 * @Description: 这是默认设置,请设置`customMade`, 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 */

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ReportStatus: string implements HasLabel
{
    case false = 'In Process';
    case true = 'Done';


    public function getLabel(): ?string
    {
        return $this->name;
    }
}
