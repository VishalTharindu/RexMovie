<?php
include("phpcode/db.inc.php");

if(isset($_GET['del_id'])){
    $auid = $_GET['del_id'];
    $sql2 = "DELETE FROM movie_list WHERE id=$auid";
    $rst = mysqli_query($conn,$sql2);
    if($rst > 0){
        echo"<script>alert('Movie Delete successfuly')</script>";
        echo"<script>window.open('currentmlist.php','_self')</script>";
        }
    }
?>