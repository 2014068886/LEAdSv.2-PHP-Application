<?php
session_start();

if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='Admin')
{
	echo "<script>window.location.assign('login.php')</script>";
}

include 'config.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
	 
	if(isset($_POST['username'])){
		$username = $_POST['username'];
	}
	 
	if(isset($_POST['email'])){
		$email = $_POST['email'];
	}
	
	if(isset($_POST['mobileNum'])){
		$mobileNum = $_POST['mobileNum'];
	}
	
	$query = $link->query("UPDATE users set email='".$email."', mobileNum='".$mobileNum."' where username = '".$username."'");	 
	
	if ($link->query($query) === TRUE) {
		echo "Record updated successfully";
		echo "<script>window.location.assign('adminProfile.php')</script>";
	} else {
		echo "Error updating record: " . $link->error;
	}
	mysqli_close($link);
}

?>