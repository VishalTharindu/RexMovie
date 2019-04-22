<?php 
include("phpcode/db.inc.php");

    $cncleid = $_GET['del_id'];
    echo $cncleid;
    $query = "SELECT * FROM userbooking WHERE id=$cncleid";
    $cancelList = mysqli_query($conn,$query);
                                
                                
    $rowCancle = mysqli_fetch_array($cancelList);
        $movieId = $rowCancle['movirID'];
        $movieName = $rowCancle['movieName'];
        $Date = $rowCancle['date'];
        $Time = $rowCancle['time'];
        $seatNo = $rowCancle['seatNo'];
        $userName = $rowCancle['userName'];
        $Email= $rowCancle['Email'];
        $NIC = $rowCancle['NIC'];
        $phoneNumber = $rowCancle['phoneNumber'];
        $inid = $rowCancle['invoId'];
                            
                                
        $newinsert = "INSERT INTO cancledbookimg(MovieId,MovieName,Date,Time,Email,Nic,SeatNo,phoneNo,invoeid) VALUES ('$movieId','$movieName','$Date','$Time','$Email','$NIC','$seatNo','$phoneNumber','$inid')";
                                
        $result1 = mysqli_query($conn,$newinsert);
                                
        $deseat = "DELETE FROM seat WHERE movieId='$movieId' AND email='$Email' AND date='$Date' AND time='$Time'";
        $dlseats = mysqli_query($conn,$deseat);
                                
        $sql = "DELETE  FROM userbooking WHERE id=$cncleid";
        $canclebooking = mysqli_query($conn,$sql);
                                
                                
                                
        if($canclebooking && $result1){
            echo"<script>alert('your booking cancle successfuly')</script>";
            echo"<script>window.open('mybooking.php','_self')</script>";
            }
        else{
            echo"<script>alert('Cancle not Success')</script>";
            }
?>