<?php
/*
 * @Author: xmartinly 778567144@qq.com
 * @Date: 2025-02-01 13:10:49
 * @LastEditors: xmartinly 778567144@qq.com
 * @LastEditTime: 2025-02-01 13:43:03
 * @FilePath: \inf_filament\app\Models\Report.php
 * @Description: 这是默认设置,请设置`customMade`, 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 */

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\MarkdownEditor;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'is_done' => 'boolean',
        'spare_usage' => 'array',
        'customer_id' => 'integer',
        'product_id' => 'integer',
        'product_model_id' => 'integer',
    ];

    public function attachments(): HasMany
    {
        return $this->hasMany(Attachment::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function customer(): HasOne
    {
        return $this->hasOne(Customer::class);
    }

    public function productModel(): HasOne
    {
        return $this->hasOne(ProductModel::class);
    }

    public static function getForm(): array
    {
        $user = Auth()->user();
        $product_model = ProductModel::all();
        return [
            TextInput::make('engineer_name')
                ->hidden(true)
                ->default($user->name),
            TextInput::make('job_region')
                ->hidden(true)
                ->default($user->region),

            //Customer Infor section
            Section::make('Customer Information')
                ->schema([
                    TextInput::make('cst_sap_no')
                        ->required()
                        ->numeric(),
                    TextInput::make('cst_name_chs')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('cst_name_eng')
                        ->required()
                        ->maxLength(255),
                ])
                ->columns(3),

            //Product Infor section
            Section::make('Product Information')
                ->schema([
                    Select::make('product_model')
                        ->required()
                        ->searchable()
                        ->preload()
                        ->relationship('productModel', 'name')
                        ->editOptionForm(ProductModel::getForm())
                        ->createOptionForm(ProductModel::getForm()),
                    TextInput::make('product_class')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('product_catsn')
                        ->required()
                        ->maxLength(500),
                ])
                ->collapsible()
                ->columns(3),

            TextInput::make('product_errcode')
                ->required()
                ->maxLength(500),

            MarkdownEditor::make('job_content')
                ->columnSpanFull(),
            TextInput::make('job_notes')
                ->maxLength(500),
            DatePicker::make('in_date')
                ->required(),
            DatePicker::make('done_date')
                ->required(),
            TextInput::make('service_type')
                ->required()
                ->maxLength(255),
            TextInput::make('spare_usage')
                ->required(),
        ];
    }
}
