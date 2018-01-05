<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Gerador de Páginas</title>

	<style>
		.erro {
			color: red;
		}

		body {
			font-size: 1.20em;
			font-family: arial, sans-serif, georgia, serif;
		}

		.form input {
			width: 500px;
			border: 2px solid black;
			border-radius: 4px;	
			height: 30px;
		}

		.form textarea {
			width: 720px;
			height: 500px;
			font-size: 1.55em;
			border: 2px solid black;
			border-radius: 4px;	
		}

		.form .descricao {
			height: 90px;
			font-size: 1.30em;
			border: 2px solid black;
			border-radius: 4px;		
		}

		.button {
			background-color: black;
			color: white;
		}
	</style>
</head>
<body>

	<form method="POST" class="form">

		<p>O título será seu H1 como o título da tag title</p>

		<?php if($tem_erro && array_key_exists('titulo', $erro_indice)): ?>
			<span class="erro"><?php print $erro_indice['titulo']; ?></span>
		<?php endif; ?>

		<p><input type="text" name="titulo" placeholder="título" value="<?php echo $artigo->getTitle_H1(); ?>"></p>

		<?php if($tem_erro && array_key_exists('conteudo', $erro_indice)): ?>
			<span class="erro"><?php print $erro_indice['conteudo']; ?></span>
		<?php endif; ?>

		<p><textarea name="conteudo" placeholder="conteudo"><?php echo $artigo->getContent(); ?></textarea></p>

		<p>Sua descrição é referente a meta tag description</p>

		<?php if($tem_erro && array_key_exists('descricao', $erro_indice)): ?>
			<span class="erro"><?php print $erro_indice['descricao']; ?></span>
		<?php endif; ?>

		<p><textarea name="descricao" placeholder="descricao" class="descricao"><?php echo $artigo->getDescription(); ?></textarea></p>

		<p>Robots</p>

		<p>index <input type="checkbox" name="robots[]" value="index" <?php echo (array_search('index',$robots_values))?'checked':''; ?> ></p>

		<p>follow <input type="checkbox" name="robots[]" value="follow" <?php echo (array_search('follow',$robots_values))?'checked':''; ?> ></p>

		<p>archive <input type="checkbox" name="robots[]" value="archive" <?php echo (array_search('archive',$robots_values))?'checked':''; ?>></p>

		<p>noindex<input type="checkbox" name="robots[]" value="noindex" <?php echo (array_search('noindex',$robots_values))?'checked':''; ?>></p>

		<p>nofollow<input type="checkbox" name="robots[]" value="nofollow" <?php echo (array_search('nofollow',$robots_values))?'checked':''; ?>></p>

		<p>noarchive<input type="checkbox" name="robots[]" value="noarchive" <?php echo (array_search('noarchive',$robots_values))?'checked':''; ?>></p>

		<?php if($tem_erro && array_key_exists('autor', $erro_indice)): ?>
			<span class="erro"><?php print $erro_indice['autor']; ?></span>
		<?php endif; ?>

		<p><input type="text" name="autor" placeholder="autor" value="<?php echo $artigo->getAuthor(); ?>"></p>

		<?php if($tem_erro && array_key_exists('url', $erro_indice)): ?>
			<span class="erro"><?php print $erro_indice['url']; ?></span>
		<?php endif; ?>

		<p><input type="text" name="url" placeholder="url" value="<?php echo $artigo->getUrl(); ?>"></p>

		<p><input type="submit" value="Gerar" class="button"></p>
	</form>

</body>
</html>