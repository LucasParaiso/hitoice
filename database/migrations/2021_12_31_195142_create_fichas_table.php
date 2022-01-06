<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichas', function (Blueprint $table) {
            $table->id();

            $table->string('nome');
            $table->integer('vida_atual')->default(10);
            $table->integer('vida_max')->default(10);
            $table->integer('despertado_atual')->default(3);
            $table->integer('despertado_max')->default(3);
            $table->string('imagem_personagem');
            $table->string('imagem_dragao');
            
            $table->foreignId('caminho_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('classe_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('heranca_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            
            $table->string('arma_nome')->nullable();
            $table->integer('arma_dano')->nullable();
            $table->string('arma_elemento')->nullable();

            $table->string('dragao_nome')->nullable();
            $table->string('dragao_elemento')->nullable();

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
        Schema::dropIfExists('fichas');
    }
}
