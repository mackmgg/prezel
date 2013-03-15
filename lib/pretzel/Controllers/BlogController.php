<?php
	namespace pretzel\Controllers;
	use pretzel\Views\View;
	use pretzel\Models\DatabaseModel;

	class BlogController {
		protected static $_instance;
		function __construct() {
			static::$_instance = $this;
		}
		static function getInstance() {
			if(empty(static::$_instance))
				new BlogController();
			return static::$_instance;
		}
		public function load($page) {
			if(count($page)==2)
				$this->loadBlog();
			else
				$this->loadPost($page);
		}
		public function loadBlog() {
			$dm = DatabaseModel::getInstance();
			View::loadBlog($dm->getPosts(), $dm->getPages());
		}
		public function loadPost($post) {
			$dm = DatabaseModel::getInstance();
			View::loadPage($dm->getPost($post), $dm->getPages());
		}
	}
?>