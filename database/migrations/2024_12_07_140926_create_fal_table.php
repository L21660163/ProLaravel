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
        Schema::table('residence_comments', function (Blueprint $table) {
            $table->foreignId('id_comment_type')->constrained('comment_types')->onDelete('cascade');
        });

        Schema::table('residence_projects', function (Blueprint $table) {
            $table->foreignId('id_project_type')->constrained('project_types')->onDelete('cascade');
            $table->foreignId('id_company')->constrained('residence_companies')->onDelete('cascade');
            $table->foreignId('id_nature')->constrained('natures')->onDelete('cascade');
            $table->foreignId('id_ambit')->constrained('ambits')->onDelete('cascade');
            $table->foreignId('id_kind')->constrained('kinds')->onDelete('cascade');
            $table->foreignId('id_project_phase')->constrained('project_phases')->onDelete('cascade');


        });

        Schema::table('project_person', function (Blueprint $table) {
            $table->foreignId('id_dictum')->constrained('dictums')->onDelete('cascade');
        });

        Schema::table('residence_myfiles', function (Blueprint $table) {
            $table->foreignId('id_file_type')->constrained('file_types')->onDelete('cascade');
            $table->foreignId('id_file_dictum')->constrained('file_dictums')->onDelete('cascade');
        });
        
        Schema::table('residence_myfile_comments', function (Blueprint $table) {
            $table->foreignId('id_file')->constrained('residence_myfiles')->onDelete('cascade');
        });

        Schema::table('residence_file_dictums', function (Blueprint $table) {
            $table->foreignId('id_project_file')->constrained('project_files')->onDelete('cascade');
        });

        Schema::table('residence_project_files', function (Blueprint $table) {
            $table->foreignId('id_file_type')->constrained('file_types')->onDelete('cascade');
            $table->foreignId('id_file_dictum')->constrained('file_dictums')->onDelete('cascade');
        });
        

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fal');
    }
};
