<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('estate_id');
            $table->bigInteger('year');
            $table->float('jan_budget_mt',7,2);
            $table->float('feb_budget_mt',7,2);
            $table->float('mac_budget_mt',7,2);
            $table->float('apr_budget_mt',7,2);
            $table->float('may_budget_mt',7,2);
            $table->float('june_budget_mt',7,2);
            $table->float('july_budget_mt',7,2);
            $table->float('aug_budget_mt',7,2);
            $table->float('sept_budget_mt',7,2);
            $table->float('oct_budget_mt',7,2);
            $table->float('nov_budget_mt',7,2);
            $table->float('dec_budget_mt',7,2);
            $table->float('jan_daily_budget_mt',7,2);
            $table->float('feb_daily_budget_mt',7,2);
            $table->float('mac_daily_budget_mt',7,2);
            $table->float('apr_daily_budget_mt',7,2);
            $table->float('may_daily_budget_mt',7,2);
            $table->float('june_daily_budget_mt',7,2);
            $table->float('july_daily_budget_mt',7,2);
            $table->float('aug_daily_budget_mt',7,2);
            $table->float('sept_daily_budget_mt',7,2);
            $table->float('oct_daily_budget_mt',7,2);
            $table->float('nov_daily_budget_mt',7,2);
            $table->float('dec_daily_budget_mt',7,2);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('budgets');
    }
}
