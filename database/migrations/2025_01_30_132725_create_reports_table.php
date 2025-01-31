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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('engineer_name');
            $table->string('job_region');
            $table->unsignedInteger('cst_sap_no');
            $table->string('cst_name_chs');
            $table->string('cst_name_eng');
            $table->string('product_model');
            $table->string('product_class');
            $table->string('product_errcode', 500);
            $table->string('product_catsn', 500);
            $table->text('job_content')->nullable();
            $table->string('job_notes', 500)->nullable();
            $table->date('in_date');
            $table->date('done_date');
            $table->string('service_type');
            $table->json('spare_usage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
