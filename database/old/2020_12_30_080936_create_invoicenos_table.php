<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicenosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('invoicenos');
        Schema::create('invoicenos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_id');
            $table->string('customer_id');
            $table->string('invoice_id');
            $table->double('subtotal');
            $table->double('gst_total');
            $table->double('grand_total');
            $table->double('discount_amt');
            $table->double('paid_amt');
            $table->double('due_amt');
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
        Schema::drop('invoicenos');
    }
}
