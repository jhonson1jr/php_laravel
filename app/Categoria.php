<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
  	public function produtos(){
    	return $this->hasMany('App\Produto'); //informando o Model q existe uma relacao do produto com a categoria
    	//hasMany indica q a cardinalidade é de 0:1 (uma categoria tem varios produtos)
    }
}
