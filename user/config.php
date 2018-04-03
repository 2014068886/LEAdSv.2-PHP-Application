<?php
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '12345');
define('DB_NAME', 'leads');
 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$database = DB_NAME; 

if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

class dbCon 
{
	public function selectProfile($username)
	{
		$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
		$res=$link->query("SELECT * FROM users where username='".$username."'");
		return $res;
	}
	
	public function updateProfile($username, $email, $mobileNum, $unameSession)
	{
		$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
		$res=$link->query("UPDATE users set username='".$username."', email='".$email."', mobileNum='".$mobileNum."' where username='".$unameSession."'");
		return $res;
	}
	
	public function insertFeedback($email, $message){
		$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
		$res=$link->query("INSERT INTO feedback values ($email,$message)");
		return $res;
	}
}

?>