<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_lines', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('order_id');
            $table->integer('quantity');
            $table->float('height', 8, 2);
            $table->float('width', 8, 2);
            $table->boolean('okleina_a')->default(0);
            $table->boolean('okleina_b')->default(0);
            $table->boolean('okleina_c')->default(0);
            $table->boolean('okleina_d')->default(0);
            $table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_lines');
    }
}
