<?php
    $massage = '';
    require 'phpmailer/PHPMailerAutoload.php';
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        
        <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="resources/css/mybooking.css">
        <link rel="stylesheet" type="text/css" href="resources/css/boostrap/bootstrap.min.css">
        <link href="resources/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="vendors/css/animate.css">
        <link rel="stylesheet" href="resources/css/singup1.css">

                <!--        jquary script section-->
        
        <script src="resources/js/jquery-3.3.1.min.js"></script>
        <script src="resources/js/popper.min.js"></script>
        <script src="resources/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="">
                <div class="row">
                    <div class="col-md-12 col-md-offset-6">
                        <div class="module-head">
                            <h1 class="text-center">Create an account</h1>
                            <h5 class="text-center">Rex_Cinema</h5>
                            <h5 class="text-center">Badulla</h5>
                        </div>
                        <div class="loging-body">
                            <form method="POST">
                                <?php echo $massage;?>
                                  <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <label class="text-primary">First Name</label>
                                      <input type="text" class="form-control" name="firstName" placeholder="Enter First Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label class="text-primary">Last Name</label>
                                      <input type="text" class="form-control" name="lastName" placeholder="Enter Last Name">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="text-primary">User Name</label>
                                    <input type="text" class="form-control" name="userName"  placeholder="Enter User Name">
                                  </div>
                                  <div class="form-group">
                                    <label class="text-primary">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Example@gmail.com">
                                  </div>
                                  <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <label class="text-primary">NIC</label><?php echo $massage;?>
                                      <input type="text" name="nic" class="form-control" placeholder="NIC:(98012565123v)" pattern="[0-9]{9}[v]">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label class="text-primary">Phone No</label>
                                      <input type="text" name="phone" class="form-control" placeholder="Phone:(07145454545)" pattern="[0][0-9]{9}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <label class="text-primary">Password</label>
                                        <input type="password" name="pswd" id="pwd"class="form-control">
                                        <div id="showErrorPwd"> </div>
                                    </div>
                                     <div class="form-group col-md-6">
                                      <label class="text-primary">Conifrm Password</label>
                                        <input type="password" name="conpswd" id="cpwd" class="form-control">
                                         <div class="text-danger" id="showErrorcPwd"> </div>
                                    </div>

                                </div>
                                  <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Sign in</button>
                                <div class="mod">
                                    <div class="text-center">
                                        <button type="button" class="btn btn-outline-Danger" data-toggle="modal" data-target="#exampleModalCenter">
                                         click here to verify your email
                                        </button>
                                    </div>
                                </div>  
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                      <form method="POST">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Verify your email</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>  
                                          <div class="modal-body">
                                              <div class="row">
                                                <div class="form-group col-md-12">
                                                    <input type="text" name="actCode" class="form-control" name="done">
                                                </div>
                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="vrfy" class="btn btn-primary">Verfy</button>
                                          </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <p class="text-center">click here to <a href="loging.php">login</a></p>
                        <!-- Modal -->
                        
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                debugger;
                $('#cpwd').keyup(function(){
                    var pwd = $('#pwd').val();
                    var cpwd = $('#cpwd').val();
                    
                    if(cpwd != pwd){
                        $('#showErrorcPwd').html('*Two Password Are Not Matched!*');
                        $('#showErrorcPwd').css('color','red');
                        return false;
                    }else{
                        $('#showErrorcPwd').html('');   
                        return true;  
                    }
                });
            });
        </script>
    </body>
    <?php
            
        include("incfile/footer.php");
    ?>
</html>
<?php 
    include("phpcode/db.inc.php");

    if(isset($_POST['submit'])){
        
        $fname = $_POST['firstName'];
        $lname = $_POST['lastName'];
        $uname = $_POST['userName'];
        $Email = $_POST['email'];
        $NIC = $_POST['nic'];
        $PhoneNo = $_POST['phone'];
        $Password = $_POST['pswd'];
        
        $sql = "SELECT * FROM user WHERE nic='$NIC'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            $massage = '<lable class = "text-danger">NIC Already Exits </lable>';
            echo"<script>alert('NIC Already Exits')</script>";
        }
        else{
            $sql2 = "SELECT * FROM user WHERE userEmail='$Email'";
            $result = mysqli_query($conn,$sql2);
            if(mysqli_num_rows($result) > 0){
                $massage = '<lable class = "text-danger">Email Already Exits </lable>';
                echo"<script>alert('Email Already Exits')</script>";
            }
            
            else{
                $PasswordEncp = md5($Password);
                $Activation = md5(rand());
                $status = 'notverified';
                
                $inquery = "INSERT INTO user(firstName,lastName,username,userEmail,nic,phoneNo,password,activationcd,statues) VALUES('$fname','$lname','$uname','$Email','$NIC','$PhoneNo','$PasswordEncp','$Activation','$status')";
                
                $final = mysqli_query($conn,$inquery);
                if($final > 0){
                    echo"<script>alert('Registerd successfuly')</script>";

                    $mail = new PHPMailer;
                    $mail->isSMTP();
                    $mail->SMTPDebug = 2;
                    $mail->Debugoutput = 'html';
                    $mail->Host = 'smtp.gmail.com';
                    $mail->Port = 587;
                    $mail->SMTPSecure = 'tls';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'example@gmail.com';
                    $mail->Password = 'ex1234';
                    $mail->setFrom('example@gmail.com', "Rex_Cinema");
                    $mail->addAddress($Email, $uname);
                    $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
                    $mail->Subject = 'Conifrm Email Address - Rex_Cinema';
                    $mail->Body = "<h4>Hi! $uname, Welcome to Rex_Cinema.</h4><br/>
                                    <p>Please verify your email address, using following confirmation code</p>
                                    <b> Confirmation Code : <i>$Activation</i> </b>
                                    <br>
                                    <p>Thank You</p>
                                    <b>Rex_Cinema Online</b>";
                    
                    if (!$mail->send()) {
                        echo "<script>alert('Somthing Wrong! Please Contact Us')</script>";
                    }
                    else{
                        
                    }
                }
                
                
            }
        }
        
    }
?>
<?php
    include("phpcode/db.inc.php");
    
    if(isset($_POST["vrfy"])){
        
        $atcode = $_POST['actCode'];
        $dflt = 'notverified';
        $newst = 'verified';
        $slt = "SELECT * FROM user  WHERE 	activationcd='$atcode'";
        $rst = mysqli_query($conn,$slt);
        $statusDB = mysqli_fetch_array($rst);
        $sts = $statusDB['statues'];
        
        if($sts != $dflt){
           echo "<script>alert('you have alrady verified your email please loging')</script>";
        }else{ 
            $slt2 = "UPDATE user SET statues='verified' WHERE activationcd='$atcode'";
            $up = mysqli_query($conn,$slt2);
            if($up){
                echo "<script>alert('your email has verified successfuly,$atcode')</script>";
            }else{
                echo "<script>alert('Somthing Wrong! please insert activation code correctly')</script>";
            }
        }
}
    
?>