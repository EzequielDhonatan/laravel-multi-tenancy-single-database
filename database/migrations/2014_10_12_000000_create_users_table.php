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
            $table->foreignId( 'tenant_id' )->constrained( 'tenants' ); ## INQUILINO

            $table->string( 'name' ); ## NOME
            $table->string( 'email' )->unique(); ## E-MAIL
            $table->timestamp( 'email_verified_at' )->nullable(); ## VERIFICADO EM
            $table->string( 'password' ); ## SENHA
            $table->rememberToken(); ## LEMBRAR TOKEN
            $table->foreignId( 'current_team_id' )->nullable(); ## ID DA EQUIPE ATUAL
            $table->string( 'profile_photo_path' , 2048)->nullable(); ## CAMINHO DA FOTO DO PERFIL

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
