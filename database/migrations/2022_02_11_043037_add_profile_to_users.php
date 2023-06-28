<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
             $table->string('social_id');
            $table->string('social_type');

             $table->string('first_name')->nullable();
             $table->string('last_name')->nullable();
             $table->string('public_name')->nullable();
             $table->string('name_title')->nullable();
             $table->string('followers')->nullable();
             $table->string('fame')->nullable();
              $table->string('charity_help')->nullable();
               $table->string('adult_content')->nullable();
                $table->Integer('monthly_adult_subsecription')->nullable();
                 $table->Integer('free_subscription')->nullable();
                  $table->Integer('monthly_subscription_offer')->nullable();
                  $table->Integer('per_view_charge')->nullable();
                  $table->Integer('live_tv_stream_charge')->nullable();
                   $table->string('important_profile_picture')->nullable();
                    $table->string('important_content')->nullable();
                    $table->text('bank_details')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
