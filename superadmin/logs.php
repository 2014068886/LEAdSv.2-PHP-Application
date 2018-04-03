<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title> Logs </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<link href="min/plugin-min.css" type="text/css" rel="stylesheet">
    <link href="min/custom-min.css" type="text/css" rel="stylesheet" >
    
    <link rel="stylesheet" href="css/preloader.css" type="text/css"/>
	<script src="js/preloader.js"></script>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    
</head>
<body>

<div class="preloader-background">
	<div class="preloader-wrapper big active">
		<div class="spinner-layer spinner-blue-only">
			<div class="circle-clipper left">
				<div class="circle"></div>
			</div>
			<div class="gap-patch">
				<div class="circle"></div>
			</div>
			<div class="circle-clipper right">
				<div class="circle"></div>
			</div>
		</div>
	</div>
</div>

<div id="loader-wrapper">
    <div id="loader"></div>
 
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
 
</div>

<div class="navbar-fixed">
 <nav id="nav_f" class="default_color" role="navigation">
        <div class="container">
            <div class="nav-wrapper">
  			   <a href="superadmin.php" id="logo-container" class="brand-logo"><img src="img/logo_white.png" style="width:140px" /> </a>
                <ul class="right hide-on-med-and-down">
                   <li><a href="superadmin.php">Home</a></li>
      			   <li class="active"> <a href="logs.php">Logs</a></li>
      			   <li><a href="#">Settings</a></li>
                   <li><a href="superadminLogout.php"> Sign Out</a> </li>
                </ul>
                <ul id="nav-mobile" class="side-nav">
                    <li><a href="#intro">About</a></li>
                    <li><a href="#order">Order</a></li>
                    <li><a href="#team">Team</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            </div>
        </div>
    </nav>
</div>
	<?php
		include 'config.php';
		$result = $link->query("SELECT * FROM logs ORDER BY reference DESC");	  	
	?>
<br/><br/>	
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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.material.min.css">

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/dataTables.material.min.js"></script>
  
  <script>
    $(document).ready(function() {
        $('#table_id').DataTable( {
            columnDefs: [
                {
                    targets: [ 0, 1, 2 ],
                    className: 'mdl-data-table__cell--non-numeric'
                }
            ]
        } );        
    } );
  </script>
</html>