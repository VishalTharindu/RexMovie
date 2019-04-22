<?php

if (isset($_POST['submit'])){
    
    include_once 'db.inc.php';
    
    $fName = mysqli_real_escape_string($conn, $_POST['fstname']);
    $lName = mysqli_real_escape_string($conn, $_POST['lstname']);
    $usName = mysqli_real_escape_string($conn, $_POST['username']);
    $usEmail = mysqli_real_escape_string($conn, $_POST['email']);
    $usPwd = mysqli_real_escape_string($conn, $_POST['password']); 
    $cusPwd = mysqli_real_escape_string($conn, $_POST['re-type-password']);
    $usNIC = mysqli_real_escape_string($conn, $_POST['nic']);
    $usPhone = mysqli_real_escape_string($conn, $_POST['phone']);
    

    //Error handlers
    if (empty($usName) || empty($usEmail) || empty($usPwd)){
        echo "empty";
        header("Location: ../singup.php?Name=empty");
        exit();
    }else{
        if($usPwd != $cusPwd){
            echo "wrong confirm";
            echo"$fName";
        }
        else{
            
        //check if input characters are valid
        if (!preg_match("/^[a-zA-Z]*$/", $usName) ){
            header("Location: ../singup.php?username=invalid");
            exit();
        }else{
            //check if email is valid
            if (!filter_var($usEmail, FILTER_VALIDATE_EMAIL)){
                header("Location: ../singup.php?Email=invalid");
                exit();
            }
            else{
                $sql = $conn->query("SELECT username FROM useraccount WHERE username='$usName'");
                
                if($sql->num_rows > 0){
                    echo"This username Alrady Registerd";
                }else{
                    $sql = $conn->query("SELECT email FROM useraccount WHERE email='$usEmail'");
                
                    if($sql->num_rows > 0){
                        echo"This Email Alrady Registerd";
                /*$result = mysqli_query($conn, $sql);
                $resutlCheck = mysqli_num_rows($result);
                
                if($resutlCheck > 0){
                    header("Location: ../registration.php?registration=email");
                    exit();
                }*/
                        }else{
                            $sql = $conn->query("SELECT nic FROM useraccount WHERE nic='$usNIC'");

                        if($sql->num_rows > 0){
                            echo"This Email Alrady Registerd";
                            }else{
                            //Hashing the password
                            $hashedPwd = password_hash($usPwd, PASSWORD_DEFAULT);
                            
                            //Insert the user into the database
                            $conn->query("INSERT INTO useraccount(firstname,lastname,username,email,nic,phoneno,password) VALUES('$fName','$lName','$usName','$usEmail','$usNIC','$usPhone','$hashedPwd')");
                            
                            $sql2  = "INSERT INTO user_login(userName, email, password) VALUES ('$usName','$usEmail','$hashedPwd')";
                            $test = mysqli_query($conn,$sql2);

                            //mysqli_query($conn, $sql);
                            header("Location: ../loging.php?Registration=success");
                            exit();
                        }
                    }
                }
            }
        
        }
    }
}
}


else{
    header("Location:../singup.php");
    exit();
}