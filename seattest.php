<?php
    session_start();
    include('phpcode/db.inc.php');
    
    error_reporting(E_PARSE | E_ERROR);
?>
<?php 
    if(!isset($_SESSION['useremail'])){
        echo"<script>window.open('loging.php','_self')</script>";
    }
?>
<html>
    <head>
        <title>Seat Selection</title>
        <link rel="stylesheet" type="text/css" href="resources/css/boostrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="resources/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="resources/css/seatsetl.css">
        
        <script src="resources/js/bootstrap.min.js"></script>
        <script src="resources/js/jquery-3.3.1.min.js"></script>
        <script src="resources/js/popper.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row screen">
<!--                <button type="button" class="btn btn-primary btn-lg btn-block">Block level button</button>-->
                <button type="button" class="btn btn-danger btn-lg btn-block">Screen</button>
            </div>
            <div class="row align-items-center">
                <form action='moviebook.php' method="POST">
                <div class='col-md-12'>
                    <div class='row seat'>
                         <?php
                            $date = strip_tags(utf8_decode($_POST['doj']));
                            $Time = $_POST['time'];
                            $mvID = $_POST['movieid'];
                            $userID = $_POST['email'];
                            echo"
                                <div class = 'col-md-3'>
                                    <div class = 'form-group'>
                                    <input type='text' value = '$Time' class='form-control' name='NTime' readonly>
                                    </div>
                                </div>
                                  <div class = 'col-md-3'>
                                    <div class = 'form-group'>
                                    <input type='text' value = '$mvID' class='form-control' name='NmovieId' readonly>
                                    </div>
                                </div>
                                  <div class = 'col-md-3'>
                                    <div class = 'form-group'>
                                    <input type='text' value = '$userID' class='form-control' name='NusID' readonly>
                                    </div>
                                </div>
                                  <div class = 'col-md-3'>
                                    <div class = 'form-group'>
                                    <input type='text' value = '$date' class='form-control' name='NDate' readonly>
                                    </div>
                                </div>
                                
                            ";
                        
                            function getTrue($seatNo){
                                global $conn;
                                global $mvID;
                                global $date;
                                global $Time;
                                $checkSql = "SELECT * FROM seat WHERE movieId='$mvID' AND date='$date' AND time='$Time' AND seatNo='$seatNo'";
                                $check = mysqli_query($conn,$checkSql);
                                if(mysqli_num_rows($check)>0){
                                    return true;
                                }
                               
                            }
                              $sql = "SELECT * FROM seat WHERE movieId='$mvID' AND date='$date' AND time='$Time'";
                              $runsql = mysqli_query($conn,$sql);
                                if(mysqli_num_rows($runsql) > 0){                                   
                                     for($i=1; $i<61;$i++){
                                                if(getTrue($i)){
                                                    
                                                    echo "
                                                        <div class='col-md-1'>
                                                        <div class='seat'>
                                                        <button type='button' class='btn btn-danger btn-lg'>
                                                            <div>S$i</div>
                                                            <div><input type='checkbox' name='seatn' value='$i' autocomplete='off' disabled/></div>  
                                                        </button>
                                                        </div>
                                                    </div> 
                                                    ";
                                                }
                                                else{
                                                    
                                                    echo"
                                                    
                                                    <div class='col-md-1 form-group'>
                                                        <div class='seat form-group'>
                                                        <button type='button' class='btn btn-primary btn-lg'>
                                                        <div>S$i</div>
                                                           <input type='checkbox' name='seatn[]' value='$i' readonly/> 
                                                        </button>  
                                                        </div>
                                                    </div>    
                                                    ";
                                                }
                                        }
                                }
                            else{
                                for($i=1; $i<=61 ; $i++){
                                     echo"               
                                        <div class='col-md-1 form-group'>
                                            <div class='seat form-group'>
                                                <button type='button' class='btn btn-primary btn-lg'>
                                                    <div>S$i</div>
                                                    <input type='checkbox' name='seatn[]' value='$i' readonly/> 
                                                </button>  
                                            </div>
                                        </div>    
                                        ";
                                }
                            }
                        
                        ?>
                    </div>
                    
                </div>
                <div class="row action">
                    <div class="btnst">
                        <div class="col-md-2">
                            <input type="submit" class="btn btn-success" value="Next" name="inme">
                        </div>
                    </div>
                    <div class="btnst">
                        <div class="col-md-2">
                            <button type="button" name="submit" class="btn btn-danger">Cancle</button>
                        </div>
                    </div>
                    <div class="btnst">
                        <div class="col-md-2">
                            <a href="movie.php" class="btn btn-warning">Go Back</a>
                        </div>
                    </div>
                 </div>
              
                </form>
            </div>
        </div>
    </body>
</html>

<?php

    if(isset($_POST['inme'])){
        $SeatNo = implode(", ", $_POST['seatn']);
        $mveID = $_POST['NmovieId'];
        $time = $_POST['NTime'];
        $Date = $_POST['NDate'];
        $UserID = $_POST['NusID'];
        
//        $sql = "UPDATE userbooking SET date='$Date',time='$time',seatNo='$SeatNo' WHERE Email='$UserID'";
//        $userbook = mysqli_query($conn,$sql);
        
        $seatArray = explode(',', $SeatNo);
        $seatCount = count($seatArray);
        $i = 0;
        for($i;$i<$seatCount;$i++){
            $currentSeat = intval($seatArray[$i]);
            $sqlIn = "INSERT INTO seat(movieId,seatNo,email,date,time) VALUES('$mveID','$currentSeat','$UserID','$Date','$time')";
            $sqlInRun = mysqli_query($conn,$sqlIn);
        }
       
//        echo"<script>alert('Seat booked succesfuly')</script>";
       
                            
//        $sql4 = "INSERT INTO seat(movieId,seatNo,email,date,time) VALUES('$mveID','$SeatNo','$UserID','$Date','$time')";
                        
            if( mysqli_num_rows($sqlInRun) < 0){
                
                echo"<script>alert('ERROR')</script>";
                                
                }
            else{
                                
               echo"<script>alert('Seat booked succesfuly')</script>";
                                
                } 
            
    }
?>