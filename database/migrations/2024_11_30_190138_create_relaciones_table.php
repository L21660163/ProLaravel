<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Tabla: person_departments
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        

        // Tabla: person_careers
        Schema::create('person_careers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_department')->constrained('person_departments')->onDelete('cascade');
            $table->string('career_id');
            $table->string('name');
            $table->dateTime('start_date')->nullable();
            $table->string('official_key')->nullable();
            $table->boolean('active');
            $table->timestamps();
        });

        // Tabla: person_permissions
        Schema::create('person_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->constrained('persons')->onDelete('cascade');
            $table->foreignId('permission_id')->constrained('permissions')->onDelete('cascade');
            $table->boolean('active');
            $table->timestamps();
        });

        // Tabla: residence_advisers
        Schema::create('residence_advisers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_project')->constrained('residence_projects')->onDelete('cascade');
            $table->foreignId('id_person')->constrained('persons')->onDelete('cascade');
            $table->foreignId('id_adviser_type')->constrained('adviser_types')->onDelete('cascade');
            $table->boolean('active');
            $table->timestamps();
        });

        // Tabla: residence_agreements
        Schema::create('residence_agreements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_company')->constrained('residence_companies')->onDelete('cascade');
            $table->dateTime('inicio');
            $table->dateTime('fin');
            $table->boolean('active');
            $table->timestamps();
        });

        // Tabla: residence_comments
        Schema::create('residence_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_project')->constrained('residence_projects')->onDelete('cascade');
            $table->foreignId('id_comment_type')->constrained('comment_types')->onDelete('cascade');
            $table->foreignId('id_person')->constrained('persons')->onDelete('cascade');
            $table->text('mensaje');
            $table->boolean('active');
            $table->timestamps();
        });

        // Tabla: residence_companies
        Schema::create('residence_companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_person')->constrained('persons')->onDelete('cascade');
            $table->foreignId('id_dictum')->constrained('dictums')->onDelete('cascade');
            $table->foreignId('id_sector')->constrained('sectors')->onDelete('cascade');
            $table->string('nombre');
            $table->string('rfc');
            $table->text('lema');
            $table->text('mision');
            $table->text('valores');
            $table->string('calle');
            $table->string('colonia');
            $table->string('cp');
            $table->string('ciudad');
            $table->string('estado');
            $table->string('telefono');
            $table->boolean('active');
            $table->timestamps();
        });

        // Tabla: residence_docs
        Schema::create('residence_docs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_person')->constrained('persons')->onDelete('cascade');
            $table->foreignId('id_type_doc')->constrained('document_types')->onDelete('cascade');
            $table->bigInteger('count');
            $table->timestamps();
        });

        // Tabla: residence_myfiles
        Schema::create('residence_myfiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_person')->constrained('persons')->onDelete('cascade');
            $table->foreignId('id_file_type')->constrained('file_types')->onDelete('cascade');
            $table->foreignId('id_file_dictum')->constrained('file_dictums')->onDelete('cascade');
            $table->string('nombre');
            $table->string('tipo');
            $table->string('ruta');
            $table->boolean('active');
            $table->timestamps();
        });

        // Tabla: residence_myfile_comments
        Schema::create('residence_myfile_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_file')->constrained('residence_myfiles')->onDelete('cascade');
            $table->text('comment');
            $table->boolean('active');
            $table->timestamps();
        });

        // Tabla: residence_projects
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
        });

        // Tabla: residence_project_careers
        Schema::create('residence_project_careers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_career')->constrained('person_careers')->onDelete('cascade');
            $table->foreignId('id_project')->constrained('residence_projects')->onDelete('cascade');
            $table->boolean('active');
            $table->timestamps();
        });

        // Tabla: residence_project_companies
        Schema::create('residence_project_companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_project')->constrained('residence_projects')->onDelete('cascade');
            $table->foreignId('id_company')->constrained('residence_companies')->onDelete('cascade');
            $table->string('nombre');
            $table->boolean('active');
            $table->timestamps();
        });

        // Tabla: residence_project_files
        Schema::create('residence_project_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_project')->constrained('residence_projects')->onDelete('cascade');
            $table->foreignId('id_file_type')->constrained('file_types')->onDelete('cascade');
            $table->foreignId('id_file_dictum')->constrained('file_dictums')->onDelete('cascade');
            $table->string('nombre');
            $table->string('tipo');
            $table->string('ruta');
            $table->boolean('active');
            $table->timestamps();
        });

        // Tabla: residence_project_persons
        Schema::create('residence_project_persons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_project')->constrained('residence_projects')->onDelete('cascade');
            $table->foreignId('id_person')->constrained('persons')->onDelete('cascade');
            $table->foreignId('id_dictum')->constrained('dictums')->onDelete('cascade');
            $table->boolean('owner');
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('residence_project_persons');
        Schema::dropIfExists('residence_project_files');
        Schema::dropIfExists('residence_project_companies');
        Schema::dropIfExists('residence_project_careers');
        Schema::dropIfExists('residence_projects');
        Schema::dropIfExists('residence_myfile_comments');
        Schema::dropIfExists('residence_myfiles');
        Schema::dropIfExists('residence_docs');
        Schema::dropIfExists('residence_companies');
        Schema::dropIfExists('residence_comments');
        Schema::dropIfExists('residence_agreements');
        Schema::dropIfExists('residence_advisers');
        Schema::dropIfExists('person_permissions');
        Schema::dropIfExists('person_careers');
        Schema::dropIfExists('person_departments');
    }
};
