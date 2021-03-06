<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarriageFacilitatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marriage_facilitators', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('facilitator_1');
            $table->string('facilitator_2');
            $table->string('facilitator_3')->nullable();
            $table->UnsignedBiginteger('marriage_id');
            
            $table->foreign('marriage_id')->references('id')->on('marriages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marriage_facilitators');
    }
}
