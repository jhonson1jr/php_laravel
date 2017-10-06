<!-- sinalizando que este conteudo é para ser incluido no arquivo principal.blade.php: -->


<!-- sinalizando onde é para incluir dentro do principal: -->
<?php $__env->startSection('conteudo'); ?>

<!-- verificando se há erros do ProdutoRequest -->
<?php if($errors->all()): ?>
<div class="alert alert-danger">
	<ul>
		<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<li><?php echo e($error); ?></li>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</ul>
</div>
<?php endif; ?>
<div class="col-sm-8">
	<h2><?php echo e($titulo); ?></h2> <!-- Pegando o titulo, que varia se Novo ou Editar-->
	<form action="<?php echo e($acao); ?>/<?php echo e(isset($produto->id) ? $produto->id : old('')); ?>" method="POST">
		<!-- usando o recurso de geracao de token do laravel para autenticacao do formulario
			 Detalhe que a pagina do form tem q dar refresh toda vez q aberta, para gerar um token válido: -->
		<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

		<?php if(isset($produto)): ?>
		<?php echo e(method_field('PUT')); ?> <!-- se for editar, este campo é obrigatorio pro update-->
		<?php endif; ?>
		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome" class="form-control" value="<?php echo e(isset($produto->nome) ? $produto->nome : old('')); ?>">
		</div>
		<div class="form-group">
			<label>Valor:</label>
			<input type="number" name="valor" class="form-control" value="<?php echo e(isset($produto->valor) ? $produto->valor : old('')); ?>">
		</div>
		<div class="form-group">
			<label>Quantidade:</label>
			<input type="number" name="quantidade" class="form-control" value="<?php echo e(isset($produto->quantidade) ? $produto->quantidade : old('')); ?>">
		</div>
		<div class="form-group">
			<label>Descrição:</label>
			<textarea class="form-control" name="descricao"><?php echo e(isset($produto->descricao) ? $produto->descricao : old('')); ?></textarea>
		</div>
		<div class="form-group">
			<label>Tamanho:</label>
			<input class="form-control" name="tamanho" type="text" value="<?php echo e(isset($produto->tamanho) ? $produto->tamanho : old('')); ?>">
		</div>
		<div class="form-group">
			<label>Categoria:</label>
			<!-- se existe a variavel produto e o id é igual ao do loop, seleciona -->
			<select class="form-control" name="categoria_id">
				<?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<option value="<?php echo e($c->id); ?>"
				<?php if((isset($produto)) && ($produto->categoria_id == $c->id)): ?>
					selected 
				<?php endif; ?>
				><?php echo e($c->nome); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
		</div>
		<div class="form-group">
			<input type="submit" name="btnEnviar" class="btn btn-primary" value="Enviar">
		</div>
	</form>	
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('principal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>