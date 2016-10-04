<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblSilos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::create('silos', function (Blueprint $table){
			$table->increments('id');
			$table->integer('number');
			$table->integer('type_fk')->unsigned()->index();
			$table->decimal('volume', 5, 2);
			$table->integer('contents')->unsigned()->index();
			$table->timestamps();
		});
		
		Schema::table('silos', function(Blueprint $table){
			$table->foreign('type_fk')->references('id')->on('silo_types')->onDelete('cascade');
			$table->foreign('contents')->references('id')->on('silo_contents')->onDelete('cascade');
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
		Schema::drop('silos');
    }
}
