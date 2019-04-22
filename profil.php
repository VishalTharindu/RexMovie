<?php
    $massage = '';
    session_start();
    include("phpcode/db.inc.php");
?>
<?php 
    if(!isset($_SESSION['useremail'])){
        echo"<script>window.open('loging.php','_self')</script>";
    }
?>
<html>
    <head>
        <title>profil</title>
        <link rel="stylesheet" type="text/css" href="resources/css/profil.css">
        <link rel="stylesheet" type="text/css" href="resources/css/boostrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="resources/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="vendors/css/animate.css">
        
        <script src="resources/js/jquery-3.3.1.min.js"></script>
        <script src="resources/js/popper.min.js"></script>
        <script src="resources/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="header">
            <?php

                include("incfile/headerinside.php");
            ?>
        </div>
        <div class="container-fluid con">
            <div class="row col-md-12">
                <div class="col-md-4 pull-right">
                    <div class="profil">
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <h3 class="text-warning">Your Profile</h3>
                                    <img src="resources/img/US.png">
                                </div>
                            </div>
                        <?php
                            $prf = $_SESSION['useremail'];
                            $prfsql = "SELECT * FROM `user` WHERE userEmail='$prf'";
                            $res = mysqli_query($conn,$prfsql);
                            while($usdetail = mysqli_fetch_array($res)){
                                $FirstName = $usdetail['firstName'];
                                $LastName = $usdetail['lastName'];
                                $UserName = $usdetail['username'];
                                $UserEmail = $usdetail['userEmail'];
                                $PhoneNo = $usdetail['phoneNo'];
                                $Status = $usdetail['statues'];
                                
                                echo "
                                <div class='row text-center'>
                                    <div class='col-md-12'>
                                            <ul>
                                                <li class='text-danger'>Name: <span class='text-primary'>$FirstName </span><span class='text-primary'>$LastName</span></li>
                                                <li class='text-danger'>User Name: <span class='text-primary'>$UserName</span></li>
                                                <li class='text-danger'>Email:<span class='text-primary'>$UserEmail</span></li>
                                                <li class='text-danger'>PhoneNo: <span class='text-primary'>$PhoneNo</span></li>
                                                <li class='text-danger'>Status: <span class='text-primary'>$Status</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class='mod'>
                                        <div class='text-center'>
                                            <button type='button' class='btn btn-outline-light' data-toggle='modal' data-target='#exampleModalCenter'>
                                             <span class='text-warning'>Change Password</span>
                                            </button>
                                        </div>
                                    </div>  
                                    <div class='modal fade' id='exampleModalCenter' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                                      <div class='modal-dialog modal-dialog-centered' role='document'>
                                          <form method='POST'>
                                            <div class='modal-content'>
                                              <div class='modal-header'>
                                                <h5 class='modal-title' id='exampleModalLongTitle'>Verify your email</h5>
                                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                  <span aria-hidden='true'>&times;</span>
                                                </button>
                                              </div>  
                                              <div class='modal-body'>
                                                  <div class='row'>
                                                    <div class='form-group col-md-12'>
                                                        <label>Earlier Password</label>
                                                        <input type='password' name='erlps' class='form-control' name='done'>
                                                    </div>
                                                    <div class='form-group col-md-12'>
                                                        <label>New Password</label>
                                                        <input type='password' name='newps' class='form-control' name='done'>
                                                    </div>
                                                  </div>
                                              </div>
                                              <div class='modal-footer'>
                                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                                <button type='submit' name='vrfy' class='btn btn-primary'>Save Change</button>
                                              </div>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                ";
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="update_p">
                             <h1 class="text-success">Edit Your Profile Here</h1>
                            <form method="POST">
                                <!--<div class="alert alert-error"></div>-->
                                <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-primary">First Name</label>
                                                    <input type="text"  class="form-control" name="Fname" >
                                                    
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                             <div class="form-group">
                                                <label class="text-primary">Last Name</label>
                                                    <input type="text" class="form-control" name="Lname" >                                                   
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-primary">User Name</label>
                                                    <input type="text"  class="form-control" name="Uname" >
                                                    
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                             <div class="form-group">
                                                <label class="text-primary">Phone No:</label>
                                                    <input type="text"  class="form-control" name="phone">                                                   
                                            </div>
                                        </div>
                                    </div>
                                <div class="col-md-12">
                                    <input type="submit" value="UPDATE PROFILE" name="submit" class=" btn btn-danger btn-lg btn-block"/>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
        <?php 
            if(isset($_POST['submit'])){
                $Fnme = $_POST['Fname'];
                $Lnme = $_POST['Lname'];
                $Unme = $_POST['Uname'];
                $Pno = $_POST['phone'];
                
                
                    $upsqury = "UPDATE `user` SET `firstName`='$Fnme',`lastName`='$Lnme',`username`='$Unme',`phoneNo`='$Pno' WHERE userEmail='$prf'";
                    $noname = mysqli_query($conn,$upsqury);
                    if($noname > 0){
                        echo"<script>alert('Update success')</script>";
                        echo "<script>window.open('profil.php','_self')</script>";
//                        location.reload();
                    }else{
                        echo"<script>alert('Update not success')</script>";
                    }
            }
        ?>
        <?php 
            
            include("phpcode/db.inc.php");
            if(isset($_POST['vrfy'])){
                $earlPs = $_POST['erlps'];
                $newsPs = $_POST['newps'];
                $erlencrp = md5($earlPs);
                $newPs = md5($newsPs);
                $sls = "SELECT * FROM `user` WHERE 	userEmail='$prf' AND password='$erlencrp'";
                $trre = mysqli_query($conn,$sls);
                if(mysqli_num_rows($trre) > 0 ){
                    $insqury = "UPDATE `user` SET `password`='$newPs' WHERE userEmail='$prf'";
                    $restup = mysqli_query($conn,$insqury);
                    if($restup > 0){
                        echo"<script>alert('Password changed successfuly')</script>";
                    }else{
                        echo"<script>alert('Update not success')</script>";
                        }
                }else{
                    echo"<script>alert('Password not match with previous one')</script>";
                }
            }
        ?>
        
        <div class="footer">
            <?php 
            
                include("incfile/footer.php");
            ?>
        </div>
    </body>
</html>