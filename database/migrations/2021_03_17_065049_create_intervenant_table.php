<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntervenantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervenant', function (Blueprint $table) {
            $table->string('id_intervenant', 100)->primary('pk_intervenant');
            $table->string('nom_intervenant', 50)->nullable();
            $table->string('numero_telephone', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('password', 250)->nullable();
            $table->string('poste', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('intervenant');
    }
}
