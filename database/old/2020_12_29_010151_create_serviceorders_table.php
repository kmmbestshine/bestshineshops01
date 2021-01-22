<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('serviceorders');
        Schema::create('serviceorders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_id');
            $table->string('invoice_id');
            $table->string('order_id');
            $table->string('product_id');
            $table->string('servicetype_id');
            $table->string('description')->nullable();
            $table->string('contact_no')->nullable();
            $table->boolean('status')->default(1);
            $table->string('technician')->nullable();
            $table->string('service_charge')->nullable();
             $table->date('service_date')->nullable();
            $table->date('next_servicedate')->nullable();
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
        Schema::drop('serviceorders');
    }
}
