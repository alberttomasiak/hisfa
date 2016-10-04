<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFKBlockTypesToBlocks extends Migration
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
            $table->increments('id');
            $table->integer('block_id')->unsigned();
            $table->foreign('block_id')->references('id')->on('blocks');
            $table->string('type');
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
        Schema::table('blocks', function (Blueprint $table) {
            $table->dropForeign('blocks_block_id_foreign');
        });
    }
}
