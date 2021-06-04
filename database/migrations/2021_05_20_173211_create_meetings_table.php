<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->text('observacion_med')->nullable();
            $table->enum('estado',[0,1,2]);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('schedule_id')->unique();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('schedule_id')->references('id')->on('schedules')->onDelete('cascade');

        });

        /*
            0 = PENDIENTE   // es cuando se asigna un usuario a una cita
            1 = FINALIZADO // es cuando el doctro finaliza una cita
            2 = CANCELADO // es cuando el doctor o el usuario cancela una cita
        */


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meetings');
    }
}
