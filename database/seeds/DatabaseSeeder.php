<?php

use Illuminate\Database\Seeder;
use App\Categoria; //importando a classe a qual vamos incluir os valores default
class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(CategoriaTableSeeder::class);
    }
}


/**
classe q vai alimentar a tabela Categorias no BD com valores default
*/
class CategoriaTableSeeder extends Seeder
{
	public function run()
    {
        Categoria::create(['nome' => 'Veiculos']);
        Categoria::create(['nome' => 'Aeronaves']);
        Categoria::create(['nome' => 'Escritorio']);
        Categoria::create(['nome' => 'Vestuario']);
    }
}