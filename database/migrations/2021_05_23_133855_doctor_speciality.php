<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DoctorSpeciality extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_speciality', function (Blueprint $table) {

            //El timemétodo crea una TIMEcolumna equivalente con una precisión opcional

            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('speciality_id');

            $table->primary(["doctor_id", "speciality_id"]);

            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->foreign('speciality_id')->references('id')->on('specialities')->onDelete('cascade');


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
        //
    }
}
