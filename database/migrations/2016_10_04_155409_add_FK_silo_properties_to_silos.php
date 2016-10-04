<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFKSiloPropertiesToSilos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('silos', function (Blueprint $table){
            $table->integer('silo_id')->unsigned();
            $table->foreign('silo_id')->references('id')->on('silos');
            $table->string('content');
            $table->string('type');
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
        Schema::table('silos', function (Blueprint $table) {
            $table->dropForeign('silos_silo_id_foreign');
        });
    }
}
