<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAddBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_add_bank', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('user_id'); 
              $table->foreign('user_id')->references('id')->on('users'); 
              $table->string('first_name')->nullable();
              $table->string('last_name')->nullable();
               $table->string('country')->nullable();
                $table->Text('address')->nullable();
                $table->string('city')->nullable();
                $table->string('postal_code')->nullable();
                 $table->string('twiter')->nullable();
                 $table->string('instagram')->nullable();
                 $table->string('date_of_birth')->nullable();
                  $table->string('card_photo')->nullable();
                  $table->string('card_photo_holding_id')->nullable();
                  $table->string('id_expiration_date')->nullable();
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
        Schema::dropIfExists('tbl_add_bank');
    }
}
