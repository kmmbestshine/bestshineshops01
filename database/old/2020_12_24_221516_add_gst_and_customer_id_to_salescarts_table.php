<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGstAndCustomerIdToSalescartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salescarts', function (Blueprint $table) {
            $table->string('customer_id')->after('product_id')->nullable();
            $table->string('gst')->after('price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salescarts', function (Blueprint $table) {
            //
        });
    }
}
