<?php
require_once("../incs/authenticator.php");
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
$date = $_SESSION['dateReceived2'];
$activity = $_SESSION['cyber'];
$amount = $_SESSION['overallCharges'];
$dateP = $_SESSION['dateProcessed'];
$by = $_SESSION['username'];


$html = '<div>
<h4 class="grey-text center">Delta Technologies Center</h4>
<h6>Receipt</h6>
<p><b>Date Received:</b><br/>'.$date.'</p>
<p><b>Activity Perfomed:</b><br/>'.$activity.'</p>
<p><b>Amount Paid:</b><br/>'.$amount.'</p>
<p><b>Processed on: </b> '.$dateP. '<b>by</b> '.$by.'</p>


</div>';
$pdf->writeHTML($html, true, 0, true, 0);
$pdf->lastPage();
$pdf->Output('receipt'.$activity.'.pdf', 'I');




?>