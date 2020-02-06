<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaptismalSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baptismal_sponsors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sponsor_name');
            $table->string('sponsor_gender');
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
        Schema::dropIfExists('baptismal_sponsors');
    }
}
