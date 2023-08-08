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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->morphs("user");
            $table->foreignId("conversation_id")
                ->nullable()
                ->constrained('conversations')
                ->nullOnDelete()
                ->cascadeOnUpdate();
            $table->text("body")->nullable();
            $table->enum("type",["text","file"])->default("text");
            $table->boolean("read_all")->default(0);
            $table->boolean("receipt_all")->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
