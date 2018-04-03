<?php
include 'config.php';

session_start();
 
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    
    <link href="min/plugin-min.css" type="text/css" rel="stylesheet">
    <link href="min/custom-min.css" type="text/css" rel="stylesheet" >
    
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    
    <link rel="stylesheet" href="css/preloader.css" type="text/css"/>
	<script src="js/preloader.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
 
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
                   <li class="active"><a href="superadmin.php">Home</a></li>
      			   <li> <a href="logs.php">Logs</a></li>
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
 
<div class="container" style="width:750px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Welcome, <b><?php echo $_SESSION['username']; ?></b></h2>
                        <a href="addAdmin.php" class="btn btn-success pull-right">Add Admin Account</a> 
					</div>

    	<?php 
    	
    	$sql = "SELECT * from users";
    	if($result = $link->query($sql)){
    		if($result->num_rows > 0){
    			echo "<table id='table_id' class='display'>";
    			echo "<thead>";
    			echo "<tr>";
    			echo "<th>id</th>";
    			echo "<th>email</th>";
    			echo "<th>username</th>";
    			echo "<th>user type";
    			echo "<th> </th>";
    			echo "</tr>";
    			echo "</thead>";
    			echo "<tbody>";
    			while($row = $result->fetch_array()){
    				echo "<tr>";
    				echo "<td>" . $row['user_id'] . "</td>";
    				echo "<td>" . $row['email'] . "</td>";
    				echo "<td>" . $row['username'] . "</td>";
    				echo "<td>" . $row['user_type'] . "</td>";
    				echo "<td>";
    				echo "<a href='read.php?id=". $row['user_id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
    				echo "<a href='makeAdmin.php?id=". $row['user_id'] ."' title='Update User Type' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
    				echo "<a href='delete.php?id=". $row['user_id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
    				echo "</td>";
    				echo "</tr>";
    			}
    			echo "</tbody>";
    			echo "</table>";
    			// Free result set
    			$result->free();
    		} else{
    			echo "<p class='lead'><em>No records matching your query were found.</em></p>";
    		}
    	} else{
    		echo "ERROR: Could not able to execute $sql. " . $link->error;
    	}
    	
    	// Close connection
    	$link->close();    	
    	
    	?>
    	
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
        			<form action="makeAdmin.php?id=">
          
               			<div class="form-group <?php echo (!empty($user_type_err)) ? 'has-error' : ''; ?>">
                            <label>User Type</label>                            
                            <select id="user_type" name="user_type" class="form-control" style="width: 150px">
                            	<option value="<?php echo $user_type="Admin"; ?>"> Admin </option>
                            	<option value="<?php echo $user_type="User"; ?>"> User </option>
                            </select>
                            <span class="help-block"><?php echo $user_type_err;?></span>
               			</div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="superadmin.php" class="btn btn-default">Cancel</a>
                    </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
   </div>
  </div>  
 </div>
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