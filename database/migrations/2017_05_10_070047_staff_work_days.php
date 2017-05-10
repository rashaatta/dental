<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StaffWorkDays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_work_days', function (Blueprint $table) {
            $table->unsignedInteger('staff_id');
            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');
            $table->unsignedInteger('work_days_id');
            $table->foreign('work_days_id')->references('id')->on('work_days')->onDelete('cascade');
            $table->timestamps();
            $table->primary(['staff_id', 'work_days_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_work_days');
    }
}
