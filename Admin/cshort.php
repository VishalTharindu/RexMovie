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
<!doctype html>
<html>
<head>

	<title>Rex Cinema Addmin panel</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <link href="assets/font-awesome/css/font-awesome.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
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
                <li class="active">
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
                <li>
                    <a href="addmovie.php">
                        <i class="pe-7s-upload"></i>
                        <p>Add New Movie</p>
                    </a>
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
                    <a class="navbar-brand" href="#">Cancled Booking</a>
                </div>
                <div class="collapse navbar-collapse">
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
                                <h4 class="title">Cancle Booking Details</h4>
                                <p class="category">Date</p>
                            </div>
                            <div class="content">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Select Category</label>
                                                <select class="form-control" name="cateo">
                                                    <option value='mvid'>MovieId</option>
                                                    <option value="date">Date</option>
                                                    <option value="time">Time</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Enter Detail</label>
                                                <input type="text" class="form-control" name="det"  required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-info btn-fill pull-right">Short</button>
                                </form>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Movie ID</th>
                                    	<th>Movie Name</th>
                                        <th>Date</th>
                                    	<th>time</th>
                                    	<th>Email</th>
                                    	<th>NIC</th>
                                        <th>Seat No</th>
                                        <th>Phone NO</th>
                                    </thead>
                                    <?php
                                        if(isset($_POST['submit'])){
                                            $ceto = mysqli_real_escape_string($conn, $_POST['cateo']);
                                            $detail = mysqli_real_escape_string($conn, $_POST['det']);
                                            if($ceto == 'mvid'){
                                                $sql = "SELECT * FROM cancledbookimg WHERE MovieId='$detail' ORDER BY 1 DESC";
                                                $redatils = mysqli_query($conn,$sql);
                                                while($rowBooking = mysqli_fetch_array($redatils)){
                                                    $movieId = $rowBooking['MovieId'];
                                                    $movieName = $rowBooking['MovieName'];
                                                    $Date = $rowBooking['Date'];
                                                    $Time = $rowBooking['Time'];
                                                    $seatNo = $rowBooking['SeatNo'];
                                                    $Email= $rowBooking['Email'];
                                                    $NIC = $rowBooking['Nic'];
                                                    $phoneNumber = $rowBooking['phoneNo'];
                                                    $CrId = $rowBooking['id'];
                                                    echo"
                                                        <tbody>
                                                            <tr class='success'>
                                                                <td>$movieId</td>
                                                                <td>$movieName</td>
                                                                <td>$Date</td>
                                                                <td>$Time</td>
                                                                <td>$Email</td>
                                                                <td>$NIC</td>
                                                                <td>$seatNo</td>
                                                                <td>$phoneNumber</td>
                                                            </tr>
                                                        </tbody>
                                                        ";
                                                    }
                                                }
                                            if($ceto == 'date'){
                                                $sql = "SELECT * FROM cancledbookimg WHERE Date='$detail' ORDER BY 1 DESC";
                                                $redatils = mysqli_query($conn,$sql);
                                                while($rowBooking = mysqli_fetch_array($redatils)){
                                                    $movieId = $rowBooking['MovieId'];
                                                    $movieName = $rowBooking['MovieName'];
                                                    $Date = $rowBooking['Date'];
                                                    $Time = $rowBooking['Time'];
                                                    $seatNo = $rowBooking['SeatNo'];
                                                    $Email= $rowBooking['Email'];
                                                    $NIC = $rowBooking['Nic'];
                                                    $phoneNumber = $rowBooking['phoneNo'];
                                                    $CrId = $rowBooking['id'];
                                                    echo"
                                                        <tbody>
                                                            <tr class='success'>
                                                                <td>$movieId</td>
                                                                <td>$movieName</td>
                                                                <td>$Date</td>
                                                                <td>$Time</td>
                                                                <td>$Email</td>
                                                                <td>$NIC</td>
                                                                <td>$seatNo</td>
                                                                <td>$phoneNumber</td>
                                                            </tr>
                                                        </tbody>
                                                        ";
                                                    }
                                                }
                                            if($ceto == 'time'){
                                                $sql = "SELECT * FROM cancledbookimg WHERE Time='$detail' ORDER BY 1 DESC";
                                                $redatils = mysqli_query($conn,$sql);
                                                while($rowBooking = mysqli_fetch_array($redatils)){
                                                    $movieId = $rowBooking['MovieId'];
                                                    $movieName = $rowBooking['MovieName'];
                                                    $Date = $rowBooking['Date'];
                                                    $Time = $rowBooking['Time'];
                                                    $seatNo = $rowBooking['SeatNo'];
                                                    $Email= $rowBooking['Email'];
                                                    $NIC = $rowBooking['Nic'];
                                                    $phoneNumber = $rowBooking['phoneNo'];
                                                    $CrId = $rowBooking['id'];
                                                    echo"
                                                        <tbody>
                                                            <tr class='success'>
                                                                <td>$movieId</td>
                                                                <td>$movieName</td>
                                                                <td>$Date</td>
                                                                <td>$Time</td>
                                                                <td>$Email</td>
                                                                <td>$NIC</td>
                                                                <td>$seatNo</td>
                                                                <td>$phoneNumber</td>
                                                            </tr>
                                                        </tbody>
                                                        ";
                                                    }
                                                }
                                            }
                                    ?>
                                </table>

                            </div>
                        </div>
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


</body>

    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/chartist.min.js"></script>
    <script src="assets/js/bootstrap-notify.js"></script>
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

</html>

