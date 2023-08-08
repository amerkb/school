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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("description");
            $table->string("filename");
            $table->foreignId('teacher_id')->
            references('id')->on('teachers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('subject_id')->references('id')->on('subjects')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('section_id')->references('id')->on('sections')->onDelete('cascade')->onUpdate('cascade');
            $table->string('year');
            $table->unsignedInteger('semester');
            $table->timestamps();
        });
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('title',500);
            $table->string('answers',500);
            $table->string('right_answer',500);
            $table->string('photo')->nullable();
            $table->foreignId('lesson_id')->references('id')->on('lessons')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
        Schema::dropIfExists('questions');
    }
};
