<?php

    session_start();

    include('phpcode/db.inc.php');

    error_reporting(E_PARSE | E_ERROR);
?>
<?php 
    if(!isset($_SESSION['useremail'])){
        echo"<script>window.open('loging.php','_self')</script>";
    }
    function USDToLKR(){

    $api = "https://free.currencyconverterapi.com/api/v6/convert?q=USD_LKR&compact=ultra&apiKey=491f2df2245e22b2ce22";
    $value = json_decode(file_get_contents($api),true);
    $rate = $value['USD_LKR'];
    return $rate;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>payment</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="resources/css/boostrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="resources/css/styles.css">
    <link rel="stylesheet" type="text/css" href="resources/css/demo.css">
</head>

<body>
    <div class="container-fluid">
        <header>
            
        </header>
        <div class="creditCardForm">
            <div class="heading">
                <h1>Confirm Purchase</h1>
            </div>
            <?php
            $email = $_SESSION['useremail'];
            $sql = "SELECT * FROM userbooking WHERE Email='$email'";
            $result = mysqli_query($conn,$sql);
            while($rowres = mysqli_fetch_array($result)){
                $movID = $rowres['movirID'];
                $email = $rowres['Email'];
                $NIC = $rowres['NIC'];
                $Totalps = round($rowres['TotalPr']/USDToLKR(),2);
//                $movID = $rowres['movirID'];
            }
            echo"
                <div class='payment'>
                <form action='https://www.sandbox.paypal.com/cgi-bin/webscr' method='post' id='payment-form'>
                    <input type='hidden' name='business' value='rexcinema@uwu.lk'>
                    <input type='hidden' name='cmd' value='_cart'>
                    <input type='hidden' name='upload' value='1'>
                    <input type='hidden' name='currency_code' value='USD'>
                    <input type='hidden' name='return' value='http://localhost/project1/paysub.php'>
                    <input type='hidden' name='cancel_return' value='http://localhost/project1/movie.php'>
				<div class='form-row'>
                        <label >Movid ID</label>
                        <input type='text' class='form-control' value='$movID' id='custid'>
                    </div>
					<div class='form-row'>
                        <label >Email</label>
                        <input type='text' class='form-control' value='$email' id='email'>
                    </div>
                    <div class='form-group owner'>
                        <label for='owner'>NIC</label>
                        <input type='text' class='form-control' value='$NIC' id='owner'>
                    </div>
                    <div class='form-group' id='card-number-field'>
                        <label for='cardNumber'>Total Price</label>
                        <input type='text' class='form-control' value='$Totalps' id='cardNumber'>
                    </div>
                    
                    
                    
                    
                    <input type='hidden' name='item_name_1' value='$movID'>
                    <input type='hidden' name='item_number_1' value='1'>
                    <input type='hidden' name='amount_1' value='$Totalps'>
                    <input type='hidden' name='quantity1' value='1'>
                    
                    
                    
                    <button type='submit' name='submit' class='btn btn-primary'>Pay</button>
                </form>
                <br><br>
            </div>   
            ";
            ?>
        </div>



       
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="resources/js/jquery.payform.min.js" charset="utf-8"></script>
    <script src="resources/js/script.js"></script>
</body>

</html>
