<?php
    session_start();
    include("phpcode/db.inc.php");
    error_reporting(E_PARSE | E_ERROR);
?>
<?php 
    if(!isset($_SESSION['useremail'])){
        echo"<script>window.open('loging.php','_self')</script>";
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="resources/css/mybooking.css">
        <link rel="stylesheet" type="text/css" href="resources/css/boostrap/bootstrap.min.css">
        <link href="resources/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="vendors/css/animate.css">

                <!--        jquary script section-->
        
        <script src="resources/js/jquery-3.3.1.min.js"></script>
        <script src="resources/js/popper.min.js"></script>
        <script src="resources/js/bootstrap.min.js"></script>
        <title>My Booking</title>
    </head>
    <body>
        <?php
            
            include("incfile/headerinside.php");
        ?>
        <div class="container-flude order">
            <div class="col-md-12">
            <table class="table">
                  <thead class="thead-dark">
                    <tr>
                        <th>Movie ID</th>
                        <th>Movie Name</th>
                        <th>time</th>
                        <th>date</th>
                        <th>seatNo</th>
                        <th>username</th>
                        <th>email</th>
                        <th>NIC</th>
                        <th>Phone NO</th>
                        <th>Cancle Book</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $s = $_SESSION['useremail'];
                        $sql = "SELECT * FROM userbooking WHERE Email='$s' ORDER BY 1 DESC";
                        $redatils = mysqli_query($conn,$sql);
                        while($rowBooking = mysqli_fetch_array($redatils)){
                            $movieId = $rowBooking['movirID'];
                            $movieName = $rowBooking['movieName'];
                            $Date = $rowBooking['date'];
                            $Time = $rowBooking['time'];
                            $seatNo = $rowBooking['seatNo'];
                            $userName = $rowBooking['userName'];
                            $Email= $rowBooking['Email'];
                            $NIC = $rowBooking['NIC'];
                            $phoneNumber = $rowBooking['phoneNumber'];
                            $CrId = $rowBooking['id'];
                            
                            echo"
                                <tbody>
                                    <tr class='success'>
                                        <td>$movieId</td>
                                        <td>$movieName</td>
                                        <td>$Date</td>
                                        <td>$Time</td>
                                        <td>$seatNo</td>
                                        <td>$userName</td>
                                        <td>$Email</td>
                                        <td>$NIC</td>
                                        <td>$phoneNumber</td>
                                        <td><input type='button' class='btn btn-warning' onclick='deleteme($CrId)' name='delete' value='cancel'></td>
                                    </tr>
                                </tbody>
                                ";
                             }
//                            if(isset($_GET{'cnlid'})){
//                                $cncleid = $_GET['cnlid'];
//                                $query = "SELECT * FROM userbooking WHERE id=$cncleid";
//                                $cancelList = mysqli_query($conn,$query);
//                                
//                                
//                                $rowCancle = mysqli_fetch_array($cancelList);
//                                    $movieId = $rowCancle['movirID'];
//                                    $movieName = $rowCancle['movieName'];
//                                    $Date = $rowCancle['date'];
//                                    $Time = $rowCancle['time'];
//                                    $seatNo = $rowCancle['seatNo'];
//                                    $userName = $rowCancle['userName'];
//                                    $Email= $rowCancle['Email'];
//                                    $NIC = $rowCancle['NIC'];
//                                    $phoneNumber = $rowCancle['phoneNumber'];
//                            
//                                
//                                $newinsert = "INSERT INTO cancledbookimg(MovieId,MovieName,Date,Time,Email,Nic,SeatNo,phoneNo) VALUES ('$movieId','$movieName','$Date','$Time','$Email','$NIC','$seatNo','$phoneNumber')";
//                                
//                                $result1 = mysqli_query($conn,$newinsert);
//                                
//                                $deseat = "DELETE FROM seat WHERE movieId='$movieId' AND email='$Email' AND date='$Date' AND time='$Time'";
//                                $dlseats = mysqli_query($conn,$deseat);
//                                
//                                $sql = "DELETE  FROM userbooking WHERE id=$cncleid";
//                                $canclebooking = mysqli_query($conn,$sql);
//                                
//                                
//                                
//                                if($canclebooking && $result1){
//                                    echo"<script>alert('your booking cancle successfuly')</script>";
//                                    echo"<script>window.open('mybooking.php','_self')</script>";
//                                }
//                                else{
//                                    echo"<script>alert('Cancle not Success')</script>";
//                                }
//                            }
                        ?>
                      <script>
                           function  deleteme(delid){
                               
                               if(confirm("Do you realy want to cancle")){
                                   window.location.href='delete.php?del_id=' +delid+'';
                                   return true;
                               }
                           }
                      </script>
                  </tbody>
                </table>
            </div>
        </div>
        <?php
            
            include("incfile/footer.php");
        ?>
    </body>
</html>
<!--<td><button class='btn btn-warning'><a href='mybooking.php?cnlid=$CrId'>Cancle</a></button></td>-->