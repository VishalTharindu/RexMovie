<?php
    
    include("phpcode/db.inc.php");
?>
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
<html>
    <head>
        <title>
            Ticket Generator
        </title>
        
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        
        <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="resources/css/mybooking.css">
        <link rel="stylesheet" type="text/css" href="resources/css/boostrap/bootstrap.min.css">
        <link href="resources/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="vendors/css/animate.css">
        <link rel="stylesheet" href="resources/css/ticket-gen.css">

                <!--        jquary script section-->
        
        <script src="resources/js/jquery-3.3.1.min.js"></script>
        <script src="resources/js/popper.min.js"></script>
        <script src="resources/js/bootstrap.min.js"></script>
        <script src="resources/js/jspdf.js"></script>
	   <script src="resources/js/jquery-2.1.3.js"></script>
	   <script src="resources/js/pdfFromHTML.js"></script>
    </head>
    <body>
        <div class="container cons">
            <div class="col-md-12 col-md-offset-6">
                <h4 class="text-success">Generate Your Ticket</h4>
              
                    <form action="ticket_gen.php" method="POST">
                      <div class="form-group">
                        <label>Invoice No</label>
                        <input type="text" class="form-control" name="invoid"  placeholder="">
                      </div>
                        <p class="text-danger">Check your email to find invoice id</p>
                        <button type="submit" name="submit" class="btn btn-primary">Generate</button>
                    </form>
                    <?php 
                        if(isset($_POST['submit'])){
                            $invoiceID = $_POST['invoid'];
//                            $nic = $_POST['Unic'];
//                            $mvid = $_POST['']

                            $sql = "SELECT * FROM `userbooking` WHERE invoId='$invoiceID'";
                            $result = mysqli_query($conn,$sql);

                            while($genresp = mysqli_fetch_array($result)){
                                $movieName = $genresp['movieName'];
                                $Date = $genresp['date'];
                                $Time = $genresp['time'];
                                $SetNo = $genresp['seatNo'];
                                $Uemail = $genresp['Email'];
                                $nic = $genresp['NIC'];
                                $price = $genresp['TotalPr'];
                                $pst = $genresp['PyStatus'];
                                $inv = $genresp['invoId'];

                                echo"
                                    <div id='HTMLtoPDF'>
                                        <div class='text-center'>
                                            <h4>RexCinema</h4>
                                            <h6>Colombo Road</h6>
                                            <h6>Badulla</h6>
                                        </div>
                                        <div class='text-success'>
                                            <p>Invoice No:<span>$inv</span></p><br>
                                            <p>Movie Name:<span>$movieName</span></p><br>
                                            <p>Date:<span>$Date</span></p><br>
                                            <p>Time :<span>$Time</span></p><br>
                                            <p>Seat No :<span>$SetNo</span></p><br>
                                            <p>Email:<span>$Uemail</span></p><br>
                                            <p>NIC:<span>$nic</span></p><br>
                                            <p>Price:<span>$price</span></p><br>
                                            <p>Payment Status:<span>$pst</span></p><br>
                                        </div>
                                    </div>
                                    <a href='#' onclick='HTMLtoPDF()'>Download PDF</a>
                                ";
                            }
                        }
                    ?>
                <a href="movie.php" class="text-success">Back to movies</a>
            </div>
        </div>
        
    </body>
</html>
