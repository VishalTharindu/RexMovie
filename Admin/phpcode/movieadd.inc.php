<?php

if(isset($_POST['submit'])){
    
    include_once 'db.inc.php';
    
    $movieid = mysqli_real_escape_string($conn, $_POST['movieid']);
    $movieimg = mysqli_real_escape_string($conn, $_POST['movieimg']);
    $moviename = mysqli_real_escape_string($conn, $_POST['moviename']);
    $cato = mysqli_real_escape_string($conn, $_POST['cato']);
    $time1 = mysqli_real_escape_string($conn, $_POST['time1']);
    $time2 = mysqli_real_escape_string($conn, $_POST['time2']);
    $time3 = mysqli_real_escape_string($conn, $_POST['time3']);
    $adult = mysqli_real_escape_string($conn, $_POST['adult']);
    $child = mysqli_real_escape_string($conn, $_POST['child']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    
    echo"$moviename";
//    if($movieid !=0){
//    echo"check";
//    echo"$movieid";
//    }
    
    $conn->query("INSERT INTO movie_list(movie_id,movie_img,movie_name,movie_catogry,time_1,time_2,time_3,price_adult,price_child,	description)VALUES('$movieid','$movieimg','$moviename','$cato','$time1','$time2','$time3','$adult','$child','$description')");
//    mysql_query($conn, $sql);
    header("Location: ../movie.php?movie=success");
    
    
}else{
    header("Location: ../movie.php");
    exit();
}
?>