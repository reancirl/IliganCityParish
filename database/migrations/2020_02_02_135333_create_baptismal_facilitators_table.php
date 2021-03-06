<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaptismalFacilitatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baptismal_facilitators', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('facilitator_1');
            $table->string('facilitator_2');
            $table->string('facilitator_3')->nullable();
            $table->UnsignedBiginteger('baptismal_id');
            
            $table->foreign('baptismal_id')->references('id')->on('baptismals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baptismal_facilitators');
    }
}
