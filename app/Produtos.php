<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $table = 'produtos'; //definindo a tabela do BD que a classe vai gerenciar

    public $timestamps = false; //desabilitando controle de data e hora de manipulação dos registros

    //necessário para descriminar quais campos serao aceitos q sejam add em massa, sem descricao individual:
    protected $fillable = array('nome', 'descricao', 'quantidade', 'valor', 'tamanho', 'categoria_id');

    public function categoria(){
    	return $this->belongsTo('App\Categoria'); //informando o Model q existe uma relacao do produto com a categoria
    	//belongsTo indica q a cardinalidade é de 1:1 (cada produto pertence a 1 categoria)
    }
}
