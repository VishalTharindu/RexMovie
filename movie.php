<?php

    session_start();
    include("phpcode/db.inc.php");
?>
<?php 
    if(!isset($_SESSION['useremail'])){
        echo"<script>window.open('loging.php','_self')</script>";
    }
?>
<html>
    <head>
        <title>movie Page</title>
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
                <p>Movies/<span>Now Showing</span></p>
                </div>
            <div class="container-fluid">
                <div class="row">
                    <?php 
                        $sql = "SELECT * FROM movie_list ORDER BY 1 DESC LIMIT 0,9";
                        $getMovie = mysqli_query($conn,$sql);
                        while($rowMovie = mysqli_fetch_array($getMovie)){
                            $movieId = $rowMovie['id'];
                            $movieName = $rowMovie['movie_name'];
                            $movieCategory = $rowMovie['movie_catogry'];
                            $movieImage = $rowMovie['movie_img'];
                            $Time1 = $rowMovie['time_1'];
                            $Time2 = $rowMovie['time_2'];
                            $Time3 = $rowMovie['time_3'];
                            $Trail = $rowMovie['Trailer'];
                        echo "
                        <div class='col-lg-4 col-md-4 col-sm-4 col-12'>
                            <div class='img-box'>
                                <img src='Admin/image/$movieImage' class='img-fluid'>
                                <div class='overlay overlayBottom'>
                                    <div class='trailer'>
                                    <i class='fa fa-youtube'></i>
                                    <a href='$Trail' target='blank'><span>$movieName</span> Trailer</a>
                                    </div>
                                    <hr class='trail'>
                                    <div class='tx'><a href='testbok.php?movieId=$movieId'>Book Now</a></div>
                                    <div class='description'>
                                        <a href='moerinfo.php?movieId=$movieId'>Screen Shot</a>
                                    </div>
                                    <div class='vl'></div>
                                </div>
                            </div>
                            <div class='movtitle'>
                                <p>$movieName<span>$movieCategory</span></p>
                            </div>
                                <div class='movtiem'>
                                    <ul>
                                        <li>$Time1</li>
                                        <li>$Time2</li>
                                        <li>$Time3</li>
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
