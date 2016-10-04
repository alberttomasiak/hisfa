<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblStockCounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::create('stock_counts', function (Blueprint $table){
			$table->increments('id');
			$table->integer('stock_id')->unsigned()->index();
			$table->double('count');
			$table->datetime('date');
			$table->timestamps();
		});
		
		Schema::table('stock_counts', function (Blueprint $table){
			$table->foreign('stock_id')->references('id')->on('stocks')->onDelete('cascade');
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
		Schema::dropIfExists('stock_counts');
    }
}
