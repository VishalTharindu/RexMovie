<?php

    session_start();
    include("phpcode/db.inc.php");

?>
<html>
    <head>
        <title>Up-comming movie Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="resources/css/movie.css">
        <link rel="stylesheet" type="text/css" href="resources/css/boostrap/bootstrap.min.css">
        <link href="resources/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="vendors/css/animate.css">

                <!--        jquary script section-->
        
        <script src="resources/js/jquery-3.3.1.min.js"></script>
        <script src="resources/js/popper.min.js"></script>
        <script src="resources/js/bootstrap.min.js"></script>
    </head>
    <body >
        <div class="hom-cont">
            
 <!--        #########header include here#############-->
        <?php
            
            include("incfile/headerinside.php");
        ?>
<!--        #############################################-->
            <div class="container movie-s">
                <div class="movie-section">
                <p>Movies/<span>Up-comming</span></p>
                </div>
            <div class="container-fluid">
                <div class="row">
                    <?php 
                        $sql = "SELECT * FROM `up-movieList` ORDER BY 1 DESC LIMIT 0,9";
                        $getMovie = mysqli_query($conn,$sql);
                        while($rowMovie = mysqli_fetch_array($getMovie)){
                            $movieId = $rowMovie['id'];
                            $movieName = $rowMovie['MovieName'];
                            $movieCategory = $rowMovie['Category'];
                            $movieImage = $rowMovie['movieImg'];
                            $Date = $rowMovie['date'];
                        echo "
                        <div class='col-lg-4 col-md-4 col-sm-4 col-12'>
                            <div class='img-box'>
                                <img src='Admin/image/upcomings/$movieImage' class='img-fluid'>
                                <div class='overlay overlayBottom'>
                                    <div class='trailer'>
                                    <i class='fa fa-youtube'></i>
                                    <a href='#'><span>$movieName</span> Trailer</a>
                                    </div>
                                    <hr class='trail'>
                                    <div class='tx' ><a href='#' disabled>Book Now</a></div>
                                    <div class='description'>
                                        <a href='upmoreinfo.php?movieId=$movieId' class='text-center'>Screen Shot</a>
                                    </div>
                                    <div class='vl'></div>
                                </div>
                            </div>
                            <div class='movtitle'>
                                <p>$movieName<span>$movieCategory</span></p>
                            </div>
                                <div class='movtiem'>
                                    <ul>
                                        <li><span>Relese On:</span>$Date</li>
                                    </ul>
                                </div>
                            <hr>
                        </div>
                        ";
                        }
                    ?>
            </div>
        </div>
    </div>
</div>
        <?php
            
            include("incfile/footer.php");
        ?>

    </body>
</html>
