<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHusbandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('husbands', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('updated_parents_type_of_marriage');
            $table->string('parents_marriage_place');
            $table->string('status');
            $table->string('education');

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
        Schema::dropIfExists('husbands');
    }
}
