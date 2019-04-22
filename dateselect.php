<?php 
    session_start();
    include('phpcode/db.inc.php');
?>
<?php 
    if(!isset($_SESSION['useremail'])){
        echo"<script>window.open('loging.php','_self')</script>";
    }
?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="resources/css/boostrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="resources/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="resources/css/dataselect.css">
        <link rel="stylesheet" type="text/css" href="resources/Date-Picker-Bootstrap/css/datepicker.css">
        
        
    </head>
    <body>
        <div class="container">
            
			<div class="row well">
				<div class="span10">
                    <?php
                        if(isset($_GET{'movieId'})){
                            $movieId=$_GET['movieId'];
                            $sql = "SELECT * FROM movie_list WHERE id=$movieId";
                            $movieList = mysqli_query($conn,$sql);
                            
                            while($rowMovie = mysqli_fetch_array($movieList)){
                                $Time1 = $rowMovie['time_1'];
                                $Time2 = $rowMovie['time_2'];
                                $Time3 = $rowMovie['time_3'];
                                $image = $rowMovie['movie_img'];
                                $image2 = $rowMovie['movie_img2'];
                                $movieID = $rowMovie['movie_id'];
                            }
                        }
                    echo"
                    <div class='row'>
                    <div class='col-md-6'>
                    <img src='Admin/image/$image' class='img-fluid'>
                    </div>
                    <hr>
                    <div class='col-md-6'>
                    <img src='Admin/image/$image2' class='img-fluid'>
                    </div>
                    </div>
                    ";
           
                    echo"
					<form action='seatsless.php' method='POST'>
						<center>
							<label>Date of movie</label>

                            <div class='fld'>
                            <input type='text' value='$movieID' name='movieid' size='16' class='span2' required>
                            </div>
                            <div class='fld'>
                            <input type='text' name='email' size='16' class='span2' placeholder='Enter Your Email' required>
                            </div>
							<div data-date-format='yyyy-mm-dd' data-date='document.write(date())' class='input-append date myDatepicker'>
                                
							    <input type='text' value='' name='doj' size='16' class='span2' required>
							    <span class='add-on'><i class='fa fa-calendar'></i></span>
                                <select name = 'time' class='span2'>
                                    <option value = '$Time1'>$Time1</option>
                                    <option value = '$Time2'>$Time2</option>
                                    <option value = '$Time3'>$Time3</option>
                                </select>
							</div>


<!--							<input type='date' class='span2' name='doj' placeholder='YYYY-MM-DD' required/>-->
							<br><br>
							<button type='submit' class='btn btn-info'>Submit</button>
                            <button type='submit' class='btn btn-danger'>Back</button>
							<button type='reset' class='btn'>
								<i class='icon-refresh icon-black'></i> Clear
							</button>
<!--							<a href='./login.php' class='btn btn-danger'><i class='icon-remove icon-white'></i> Cancel Ticket </a>-->
						</center>
					</form>
				</div>
                ";
                ?>
			</div>
		</div>
        </div>
<!--
        <div class="container">
            <div class="row well">
                <div class="span10">
                    <form method="POST">
                        <center>
                            <lable>Datet of film</lable>
                            <div data-date-format="yyyy-mm-dd" data-date="document.write(date())" class="input-append date myDatepicker">
                                <div class="dtinput">
                                    <input type="text" value="" name="doj" size="16" class="span2" required>
                                    <span class="add-on"><i class="fa fa-calendar"></i></span>
                                </div>
                                <br />
                                <button class="submit" class="btn btn-info">submil</button>
                                <button type="submit" class="btn btn-info">
								<i class="icon-ok icon-white"></i> Submit
							</button>
							<button type="reset" class="btn">
								<i class="icon-refresh icon-black"></i> Clear
							</button>
							<a href="./login.php" class="btn btn-danger"><i class="icon-remove icon-white"></i> Cancel Ticket </a>
                            </div>
                        </center>
                    </form>
               </div>
            </div>
        </div>
-->
        <script src="resources/js/bootstrap.min.js"></script>
        <script src="resources/js/popper.min.js"></script>
        <script src="resources/js/jquery-3.3.1.min.js"></script>
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
    </body>
</html>