<?php
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    include 'config.php';
    $sql = "SELECT * FROM users WHERE user_id = ?";
    
    if($stmt = $link->prepare($sql)){
        $stmt->bind_param("i", $param_id);
        $param_id = trim($_GET["id"]);
        if($stmt->execute()){
            $result = $stmt->get_result();
            
            if($result->num_rows == 1){
                $row = $result->fetch_array(MYSQLI_ASSOC);
                
                $name = $row['username'];
                $user_type = $row['user_type'];
                $firstName = $row['firstName'];
                $lastName = $row['lastName'];
                $mobileNum = $row['mobileNum'];
                $email = $row['email'];
                
            } else{
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
        $stmt->close();
    }
    $link->close();
} else{
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Record</h1>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <p class="form-control-static">
                        <?php 
                        	if(!empty($name)){
                        		echo $name;
                        	} 
                        ?> </p>
                    </div>
                    <div class="form-group">
                        <label>User Type</label>
                        <p class="form-control-static"><?php echo $row['user_type']; ?></p>
                    </div>
                    
                    <div class="form-group">
                    	<label>First Name</label>
                        <p class="form-control-static"><?php echo $row['firstName']; ?></p>
                    </div>
                    <div class="form-group">
                    	<label>Last Name</label>
                        <p class="form-control-static"><?php echo $row['lastName']; ?></p>
                    </div>
            		<div class="form-group">
            			<label>Email Address</label>
            			<p class="form-control-static"><?php echo $row['email']; ?></p>
                    </div>
                    <p><a href="superadmin.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>