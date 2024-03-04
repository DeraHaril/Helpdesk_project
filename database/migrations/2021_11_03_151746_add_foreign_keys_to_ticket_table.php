<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ticket', function (Blueprint $table) {
            $table->foreign('id_client', 'fk_ticket_id_client_client')->references('id')->on('client')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_reference_ticket', 'fk_reference_ticket')->references('id')->on('reference_ticket')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticket', function (Blueprint $table) {
            $table->dropForeign('fk_ticket_id_client_client');
            $table->dropForeign('fk_reference_ticket');
        });
    }
}
