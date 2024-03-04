<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToInterventionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('intervention', function (Blueprint $table) {
            $table->foreign('id_equipe', 'fk_interven_reference_equipe')->references('id_equipe')->on('equipe')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_ticket', 'fk_interven_reference_ticket')->references('id_ticket')->on('ticket')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('intervention', function (Blueprint $table) {
            $table->dropForeign('fk_interven_reference_equipe');
            $table->dropForeign('fk_interven_reference_ticket');
        });
    }
}
