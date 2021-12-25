<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Nota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('nota')) {
			Schema::create('nota', function (Blueprint $table) {
				$table->id();
				$table->string('nombre');
				$table->float('parcial1')->default(0);
				$table->float('parcial2')->default(0);
				$table->float('parcial3')->default(0);
				$table->float('final')->default(0);
				$table->timestamps();
			});
		}
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nota');
    }
}
