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
<?php
    
    $eml = $_SESSION['useremail'];
    $sql = "UPDATE `userbooking` SET PyStatus='Paied' WHERE Email='$eml'";
    $result = mysqli_query($conn,$sql);
    
    if($result){
        echo "<script>window.open('ticket_gen.php','_self')</script>";
    }
?>