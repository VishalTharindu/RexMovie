<html>
    <head>
        <title>index</title>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" type="text/css" href="resources/css/boostrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="resources/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="resources/css/style.css">
        
        
        
        <script src="resources/js/jquery-3.3.1.min.js"></script>
        <script src="resources/js/bootstrap.min.js"></script>
        <script src="resources/js/popper.min.js"></script>
    </head>
    <body>
<!--        #########header include here#############-->
        <?php
            
            include("incfile/header.php");
        ?>
<!--        #############################################-->
        
        
        <div id="slides" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#slides" data-slide-to="0" class="active"></li>
                <li data-target="#slides" data-slide-to="1"></li>
                <li data-target="#slides" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="resources/indeximg/10.jpg">
                    <div class="carousel-caption">
                        <h1 class="display-2">Rex-Cenama</h1>
                        <h3>Feel Live Expreance in cenama</h3>
                        <button type="button" class="btn btn-outline-light btn-lg"><a href="aboutus.php" class="abt">ABOUT US</a></button>
                        <button type="button" class="btn btn-primary btn-lg"><a href="loging.php" class="abt">LOG AN TRY</a></button>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="resources/indeximg/aqcover.jpg">
                    <div class="carousel-caption">
                        <h1 class="display-2">Rex-Cenama</h1>
                        <h3>Feel Live Expreance in cenama</h3>
                        <button type="button" class="btn btn-outline-light btn-lg"><a href="aboutus.php" class="abt">ABOUT US</a></button>
                        <button type="button" class="btn btn-primary btn-lg"><a href="loging.php" class="abt">LOG AN TRY</a></button>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="resources/indeximg/bciver.jpg">
                    <div class="carousel-caption">
                        <h1 class="display-2">Rex-Cenama</h1>
                        <h3>Feel Live Expreance in cenama</h3>
                        <button type="button" class="btn btn-outline-light btn-lg"><a href="aboutus.php" class="abt">ABOUT US</a></button>
                        <button type="button" class="btn btn-primary btn-lg"><a href="loging.php" class="abt">LOG AN TRY</a></button>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
            
            include("incfile/footer.php");
        ?>
        
    </body>
</html>