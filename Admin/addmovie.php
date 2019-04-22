<?php
    
    include("phpcode/db.inc.php");
?>
<?php 
    session_start();
?>
<?php 
    if(!isset($_SESSION['adminname'])){
        echo"<script>window.open('index.php','_self')</script>";
    }
?>

<?php

    if(isset($_POST['submit'])){
        
        $movieid = $_POST['movieid'];
        $moviename = $_POST['moviename'];
        $cato = $_POST['cato'];
        $time1 = $_POST['time1'];
        $time2 =$_POST['time2'];
        $time3 = $_POST['time3'];
        $adult = $_POST['adult'];
        $trailer =$_POST['child'];
        $description = $_POST['description'];
        $sDate = $_POST['stdate'];
        $eDate = $_POST['endate'];
        
        $movieimg = $_FILES['movieimg']['name'];
        $movieimg1 = $_FILES['movieimg1']['name'];
        $movieimg2 = $_FILES['movieimg2']['name'];
        $movieimg3 = $_FILES['movieimg3']['name'];
        
        $tempimage = $_FILES['movieimg']['tmp_name'];
        $tempimage1 = $_FILES['movieimg1']['tmp_name'];
        $tempimage2 = $_FILES['movieimg2']['tmp_name'];
        $tempimage3 = $_FILES['movieimg3']['tmp_name'];
        
        move_uploaded_file($tempimage,"image/$movieimg");
        move_uploaded_file($tempimage1,"image/$movieimg1");
        move_uploaded_file($tempimage2,"image/$movieimg2");
        move_uploaded_file($tempimage3,"image/$movieimg3");
        
        $chsql1 = "SELECT * FROM movie_list WHERE movie_id='$movieid'";
        $reslt1 = mysqli_query($conn,$chsql1);
        if(mysqli_num_rows($reslt1) > 0){
            echo "<script>alert('This Movie Id alrady excest')</script>";
        }
        else{
            $sql = "INSERT INTO movie_list(movie_id,movie_img,movie_img1,movie_img2,movie_img3,movie_name,movie_catogry,startDate,endDate,time_1,time_2,time_3,price_adult,Trailer,description) VALUES ('$movieid','$movieimg','$movieimg1','$movieimg2','$movieimg3','$moviename','$cato','$sDate','$eDate','$time1','$time2','$time3','$adult','$trailer','$description')";

            $addmovie = mysqli_query($conn,$sql);
            if($addmovie){
                echo"<script>alert('Movie added successfuly')</script>";
                }
            }
        }
?>

<!doctype html>
<html>
<head>
	<title>add movie</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />    
    <link href="assets/css/animate.min.css" rel="stylesheet"/> 
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
<!--    <link href="assets/css/demo.css" rel="stylesheet" /> -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery-ui.theme.css">
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" >
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                    Rex Cinema
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="panel.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="bookimg.php">
                        <i class="pe-7s-note2"></i>
                        <p>Booking</p>
                    </a>
                </li>
                <li>
                    <a href="canclebooking.php">
                       <i class="pe-7s-shield"></i>
                        <p>Cancled Booking</p>
                    </a>
                </li>
                <li>
                    <a href="currentmlist.php">
                        <i class="pe-7s-wallet"></i>
                        <p>Current Movie List</p>
                    </a>
                </li>
                <li class="active">
                    <a href="addmovie.php">
                        <i class="pe-7s-upload"></i>
                        <p>Add New Movie</p>
                    </a>
                    <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                        <li><a href="#">Action</a></li>
                        
                    </ul>
                </li>
                <li>
                    <a href="up-movie.php">
                        <i class="pe-7s-graph"></i>
                        <p>Add-Upcomings</p>
                    </a>
                </li>

            </ul>
    	</div>
    </div>
    <div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Add Movie</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="pe-7s-timer"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li>
                           <a href="">
                                <i class="pe-7s-search"></i>
								<p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               <p>Account</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
										Dropdown
										<b class="caret"></b>
									</p>

                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action1</a></li>
                                <li><a href="#">Action2</a></li>
                                <li><a href="#">Action3</a></li>
                                <li><a href="#">Action4</a></li>
                                <li><a href="#">Action5</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="logout.php">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add Your Movie</h4>
                            </div>
                            <div class="content">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Movie ID</label>
                                                <input type="text" class="form-control" name="movieid"  placeholder="Movie ID" required>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Movie Image 1</label>
                                                    <input type="file" class="form-control" name="movieimg" required>
                                                </div>
                                        </div>
                                         <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Movie Image 2</label>
                                                    <input type="file" class="form-control" name="movieimg1" required>
                                                </div>
                                        </div>
                                         <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Movie Image 3</label>
                                                    <input type="file" class="form-control" name="movieimg2" required>
                                                </div>
                                        </div>
                                         <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Movie Image 4</label>
                                                    <input type="file" class="form-control" name="movieimg3" required>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Movie Name</label>
                                                    <input type="text" class="form-control" name="moviename" placeholder="Username" required>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Movie Category</label>
                                                    <input type="text" class="form-control" name="cato" placeholder="Movie Category(Acction/Adventure)" required>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Start Date</label>
                                                    <span class='add-on'><i class='fa fa-calendar'></i></span>
                                                    <input type="text" id="stdt" class="form-control" name="stdate" placeholder="Click Here">
                                                    
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                             <div class="form-group">
                                                <label>End Date</label>
                                                    <span class='add-on'><i class='fa fa-calendar'></i></span>
                                                    <input type="text" id="endt" class="form-control" name="endate" placeholder="Click here">                                                   
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Show Time One</label>
                                                <input type="text" class="form-control" name="time1" placeholder="Show Time One">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Show Time Two</label>
                                                <input type="text" class="form-control" name="time2" placeholder="Show Time Two">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Show Time Three</label>
                                                <input type="text" class="form-control" name="time3" placeholder="Show Time Three">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Ticket Price</label>
                                                <input type="text" class="form-control" name="adult" placeholder="Price(Rs)">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Trailer Link</label>
                                                <input type="text" class="form-control" name="child" placeholder="Link">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Movie Description</label>
                                                <textarea rows="5" class="form-control" name="description"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" name="submit" class="btn btn-info btn-fill pull-right">Upload Movie</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </footer>

    </div>
</div>
</div>
</div>

</body>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/chartist.min.js"></script>
    <script src="assets/js/bootstrap-notify.js"></script>
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script>
        var minDate = new Date();
        $(document).ready(function(){
            $("#stdt").datepicker({
                showAnim: 'drop',
                dateFormat: 'yy-mm-dd',
                minDate: minDate,
                onclose:function(selectedDate){
                    $('#endt').datepicker("option", "minDate", selectedDate );
                }
            });
            $("#endt").datepicker({
                showAnim: 'drop',
                dateFormat: 'yy-mm-dd',
                minDate: minDate,
                onclose:function(selectedDate){
                    $('#stdt').datepicker("option", "minDate", selectedDate );
                }
            });
        });
    </script>
</html>

