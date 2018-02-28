<?php
session_start();

if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='Admin')
{
	echo "<script>window.location.assign('login.php')</script>";
}

$username = $_SESSION['mysesi'];

include 'config.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
	 
	$email = mysqli_real_escape_string($link, $_POST['email']);
	$mobileNum = mysqli_real_escape_string($link, $_POST['mobileNum']);
	 
	$query = "UPDATE users set email='".$email."', mobileNum='".$mobileNum."' where username = '".$username."'";
	 
	$result = mysqli_query($link, $query);
	 
	mysqli_close($link);
	echo "<script>window.location.assign('adminProfile.php')</script>";
}

?>