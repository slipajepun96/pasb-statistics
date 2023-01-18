<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaEstatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_estates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('estate_id');
            $table->bigInteger('current_year');
            $table->float('total_area',8,2);
            $table->float('planted_area',8,2);
            $table->float('matured_area',8,2);
            $table->float('immatured_area',8,2);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area_estates');
    }
}
