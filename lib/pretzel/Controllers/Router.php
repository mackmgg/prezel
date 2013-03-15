<?php
	namespace pretzel\Controllers;
	use pretzel\Controllers\PageController;
	use pretzel\Controllers\BlogController;

	class Router {
		static function route() {
			if(isset($_GET['q'])) {
				$page = explode('/',$_GET['q']);
				if($page[1]=="blog") {
					$bg = BlogController::getInstance();
					$bg->load($page);
				} else {
					$pg = PageController::getInstance();
					$pg->loadPage(ucfirst($page[1]));
				}
			} else {
				$pc = PageController::getInstance();
				$pc->loadPage("Home");
			}
		}
	}

?>