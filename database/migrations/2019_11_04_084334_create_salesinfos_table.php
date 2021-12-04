<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salesinfos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sales_id')->unsigned();
            $table->integer('medicine_id')->unsigned();
            $table->string('batch_id')->nullable();
            $table->string('available_qty')->nullable();
            $table->string('expired_date')->nullable();
            $table->integer('unit_id')->unsigned();
            $table->string('quantity');
            $table->string('price');
            $table->string('discount')->nullable();
            $table->string('total_amount');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salesinfos');
    }
}
