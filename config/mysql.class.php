<?php

require_once 'mysql.config.php';

class MySQL {

	private $query;
	private $result;

	//creating a connection when object created
	public function __construct() {
		$host = MYSQL_HOST;
		$user = MYSQL_USER;
		$password = MYSQL_PASSWORD;
		$database = MYSQL_DATABASE;

		/*
		 if (!$con = mysql_connect($host,$user,$password)) {
			throw new Exception('Error connecting to the server');
			}

			if (!mysql_select_db($database,$con)) {
			throw new Exception('Error selecting database');
			}
			*/

		$this->connection = mysql_connect($host, $user, $password) or die(mysql_error());
		mysql_select_db($database, $this->connection);
	}

	//closing connection when object is garbage collected
	function __destruct() {
		mysql_close($this->connection);
	}

	//checking connection
	public function query($query) {
		$this->query = $query;
		if (!$this->result = mysql_query($query)) {
			throw new Exception('Error performing query '.$query);
		}
	}

	//counting no of rows
	public function numRows() {
		if ($this->result) return mysql_num_rows($this->result);
		return false;
	}

	//Closing connection
	function closeConn() {
		mysql_close($this->connection);
	}
}

?>