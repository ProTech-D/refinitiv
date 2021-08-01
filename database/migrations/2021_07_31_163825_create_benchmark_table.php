<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBenchmarkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benchmark', function (Blueprint $table) {
            $table->id();
            $table->string("Instrument");
            $table->string("RIC");
            $table->double("EsgScore");
            $table->integer("TRBC");
            $table->string("Country");
            $table->string("Industry");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('benchmark');
    }
}
