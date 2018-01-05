<?php

class Artigo {

	private $title_h1;
	private $content;
	private $description;
	private $author;
	private $url;

	public function setTitle_H1($title_h1) {
		$this->title_h1 = $title_h1;
	}

	public function getTitle_H1() {
		return $this->title_h1;
	}

	public function setContent($conteudo) {
		$this->content = $conteudo;
	}

	public function getContent() {
		return $this->content;
	}

	public function setDescription($description) {
		$this->description = $description;
	}

	public function getDescription() {
		return $this->description;
	}

	public function setAuthor($author) {
		$this->author = $author;
	}

	public function getAuthor() {
		return $this->author;
	}

	public function setUrl($url) {
		$this->url = $url;
	}

	public function getUrl() {
		return $this->url;
	}
}