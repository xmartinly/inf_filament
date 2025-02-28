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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('pn');
            $table->text('description')->nullable();
            $table->decimal('list_price', 16, 4);
            $table->decimal('target_price', 16, 4);
            $table->decimal('limit_price', 16, 4);
            $table->unsignedInteger('year')->default(0);
            $table->string('currency')->default('CNY');
            $table->string('comment')->default('');
            $table->string('class')->default('n/a');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
