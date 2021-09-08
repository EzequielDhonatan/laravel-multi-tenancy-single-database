<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFailedJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();

            /* DADOS DOS TRABALHOS COM FALHA
            ================================================== */
            $table->string( 'uuid' )->unique(); ## UUID
            $table->text( 'connection '); ## CONEXÃO
            $table->text( 'queue '); ## FILA
            $table->longText( 'payload '); ## CARGA ÚTIL
            $table->longText( 'exception '); ## EXCEÇÕES
            $table->timestamp( 'failed_at' )->useCurrent(); ## FALHOU EM

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('failed_jobs');
    }
}
