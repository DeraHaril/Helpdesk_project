<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailEquipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_equipe', function (Blueprint $table) {
            $table->string('id', 100)->primary('pk_detail_equipe');
            $table->string('id_equipe', 100)->nullable();
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
        Schema::dropIfExists('detail_equipe');
    }
}
