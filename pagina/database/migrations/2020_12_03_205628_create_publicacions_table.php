<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users");
            $table->string('titulo');
            $table->text('contenido');
            $table->string('categoria')->default("Deporte");
            $table->integer('numDeLecturas')->default(0);
            $table->integer('numDeVotaciones')->default(0);
            $table->string('urlImagenPublicacion')->nullable();
            $table->string('nombre_autor');
            $table->string('urlImagen_autor')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publicacions');
    }
}
