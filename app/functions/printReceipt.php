<?php
require_once("../../incs/authenticator.php");
require_once("../../assets/libs/tcpdf/tcpdf.php");
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT,PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetAutoPageBreak(TRUE,PDF_MARGIN_BOTTOM);


if(@file_exists(dirname(_FILE_).'/lang/eng.php')){
    require_once(dirname(_FILE_).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

$pdf->SetFont('helvetica', '',9);
$pdf->AddPage();
$dateS = $_SESSION['dateSold'];
$name = $_SESSION['itemName'];
$quantity = $_SESSION['quantity'];
$amountc = $_SESSION['amountC'];
$amountp = $_SESSION['amountP'];
$discount = $_SESSION['discount'];
$cname = $_SESSION['cName'];
$ccontact = $_SESSION['cContact'];
$by = $_SESSION['proccessedBy'];
$dateP = $_SESSION['dateProccessed'];


$html = '
<!doctype html>
<html lang="en">

<head>
    
    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
   
</head>
<body>
<div class="row">
<h4 class="grey-text center">Receipt</h4>
<h6>Receipt</h6>
<div class="col-md-3">
     <p><span class="text-info">Date Sold:</span><br/>'.$dateS.'</p>
</div>
<div class="col-md-3">
     <p><span class="text-info">Item Name:</span><br/>'.$name.'</p>
</div>
<div class="col-md-3">
     <p><span class="text-info">Quantity:</span><br/>'.$quantity.'</p>
</div>
<div class="col-md-3">
     <p><span class="text-info">Amount Charged:</span><br/>'.$amountc.'</p>
</div>
 <div class="col-md-3">
   <p><span class="text-info">Amount Paid:</span><br/>'.$amountp.'</p>
</div>
 <div class="col-md-3">
   <p><span class="text-info">Discount:</span><br/>'.$discount.'</p>
</div>
 <div class="col-md-3">
   <p><span class="text-info">Customer Name:</span><br/>'.$cname.'</p>
</div>
 <div class="col-md-3">
   <p><span class="text-info">Customer Contact:</span><br/>'.$ccontact.'</p>
</div>
<div class="panel-footer">
  <i class="grey-text">Processed on: '.$dateP.' by 
    '.$by.' </i>
</div>

</div>
<script src="../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>';
$pdf->writeHTML($html, true, 0, true, 0);
$pdf->lastPage();
$pdf->Output('receipt'.$dateS.'.pdf', 'I');




?>