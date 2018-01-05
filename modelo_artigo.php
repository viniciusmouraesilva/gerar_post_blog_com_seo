<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	
	<title><?php echo $artigo->getTitle_H1(); ?></title> 

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description" content="<?php echo $artigo->getDescription(); ?>">
	
	<link rel="stylesheet" href="css/estilo.css">

	<meta name="author" content="<?php echo $artigo->getAuthor(); ?>">

	<?php $robots = implode(',',$robots_values);?>
	<meta name="robots" content="<?php echo $robots; ?>">

	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
<div class="conteudo">	
	<div class="conteudo menu">
		<p><a href="home">Blog do Fenestim</a></p>	
		<nav>
			<ul>
				<li><a href="home" class="casa">Casa</a></li>
				<li><a href="sobre">Sobre</a></li>
				<!-- <li><a href="contato">Contato</a></li>-->
			</ul>
		</nav>
	</div>

	<div class="conteudo artigos texto_artigos">
		<h1><?php echo $artigo->getTitle_H1(); ?></h1>

		<?php echo $artigo->getContent(); ?>

	</div>
</div>

<footer class="rodape">
</footer>

</body>
</html>