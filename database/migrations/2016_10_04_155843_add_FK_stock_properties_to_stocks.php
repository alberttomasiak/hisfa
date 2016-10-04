<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFKStockPropertiesToStocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('stocks', function (Blueprint $table){
//            $table->increments('id');
            $table->integer('stock_id')->unsigned();
            $table->foreign('stock_id')->references('id')->on('stocks');
            $table->string('name');
            $table->string('type');
            $table->integer('count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('stocks', function (Blueprint $table) {
            $table->dropForeign('stocks_stock_id_foreign');
        });
    }
}
