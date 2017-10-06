<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionaRelacaoProdutoCategoria extends Migration
{

    public function up()
    {
        //criando a foreign key de produtos para a categoria
        Schema::table('produtos', function (Blueprint $table) {
            $table->integer('categoria_id')->default(1);
        });
    }


    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn('categoria_id');
        });
    }
}
