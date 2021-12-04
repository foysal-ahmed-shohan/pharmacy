<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('customer_id')->unsigned();
            $table->string('invoice_no');
            $table->integer('payment_type')->default('0')->comment('cash=0, bank=1');
            $table->string('sale_date');
            $table->integer('bank_id')->unsigned();           
            $table->text('details')->nullable();
            $table->string('sub_total');
            $table->string('invoice_discount')->nullable();
            $table->string('total_discount');
            $table->string('vat')->nullable();
            $table->string('tax')->nullable();
            $table->string('igst')->nullable();
            $table->string('total_tax')->nullable();
            $table->string('grand_total');
            $table->string('paid_amount')->nullable();
            $table->string('due_amount')->nullable();
            $table->string('change_amount')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
