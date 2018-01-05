<?php
require_once 'classe_artigo.php';

$artigo = new Artigo();

$erro_indice = [];

$tem_erro = false;

$robots_values = [];

if($_SERVER['REQUEST_METHOD'] == 'POST') {

	require_once 'Utilitario.php';

	print_r($_POST);

	$verificarDados = new Utilitario();

	$dados = $verificarDados->verificarPostEGetPHP7('titulo|conteudo|descricao|robots|autor|url');

	print_r($dados);

	$artigo->setTitle_H1($verificarDados->limparString($dados['titulo']));

	if(!empty(trim($artigo->getTitle_H1()))) {

		if(mb_strlen($artigo->getTitle_H1()) <= 1) {
			
			$tem_erro = true;
			$erro_indice['titulo'] = "O título precisa ter no minímo 2 caracteres.";
		}
	}else {
		$tem_erro = true;
		$erro_indice['titulo'] = "Você precisa de um título";
	}

	print $artigo->getTitle_H1();

	$artigo->setContent($verificarDados->limparString($dados['conteudo']));

	if(!empty(trim($artigo->getContent()))) {

		if(mb_strlen($artigo->getContent()) <= 60) {
			$tem_erro = true;
			$erro_indice['conteudo'] = "O conteúdo precisa ter no minímo 60 caracteres.";
		}
	}else {
		$tem_erro = true;
		$erro_indice['conteudo'] = "Você precisa do conteúdo";
	}

	$artigo->setDescription($verificarDados->limparString($dados['descricao']));

	if(!empty(trim($artigo->getDescription()))) {

		if(mb_strlen($artigo->getDescription()) <= 9) {
			$tem_erro = true;
			$erro_indice['descricao'] = "A descrição precisa ter no minímo 10 caracteres.";
		}
	}else {
		$tem_erro = true;
		$erro_indice['descricao'] = "Você precisa da descrição";
	}

	if(array_key_exists('robots', $_POST)) {

		$i = 1;

		foreach($_POST['robots'] as $robots) {
			$robots_values[$i] = $robots;
			$i++;
		}
	}

	$artigo->setAuthor($verificarDados->limparString($dados['autor']));

	if(!empty(trim($artigo->getAuthor()))) {

		if(mb_strlen($artigo->getAuthor()) <= 2) {
			$tem_erro = true;
			$erro_indice['autor'] = "O nome do autor precisa ter no minímo 3 caracteres.";
		}
	}else {
		$tem_erro = true;
		$erro_indice['autor'] = "Alguém vai escrevr isso. Não é mesmo?";
	}

	$artigo->setUrl($verificarDados->limparString($dados['url']));

	if(!empty(trim($artigo->getUrl()))) {

		if(!preg_match('/^([a-zA-z-_]{2,})$/',$artigo->getUrl())) {
				$tem_erro = true;
				$erro_indice['url'] = "A url precisa ter no minímo 2 caracteres de A-Z com - e _";
		}
	}else {
		$tem_erro = true;
		$erro_indice['url'] = "Você precisa de uma url";
	}


	if(!$tem_erro) {

		ob_start();

		require 'modelo_artigo.php';

		$conteudo = ob_get_clean();

		$arquivo = fopen("{$artigo->getUrl()}.php",'w+');

		fwrite($arquivo, $conteudo);

		fclose($arquivo);

		header('Location:index.php');
		exit;
	}
}

require_once 'template_index.php';
