<?php
	namespace pretzel\Controllers;
	use pretzel\Models\BlogModel;
	use pretzel\Models\PageModel;
	use pretzel\Views\View;

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
			$bm = BlogModel::getInstance();
			$pm = PageModel::getInstance();
			View::loadBlog($bm->getPosts(), $pm->getPages());
		}
		public function loadPost($post) {
			$bm = BlogModel::getInstance();
			$pm = PageModel::getInstance();
			View::loadPost($bm->getPost($post[2]), $pm->getPages());
		}
	}
?>