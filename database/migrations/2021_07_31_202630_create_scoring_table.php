<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoringTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scoring', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->double("Emission");
            $table->double("Innovation");
            $table->double("ResourceUse");
            $table->double("HumanRights");
            $table->double("ProductResponsibility");
            $table->double("Workforce");
            $table->double("Community");
            $table->double("Management");
            $table->double("Shareholders");
            $table->double("CsrStrategy");
            $table->double("ESGScores");
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
        Schema::dropIfExists('scoring');
    }
}
