<?php

namespace pretzel\Models;
use pretzel\Models\DatabaseModel;

class BlogModel {
	protected static $_instance;

	function __construct() {
		static::$_instance = $this;
	}
	static function getInstance() {
		if(empty(static::$_instance))
			new BlogModel();
		return static::$_instance;
	}
	public function getPosts() {
		$posts = DatabaseModel::getDatabase()->test->posts->find();
		return $posts;
	}
	public function getPost($post) {
		$post = str_replace("_"," ",$post);
		$regex = DatabaseModel::getRegexQuery("/^".$post."$/i");
		$posts = DatabaseModel::getDatabase()->test->posts->find(array('name' => $regex));
		if(iterator_count($posts)==0) return false;
		return array_values(iterator_to_array($posts))[0];
	}
}

?>