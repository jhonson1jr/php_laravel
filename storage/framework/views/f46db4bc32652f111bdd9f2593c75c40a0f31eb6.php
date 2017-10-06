<!-- sinalizando que este conteudo é para ser incluido no arquivo principal.blade.php: -->


<!-- sinalizando onde é para incluir dentro do principal: -->
<?php $__env->startSection('conteudo'); ?>

<!-- o blade permite a execucao de php usando duas chaves como sinalizador ao inves de abrir uma tag php  -->
	<h1>Detalhes do Produto <?php echo e($produto->nome); ?></h1>
	<ul>
		<li>Valor: <?php echo e($produto->valor); ?></li>
		<li>Descricao: <?php echo e(isset($produto->descricao) ? $produto->descricao : 'Não tem descrição'); ?></li> <!-- or informacao caso campo nulo-->
		<li>Qtde em estoque: <?php echo e($produto->quantidade); ?></li>
	</ul>
<?php $__env->stopSection(); ?> <!-- fim da secao conteudo-->
<?php echo $__env->make('principal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>