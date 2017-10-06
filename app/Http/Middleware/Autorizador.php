<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Autorizador //fazer controle de acesso, conferir se usuario ta logado para ter acesso às funcoes do sistema
{
    public function handle($request, Closure $next)
    {
        //se nao for a pag de login e for visitante(login nao efetuado)
        if ((!$request->is('login')) and (\Auth::guest())) {
            return redirect('/login'); //se nao ta logado, volta a pag de login
        }
        return $next($request);
    }
    
}
