<?php include 'php_files/header.php';?>
<script>
</script>
<?php include 'php_files/header2.php';?>

<?php

if(isset($_SESSION["aid"]))
{
$aid = $_SESSION["aid"];
$appid = $_SESSION["appid"];
$status = $_POST["status"];

$query1 = "select fid from appid_fid where appid='$appid'";
$r1 = mysql_query($query1,$con) or die(mysql_error());
$o1 = mysql_fetch_array($r1);
$result1 = $o1["fid"];
$dataformid = "data".$result1;

$query4 = "select fname from  fid_fname where fid='$result1'";
$r4 = mysql_query($query4,$con) or die(mysql_error());
$o4 = mysql_fetch_array($r4);
$msg = $o4["fname"];

if($status=='Accept')
{
$query = "update $dataformid set result='1' where appid='$appid'";
$r = mysql_query($query,$con) or die(mysql_error());
$txt = "Your ".$msg." has been Accepted. <br>So, Collect your Receipt from Administration Section.";
}
else
{
$query = "update $dataformid set result='-1' where appid='$appid'";
$r = mysql_query($query,$con) or die(mysql_error());
$txt = "Sorry, Your ".$msg." has been Rejected. <br> For more information regardng rejection, please contact Administration Section.";
}

$query2 = "select uid from  $dataformid where appid='$appid'";
$r2 = mysql_query($query2,$con) or die(mysql_error());
$o2 = mysql_fetch_array($r2);
$result2 = $o2["uid"];

$query3 = "select mail from  users where uid='$result2'";
$r3 = mysql_query($query3,$con) or die(mysql_error());
$o3 = mysql_fetch_array($r3);
$tomail = $o3["mail"];



$q = "select email from admin where aid='$aid'";
$res = mysql_query($q,$con) or die(mysql_error());
$out = mysql_fetch_array($res);
$frommail = $out["email"];

$to = "".$tomail."";
$subject = $msg;
$headers = "From: ".$frommail."" . "\r\n" .
"CC: director@iiitm.ac.in";
mail($to,$subject,$txt,$headers);
echo "<br><table><tr><td>To</td><td>: ".$to."</td></tr><tr><td>Subject</td><td>: ".$subject."</td></tr><tr><td>From</td><td>:".$frommail."</td></tr><tr><td>Message</td><td>:".$txt."</td></tr></table>";
echo "<script>alert('A notification E-mail sent to the Applicant')</script>";
if($status=='Accept')
{
$_SESSION["appid"]=$appid;
echo "<br><br><a href='./pdf/print.php' target='_blank'> Generate pdf to Print </a>";
echo "<br><br><a href='./index.php'> Go to Home </a>";
}
else
{
$_SESSION["appid"] ='';
echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=./index.php\">";
}
}
?>
<?php include 'php_files/footer.php';?>