<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->length(11)->nullable(); 
            $table->integer('Celeberity_id')->length(11)->nullable();

            $table->integer('price')->length(11)->nullable();
            
             $table->string('payment_status')->nullable();
             $table->string('transaction_id')->nullable();
             $table->string('expiry_date')->nullable();
             $table->string('credit_use')->nullable();
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
        Schema::dropIfExists('subscription');
    }
}
