<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title> Back up Logs </title>
</head>
<body>
<?php
   include 'config.php';
   
   if(isset($_POST['exportDB'])){
   	$query = $link->query("INSERT INTO backup_logs (reference, location, moisture, rain, movement, date, level) SELECT * from logs");
   	$deleteQuery = $link->query("DELETE FROM logs");
   	header("location: logs.php");
   }
?>
</body>
</html>