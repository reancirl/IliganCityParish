<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarriagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marriages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('date');

            $table->UnsignedBiginteger('husband_id');
            $table->foreign('husband_id')->references('id')->on('husbands');
            $table->UnsignedBiginteger('wife_id');
            $table->foreign('wife_id')->references('id')->on('wives');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marriages');
    }
}