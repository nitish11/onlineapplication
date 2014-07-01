<?php
session_start();
?>

<?php
//if(isset($_SESSION["aid"]))
{
require('html2fpdf.php');
$pdf=new HTML2FPDF();
$pdf->AddPage();
$appid = $_SESSION["appid"] ;
$file = "application" . $appid . ".html" ;
$fp = fopen($file,"r");
$strContent = fread($fp, filesize("application".$appid.".html"));
fclose($fp);
$pfile = "application" . $appid . ".pdf" ;
$pdf->WriteHTML($strContent);
$pdf->Output($pfile);
echo "<script>alert('PDF Created')</script>";
$_SESSION["appid"] ='';
echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=$pfile\">";

}
?>
