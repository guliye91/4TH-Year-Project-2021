<?php
require_once("../incs/authenticator.php");

require_once("../../assets/libs/tcpdf/tcpdf.php");
 function fetch_data()  
 {  
      $output = '';
      require_once("../incs/conn.php");
  
      $sql = "SELECT * FROM failed_logins ORDER BY id ASC";  
      $result = mysqli_query($dbc, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          <td>'.$row["ip"].'</td>  
                          <td>'.$row["device"].'
                          <br/>'.$row["deviceName"].'
                          </td>   
                          <td>'.$row["userAgent"].'</td>
                          <td>'.$row["failedString"].'
                          <br/>'.$row["failedPass"].'
                          </td>
                          <td>'.$row["status"].'</td>
                          <td>'.$row["dateProccessed"].'</td>
                     </tr>  
                          ';  
      }  
      return $output;  
 } 
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT,PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetAutoPageBreak(TRUE,PDF_MARGIN_BOTTOM);


if(@file_exists(dirname(_FILE_).'/lang/eng.php')){
    require_once(dirname(_FILE_).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

$pdf->SetFont('helvetica', '',9);
$pdf->AddPage();
$printedOn = date("H:i:s F d Y ");
$content = '';  
      $content .= '  
      <h4 align="center">ACCESS LOGS - FAILED LOGINS</h4><br />
      <p>Printed On '.$printedOn.' </p>
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th>Ip</th>  
                <th>Device & Device Name</th>   
                <th>User Agent</th>
                <th>Failed String</th>
                <th>Status</th>
                <th>Date Proccessed</th>
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
$pdf->writeHTML($content, true, 0, true, 0);
$pdf->lastPage();
$pdf->Output('logs.'.$printedOn.'.pdf', 'I');

?>