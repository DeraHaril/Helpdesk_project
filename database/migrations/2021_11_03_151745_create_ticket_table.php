<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket', function (Blueprint $table) {
            $table->string('id', 100)->primary('pk_ticket');
            $table->string('categorie', 30)->nullable();
            $table->string('confidentialite', 20)->nullable();
            $table->string('etat', 20)->nullable();
            $table->string('importance', 20)->nullable();
            $table->timestamp('date_ajout')->nullable();
            $table->string('sujet', 100)->nullable();
            $table->text('description')->nullable();
            $table->string('id_client', 100)->nullable();
            $table->timestamps();
            $table->string('id_reference_ticket', 100)->nullable();
            $table->string('departement', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket');
    }
}
