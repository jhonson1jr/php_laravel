<!-- sinalizando que este conteudo é para ser incluido no arquivo principal.blade.php: -->
@extends('principal')

<!-- sinalizando onde é para incluir dentro do principal: -->
@section('conteudo')
<div class="col-sm-8">
	<h3>Produto {{$nome}} adicionado com sucesso.</h3>	
</div>
@stop