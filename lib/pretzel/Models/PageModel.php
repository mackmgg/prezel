<?php

namespace pretzel\Models;
use pretzel\Models\DatabaseModel;

class PageModel {
	protected static $_instance;

	function __construct() {
		static::$_instance = $this;
	}
	static function getInstance() {
		if(empty(self::$_instance))
			new PageModel();
		return self::$_instance;
	}
	public function getPages() {
		$pages = DatabaseModel::getDatabase()->test->pages->find();
		return $pages;
	}
	public function getPage($page) {
		$pages = DatabaseModel::getDatabase()->test->pages->find(array('name' => $page));
		if(iterator_count($pages)==0) return false;
		return array_values(iterator_to_array($pages))[0];
	}
}

?>