<!-- sinalizando que este conteudo é para ser incluido no arquivo principal.blade.php: -->


<!-- sinalizando onde é para incluir dentro do principal: -->
<?php $__env->startSection('conteudo'); ?>

	<h1>Listagem de Produtos</h1> <a href="/produtos/novo" class="btn btn-success">Adicionar Novo</a>
	<table class="table">
		<thead>
			<th>Nome</th>
			<th>Valor</th>
			<th>Descrição</th>
			<th>Quantidade</th>
			<th colspan="2">Ação</th>
		</thead>
	 <!-- usando blade: -->
	<?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr class="<?php echo e($p->quantidade <=1 ? 'danger' : ''); ?>"> <!-- se a qtde estiver baixa, marca com a classe danger do bootstrap, caso nao, fazer nada-->
			<td><?php echo e($p->nome); ?> </td>
			<td><?php echo e($p->valor); ?></td>
			<td><?php echo e($p->descricao); ?></td>
			<td><?php echo e($p->quantidade); ?></td>
			<td><?php echo e($p->categoria->nome); ?></td> <!-- laravel faz o select pra saber a qual campo pertence o id q está a ser exibido automaticamente-->
			<td><a href="/produtos/mostra/<?php echo e($p->id); ?>" class="btn btn-primary">Visualizar</a></td>
			<td><a href="/produtos/remover/<?php echo e($p->id); ?>" class="btn btn-danger">Excluir</a></td>
		</tr>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</table>
	<!-- verificando se existe a variavel 'nome' se sim, a requisicao veio do form_novo_produto: -->
	<?php if(old('nome')): ?> <!-- funcao 'old' verifica se existe parametro passado da requisição anterior para a atual -->
		<div class="alert alert-success">
			Produto <?php echo e(old('nome')); ?> adicionado com sucesso.
		</div>	
	<?php endif; ?>
<?php $__env->stopSection(); ?> <!-- fim da secao conteudo-->
<?php echo $__env->make('principal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>