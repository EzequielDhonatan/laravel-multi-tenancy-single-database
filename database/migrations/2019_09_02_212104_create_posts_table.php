<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');

            /* DADOS DO POST
            ================================================== */
            $table->bigInteger('tenant_id')->unsigned()->nullable(); ## TENANT
            $table->bigInteger('user_id')->unsigned()->nullable(); ## USER
            
            $table->string('title'); ## TÍTULO
            $table->text('body'); ## CONTEÚDO
            $table->string('image')->nullable(); ## IMAGEM

            ## TENANT
            $table->foreign('tenant_id')
                    ->references('id')
                    ->on('tenants')
                    ->onDelete('cascade');

            ## USER
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
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
        Schema::dropIfExists('posts');
    }
}
