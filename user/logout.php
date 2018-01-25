<?php /*
session_start();

$_SESSION = array();

session_destroy();

header("location: index.php");
exit; */

session_start();
echo "<script>window.location.assign('login.php')</script>";
session_destroy();
?>
