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
        <title>Date Selection</title>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>

        <link rel='stylesheet' type='text/css' href='vendors/css/normalize.css'>
        <link rel='stylesheet' type='text/css' href='resources/css/moviebooking.css'>
        <link rel='stylesheet' type='text/css' href='resources/css/boostrap/bootstrap.min.css'>
        <link href='resources/font-awesome/css/font-awesome.min.css' rel='stylesheet'>
        <link rel='stylesheet' href='vendors/css/animate.css'>
        <link rel="stylesheet" type="text/css" href="resources/Date-Picker-Bootstrap/css/datepicker.css">
    </head>
    <body>
        
        <?php
            
            include('incfile/headerinside.php');
        ?>
        
        <div class='container book'>
            <div class='row text-cente'>
                <?php
                if(isset($_GET['movieId'])){
                        $userEm = $_SESSION['useremail'];
                        $movieId = $_GET['movieId'];
                        $sql = "SELECT * FROM movie_list WHERE id=$movieId";
                        $movieList = mysqli_query($conn,$sql);
                        
                        while($rowMovie = mysqli_fetch_array($movieList)){
                            $mid = $rowMovie['id'];
                           $movieId = $rowMovie['movie_id'];
                            $MovieName = $rowMovie['movie_name'];
                            $Time1 = $rowMovie['time_1'];
                            $Time2 = $rowMovie['time_2'];
                            $Time3 = $rowMovie['time_3'];
                            $PriceAdult = $rowMovie['price_adult'];
                            $PriceChild = $rowMovie['price_child'];
                            $MovieImage = $rowMovie['movie_img'];
                            $Descrip = $rowMovie['description'];
                        }
                    }
                echo "
                <div class='col-md-6 movie-detail'>

                    <div class='col-md-6 pull-left'>
                     <img src='Admin/image/$MovieImage' class='img-fluid'>
                    </div>
                    <div class='col-md-6 pull-right instruc'>
                        <div class='instruc'>
                            <ul>
                                <li>Movie ID : <span>$movieId</span></li>
                                <li>Movie Name : <span>$MovieName</span></li>
                                <li>SHOW TIME :
                                    <span>
                                        <ul>
                                            <li>$Time1</li>
                                            <li>$Time2</li>
                                            <li>$Time3</li>
                                        </ul>
                                    </span>
                                </li>
                                <li>Ticket Price :<span>$PriceAdult</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <p>$Descrip</p>
                    </div>
                </div>
                ";
                
                echo "
                <div class='col-md-6'>
                    <div class='bok-form'>
                        <h4 class='text-center'>Date of movie</h4>
                            <div class='row'>
					           <form action='seattest.php' method='POST'>
                                    <div class='form-row'>
                                        <div class='form-group col-md-12'>
                                            <input type='text' value='$movieId' name='movieid' size='16' class='form-control' readonly>
                                        </div>
                                        <div class='form-group col-md-12'>
                                            <input type='text' name='email' value='$userEm' size='16' class='form-control' placeholder='Enter Your Email' readonly>
                                        </div>
                                        <div class='form-group col-md-12'>
							                 <div data-date-format='yyyy-mm-dd' data-date='document.write(date())' class='input-append date myDatepicker'>
							                     <input type='text' value='' name='doj' size='16' class='form-control' required>
							                     <span class='add-on'><i class='fa fa-calendar'></i></span>
							                 </div>
                                        </div>
                                        <div class='form-group col-md-12'>
                                            <select name = 'time' class='form-control'>
                                                <option value = '$Time1'>$Time1</option>
                                                <option value = '$Time2'>$Time2</option>
                                                <option value = '$Time3'>$Time3</option>
                                            </select>
                                        </div>
<!--							     <input type='date' class='span2' name='doj' placeholder='YYYY-MM-DD' required/>-->
							         <br><br>
                                        <div class='form-group col-md-12 text-cente'>
							                 <button type='submit' class='btn btn-info'>Submit</button>
                                             <button type='submit' class='btn btn-danger'>Back</button>
							                 <button type='reset' class='btn'>
								                <i class='icon-refresh icon-black'></i> Clear
							                 </button>
                                        </div>
<!--							<a href='./login.php' class='btn btn-danger'><i class='icon-remove icon-white'></i> Cancel Ticket </a>-->
					       </form>
				        </div>
                    </div>
                </div>
                ";
                    ?>
                </div>
            </div>
            <script src='resources/js/jquery-3.3.1.min.js'></script>
            <script src='resources/js/popper.min.js'></script>
            <script src='resources/js/bootstrap.min.js'></script>
            <script type="text/javascript" src="resources/js/jquery-latest.min.js"></script>
            <script>window.jQuery || document.write('<script src="js/jquery-latest.min.js">\x3C/script>')</script>
            <script type="text/javascript" src="resources/Date-Picker-Bootstrap/js/bootstrap-datepicker.js"></script>
            <script>
            $('.myDatepicker').each(function(){
                var minDate = new Date();
                minDate.setHours(0);
                minDate.setMinutes(0);
                minDate.setSeconds(0,0);
                
                var $picker = $(this);
                $picker.datepicker();
                
                var pickerObject = $picker.data('datepicker');
                
                $picker.on('changeDate', function(ev){
                    if(ev.date.valueOf() < minDate.valueOf()){
                        alert('you can not select past date');
                        pickerObject.setValue(minDate);
                        
                        ev.preventDefault();
                        return false;
                    }
                });
            });                  
        </script>
            <script type="text/javascript">
                function formSubmit(){
                    $.ajax({
                        type:'POST',
                        url:'phpcode/bookmovie.php',
                        data:$('#frmBox').serialize(),
                        success:function(response){
                            $('#success').html(response);
                        }
                    });
                    var form = document.getElementById('frmBox').reset();
                    return false;
                }
            </script>
        </div>
        
         <?php
            
            include('incfile/footer.php');
        ?>
        
    </body>
</html>
<?php 
    
?>
