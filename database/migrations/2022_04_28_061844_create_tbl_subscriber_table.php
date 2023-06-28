<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSubscriberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_subscriber', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); 

            $table->foreign('user_id')->references('id')->on('users'); 
             $table->unsignedBigInteger('celebirity_user_id'); 
             $table->foreign('celebirity_user_id')->references('id')->on('users');
            $table->string('subscription_plan');

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
        Schema::dropIfExists('tbl_subscriber');
    }
}
