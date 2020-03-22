<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarriageSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marriage_sponsors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sponsor_name');
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
        Schema::dropIfExists('marriage_sponsors');
    }
}
