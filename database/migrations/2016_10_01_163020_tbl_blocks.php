<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblBlocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::create('blocks', function (Blueprint $table){
			$table->increments('id');
			$table->integer('type')->unsigned()->index();
			$table->integer('length')->unsigned()->index();
			$table->integer('block_count')->unsigned()->index();
			$table->double('width');
			$table->double('depth');
			$table->timestamps();
		});
		
		Schema::table('blocks', function (Blueprint $table){
			$table->foreign('type')->references('id')->on('block_types')->onDelete('cascade');
			
			$table->foreign('length')->references('id')->on('block_lengths')->onDelete('cascade');
			
			$table->foreign('block_count')->references('id')->on('blocks_count')->onDelete('cascade');
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
		Schema::dropIfExists('blocks');
    }
}
