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
        Schema::create('question_libraries', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('file_name');
            $table->foreignId('grade_id')->references('id')->on('Grades')->onDelete('cascade');
            $table->foreignId('quizzes_subject_id')->references('id')->on('quizzes_subject')->onDelete('cascade');
                $table->foreignId('quizze_id')->references('id')->on('quizzes')->onDelete('cascade');
                $table->foreignId('Classroom_id')->references('id')->on('Classrooms')->onDelete('cascade');
                $table->timestamps();
            });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_libraries');
    }
};
