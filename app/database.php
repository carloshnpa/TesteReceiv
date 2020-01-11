<?php
namespace App;

use PDO, PDOException;

class Database{

    public $conn;

    public function __construct()
    {
        $this->conn = null;
    }

	public function connection(){

		try {
            $this->conn = new PDO("mysql:host=" . DB_HOST .  ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
	}

}