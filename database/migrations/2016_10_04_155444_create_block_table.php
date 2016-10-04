<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlockTable extends Migration
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
//            $table->integer('type')->unsigned()->index();
//            $table->integer('length')->unsigned()->index();
//            $table->integer('block_count')->unsigned()->index();
            $table->double('width');
            $table->double('depth');
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
        //
        Schema::dropIfExists('blocks');
    }
}
