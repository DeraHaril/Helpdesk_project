<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note', function (Blueprint $table) {
            $table->string('id_note', 100)->primary('pk_note');
            $table->text('note')->nullable();
            $table->timestamp('date_publication')->nullable();
            $table->string('id_client', 100)->nullable();
            $table->string('id_intervenant', 100)->nullable();
            $table->string('photo', 200)->nullable();
            $table->string('document', 200)->nullable();
            $table->string('id_ticket', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('note');
    }
}
