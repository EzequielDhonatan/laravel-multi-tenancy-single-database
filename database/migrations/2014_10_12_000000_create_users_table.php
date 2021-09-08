<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            /* DADOS DO USUÁRIO
            ================================================== */
            $table->string( 'name' ); ## NOME
            $table->string( 'email' )->unique( ); ## E-MAIL
            $table->timestamp( 'email_verified_at' )->nullable(); ## E-MAIL VERIFICADO EM
            $table->string( 'password' ); ## SENHA
            $table->rememberToken();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
