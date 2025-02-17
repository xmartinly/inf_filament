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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('sap_no');
            $table->string('name_chs');
            $table->string('name_eng');
            $table->string('file_no')->default('0');
            $table->string('locate')->default('n/a');
            $table->unsignedInteger('group')->default(0)->comment('1=End User - Std, 2=OEM, 3=Distributor, 4=Agent, 6=Reseller, 8=End User - Univ., 9=End User - Govt., 10=Intercompany, 11=Service Providers');
            $table->unique('sap_no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
