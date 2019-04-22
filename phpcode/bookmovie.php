<?php 
    include('db.inc.php');

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
        
        
        
        
        $sql = "INSERT INTO userbooking(movirID,movieName,userName,Email,NIC,phoneNumber) VALUES ('$movieId','$movieName','$userName','$Email','$NIC','$Phone')";
        
        if(mysqli_query($conn,$sql)){
            echo "Booking Success"; 
        }
        else{
            echo "Filde book";
        }
        mysqli_close($conn);
    }
    function test_input($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data; 
        
    }
?>