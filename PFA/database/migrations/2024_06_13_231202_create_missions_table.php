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
        $table->unsignedBigInteger('id_user');
        $table->date('date_debut');
        $table->date('date_fin');
        $table->integer('nombre_installation');
        $table->float('moyen')->nullable(); // moyen can be calculated later, thus nullable
        $table->enum('type_installation', ['pro_resto', 'pro_pat', 'pro_mag']);
        $table->timestamps();

        // Foreign key constraint
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