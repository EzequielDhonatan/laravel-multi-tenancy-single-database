<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {

            /* DADOS RESET DA SENHA
            ================================================== */
            $table->string( 'email' )->index(); ## E-MAIL
            $table->string( 'token' ); ## TOKEN
            $table->timestamp( 'created_at' )->nullable(); ## CRIADO EM

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
}
