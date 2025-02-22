<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('contract_no');
            $table->string('contract_region')->default('CD');
            $table->date('contract_date');
            $table->string('contract_class')->default('VC');
            $table->string('contract_sales')->default('ML');
            $table->foreignId('customer_id');
            $table->foreignId('contact_id');
            $table->decimal('contract_amount', 16, 4)->default(0.00);
            $table->decimal('contract_tax_rate', 16, 4)->default(13.00);
            $table->decimal('contract_amount_wtax', 16, 4)->default(0.00);
            $table->text('terms_origin');
            $table->text('terms_delivery');
            $table->text('terms_place_delivery');
            $table->integer('delivery_estimated')->default(0);
            $table->text('terms_payment');
            $table->unique('contract_no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
