<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShapesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shapes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->float('height', 8, 2);
            $table->float('width', 8, 2);
            $table->boolean('okleina_a')->default(0);
            $table->boolean('okleina_b')->default(0);
            $table->boolean('okleina_c')->default(0);
            $table->boolean('okleina_d')->default(0);
            $table->text('description');
        }
      );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shapes');
    }
}
