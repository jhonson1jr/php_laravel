<?php

namespace App\Http\Controllers;

use Request;
use Auth; //importando funcao q ja tem muitos recursos no uso de validações

class LoginController extends Controller
{
    public function form(){ //invoca o form de login
    	return view('form_login');
    }

    public function validaLogin(){
    	//pegando os dados de login
    	$credenciais = Request::only('email', 'password');

    	if (Auth::attempt($credenciais)) { //metodo attempt faz a validacao
    		return 'Logado';
    	}
    	return 'User nao existe';
    }
}