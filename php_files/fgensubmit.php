<?php
include 'conn.php';
if($_SESSION["logged"] == 1)
{
$fname = $_POST["frmname"];
$fadmin = $_POST["fadmin"];
/*
$fnames = explode(" ",$_POST["frmname"]);
$fname = "";
foreach($fnames as $x)
$fname = $fname . "_" . $x;
*/
$query = mysql_query("select fid from fid_fname order by fid desc");
$fres = mysql_fetch_array($query);
$fid = $fres["fid"] + 1;
$query = mysql_query("insert into fid_fname (fid,fname,aid) values ($fid,'$fname','$fadmin')");
$fdet = "det" . $fid;
$finfo = "data" . $fid;
$query = mysql_query("CREATE TABLE `sad`.`$fdet` (`label` VARCHAR( 30 ) NOT NULL ,`type` VARCHAR( 20 ) NOT NULL ,`man` int( 1 ) default 0,`maxlen` int( 3 ) default 0 ,`content` VARCHAR( 500 ) NOT NULL ,`analyze` int( 1 ) default 0 , `maxval` int( 11 ) default 0) ");
$create = "CREATE TABLE `sad`.`" . $finfo . "` (";
$rows = $_POST["totrow"];
for( $i = 1 ; $i<= $rows ; $i++ )
{
$queryi = "insert into `sad`.`" . $fdet . "` (`label`, `type`, `man`, `maxlen`, `content`, `analyze`, `maxval`) VALUES (";
$field = strtolower($_POST["field" . $i]);
$field = str_replace(' ','_',$field);
$create = $create . "`" . $field . "` "  ;  
$type = $_POST["type" . $i];
$queryi = $queryi . "'" . $field . "', '" . $type . "'" ;
$content = " ";
$analyze = $_POST["chkimp" . $i ];
	if($_POST["man" . $i ])
	{
	$mand = 1;
	$mandatory = "NOT NULL ";
	}
	else 
	{
	$mandatory = " " ;
	$mand =0 ;
	}
switch($type)
	{
	case "radio":
	$create = $create . "VARCHAR" . "( " . 50 . " ) " ;
	$queryi = $queryi . " , '0' , ";
	$opts = $_POST["totopt" . $i];
	for($j = 1 ; $j <= $opts ; $j++)
		{
		$content = $content .  $_POST["opt" . $j . $i] . "+" ;
		}
		$queryi = $queryi . " '0' , '" . $content . "' , '0' , '0' " ;
	break;
	case "checkbox":
	$create = $create . "VARCHAR" . "( " . 50 . " ) " . $mandatory ;
	
	$queryi = $queryi . " , '" . $mand . "' , ";
	
	$opts = $_POST["totopt" . $i];
	for($j = 1 ; $j <= $opts ; $j++)
		{
		$content =  $content .  $_POST["opt" . $j . $i] . "+" ;
		}
		$queryi = $queryi . " '0' , '" . $content . "' , '0' , '0' " ;
	break;
	case "dropdown":
	$create = $create . "VARCHAR" . "( " . 50 . " ) " . $mandatory;
	$queryi = $queryi . " , '0' , ";
	$opts = $_POST["totopt" . $i];
	for($j = 1 ; $j <= $opts ; $j++)
		{
		$content =  $content .  $_POST["opt" . $j . $i] . "+" ;
		}
		$queryi = $queryi . " '0' , '" . $content . "' , '0' , '0' " ;
	break;
		case "text":
		
		$queryi = $queryi . " , '" . $mand . "' , ";
	$maxlen = $_POST["ln" . $i];
	if(!$maxlen)
	$maxlen = 50;
	$create = $create . "VARCHAR" . "( " . $maxlen . " ) " . $mandatory;
	$queryi = $queryi . " '" . $maxlen . "' , '" . $content . "' , '0' , '0' " ;
	break;
	case "number":

	$queryi = $queryi . " , '" . $mand . "' , ";
	if($analyze)
		{
		$analyze = 1;
		$maxval = $_POST["max" . $i ];
		}
	else 
		{
		$analyze = 0;
		$maxval = 0;
		}
	
	$maxlen = $_POST["ln" . $i];
	if(!$maxlen)
	$maxlen = 50;
	$create = $create . "INT" . "( " . $maxlen . " ) " . $mandatory;
	$queryi = $queryi . " '" . $maxlen . "' , '" . $content . "' , '" . $analyze . "' , '" . $maxval . "' " ;
	break;
	
	case "para":
	$queryi = $queryi . " , '" . $mand . "' , ";
	$maxlen = $_POST["ln" . $i];
	if(!$maxlen)
	$maxlen = 50;
	$create = $create . "VARCHAR" . "( " . $maxlen . " ) " . $mandatory;
	$queryi = $queryi . " '" . $maxlen . "' , '" . $content . "' , '0' , '0' " ;
	break;
	
	}
	 
	$queryi = $queryi . " )" ;

	//$queryi  = "INSERT INTO `sad`.`det_6` (`field`, `type`, `man`, `maxlen`, `content`, `analyze`, `maxval`) VALUES ('naam', 'text', '0', '23', ' ', '0', '0')";
	//echo  "<br>" . $queryi ."<br>";
	$queryf = mysql_query("$queryi",$con) or die(mysql_error());
	$create = $create . ", ";
}
$create = $create . " `uid` VARCHAR( 30 ) NOT NULL , `appid` INT( 30 ) NOT NULL , `result` INT( 30 ) default 0  )";
$tcreate = mysql_query("$create",$con) or die(mysql_error());
echo "<p>Your form has been successfully generated. Now it is available for use and analysis in the user and admin profiles respectively.</p>";
}
else echo "Please Login to view this page";
?>
