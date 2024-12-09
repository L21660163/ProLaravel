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
        Schema::create('residence_project_careers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_career')->constrained('person_careers')->onDelete('cascade');
            $table->foreignId('id_project')->constrained('residence_projects')->onDelete('cascade');
            $table->boolean('active');
            $table->timestamps();
        });
        Schema::create('residence_project_companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_project')->constrained('residence_projects')->onDelete('cascade');
            $table->foreignId('id_company')->constrained('residence_companies')->onDelete('cascade');
            $table->string('nombre');
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residence_project_careers');
        Schema::dropIfExists('residence_project_companies');
    }
};
