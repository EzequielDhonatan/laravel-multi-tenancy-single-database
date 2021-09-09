<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            /* DADOS DO POST
            ================================================== */
            $table->uuid( 'uuid' )->unique(); ## UUID

            $table->foreignId( 'tenant_id' )->constrained( 'tenants' ); ## INQUILINO
            $table->foreignId( 'user_id' )->constrained( 'users' ); ## USUÁRIO

            $table->string( 'image' )->nullable(); ## IMAGEM
            $table->string( 'title' ); ## TÍTULO
            $table->string( 'url' ); ## URL
            $table->text( 'body' ); ## CONTEÚDO

            $table->enum( 'situation', [ 'A', 'I' ] )->default( 'A' ); ## SITUAÇÃO

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
        Schema::dropIfExists('posts');
    }
}
