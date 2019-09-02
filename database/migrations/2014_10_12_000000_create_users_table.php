<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');

            /* DADOS DO USUÁRIO
            ================================================== */
            $table->bigInteger('tenant_id')->unsigned()->nullable(); ## TENANT

            $table->string('name'); ## NAME
            $table->string('email')->unique(); ## E-MAIL
            $table->timestamp('email_verified_at')->nullable(); ## VERIFICAÇÃO DE E-MAIL
            $table->string('password'); ## SENHA
            $table->rememberToken(); ## LEMBRAR TOKEN

            ## TENANT
            $table->foreign('tenant_id')
                    ->references('id')
                    ->on('tenants')
                    ->onDelete('cascade');

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
