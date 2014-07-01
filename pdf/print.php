<?php
include '../php_files/conn.php';

?>


<?php
$c = "" ;
$c = "<html><head></head>
<body bgcolor=\"#FFFF00\">
<br><br>";
$aid = $_SESSION["aid"];

$appid = $_SESSION["appid"];
$query = "select fid from appid_fid where appid='$appid'";
$r = mysql_query($query,$con) or die(mysql_error());
$out = mysql_fetch_array($r);
$formid = $out["fid"];

$detformid = "det".$formid;
$dataformid = "data".$formid;

$query1 = "select * from $detformid";
$r1 = mysql_query($query1,$con) or die(mysql_error());

$query2 = "select * from $dataformid where appid='$appid'";
$r2 = mysql_query($query2,$con) or die(mysql_error());
$out2 = mysql_fetch_array($r2);
$uid = $out2["uid"];

$query3 = "select * from  users where uid='$uid'";
$r3 = mysql_query($query3,$con) or die(mysql_error());
$o3 = mysql_fetch_array($r3);

$query4 = "select fname from  fid_fname where fid='$formid'";
$r4 = mysql_query($query4,$con) or die(mysql_error());
$o4 = mysql_fetch_array($r4);
$msg = $o4["fname"];

$c = $c. "<center><h1><u>".strtoupper($msg)."</u></h1><br><table width='70%' >"; 

$c = $c. "<tr><td width='45%'><font align='left' face='Cambria' size='4'>NAME OF APPLICANT</font></td><td width='10%'>:</td><td width='45%'><font align='left' face='Cambria' size='4'><b>  ".$o3["name"]."</b></font></td></tr>";

$c = $c. "<tr><td width='45%'><font align='left' face='Cambria' size='4'>DESIGNATION</font></td><td width='10%'>:</td><td width='45%'><font align='left' face='Cambria' size='4'><b>  ".$o3["designation"]."</b></font></td></tr>";

while($out1 = mysql_fetch_array($r1))
{	
	$column = strtoupper($out1["label"]);
	$column = str_replace('_',' ',$column);
	$c = $c. "<tr><td width='45%'><font align='left' face='Cambria' size='4'>";
	$c = $c. $column;
	$c = $c. "</font><td width='10%'>:</td></td><td width='45%'><font align='left' face='Cambria' size='4'><b>  ";
	$c = $c. $out2[$out1['label']];
	$c = $c. "</b></font></td></tr>";
}
$c = $c. "</table></center><br><br>";


$q = "select * from admin where aid='$aid'";
$r = mysql_query($q,$con) or die(mysql_error());
$o = mysql_fetch_array($r);
$name = $o["aname"];
$post = $o["desig"];

$c = $c. "<br><br><font align='right' face='Cambria' size='4'>";
$c = $c. $name;
$c = $c. "<br>";
$c = $c. "(".$post.")";
$c = $c ."</font><br></body></html>" ;
 

$file = "application" . $appid . ".html" ;
$fc=fopen($file ,'w+');
fputs($fc,$c);
fclose($fc);
echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=./test.php\">";
?>