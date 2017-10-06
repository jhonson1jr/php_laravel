<!-- sinalizando que este conteudo é para ser incluido no arquivo principal.blade.php: -->
@extends('principal')

<!-- sinalizando onde é para incluir dentro do principal: -->
@section('conteudo')

<!-- o blade permite a execucao de php usando duas chaves como sinalizador ao inves de abrir uma tag php  -->
	<h1>Detalhes do Produto {{$produto->nome}}</h1>
	<ul>
		<li>Valor: {{$produto->valor}}</li>
		<li>Descricao: {{$produto->descricao or 'Não tem descrição'}}</li> <!-- or informacao caso campo nulo-->
		<li>Qtde em estoque: {{$produto->quantidade}}</li>
	</ul>
@stop <!-- fim da secao conteudo-->