<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRendezVousTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rendez_vous', function (Blueprint $table) {
            $table->foreign('id_client', 'fk_rendez_v_id_client_client')->references('id_client')->on('client')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_intervenant', 'fk_rendez_v_id_interv_interven')->references('id_intervenant')->on('intervenant')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rendez_vous', function (Blueprint $table) {
            $table->dropForeign('fk_rendez_v_id_client_client');
            $table->dropForeign('fk_rendez_v_id_interv_interven');
        });
    }
}
