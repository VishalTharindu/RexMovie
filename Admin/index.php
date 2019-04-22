<?php
    
    session_start();
    include("phpcode/db.inc.php");
    
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel ="stylesheet" href ="assets/css/bootstrap.min.css">
    <link rel ="stylesheet" href ="assets/font-awesome/css/font-awesome.min.css">
	<link rel ="stylesheet" type ="text/css" href="assets/css/adminlog.css">
    
	<script src ="assets/js/jquery.3.2.1.min.js"></script>
<!--
	<script src ="resources/js/popper.min.js"></script>
	<script src ="resources/js/bootstrap.min.js"></script>
-->
	
</head>
<body> 
	<div class ="container-flude">
        <div class="row">
		<div class ="col-md-8 col-md-offset-2">
            <div class="col-md-12">
                <h3 class="text-danger">Admin Login</h3>
            </div>
				<form method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class ="form-group">
                                <input type="text" class="form-control" name="username" placeholder="Enter User Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class ="form-group">
                                <input type="password" class="form-control" name="userps" placeholder="Enter Password">
                            </div>
                        </div>
                    </div>
                    <button  class='btn btn-lg btn-block' name="submit">Click here to log</button>
				</form>
            </div>
        </div>
    </div>
</body>
</html>
<?php 
    if(isset($_POST['submit'])){
        
        $adname = $_POST['username'];
        $adps = $_POST['userps'];
        
        if(empty($adname) || empty($adps)){
            echo "<script>alert('Enter UserName / Password to login')</script>";
        }else{
           $sql = "SELECT * FROM `admin` WHERE adminname='$adname' AND password='$adps'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) == 1){
                $_SESSION['adminname'] = $adname;
                echo "<script>alert('loging success')</script>";
                echo "<script>window.open('panel.php','_self')</script>";
            }
            else{
                echo "<script>alert('User Name / Password Wrong')</script>";
            } 
        }
        
    }
?>