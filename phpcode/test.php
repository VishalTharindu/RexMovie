<?php
    
    include_once 'db.inc.php';

$massage = '';

if (isset($_POST['submit'])){
    
    
    $qure = "SELECT * FROM user WHERE nic = :nic";
    
    $statement = $conn ->prepare($qure);
    
    $statement->execute(
        array(
            ':nic' => $_POST['nic']
        )
    );
    
    $no_of_row = $statement->rowCount();
    
    if($no_of_row > 0){
        $massage = '<lable class = "text-danger">Email Already Exits </lable>'
    }
    
   
}


else{
    header("Location:../singup.php");
    exit();
}