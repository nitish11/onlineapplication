<?php include 'php_files/header.php';?>
<?php include 'php_files/header2.php';
?>
<?php
$fid = $_POST["fid"];
$detailst = "det".$fid; 
$datat = "data".$fid;
$res1 = mysql_query("select * from $detailst where maxval!=0");
while($ar1 = mysql_fetch_array($res1))
{
$mval = $ar1["maxval"];
$anaf = $ar1["label"];
$anafs = str_replace("_"," ",$anaf);
$anafs = strtoupper($anafs);
echo "<h4>".$anafs." Analysis</h4><br>";
echo "<h5>Statistics</h5>";
$res4 = mysql_query("select MAX($anaf) as 'MAXV' from $datat where result=1");
$ar4 = mysql_fetch_array($res4);
$res5 = mysql_query("select MIN($anaf) as 'MINV' from $datat where result=1");
$ar5 = mysql_fetch_array($res5);
$res6 = mysql_query("select AVG($anaf) as 'AVGV' from $datat where result=1");
$ar6 = mysql_fetch_array($res6);
echo "<ul><li>Maximum $anafs : <strong>".$ar4["MAXV"]."</strong></li><li>Minimum $anafs : <strong>".$ar5["MINV"]."</strong></li><li>Average $anafs : <strong>".$ar6["AVGV"]."</strong></li><li>Total $anafs per user : <strong>$mval</strong></li></ul><h5>User Data</h5><table>";

$res2 = mysql_query("select * from users");
while($ar2 = mysql_fetch_array($res2))
   {
   $uid = $ar2["uid"];
   $uname = $ar2["name"];
   $res3 = mysql_query("select SUM($anaf) as 'NODY' from $datat where uid='$uid' and result=1");
   $ar3 = mysql_fetch_array($res3);
   echo "<tr height='30px'><td>".$uname."</td><td><img src='./images/progress.jpg' width='".($ar3["NODY"]/$mval*400)."px' height='13px'></img>".($ar3["NODY"]/$mval*100)."%</td></tr>";
   }
   echo "</table>";
}
?>
<?php include 'php_files/footer.php';?>