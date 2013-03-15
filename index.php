<?php
	error_reporting(E_ALL);
	ini_set("display_errors", On);
	date_default_timezone_set("America/New_York");
	function __autoload($name) {
		$file = __DIR__."/lib/".str_replace('\\','/',$name).".php";
		if(file_exists($file))
			require_once($file);
		else
			throw new Exception("Missing Class");
	}
	use pretzel\Controllers\Router;
	Router::route();
?>