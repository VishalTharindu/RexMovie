<?php

if (isset($_POST['submit'])){
    
    include_once 'dbh.inc.php';
    
    $usName = mysqli_real_escape_string($conn, $_POST['username']);
    $usEmail = mysqli_real_escape_string($conn, $_POST['email']);
    $usPwd = mysqli_real_escape_string($conn, $_POST['password']); 
    $cusPwd = mysqli_real_escape_string($conn, $_POST['re-type-password']);

    //Error handlers
    if (empty($usName) || empty($usEmail) || empty($usPwd)){
        echo "empty";
        header("Location: ../registration.php?registration=empty");
        exit();
    }else{
        if($usPwd != $cusPwd){
            echo "wrong confirm";
        }
        else{
            
        //check if input characters are valid
        if (!preg_match("/^[a-zA-Z]*$/", $usName) ){
            header("Location: ../registration.php?registration=invalid");
            exit();
        }else{
            //check if email is valid
            if (!filter_var($usEmail, FILTER_VALIDATE_EMAIL)){
                header("Location: ../registration.php?registration=email");
                exit();
            }
            else{
                $sql = $conn->query("SELECT * FORM users WHERE userName='$usName'");
                
                if($sql->mysqli_num_rows > 0){
                    echo"alrady";
                }
                /*$result = mysqli_query($conn, $sql);
                $resutlCheck = mysqli_num_rows($result);
                
                if($resutlCheck > 0){
                    header("Location: ../registration.php?registration=email");
                    exit();
                }*/
                else{
                    //Hashing the password
                    $hashedPwd = password_hash($usPwd, PASSWORD_DEFAULT);
                    //Insert the user into the database
                    $conn->query("INSERT INTO users(userName, userEmail, userPwd) VALUES('$usName','$usEmail','$hashedPwd')");
                    
                    //mysqli_query($conn, $sql);
                    header("Location: ../registration.php?registration=success");
                    exit();
                }
            }
        
        }
    }
}
}


else{
    header("Location:../registration.php");
    exit();
}