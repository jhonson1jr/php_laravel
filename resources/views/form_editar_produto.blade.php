<!-- sinalizando que este conteudo é para ser incluido no arquivo principal.blade.php: -->
@extends('principal')

<!-- sinalizando onde é para incluir dentro do principal: -->
@section('conteudo')

<!-- verificando se há erros do ProdutoRequest -->
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
	</ul>
</div>
<div class="col-sm-8">
	<h2>Editar Produto</h2>
	<form action="/produtos/atualizaProduto" method="POST">
		<!-- usando o recurso de geracao de token do laravel para autenticacao do formulario
			 Detalhe que a pagina do form tem q dar refresh toda vez q aberta, para gerar um token válido: -->
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome" class="form-control" value="{{$produto->nome}}">
		</div>
		<div class="form-group">
			<label>Valor:</label>
			<input type="number" name="valor" class="form-control" value="{{$produto->valor}}">
		</div>
		<div class="form-group">
			<label>Quantidade:</label>
			<input type="number" name="quantidade" class="form-control" value="{{$produto->quantidade}}">
		</div>
		<div class="form-group">
			<label>Descrição:</label>
			<textarea class="form-control" name="descricao">{{$produto->descricao}}</textarea>
		</div>
		<div class="form-group">
			<label>Tamanho:</label>
			<input class="form-control" name="tamanho" type="text" value="{{$produto->tamanho}}">
		</div>
		<div class="form-group">
			<label>Categoria:</label>{{$produto->categoria->nome}}
			<select class="form-control" name="categoria_id">
				<option value="{{$produto->categoria->id}}">{{$produto->categoria->nome}}</option>
			</select>
		</div>
		<div class="form-group">
			<input type="submit" name="btnEnviar" class="btn btn-primary" value="Enviar">
		</div>
	</form>	
</div>
@stop