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
        // Tabla: Person.Department
        Schema::create('person_departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('active');
            $table->timestamp('time_created');
            $table->timestamp('time_updated')->nullable();
            $table->timestamps(); // Laravel standard timestamps (created_at, updated_at)
        });

        // Tabla: Person.Permission
        Schema::create('person_permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('active');
            $table->timestamp('time_created');
            $table->timestamp('time_updated')->nullable();
            $table->timestamps();
        });

        // Tabla: Residence.AdviserType
        Schema::create('residence_adviser_types', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->boolean('active');
            $table->timestamp('time_created');
            $table->timestamp('time_updated')->nullable();
            $table->timestamps();
        });

        // Tabla: Residence.Ambit
        Schema::create('residence_ambits', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->boolean('active');
            $table->timestamp('time_created');
            $table->timestamp('time_updated')->nullable();
            $table->timestamps();
        });

        // Tabla: Residence.CommentType
        Schema::create('residence_comment_types', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->boolean('active');
            $table->timestamp('time_created');
            $table->timestamp('time_updated')->nullable();
            $table->timestamps();
        });

        // Tabla: Residence.Dictum
        Schema::create('residence_dictums', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->boolean('active');
            $table->timestamp('time_created');
            $table->timestamp('time_updated')->nullable();
            $table->timestamps();
        });

        // Tabla: Residence.Documents
        Schema::create('residence_documents', function (Blueprint $table) {
            $table->id();
            $table->boolean('active');
            $table->string('name');
            $table->timestamp('time_created');
            $table->timestamps();
        });

        // Tabla: Residence.FileDictum
        Schema::create('residence_file_dictums', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->boolean('active');
            $table->timestamp('time_created');
            $table->timestamp('time_updated')->nullable();
            $table->timestamps();
        });

        // Tabla: Residence.FileType
        Schema::create('residence_file_types', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->boolean('active');
            $table->timestamp('time_created');
            $table->timestamp('time_updated')->nullable();
            $table->timestamps();
        });

        // Tabla: Residence.Kind
        Schema::create('residence_kinds', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->boolean('active');
            $table->timestamp('time_created');
            $table->timestamp('time_updated')->nullable();
            $table->timestamps();
        });

        // Tabla: Residence.Nature
        Schema::create('residence_natures', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->boolean('active');
            $table->timestamp('time_created');
            $table->timestamp('time_updated')->nullable();
            $table->timestamps();
        });

        // Tabla: Residence.ProjectPhase
        Schema::create('residence_project_phases', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->boolean('active');
            $table->timestamp('time_created');
            $table->timestamp('time_updated')->nullable();
            $table->timestamps();
        });

        // Tabla: Residence.ProjectType
        Schema::create('residence_project_types', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->boolean('active');
            $table->timestamp('time_created');
            $table->timestamp('time_updated')->nullable();
            $table->timestamps();
        });

        // Tabla: Residence.Sector
        Schema::create('residence_sectors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->boolean('active');
            $table->timestamp('time_created');
            $table->timestamp('time_updated')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('residence_sectors');
        Schema::dropIfExists('residence_project_types');
        Schema::dropIfExists('residence_project_phases');
        Schema::dropIfExists('residence_natures');
        Schema::dropIfExists('residence_kinds');
        Schema::dropIfExists('residence_file_types');
        Schema::dropIfExists('residence_file_dictums');
        Schema::dropIfExists('residence_documents');
        Schema::dropIfExists('residence_dictums');
        Schema::dropIfExists('residence_comment_types');
        Schema::dropIfExists('residence_ambits');
        Schema::dropIfExists('residence_adviser_types');
        Schema::dropIfExists('person_permissions');
        Schema::dropIfExists('person_departments');
    }
};


