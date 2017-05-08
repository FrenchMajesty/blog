<?php
namespace Core;

use PDO;

class Database {
	private static $host;
    private static $username;
    private static $password;
    private static $db_name;
    private static $conn = NULL;

    public function __construct($dbConfig = null) {

        if(!is_null($dbConfig)) {
            self::$host = $dbConfig["host"];
            self::$username = $dbConfig["username"];
            self::$password = $dbConfig["password"];
            self::$db_name = $dbConfig["dbname"];
        }
    }

	public function getConnection() {

		if(!self::$conn) {
			try {

		     	self::$conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db_name . ";port=3306", self::$username, self::$password);
		        self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		    }catch(PDOException $e) {
		       	echo "Connection error: " . $e->getMessage();
			}
		}

		return self::$conn;
	}

	public function runQuery($query) {
		try {
			$stmt = self::$conn->prepare($query);
			$stmt->execute();

		} catch(PDOException $e) {
			echo $e->getMessage();
		}

		return $stmt;
	}

	public function getRows($query) {
		try {

		$stmt = self::$conn->prepare($query);
		$stmt->execute();


		return $stmt->fetchAll(PDO::FETCH_ASSOC);

		}catch(PDOException $e) {
			$e->getMessage();
		}
	}
}
?>
