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
        Schema::create('person', function (Blueprint $table) {
            $table->bigIncrements('id'); // El id será autoincrementable (se utilizará como número de control)
            $table->string('name'); // Nombre de la persona
            $table->string('control_number', 6)->unique(); // Número de control de 6 dígitos
            $table->timestamps(); // Created_at y updated_at
            $table->boolean('active')->default(true); // Estado activo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('person');
    }
};
