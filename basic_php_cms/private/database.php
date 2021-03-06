<?php

/**
 * Store all functions related to database
 */

	require_once('db_credentials.php');

/**
 * @return mysqli
 */
	function db_connect() {
		$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		confirm_db_connect();
		return $connection;
	}

/**
 * @param $connection
 */
	function db_disconnect($connection) {

		if(isset($connection)) {
			mysqli_close($connection);
		}

	}

/**
 * @param $connection
 * @param $string
 *
 * @return string
 */
	function db_escape($connection, $string) {
		return mysqli_real_escape_string($connection, $string);
	}

/**
 * PHP Database Connection Error Handling
 */
	function confirm_db_connect() {
		if(mysqli_connect_errno()) {
			$msg = "Database connection failed: ";
			$msg .= mysqli_connect_error();
			$msg .= " (" . mysqli_connect_errno() .")";
			exit($msg);
		}
	}

/**
 * @param $result_set
 */
	function confirm_result_set($result_set) {
		if(!$result_set) {
			exit("Database query failed.");
		}
	}