<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchaseinfos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('purchase_id')->nullable()->unsigned();
            $table->integer('medicine_id')->unsigned();
            $table->string('batch_id');
            $table->date('expired_date');
            $table->integer('stock_id')->unsigned();
            $table->string('quantity');
            $table->string('rate');
            $table->string('total_price');
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
        Schema::dropIfExists('purchaseinfos');
    }
}
