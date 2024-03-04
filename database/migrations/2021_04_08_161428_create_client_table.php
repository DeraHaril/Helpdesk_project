<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->string('id', 100)->primary('pk_client');
            $table->string('nom_client', 50)->nullable();
            $table->string('numero_telephone', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('password', 250)->nullable();
            $table->string('profession', 50)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->timestamp('numero_telephone_verified_at')->nullable();
            $table->boolean('verified')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client');
    }
}
