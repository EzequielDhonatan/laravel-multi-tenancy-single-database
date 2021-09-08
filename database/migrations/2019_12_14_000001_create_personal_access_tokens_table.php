<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalAccessTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->bigIncrements('id');

            /* DADOS DO TOKEN DE ACESSO PESSOAL
            ================================================== */
            $table->morphs( 'tokenable' ); ## HABILITAR TOKEN
            $table->string( 'name' ); ## NOME
            $table->string( 'token ', 64 )->unique(); ## TOKEN
            $table->text( 'abilities' )->nullable(); ## HABILIDADES
            $table->timestamp( 'last_used_at ')->nullable(); ## USADO PELA ÚLTIMA VEZ EM

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
        Schema::dropIfExists('personal_access_tokens');
    }
}
