<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_table_records', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->foreignId('Grade_id');
            $table->foreignId('classroom_id');
            $table->foreignId('section_id');
            $table->unsignedInteger('semester');
            $table->string('year', 100);
            $table->timestamps();
            $table->unique(['section_id',"semester",'year']);
        });

        Schema::create('time_slots', function (Blueprint $table) {
            $table->increments('id');
//             $table->unsignedInteger('ttr_id');
            $table->tinyInteger('hour_from');
            $table->string('min_from', 2);
            $table->string('meridian_from', 2);
            $table->tinyInteger('hour_to');
            $table->string('min_to', 2);
            $table->string('meridian_to', 2);
            $table->string('time_from', 100);
            $table->string('time_to', 100);
            $table->string('full', 100);
            $table->timestamps();
            $table->unique(['time_from',"time_to"]);


        });

        Schema::create('lectures', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ttr_id');
            $table->foreign("ttr_id")->references('id')->on('time_table_records')->onDelete('cascade')->onUpdate("cascade");
            $table->unsignedInteger('ts_id');
            $table->foreign("ts_id")->references('id')->on('time_slots')->onDelete('cascade')->onUpdate("cascade");
             $table->unsignedBigInteger('subject_id');
             $table->foreign("subject_id")->references('id')->on('subjects')->onDelete('cascade')->onUpdate("cascade");
            $table->unsignedBigInteger('day_id');
            $table->foreign("day_id")->references('id')->on('days')->onDelete('cascade')->onUpdate("cascade");
             $table->unsignedBigInteger('teacher_id');
             $table->foreign("teacher_id")->references('id')->on('teachers')->onDelete('cascade')->onUpdate("cascade");

            $table->timestamps();
            $table->unique(['ttr_id', 'ts_id', 'day_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_tables');
        Schema::dropIfExists('time_slots');
        Schema::dropIfExists('time_table_records');
    }
};
