<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfirmationFacilitatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirmation_facilitators', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('facilitator_1');
            $table->string('facilitator_2');
            $table->string('facilitator_3')->nullable();
            $table->UnsignedBiginteger('confirmation_id');
            
            $table->foreign('confirmation_id')->references('id')->on('confirmations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('confirmation_facilitators');
    }
}
