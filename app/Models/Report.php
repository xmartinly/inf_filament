<?php
/*
 * @Author: xmartinly 778567144@qq.com
 * @Date: 2025-02-01 13:10:49
 * @LastEditors: xmartinly 778567144@qq.com
 * @LastEditTime: 2025-02-03 09:08:19
 * @FilePath: \inf_filament\app\Models\Report.php
 * @Description: 这是默认设置,请设置`customMade`, 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 */

namespace App\Models;

use Filament\Forms\Get;
use Filament\Forms\Set;

use App\Enums\ServiceType;
use App\Enums\ReportStatus;
use Filament\Forms\Components\Select;
use Filament\Support\Enums\Alignment;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Checkbox;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\MarkdownEditor;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;


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
        'is_done' => ReportStatus::class,
        'spare_usage' => 'array',
        'service_type' => ServiceType::class,
        'customer_id' => 'integer',
        'product_id' => 'integer',
        'product_model_id' => 'integer',
    ];

    /**
     * attachments relationship
     *
     * @return HasMany
     */
    public function attachments(): HasMany
    {
        return $this->hasMany(Attachment::class);
    }

    /**
     * products relationship
     *
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * customer relationship
     *
     * @return HasOne
     */
    public function customer(): HasOne
    {
        return $this->hasOne(Customer::class);
    }

    /**
     * productModel relationship
     *
     * @return HasOne
     */
    public function productModel(): HasOne
    {
        return $this->hasOne(ProductModel::class);
    }

    /**
     * getForm function
     *
     * @return array
     */
    public static function getForm(): array
    {
        $user = Auth()->user();

        return [
            TextInput::make('engineer_name')
                // ->hidden(true)
                ->default($user->name),
            TextInput::make('job_region')
                // ->hidden(true)
                ->default($user->region),

            //Customer Infor section
            Section::make('Customer')
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
                ->collapsible()
                ->columns(3),

            //Product Infor section
            Section::make('Product')
                ->schema([
                    TextInput::make('product_catsn')
                        ->label('C/SN')
                        ->required()
                        ->columnSpan(6)
                        ->maxLength(500),
                    Select::make('product_model')
                        ->label('Model')
                        ->columnSpan(2)
                        ->required()
                        ->searchable()
                        ->preload()
                        ->reactive()
                        ->afterStateUpdated(function ($state, Set $set) {
                            $model = ProductModel::find($state);
                            $set('product_class', $model->class);
                        })
                        ->relationship('productModel', 'name')
                        ->editOptionForm(ProductModel::getForm())
                        ->createOptionForm(ProductModel::getForm()),
                    TextInput::make('product_class')
                        ->label('Class')
                        ->columnSpan(1)
                        ->readOnly(),
                ])
                ->collapsible()
                ->columns(9),

            //Issue & Work section
            Section::make('Issue & Work')
                ->schema([
                    TextInput::make('product_errcode')
                        ->label('Issue')
                        ->required()
                        ->columnSpanFull()
                        ->maxLength(500),
                    MarkdownEditor::make('job_content')
                        ->label('Work')
                        ->columnSpanFull(),
                    Builder::make('spare_usage')
                        ->label(__('Spare'))
                        ->blocks([
                            Builder\Block::make('Spare')
                                ->schema([
                                    Select::make('pn')
                                        ->searchable()
                                        ->editOptionForm(Product::getForm())
                                        ->createOptionForm(Product::getForm())
                                        ->relationship(
                                            'products',
                                            'description',
                                            modifyQueryUsing: function (EloquentBuilder $query, Get $get) {
                                                return $query->where('pn', 'ilike', '%' . $get('pn') . '%')
                                                    ->orWhere('description', 'ilike', '%' . $get('pn') . '%');
                                            }
                                        ),
                                    TextInput::make('descp'),
                                    TextInput::make('qty')
                                        ->numeric()
                                        ->default(1),
                                ])
                                ->columns(3),
                        ])
                        ->addActionAlignment(Alignment::Start)
                        ->columnSpanFull(),
                    TextInput::make('job_notes')
                        ->label('Notes')
                        ->columnSpan(2)
                        ->maxLength(500),
                    Select::make('service_type')
                        ->label('Service Type')
                        ->options(ServiceType::class)
                        ->columnSpan(1)
                        ->required(),
                ])
                ->collapsible()
                ->columns(3),


            //Misc Info section
            Section::make('Misc')
                ->collapsible()
                ->columns(2)
                ->schema([
                    DatePicker::make('in_date')
                        ->required(),
                    Select::make('is_done')
                        ->options(ReportStatus::class),

                ]),
        ];
    }
}
