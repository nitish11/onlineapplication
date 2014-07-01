<?php include 'php_files/header.php';?>
<?php include 'php_files/header2.php';?>
<?php
$fidid= $_POST["fid"];
$fid = "data" . $fidid ;
$query = mysql_query("select appid from appid_fid order by appid desc");
$fres = mysql_fetch_array($query);
$appid = $fres["appid"] + 1;
$query = mysql_query("insert into appid_fid (appid,fid) values ($appid,'$fidid')");

$queryi = "insert into ".$fid. "  values('"; 
$row = $_POST['rows'];
$content = "" ;
for($i = 1 ; $i <= $row ; $i++)
{
$type = $_POST['type' . $i];
switch ($type)
	{
	case 'text':
	$content = $_POST[$i];
	break;
	
	case 'para':
	$content = $_POST[$i];
	break;
	case 'number':
	$content = $_POST[$i];
	break;
	
	case 'dropdown':
	$content = $_POST[$i];
	break;
	
	
	case'checkbox':
	$content = "";
	$opt = $_POST['totopt'.$i];
	for($j=1;$j<=$opt;$j++)
		{
		$content = $content . $_POST[$i . $j];
		}
	
	break;
	
	
	case 'radio':
	$content = $_POST[$i];
	break;
	
	}
	$queryi = $queryi . $content."','";


}
$uid = $_SESSION["uid"];
//$uid = "tester";
$queryi = $queryi . $uid . "' , '" . $appid . "' , '0') ";
$insert = mysql_query("$queryi",$con) or die(mysql_error() . "INSERT");

echo "<table><tr><td>Your form has been submitted and you shall be notified as soon as the admin takes an action. <br><br>Thankyou </td></tr></table>"

?>
<?php include 'php_files/footer.php';?>