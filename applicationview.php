<?php include 'php_files/header.php';?>

<script>

function formsubmit(status)
{
	if(status=="Accept")
		{
		document.frm.status.value='Accept';
		document.frm.submit();
		}
	else
		{
		document.frm.status.value='Reject';		
		document.frm.submit();
		}
}
</script>
<?php include 'php_files/header2.php';?>
	  

<?php
if(isset($_SESSION["aid"]))
{
$appid = $_POST["appid"];
$_SESSION["appid"]=$appid;
$query = "select fid from appid_fid where appid='$appid'";
$r = mysql_query($query,$con) or die(mysql_error());
$out = mysql_fetch_array($r);
$formid = $out["fid"];
$detformid = "det".$formid;
$dataformid = "data".$formid;

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

echo "<h4>".$msg."</h4><br><table width='70%' border='1px'>"; 

echo "<tr><td width='50%'><font align='left' face='Cambria' size='4'><b>NAME</b></font></td><td width='50%'><font align='left' face='Cambria' size='4'><b>  ".$o3["name"]."</b></font></td></tr>";

echo "<tr><td width='50%'><font align='left' face='Cambria' size='4'><b>DESIGNATION</b></font></td><td width='50%'><font align='left' face='Cambria' size='4'><b>  ".$o3["designation"]."</b></font></td></tr>";

$query1 = "select * from $detformid";
$r1 = mysql_query($query1,$con) or die(mysql_error());
while($out1 = mysql_fetch_array($r1))
{	
	$column = strtoupper($out1["label"]);
	$column = str_replace('_',' ',$column);
	echo "<tr><td width='50%'><font align='left' face='Cambria' size='4'><b>".$column."</b></font></td><td width='50%'><font align='left' face='Cambria' size='4'><b>  ".$out2[$out1['label']]."</b></font></td></tr>";
}
echo "</table>";


$detailst = $detformid;
$datat = $dataformid;
$res1 = mysql_query("select * from $detailst where maxval!=0");
$ar1 = mysql_fetch_array($res1);
$mval = $ar1["maxval"];
$anaf = $ar1["label"];
$anafs = str_replace("_"," ",$anaf);
$anafs = strtoupper($anafs);
echo "<h5>".$anafs." Analysis</h5><br>";
$res2 = mysql_query("select * from users where uid='$uid'");

   
   $res3 = mysql_query("select SUM($anaf) as 'NODY' from $datat where uid='$uid' and result=1");
   $ar3 = mysql_fetch_array($res3);
   echo "<table><tr height='30px'><td>".$uname."</td><td><img src='./images/progress.jpg' width='".($ar3["NODY"]/$mval*400)."px' height='13px'></img>".($ar3["NODY"]/$mval*100)."%</td></tr>";
   
   echo "</table>";

echo "<form name='frm' id='frm' method='POST' action='./mail.php'>";

echo "<input type='hidden' name='status'/>";
echo "<br><br><input type='button' value='Accept' id='status1' name='status1' onClick=\"formsubmit('Accept')\"/>";
echo "<input type='button' value='Reject' id='status2' name='status1' onClick=\"formsubmit('Reject')\"/></form></center>"; 
}
?>
<?php include 'php_files/footer.php';?>