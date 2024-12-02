<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('career', function (Blueprint $table) {
            $table->bigIncrements('id'); // ID de la carrera, que podría ser alfanumérico
            $table->string('career_id')->unique(); // ID único de la carrera (letras o números)
            $table->string('name'); // Nombre de la carrera
            $table->bigInteger('id_person')->unsigned(); // Relación con la persona (número de control)
            $table->timestamps(); // Created_at y updated_at
            $table->boolean('active')->default(true); // Estado activo
            $table->foreign('id_person')->references('id')->on('person')->onDelete('cascade'); // Relación con la persona
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career');
    }
};
