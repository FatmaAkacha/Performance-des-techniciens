<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClientIdToMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('missions', function (Blueprint $table) {
            $table->uuid('client_id')->nullable()->after('id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('missions', function (Blueprint $table) {
            $table->dropForeign(['client_id']);
            $table->dropColumn('client_id');
        });
    }
}
