<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDetailEquipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_equipe', function (Blueprint $table) {
            $table->foreign('id_equipe', 'fk_detail_e_reference_equipe')->references('id_equipe')->on('equipe')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_intervenant', 'fk_detail_e_reference_interven')->references('id_intervenant')->on('intervenant')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_equipe', function (Blueprint $table) {
            $table->dropForeign('fk_detail_e_reference_equipe');
            $table->dropForeign('fk_detail_e_reference_interven');
        });
    }
}
