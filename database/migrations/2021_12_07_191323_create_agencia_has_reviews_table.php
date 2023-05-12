<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenciaHasReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencia_has_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agencia_id');
            $table->string('autor');
            $table->string('autor_url');
            $table->string('foto_url');
            $table->string('rating');
            $table->text('text');
            $table->string('time');
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
        /* Schema::dropIfExists('agencia_has_reviews'); */
    }
}
