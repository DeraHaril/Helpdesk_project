<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRendezVousTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendez_vous', function (Blueprint $table) {
            $table->string('id_rdv', 100)->primary('pk_rendez_vous');
            $table->string('environnement_probleme', 20)->nullable();
            $table->string('province', 30)->nullable();
            $table->string('ville', 30)->nullable();
            $table->string('adresse', 30)->nullable();
            $table->timestamp('date_heure')->nullable();
            $table->string('id_client', 100)->nullable();
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
        Schema::dropIfExists('rendez_vous');
    }
}
