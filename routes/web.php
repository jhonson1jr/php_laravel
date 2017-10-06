<?php
/*
Route::get('/', function(){ //rota a exibir quando acessam o barra
	return '<h1>Listagem de produtos</h1>';
});
*/
//rota a exibir ao acessar /produtos
Route::get('/produtos', 'ProdutoController@lista'); //'endereco', 'controller@metodo_ou_funcao'
//entre chaves o nome do parametro oculto q vai passar na rota, assim nao precisa mostrar na url, somente o valor
Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra'); //'endereco', 'controller@metodo_ou_funcao'
Route::get('/produtos/edita/{id}', 'ProdutoController@editarProduto'); //'endereco', 'controller@metodo_ou_funcao'
Route::get('/produtos/remover/{id}', 'ProdutoController@remover'); //'endereco', 'controller@metodo_ou_funcao'

//Novo produto
Route::get('/produtos/novo', 'ProdutoController@novo_produto'); //'endereco', 'controller@metodo_ou_funcao'

//Salva novo produto usando metodo POST
Route::post('/produtos/adicionaProduto', 'ProdutoController@adicionaProduto'); //'endereco', 'controller@metodo_ou_funcao'

//atualiza produto
Route::put('/produtos/atualizaProduto/{id}', 'ProdutoController@atualizaProduto'); //'endereco', 'controller@metodo_ou_funcao'

//REQUISITA TELA DE LOGIN
Route::get('/login', 'LoginController@form');

//VALIDA O LOGIN
Route::post('/login', 'LoginController@validaLogin');


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/

// ROTA DE LOGIN PADRAO DO LARAVEL
//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
