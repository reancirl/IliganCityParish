<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirmations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date_of_seminar');
            $table->string('date_of_confirmation');
            $table->UnsignedBiginteger('baptismal_id');
            $table->timestamps();
           
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
        Schema::dropIfExists('confirmations');
    }
}