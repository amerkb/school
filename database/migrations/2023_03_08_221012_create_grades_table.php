<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('Grades', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
            $table->integer('Status')->default(1);
			$table->string('Name');
        	$table->text('Notes')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('Grades');
	}
};
