<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wives', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('updated_parents_type_of_marriage');
            $table->string('parents_marriage_place')->nullable();
            $table->string('status');
            $table->string('education');

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
        Schema::dropIfExists('wives');
    }
}
