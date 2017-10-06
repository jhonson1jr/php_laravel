<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionaTamanhoProdutos extends Migration
{
    public function up()
    {
        Schema::table('produtos', function($table){
            $table->string('tamanho', 100)->default(0); //criando a coluna string 'tamanho' com limit de 100 caracteres
        });
    }

    public function down()
    {
        Schema::table('produtos', function($table){
            $table->dropColumn('tamanho'); //removendo a coluna
        });
    }
}
