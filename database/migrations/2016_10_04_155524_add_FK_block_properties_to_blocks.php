<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFKBlockPropertiesToBlocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('blocks', function (Blueprint $table){
            $table->integer('block_id')->unsigned();
            $table->foreign('block_id')->references('id')->on('blocks');

            $table->integer('count');
            $table->string('type');
            $table->integer('length');
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
        Schema::table('blocks', function (Blueprint $table) {
            $table->dropForeign('blocks_block_id_foreign');
        });
    }
}
