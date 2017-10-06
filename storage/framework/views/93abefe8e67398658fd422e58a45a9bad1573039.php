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
	<h2>Formulario de Login</h2>
	<form action="/login" method="POST">
		<!-- usando o recurso de geracao de token do laravel para autenticacao do formulario
			 Detalhe que a pagina do form tem q dar refresh toda vez q aberta, para gerar um token válido: -->
		<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('principal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>