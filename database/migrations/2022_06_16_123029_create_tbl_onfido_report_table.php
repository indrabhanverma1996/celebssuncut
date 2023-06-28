<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblOnfidoReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_onfido_report', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users'); 
            $table->string('privacy_notices_read_consent_given')->nullable();
          
            $table->string('document_link')->nullable();
            $table->string('applicant_provides_data')->nullable();
            $table->string('applicant_id')->nullable();
            $table->string('webhook_ids')->nullable();
            $table->string('status')->nullable();
            $table->string('tags')->nullable();
            $table->string('result')->nullable();
            $table->string('form_uri')->nullable();
            $table->string('redirect_uri')->nullable();
            $table->string('results_uri')->nullable();
            $table->string('report_id1')->nullable();
            $table->string('report_id2')->nullable();
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
        Schema::dropIfExists('tbl_onfido_report');
    }
}
