<?php
namespace pretzel\Controllers;


class AdminController {
	protected static $_instance;
	function __construct() {
		static::$_instance = $this;
	}
	static function getInstance() {
		if(empty(static::$_instance))
			new AdminController();
		return static::$_instance;
	}
	public function load($page) {
		$method = (!empty($page[2])?$page[2]:"index");
		$this->$method($page);
	}
	public function index($page) {
		if(!isset($_SESSION['login']))
			exit(header("Location: /admin/login"));
	}
	public function login($page) {
		if(!isset($_POST['submit']))
			echo "Login";
		else {
			echo "Logging in...";
		}
	}
}

?>