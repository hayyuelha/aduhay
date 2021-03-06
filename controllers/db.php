<?php

class DB {
	// mysqli object that we will use 
	private $db;

	public function __construct() {
		// load database configuration
		$config = require("db_config.php");

		// create connection
		$this->db = mysqli_connect($config["host"], $config["username"], $config["password"], $config["database"]);

		// connection failed
		if (!$this->db) {
			die("Error " . mysqli_errno($this->db) . ": " . mysqli_error($this->db));
		}
	}

	public function __destruct() {
		// close connection
		$this->db->close();
	}

	public function query($sql) {
		// perform a query
		$result = $this->db->query($sql);
		if (!$result) {
			die("Error " . mysqli_errno($this->db) . ": " . mysqli_error($this->db));
		}
		// convert it into array
		$result_arr = array();
		while ($row = $result->fetch_assoc()) {
			array_push($result_arr, $row);
		}
		return $result_arr;
	}
	
	public function select($sql) {
		// perform a query
		$result = $this->db->query($sql);
		if (!$result) {
			die("Error " . mysqli_errno($this->db) . ": " . mysqli_error($this->db));
		}

		// convert it into array
		$result_arr = array();
		while ($row = $result->fetch_assoc()) {
			array_push($result_arr, $row);
		}

		return $result_arr;
	}

	public function insert($sql) {
		// perform a query
		$result = $this->db->query($sql);
		if (!$result) {
			die("Error: " . mysqli_error($this->db));
		}

		// return its id
		return $this->db->insert_id;
	}

	public function update($sql) {
		// perform a query
		$result = $this->db->query($sql);
		if (!$result) {
			die("Error: " . mysqli_error($this->db));
		}
	}

	
}
