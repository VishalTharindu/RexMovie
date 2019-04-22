<?php
    
    include("phpcode/db.inc.php");
?>
<?php
    require('fpdf17/fpdf.php');
//require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World!');
$pdf->Output();

//    if(isset($_POST['submit'])){
//        
//        $Email = $_POST['Uemail'];
//        $NIC = $_POST['Unic'];
//        
//        $sql = "SELECT * FROM userbooking WHERE Email='$Email' AND NIC='$NIC'";
//        $result = mysql_query($conn,$sql);
//        $bbokde = mysqli_fetch_array($result);
//            $movieId = $rowBooking['movirID'];
//            $movieName = $rowBooking['movieName'];
//            $Date = $rowBooking['date'];
//            $Time = $rowBooking['time'];
//            $seatNo = $rowBooking['seatNo'];
//            $userName = $rowBooking['userName'];
//            $Email= $rowBooking['Email'];
//            $NIC = $rowBooking['NIC'];
//            $phoneNumber = $rowBooking['phoneNumber'];
//            $CrId = $rowBooking['id'];
        
    
            
        
    

        
//        $pdf = new FPDF('P','mm','A4');
//        
//
//        $pdf->AddPage();
//
//        $pdf->SetFont('Arial','B',20);
//        $pdf->Cell(130 ,5,'my page',0,0);
//        $pdf->Cell(120 ,5,'please work',0,0);
//        $pdf->Output();
        
//    }
    
//    $pdf->Output();
?>