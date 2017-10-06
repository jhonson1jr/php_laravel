<!-- sinalizando que este conteudo é para ser incluido no arquivo principal.blade.php: -->
@extends('principal')

<!-- sinalizando onde é para incluir dentro do principal: -->
@section('conteudo')

<!-- verificando se há erros do ProdutoRequest -->
@if($errors->all())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
	</ul>
</div>
@endif
<div class="col-sm-8">
	<h2>{{$titulo}}</h2> <!-- Pegando o titulo, que varia se Novo ou Editar-->
	<form action="{{$acao}}/{{$produto->id or old('')}}" method="POST">
		<!-- usando o recurso de geracao de token do laravel para autenticacao do formulario
			 Detalhe que a pagina do form tem q dar refresh toda vez q aberta, para gerar um token válido: -->
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		@if(isset($produto))
		{{ method_field('PUT') }} <!-- se for editar, este campo é obrigatorio pro update-->
		@endif
		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome" class="form-control" value="{{$produto->nome or old('')}}">
		</div>
		<div class="form-group">
			<label>Valor:</label>
			<input type="number" name="valor" class="form-control" value="{{$produto->valor or old('')}}">
		</div>
		<div class="form-group">
			<label>Quantidade:</label>
			<input type="number" name="quantidade" class="form-control" value="{{$produto->quantidade or old('')}}">
		</div>
		<div class="form-group">
			<label>Descrição:</label>
			<textarea class="form-control" name="descricao">{{$produto->descricao or old('')}}</textarea>
		</div>
		<div class="form-group">
			<label>Tamanho:</label>
			<input class="form-control" name="tamanho" type="text" value="{{$produto->tamanho or old('')}}">
		</div>
		<div class="form-group">
			<label>Categoria:</label>
			<!-- se existe a variavel produto e o id é igual ao do loop, seleciona -->
			<select class="form-control" name="categoria_id">
				@foreach($categorias as $c)
				<option value="{{$c->id}}"
				@if((isset($produto)) && ($produto->categoria_id == $c->id))
					selected 
				@endif
				>{{$c->nome}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<input type="submit" name="btnEnviar" class="btn btn-primary" value="Enviar">
		</div>
	</form>	
</div>
@stop