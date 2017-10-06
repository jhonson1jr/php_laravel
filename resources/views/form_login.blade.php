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
	<h2>Formulario de Login</h2>
	<form action="/login" method="POST">
		<!-- usando o recurso de geracao de token do laravel para autenticacao do formulario
			 Detalhe que a pagina do form tem q dar refresh toda vez q aberta, para gerar um token válido: -->
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div class="form-group">
			<label>E-mail:</label>
			<input type="email" name="email" class="form-control">
		</div>
		<div class="form-group">
			<label>Senha:</label>
			<input type="password" name="password" class="form-control">
		</div>
		<div class="form-group">
			<input type="submit" name="btnEnviar" class="btn btn-primary" value="Login">
		</div>
	</form>	
</div>
@stop