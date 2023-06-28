<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSubscriptionPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_subscription_plan', function (Blueprint $table) {
            $table->id();
            $table->string('plan_name');
             $table->string('plan_price');
             $table->unsignedBigInteger('category_id'); 

            $table->foreign('category_id')->references('id')->on('category'); 
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
        Schema::dropIfExists('tbl_subscription_plan');
    }
}
