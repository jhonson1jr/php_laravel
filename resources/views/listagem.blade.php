<!-- sinalizando que este conteudo é para ser incluido no arquivo principal.blade.php: -->
@extends('principal')

<!-- sinalizando onde é para incluir dentro do principal: -->
@section('conteudo')

	<h1>Listagem de Produtos</h1> <a href="/produtos/novo" class="btn btn-success">Adicionar Novo</a>
	<table class="table">
		<thead>
			<th>Nome</th>
			<th>Valor</th>
			<th>Descrição</th>
			<th>Quantidade</th>
			<th>Categoria</th>
			<th colspan="3">Ação</th>
		</thead>
	 <!-- usando blade: -->
	@foreach($produtos as $p)
		<tr class="{{ $p->quantidade <=1 ? 'danger' : ''}}"> <!-- se a qtde estiver baixa, marca com a classe danger do bootstrap, caso nao, fazer nada-->
			<td>{{$p->nome}} </td>
			<td>{{$p->valor}}</td>
			<td>{{$p->descricao}}</td>
			<td>{{$p->quantidade}}</td>
			<td>{{$p->categoria->nome}}</td> <!-- laravel faz o select pra saber a qual campo pertence o id q está a ser exibido automaticamente-->
			<td><a href="/produtos/mostra/{{$p->id}}" class="btn btn-primary">Visualizar</a></td>
			<td><a href="/produtos/edita/{{$p->id}}" class="btn btn-warning">Editar</a></td>
			<td><a href="/produtos/remover/{{$p->id}}" class="btn btn-danger">Excluir</a></td>
		</tr>
	@endforeach
	</table>
	<!-- verificando se existe a variavel 'nome' se sim, a requisicao veio do form_novo_produto: -->
	@if(old('nome')) <!-- funcao 'old' verifica se existe parametro passado da requisição anterior para a atual -->
		<div class="alert alert-success">
			Produto {{old('nome')}} adicionado com sucesso.
		</div>	
	@endif
@stop <!-- fim da secao conteudo-->