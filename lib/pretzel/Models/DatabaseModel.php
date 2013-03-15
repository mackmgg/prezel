<?php

namespace pretzel\Models;
use Mongo;

class DatabaseModel {
	protected static $_instance;
	protected static $_database;

	function __construct() {
		static::$_instance = $this;
		static::$_database = new Mongo('localhost');
	}
	static function getInstance() {
		if(empty(static::$_instance))
			new DatabaseModel();
		return static::$_instance;
	}
	public function getPages() {
		$pages = static::$_database->test->pages->find();
		return $pages;
	}
	public function getPage($page) {
		$pages = static::$_database->test->pages->find(array('name' => $page));
		return array_values(iterator_to_array($pages))[0];
	}
	public function getPosts() {
		$posts = static::$_database->test->posts->find();
		return $posts;
	}
	public function getPost($post) {
		$posts = static::$_database->test->posts->find(array('name' => $post));
		return array_values(iterator_to_array($posts))[0];
	}
}

?>