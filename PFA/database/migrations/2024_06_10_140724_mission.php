<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mission extends Migration
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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('machine_type', ['pro_resto', 'pro_pat', 'pro_mag']);
            $table->integer('hours');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('missionns');
    }
}
