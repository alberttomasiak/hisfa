<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblStocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::create('stocks', function (Blueprint $table){
			$table->increments('id');
			$table->double('tonnage');
			$table->integer('stock_type')->unsigned()->index();
			$table->string('image');
			$table->timestamps();
		});
		
		Schema::table('stocks', function(Blueprint $table){
			$table->foreign('stock_type')->references('id')->on('stock_types')->onDelete('cascade');
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
		Schema::dropIfExists('stocks');
    }
}
