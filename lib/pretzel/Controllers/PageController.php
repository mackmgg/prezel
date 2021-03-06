<?php
	namespace pretzel\Controllers;
	use pretzel\Models\PageModel;
	use pretzel\Views\View;


	class PageController {
		protected static $_instance;
		function __construct() {
			static::$_instance = $this;
		}
		static function getInstance() {
			if(empty(static::$_instance))
				new PageController();
			return static::$_instance;
		}
		public function loadPage($page) {
			$pm = PageModel::getInstance();
			View::loadPage($pm->getPage($page),$pm->getPages());
		}
	}
?>