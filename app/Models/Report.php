<?php

namespace App\Models;

use Filament\Forms\Get;
use App\Enums\ServiceType;
use App\Enums\ProductClass;
use Blueprint\Builder;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\MarkdownEditor;
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
        'spare_usage' => 'array',
    ];

    public function attachments(): HasMany
    {
        return $this->hasMany(Attachment::class);
    }

    public static function getForm(): array
    {
        $product_models = ProductModel::all();
        return [
            TextInput::make('engineer_name')
                ->label('Engineer')
                ->disabled()
                ->default(Auth::user()->name),
            TextInput::make('job_region')
                ->label('Region')
                ->disabled()
                ->default(Auth::user()->region),
            TextInput::make('cst_sap_no')
                ->label('SAP')
                ->required()
                ->numeric(),
            TextInput::make('cst_name_chs')
                ->label('NameCHS')
                ->required()
                ->maxLength(255),
            TextInput::make('cst_name_eng')
                ->label('NameENG')
                ->required()
                ->maxLength(255),
            Select::make('product_model')
                ->label('Model')
                ->options($product_models->pluck('name'))
                ->searchable()
                ->required(),
            TextInput::make('product_class')
                ->live()
                ->readOnly(true)
                // ->before()
                ->default(function (Get $get): string {
                    // return Auth::user()->region;
                    return $get('engineer_name');
                }),

            TextInput::make('product_errcode')
                ->label('Error')
                ->required()
                ->maxLength(500),
            TextInput::make('product_catsn')
                ->label('SN')
                ->required()
                ->maxLength(500),
            MarkdownEditor::make('job_content')
                ->label('Work')
                ->columnSpanFull(),
            TextInput::make('job_notes')
                ->label('Notes')
                ->maxLength(500),
            DatePicker::make('in_date')
                ->required(),
            DatePicker::make('done_date')
                ->required(),
            Select::make('service_type')
                ->enum(ProductClass::class)
                ->options(ServiceType::class)
                ->required(),
            TextInput::make('spare_usage')
                ->required(),
        ];
    }
}
