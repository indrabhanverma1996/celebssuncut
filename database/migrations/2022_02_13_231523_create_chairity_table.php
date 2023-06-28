<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChairityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chairity', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('organization_id');
            $table->string('fixed_amount')->nullable();
            $table->string('per_ammount')->nullable();
            $table->string('no_of_days')->nullable();
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
        Schema::dropIfExists('chairity');
    }
}
