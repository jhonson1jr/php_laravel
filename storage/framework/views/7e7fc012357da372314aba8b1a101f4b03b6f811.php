<!-- sinalizando que este conteudo é para ser incluido no arquivo principal.blade.php: -->


<!-- sinalizando onde é para incluir dentro do principal: -->
<?php $__env->startSection('conteudo'); ?>
<div class="col-sm-8">
	<h3>Produto <?php echo e($nome); ?> adicionado com sucesso.</h3>	
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('principal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>