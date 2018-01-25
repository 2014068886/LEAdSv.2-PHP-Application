<?php 
class databaseConnect {

	// constructor
	function __construct() {
		 
	}

	// destructor
	function __destruct() {
		// $this->close();
	}

	// Connecting to database
	public function connect() {
		require_once 'config.php';
		$con = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
		mysql_select_db(DB_NAME);
		return $con;
	}

	// Closing database connection
	public function close() {
		mysql_close();
	}

}
?>