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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("places");
            $table->unsignedInteger('ts_id');
            $table->foreign("ts_id")->references('id')->on('time_slots')->onDelete('cascade')->onUpdate("cascade");
            $table->unsignedBigInteger('bus_id');
            $table->foreign("bus_id")->references('id')->on('buses')->onDelete('cascade')->onUpdate("cascade");
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('day_id');
            $table->foreign("day_id")->references('id')->on('days')->onDelete('cascade')->onUpdate("cascade");
            $table->string('type');
            $table->string('year');
            $table->string('semester');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
