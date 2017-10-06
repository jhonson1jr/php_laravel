<!-- sinalizando que este conteudo é para ser incluido no arquivo principal.blade.php: -->


<!-- sinalizando onde é para incluir dentro do principal: -->
<?php $__env->startSection('conteudo'); ?>

<!-- verificando se há erros do ProdutoRequest -->
<div class="alert alert-danger">
	<ul>
		<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<li><?php echo e($error); ?></li>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</ul>
</div>
<div class="col-sm-8">
	<h2>Editar Produto</h2>
	<form action="/produtos/atualizaProduto" method="POST">
		<!-- usando o recurso de geracao de token do laravel para autenticacao do formulario
			 Detalhe que a pagina do form tem q dar refresh toda vez q aberta, para gerar um token válido: -->
		<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome" class="form-control" value="<?php echo e($produto->nome); ?>">
		</div>
		<div class="form-group">
			<label>Valor:</label>
			<input type="number" name="valor" class="form-control" value="<?php echo e($produto->valor); ?>">
		</div>
		<div class="form-group">
			<label>Quantidade:</label>
			<input type="number" name="quantidade" class="form-control" value="<?php echo e($produto->quantidade); ?>">
		</div>
		<div class="form-group">
			<label>Descrição:</label>
			<textarea class="form-control" name="descricao"><?php echo e($produto->descricao); ?></textarea>
		</div>
		<div class="form-group">
			<label>Tamanho:</label>
			<input class="form-control" name="tamanho" type="text" value="<?php echo e($produto->tamanho); ?>">
		</div>
		<div class="form-group">
			<label>Categoria:</label><?php echo e($produto->categoria->nome); ?>

			<select class="form-control" name="categoria_id">
				<option value="<?php echo e($produto->categoria->id); ?>"><?php echo e($produto->categoria->nome); ?></option>
			</select>
		</div>
		<div class="form-group">
			<input type="submit" name="btnEnviar" class="btn btn-primary" value="Enviar">
		</div>
	</form>	
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('principal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>