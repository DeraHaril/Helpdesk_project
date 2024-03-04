<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToNoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('note', function (Blueprint $table) {
            $table->foreign('id_intervenant', 'fk_note_id_interv_interven')->references('id_intervenant')->on('intervenant')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_ticket', 'fk_note_id_ticket_ticket')->references('id_ticket')->on('ticket')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_client', 'fk_note_reference_client')->references('id_client')->on('client')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('note', function (Blueprint $table) {
            $table->dropForeign('fk_note_id_interv_interven');
            $table->dropForeign('fk_note_id_ticket_ticket');
            $table->dropForeign('fk_note_reference_client');
        });
    }
}
