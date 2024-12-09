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
        Schema::create('residence_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_project_type')->constrained('project_types')->onDelete('cascade');
            $table->foreignId('id_company')->constrained('residence_companies')->onDelete('cascade');
            $table->foreignId('id_nature')->constrained('natures')->onDelete('cascade');
            $table->foreignId('id_ambit')->constrained('ambits')->onDelete('cascade');
            $table->foreignId('id_kind')->constrained('kinds')->onDelete('cascade');
            $table->foreignId('id_project_phase')->constrained('project_phases')->onDelete('cascade');
            $table->string('titulo');
            $table->text('objetivo_general');
            $table->text('objetivos_especificos');
            $table->text('justificacion');
            $table->text('actividades');
            $table->text('comentarios')->nullable();
            $table->boolean('active');
            $table->timestamps();
        });;
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project');
    }
};
