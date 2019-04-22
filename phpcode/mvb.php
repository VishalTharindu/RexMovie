<?php 
    include('db.inc.php');
    require 'phpmailer/PHPMailerAutoload.php';

    if(!$conn){
        die("Could Not Connect:".mysqli_connect_error());
    }
    
    else{
        $movieId = test_input($_POST['movie_id']);
        $movieName = test_input($_POST['moviename']);
        $userName = test_input($_POST['username']);
        $Email = test_input($_POST['email']);
        $NIC = test_input($_POST['nic']);
        $Phone = test_input($_POST['phone']);
        $setno = test_input($_POST['setNo']);
        $Date = test_input($_POST['date']);
        $time = test_input($_POST['time']);
        $Price = test_input($_POST['Price']);
        $invoid = test_input($_POST['invid']);
        
        
        
        $sqlinc = "INSERT INTO userbooking(movirID,movieName,userName,Email,NIC,phoneNumber,date,time,seatNo,TotalPr,invoId) VALUES ('$movieId','$movieName','$userName','$Email','$NIC','$Phone','$Date','$time','$setno','$Price','$invoid')";
        
        $sqlindn = mysqli_query($conn,$sqlinc);

        $seatArray = explode(',', $setno);
        $seatCount = count($seatArray);
        $i = 0;
        for($i;$i<$seatCount;$i++){
            $currentSeat = intval($seatArray[$i]);
            $sqlIn = "INSERT INTO seat(movieId,seatNo,email,date,time) VALUES('$movieId','$currentSeat','$Email','$Date','$time')";
            $sqlInRun = mysqli_query($conn,$sqlIn);
        }             
            if($sqlInRun < 0){
                
                echo"Booking Not Success";
                                
                }
            else{
                                
                echo"Booking  Success";
                echo"<script>alert('Seat booked succesfuly')</script>";
                $mail = new PHPMailer;
                    $mail->isSMTP();
                    $mail->SMTPDebug = 2;
                    $mail->Debugoutput = 'html';
                    $mail->Host = 'smtp.gmail.com';
                    $mail->Port = 587;
                    $mail->SMTPSecure = 'tls';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'tharinduvishal51@gmail.com';
                    $mail->Password = 'Tharindu071';
                    $mail->setFrom('tharinduvishal51@gmail.com', "Rex_Cinema");
                    $mail->addAddress($Email, $uname);
                    $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
                    $mail->Subject = 'Conifrm Email Address - Rex_Cinema';
                    $mail->Body = "<h4>Hi! $uname, Welcome to Rex_Cinema.</h4><br/>
                                    <b> invoice id : <i>$invoid</i> </b>
                                    <br>
                                    <p>Thank You</p>
                                    <b>Rex_Cinema Online</b>";
                    
                    if (!$mail->send()) {
                        echo "<script>alert('Somthing Wrong! Please Contact Us')</script>";
                    }
                    else{
                        
                    }
                echo "<script>window.open('payment.php','_self')</script>";
                                
                }
        
//        $sql = "INSERT INTO userbooking(movirID,movieName,userName,Email,NIC,phoneNumber) VALUES ('$movieId','$movieName','$userName','$Email','$NIC','$Phone')";
//        
//        if(mysqli_query($conn,$sql)){
//            echo "Booking Success"; 
//        }
//        else{
//            echo "Filde book";
//        }
        mysqli_close($conn);
    }
    function test_input($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data; 
        
    }
?>