<?php
session_start();

if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='Admin')
{
	echo "<script>window.location.assign('login.php')</script>";
}

	$username = $_SESSION['mysesi'];

	include 'config.php';
	 
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	if(isset($_POST['username'])){
		$uname = $_POST['username'];
	}
	
	if(isset($_POST['oldPwd'])){
		$oldPassword = $_POST['oldPwd'];
	}
	
	if(isset($_POST['confPwd'])){
		$confPassword = $_POST['confPwd'];
	}
	
	
	$query = $link->query("UPDATE users set password='".$oldPassword."' where username = '".$uname."'");	
	mysqli_close($link);
	echo "<script>window.location.assign('adminPassword.php')</script>";
}
?>