<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title> Logs </title>
</head>
    <body>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <nav class="navbar navbar-inverse">
    	<div class="container-fluid">
    		<div class="navbar-header">
    			<a class="navbar-brand" href="#"> LEAdS v.2</a>
    		</div>
   			<ul class="nav navbar-nav">
      			<li><a href="superadmin.php">Home</a></li>
      			<li class="active"><a href="logs.php">Logs</a></li>
      			<li><a href="#">Settings</a></li>
    		</ul>
    		<ul class="nav navbar-nav navbar-right">
      			<li> <a href="superadminLogout.php"><span class="glyphicon glyphicon-log-out"> </span> Sign Out</a> </li>
    		</ul>
    	</div>
    </nav>
	<?php
		include 'config.php';
		$result = $link->query("SELECT * FROM logs ORDER BY reference DESC");	  	
	?>
<div class="container">
		<table id="table_id" class="display">
    		<thead>
    			<tr>
    				<th> Reference </th>
    				<th> Location </th>
    				<th> Moisture </th>
    				<th> Rain </th>
    				<th> Movement </th>
    				<th> Date </th>
    				<th> Level </th>
    			</tr>
    		</thead>
    		<tbody>
    		 <?php
	  			while($data = $result->fetch_assoc())
	  			{
	  		 ?>
    			<tr>
    				<td> <?php echo $data['reference']; ?></td>
    				<td> <?php echo $data['location']; ?></td>
    				<td> <?php echo $data['moisture']; ?></td>
    				<td> <?php echo $data['rain']; ?></td>
    				<td> <?php echo $data['movement']; ?></td>
    			 	<td> <?php echo $data['date']; ?></td>
					<td> <?php echo $data['level']; ?></td>
    			</tr>
    		<?php
	  			}
	  		?>
    		</tbody>	
    	</table> 
    <form class="form-horizontal" action="backupLogs.php" method='post'>
           <input type="submit" name="exportDB" class="btn btn-success" value="Backup Logs"/>
    </form> 	
        
</div>
</body>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
  <script>
    $(document).ready( function () {
	    $('#table_id').DataTable();
	} );
  </script>
</html>