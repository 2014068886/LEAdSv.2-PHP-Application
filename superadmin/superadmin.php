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
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"> LEAdS v.2 </a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="logs.php">Logs</a></li>
      <li><a href="#">Settings</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li> <a href="superadminLogout.php"><span class="glyphicon glyphicon-log-out"> </span> Sign Out</a> </li>
    </ul>
  </div>
</nav>

<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Hi, <b><?php echo $_SESSION['username']; ?></b></h2>
                        <a href="addAdmin.php" class="btn btn-success pull-right">Add Admin Account</a>
                        <br><br><br> <h2><center> User Details </center> </h2>
                       
					</div>

    	<?php 
    	
    	$sql = "SELECT * from users";
    	if($result = $link->query($sql)){
    		if($result->num_rows > 0){
    			echo "<table class='table table-bordered table-striped'>";
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
</html>