<!-- arquivo blade pra incorporar codigo de outros arquivos -->
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<title>Controle de Estoque</title>
</head>
<body>

<!-- nomeando uma marcação para incorporar o conteudo de outros arquivos neste body:  -->
<?php echo $__env->yieldContent('conteudo'); ?>

</body>
</html>