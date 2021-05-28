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

            //El timemétodo crea una TIME columna equivalente con una precisión opcional
            $table->id();
            $table->date('fecha_atencion');
            $table->time('hora_inicio', $precision = 0);
            $table->time('hora_fin', $precision = 0);
            $table->integer('intervalo');
            $table->enum('estado',[0,1,2])->default(0);

            //0 = disponible // es cuando el doctor crea por primera vez los horarios al dia
            //1 = ocupado  // es cuando un horario se ha llenado con una cita
            //2 = culminado // es cuando el horario queda inutilizable porque ya culmino su cita
            
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
