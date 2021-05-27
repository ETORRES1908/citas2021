<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {

            //El timemétodo crea una TIMEcolumna equivalente con una precisión opcional
            $table->id();
            $table->date('fecha_atencion');
            $table->time('hora_inicio', $precision = 0);
            $table->time('hora_fin', $precision = 0);
            $table->integer('intervalo');
            $table->enum('estado',[0,1])->default(0);

            //0 = disponible
            //1 = ocupado

            $table->unsignedBigInteger('doctor_id');

            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
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
        Schema::dropIfExists('schedules');
    }
}
