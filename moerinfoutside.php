<?php

    include("phpcode/db.inc.php");

?>
<html>
    <head>
        <title>booking</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="resources/css/moviebooking.css">
        <link rel="stylesheet" type="text/css" href="resources/css/boostrap/bootstrap.min.css">
        <link href="resources/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="vendors/css/animate.css">

                <!--        jquary script section-->
        
        <script src="resources/js/jquery-3.3.1.min.js"></script>
        <script src="resources/js/popper.min.js"></script>
        <script src="resources/js/bootstrap.min.js"></script>
    </head>
    <body>
        
        <?php
            
            include("incfile/header.php");
        ?>
        
        <div class="container book">
            <div class="row text-cente">
                <?php
                    if(isset($_GET['movieId'])){
                        $MVid = $_GET['movieId'];
                        $sql = "SELECT * FROM movie_list WHERE id=$MVid";
                        $movieList = mysqli_query($conn,$sql); 
                        
                        while($rowMovie = mysqli_fetch_array($movieList)){
                            $MovieImg1 = $rowMovie['movie_img'];
                            $MovieImg2 = $rowMovie['movie_img1'];
                            $MovieImg3 = $rowMovie['movie_img2'];
                            $MovieImg4 = $rowMovie['movie_img3'];
                        }
                    }
                    echo"
                    <div class='col-md-12 movie-detail'>
                        <div class='col-md-3 pull-left'>
                            <img src='Admin/image/$MovieImg1' class='img-fluid'>
                        </div>
                        <div class='col-md-3 pull-right instruc'>
                            <img src='Admin/image/$MovieImg2' class='img-fluid'>  
                        </div>
                        <div class='col-md-3 pull-right instruc'>
                            <img src='Admin/image/$MovieImg3' class='img-fluid'>  
                        </div>
                        <div class='col-md-3 pull-right instruc'>
                            <img src='Admin/image/$MovieImg4' class='img-fluid'>  
                        </div>
                    </div>
                    ";
                ?>
            </div>
        </div>
        
         <?php
            
            include("incfile/footer.php");
        ?>
        
    </body>
</html>
