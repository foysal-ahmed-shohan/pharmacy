<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->string('generic_name');
            $table->integer('box_size');
            $table->integer('unit_id')->unsigned();
            $table->string('shelf');
            $table->text('details');
            $table->integer('type_id')->unsigned();
            $table->string('images');
            $table->integer('cat_id')->unsigned();
            $table->integer('sell_price');
            $table->integer('vat');
            $table->integer('tax');
            $table->integer('igst');
            $table->string('barcode');
            $table->integer('manufacturer_id')->unsigned();
            $table->integer('manufacturer_price');
            $table->integer('status')->default('1')->comment('Active=1, Inactive=0');
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
        Schema::dropIfExists('medicines');
    }
}
