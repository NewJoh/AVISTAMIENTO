<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvistamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avistamientos', function (Blueprint $table) {
            $table->id();
            $table->string("Fecha");
            $table->string("Hora");
            $table->string("Latitud");
            $table->string("Longitud");
            $table->unsignedBigInteger("id_ornitologos");
            $table->foreign("id_ornitologos")->references("id")->on("ornitologos")->onDelete("cascade")->onUpdate("cascade");
            $table->unsignedBigInteger("id_ave");
            $table->foreign("id_ave")->references("id")->on("aves")->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('avistamientos');
    }
}
