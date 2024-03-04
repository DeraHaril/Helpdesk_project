<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterventionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervention', function (Blueprint $table) {
            $table->string('id', 100)->primary('pk_intervention');
            $table->string('id_ticket', 100)->nullable();
            $table->timestamp('date_debut_intervention')->nullable();
            $table->timestamp('date_fin_intervention')->nullable();
            $table->string('id_equipe', 100)->nullable();
            $table->string('nature_intervention', 50)->nullable();
            $table->string('etat_apres_intervention', 50)->nullable();
            $table->text('observation')->nullable();
            $table->timestamp('date_creation_fiche')->nullable();
            $table->string('id_intervenant', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('intervention');
    }
}
