<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDetailReferenceTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_reference_ticket', function (Blueprint $table) {
            $table->foreign('id_ticket', 'fk_detail_reference_ticket')->references('id')->on('ticket')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_reference_ticket', function (Blueprint $table) {
            $table->dropForeign('fk_detail_reference_ticket');
        });
    }
}
