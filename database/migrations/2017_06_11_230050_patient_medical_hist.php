<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PatientMedicalHist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_medical_hist', function (Blueprint $table) {
            $table->unsignedInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patient')->onDelete('cascade');
            $table->unsignedInteger('medical_hist_id');
            $table->foreign('medical_hist_id')->references('id')->on('medical_hist')->onDelete('cascade');
            $table->primary(['patient_id', 'medical_hist_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_medical_hist');
    }
}
