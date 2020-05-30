<?php
Class Database {
	
	protected $connection;
	
	function __construct() {
		$dbhost = [
			'dbhost' => '127.0.0.1',
			'dbuser' => 'root',
			'dbpass' => '',
			'dbname' => 'opencart'
		];
		try {
			$this->connection = new PDO('mysql:host=' . $dbhost['dbhost'] . ';dbname=' . $dbhost['dbname'], $dbhost['dbuser'], $dbhost['dbpass']);
            $this->connection->query("SET NAMES utf8");
			return true;
		} catch(PDOException $error) {
			return $errorMesage = 'Hata : Veritabanı bağlantısı kurulamadı !<br>Hata Mesajı =>'.$error->getMessage();
		}
    }

	function __destruct() {
        $this->connection = null;
    }
}
?>