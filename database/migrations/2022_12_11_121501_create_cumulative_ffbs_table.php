<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCumulativeFfbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cumulative_ffbs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('year');
            $table->bigInteger('month');
            $table->bigInteger('estate_id');
            $table->float('cumulative_ffb_mt',8,2);
            $table->date('latest_ffb_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cumulative_ffbs');
    }
}
