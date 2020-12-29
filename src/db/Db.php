<?php

namespace Todo\Db;

use PDO;
use PDOException;

class Db
{
	private static $instance;

	private function __construct()
	{
		try {
			$dbUser = getenv('PG.USER');
			$dbPass = getenv('PG.PASSWORD');
			$host = getenv('PG.HOST');
			$dbName = getenv('PG.DBNAME');
			$dbPort = getenv('PG.PORT');
			self::$instance = new \PDO("pgsql:host=$host;port=$dbPort;dbname=$dbName",
				$dbUser,
				$dbPass, [
					PDO::ATTR_PERSISTENT => true
				]);


			if (!self::$instance) {
				var_dump("Connected to the $dbName database successfully!");die;
			}
		} catch (PDOException $e) {

			echo $e->getMessage();
		}

	}

	public static function factory()
	{
		if (!self::$instance) {
			new self;
		}

		return self::$instance;
	}
}