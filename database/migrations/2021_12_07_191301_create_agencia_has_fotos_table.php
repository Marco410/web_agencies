<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenciaHasFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencia_has_fotos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agencia_id');

            $table->text('html');
            $table->text('foto_ref');
            $table->timestamps();

            $table->foreign('agencia_id')->references('id')->on('agencias')->onDelete('restrict')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /* Schema::dropIfExists('agencia_has_fotos'); */
    }
}
