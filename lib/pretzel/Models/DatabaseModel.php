<?php
namespace pretzel\Models;
use Mongo;
use MongoRegex;

class DatabaseModel {
	protected static $_database;

	static function getDatabase() {
		if(empty(self::$_database))
			self::$_database = new Mongo('localhost');
		return self::$_database;
	}
	static function getRegexQuery($query) {
		return new MongoRegex($query);
	}
}

?>