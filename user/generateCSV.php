<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
<body>
<?php
    include 'config.php';
    
    if(isset($_POST['exportDB'])){
    	header('Content-Type: text/csv; charset=utf-8');
    	header('Content-Disposition: attachment; filename=logs.csv');
    	$delimiter = ",";
    	$query = $link->query("SELECT * from logs ORDER BY reference DESC");
    	if($query->num_rows > 0){
    	
    		ob_end_clean();
    		 
    		$output = fopen('php://memory', 'w');
    		fputcsv($output, array('ID', 'Location', 'Moisture', 'Rain', 'Movement', 'Date', 'Level'),$delimiter);
    		while($row = $query->fetch_assoc())
    		{
    			$line = array($row['reference'], $row['location'], $row['moisture'], $row['rain'], $row['movement'], $row['date'], $row['level']);
    			fputcsv($output, $line, $delimiter);
    		}
    		fseek($output, 0);
    	
    
    		
    		fpassthru($output);
    		fclose($output);
    	}  	
    	exit();
    }	
    	

    	/*
    $query = $link->query("SELECT * FROM logs ORDER BY reference DESC");
    
    if($query->num_rows > 0){
    	$delimiter = ",";
    	
    	$f = fopen('php://output', 'w');

    	$header = array('ID', 'Location', 'Moisture', 'Rain', 'Movement', 'Date', 'Level');
    	fputcsv($f, $header, $delimiter);

    	while($row = $query->fetch_assoc()){
    		$line = array($row['reference'], $row['location'], $row['moisture'], $row['rain'], $row['movement'], $row['date'], $row['level']);
    		fputcsv($f, $line, $delimiter);
    	}
 		fseek($f, 0);
    	header('Content-Type: text/csv');
    	header('Content-Disposition: attachment; filename="' . $file . '";');
    	fpassthru($f);
    	fclose($f);
    }
    exit;*/
   
?>
</body>
</html>

