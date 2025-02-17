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
        Schema::create('contract_products', function (Blueprint $table) {
            $table->id();
            $table->string('contract_id');
            $table->string('product_id');
            $table->integer('quantity')->default(1);
            $table->decimal('discount_rate', 8, 2);
            $table->decimal('amount', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_products');
    }
};
