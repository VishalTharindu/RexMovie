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
        <title>Movie Booking</title>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>

        <link rel='stylesheet' type='text/css' href='vendors/css/normalize.css'>
        <link rel='stylesheet' type='text/css' href='resources/css/moviebooking.css'>
        <link rel='stylesheet' type='text/css' href='resources/css/boostrap/bootstrap.min.css'>
        <link href='resources/font-awesome/css/font-awesome.min.css' rel='stylesheet'>
        <link rel='stylesheet' href='vendors/css/animate.css'>
    </head>
    <body>
        
        <?php
            
            include('incfile/headerinside.php');
        ?> 
        <div class='container book'>
            <div class='row text-cente'>
                
                <?php 
                        $movieId = $_POST['NmovieId'];
                        $Times = $_POST['NTime'];
                        $Date = $_POST['NDate'];
                        $usEmail = $_SESSION['useremail'];
                        $seat = implode(", ", $_POST['seatn']);
                        $sql = "SELECT * FROM movie_list WHERE movie_id ='$movieId'";
                        $movieList = mysqli_query($conn,$sql);
                        
                        while($rowMovie = mysqli_fetch_array($movieList)){
                            $mid = $rowMovie['id'];
                            $movieId = $rowMovie['movie_id'];
                            $MovieName = $rowMovie['movie_name'];
                            $Time1 = $rowMovie['time_1'];
                            $Time2 = $rowMovie['time_2'];
                            $Time3 = $rowMovie['time_3'];
                            $PriceAdult = $rowMovie['price_adult'];
                            $PriceChild = $rowMovie['price_child'];
                            $MovieImage = $rowMovie['movie_img'];
                            $Descrip = $rowMovie['description'];
                        }
                        
                    $seatexpl = explode(',', $seat);
                    $seatCon = count($seatexpl);
                    $TotalPrice = $seatCon * $PriceAdult;
//                    $inid = md5(rand());
                    
                    $random = substr(md5(mt_rand()), 0, 7);
//                    echo $random;
                
                    echo"
                        <div class='col-md-12 col-md-offset-4'>
                         <div class='bok-form'>
                            <h4 class='text-success'>Please Fill This Form</h4>
                            <form class='fm' action='phpcode/mybooking.php' method='POST' id='frmBox' onsubmit='return formSubmit();'>
                                <div class='form-row'>
                                    <div class='form-group col-md-6'>
                                        <label for='inputEmail4'>Movie Id</label>
                                            <input type='text' class='form-control' placeholder='Movie ID' name='movie_id' value='$movieId' readonly/>
                                    </div>
                                    <div class='form-group col-md-6'>
                                        <label for='inputPassword4'>Movie Name</label>
                                        <input type='text' class='form-control' placeholder='Movie Name' name='moviename' value='$MovieName' readonly/>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='form-group col-md-6'>
                                        <label for='inputAddress'>Seat</label>
                                        <input type='text' class='form-control' placeholder='Seat' name='setNo' value='$seat' readonly/>
                                    </div>
                                    <div class='form-group col-md-6'>
                                        <label for='inputAddress2'>Date</label>
                                        <input type='text' class='form-control' placeholder='Seat' name='date' value='$Date' readonly/>
                                    </div>
                                </div>
                                <div class='form-row'>
                                    <div class='form-group col-md-6'>
                                        <label for='inputCity'>Time</label>
                                        <input type='text' class='form-control' placeholder='Seat' name='time' value='$Times' readonly/>
                                    </div>
                                    <div class='form-group col-md-6'>
                                        <label for='inputCity'>User Email</label>
                                        <input type='email' class='form-control' placeholder='Email' name='email' value='$usEmail' readonly/>
                                    </div>
                                </div>
                                <div class='form-row'>
                                    <div class='form-group col-md-6'>
                                        <label for='inputCity'>Total Price</label>
                                        <input type='email' class='form-control' placeholder='price' name='Price' value='$TotalPrice' readonly/>
                                    </div>
                                    <div class='form-group col-md-6'>
                                        <label for='inputCity'>User Name</label>
                                        <input type='text' class='form-control' placeholder='User Name' name='username'/>
                                    </div>
                                </div>
                                <div class='form-row'>
                                    <div class='form-group col-md-6'>
                                        <label for='inputCity'>NIC</label>
                                        <input type='text' class='form-control' placeholder='NIC:(123456789v)' pattern='[0-9]{9}[v]' name='nic'  required/>
                                    </div>
                                    <div class='form-group col-md-6'>
                                        <label for='inputCity'>Phone No:</label>
                                        <input type='text' class='form-control' placeholder='Phone:(0713243567)' pattern='[0][0-9]{9}' name='phone' required/>
                                    </div>
                                </div>
                                <div class='form-row'>
                                    <div class='form-group col-md-12'>
                                        <input type='hidden' class='form-control'  name='invid' value='$random'  required/>
                                    </div>
                                </div>
                                <div class='col-md-12 form-group'>
                                    <input  type='submit' value='Book' name = 'submit'  class='btn btn-danger btn-lg btn-block'/>
                                    <h4 id='success'></h4>
                                </div>
                            </form>
                            </div>
                        </div>
                        ";
                    ?>
            </div>
            <script src='resources/js/jquery-3.3.1.min.js'></script>
            <script src='resources/js/popper.min.js'></script>
            <script src='resources/js/bootstrap.min.js'></script>
            <script type="text/javascript">
                function formSubmit(){
                    $.ajax({
                        type:'POST',
                        url:'phpcode/mvb.php',
                        data:$('#frmBox').serialize(),
                        success:function(response){
                            $('#success').html(response);
                        }
                    });
                    var form = document.getElementById('frmBox').reset();
                    return false;
                }
            </script>
        </div>
        
         <?php
            
            include('incfile/footer.php');
        ?>
        
    </body>
</html>
<?php 
    
//    if(isset($_POST['submit'])){
//        $movieId = $_POST['movie_id'];
//        $movieName = $_POST['moviename'];
//        $userName = $_POST['username'];
//        $Email = $_POST['email'];
//        $NIC = $_POST['nic'];
//        $Phone = $_POST['phone'];
//        $setno = $_POST['setNo'];
//        $Date = $_POST['date'];
//        $time = $_POST['time'];
//        
//        $sqlinc = "INSERT INTO userbooking(movirID,movieName,userName,Email,NIC,phoneNumber,date,time,seatNo) VALUES ('$movieId','$movieName','$userName','$Email','$NIC','$Phone','$Date','$time','$setno')";
//        
//        $sqlindn = mysqli_query($conn,$sqlinc);
//
//        $seatArray = explode(',', $setno);
//        $seatCount = count($seatArray);
//        $i = 0;
//        for($i;$i<$seatCount;$i++){
//            $currentSeat = intval($seatArray[$i]);
//            $sqlIn = "INSERT INTO seat(movieId,seatNo,email,date,time) VALUES('$movieId','$currentSeat','$Email','$Date','$time')";
//            $sqlInRun = mysqli_query($conn,$sqlIn);
//        }
//       
////        echo"<script>alert('Seat booked succesfuly')</script>";
//       
//                            
////        $sql4 = "INSERT INTO seat(movieId,seatNo,email,date,time) VALUES('$mveID','$SeatNo','$UserID','$Date','$time')";
//                        
//            if( mysqli_num_rows($sqlInRun) < 0){
//                
//                echo"<script>alert('ERROR')</script>";
//                                
//                }
//            else{
//                                
//               echo"<script>alert('Seat booked succesfuly')</script>";
//                                
//                }
//    }
?>
