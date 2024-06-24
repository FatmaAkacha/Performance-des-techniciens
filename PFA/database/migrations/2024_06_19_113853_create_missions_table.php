<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->uuid('id_user'); // Utilisation de UUID pour correspondre à la table users
            $table->date('date_debut');
            $table->date('date_fin');
            $table->integer('nombre_installation');
            $table->float('moyen')->nullable(); 
            $table->string('type_installation')->nullable(); 
            $table->string('status')->nullable(); 
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('missions');
    }
}
