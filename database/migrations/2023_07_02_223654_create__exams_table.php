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
        Schema::create('type_exams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });


        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('type_exam_id')->nullable()->references('id')->on('type_exams')->nullOnDelete()->cascadeOnUpdate();
            $table->tinyInteger("semester");
            $table->string('year', 100);
            $table->timestamps();
        });
        Schema::create('quizzes_subject', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quizze_id')->references('id')->on('quizzes')->onDelete('cascade');
            $table->foreignId('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreignId('grade_id')->references('id')->on('Grades')->onDelete('cascade');
            $table->foreignId('classroom_id')->references('id')->on('Classrooms')->onDelete('cascade');
            $table->string('date', 100);
            $table->unsignedInteger('ts_id');
            $table->foreign("ts_id")->references('id')->on('time_slots')->onDelete('cascade')->onUpdate("cascade");

            $table->timestamps();
        });

        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quizzes_subject_id')->references('id')->on('quizzes_subject')->onDelete('cascade');
            $table->foreignId('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->integer('degree');
            $table->string('status');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
