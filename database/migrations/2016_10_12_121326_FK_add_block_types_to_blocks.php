<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FKAddBlockTypesToBlocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('block_types', function (Blueprint $table) {
            $table->integer('block_id')->unsigned();
            $table->foreign('block_id')->references('id')->on('blocks');
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
        Schema::table('block_types', function (Blueprint $table) {
            $table->dropForeign('block_types_block_id_foreign');
        });

    }
}
