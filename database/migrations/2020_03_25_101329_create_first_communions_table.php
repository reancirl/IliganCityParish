<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirstCommunionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('first_communions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('church');
            $table->timestamps();

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
        Schema::dropIfExists('first_communions');
    }
}
