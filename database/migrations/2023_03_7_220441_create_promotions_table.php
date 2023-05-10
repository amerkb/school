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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students');
            $table->bigInteger('from_grade')->unsigned();
            $table->foreign('from_grade')->references('id')->on('Grades');
            $table->bigInteger('from_Classroom')->unsigned();
            $table->foreign('from_Classroom')->references('id')->on('Classrooms');
            $table->bigInteger('from_section')->unsigned();
            $table->foreign('from_section')->references('id')->on('sections');
            $table->bigInteger('to_grade')->unsigned();
            $table->foreign('to_grade')->references('id')->on('Grades');
            $table->bigInteger('to_Classroom')->unsigned();
            $table->foreign('to_Classroom')->references('id')->on('Classrooms');
            $table->bigInteger('to_section')->unsigned();
            $table->foreign('to_section')->references('id')->on('sections');
            $table->string('academic_year');
            $table->string('academic_year_new');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
