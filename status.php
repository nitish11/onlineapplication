<?php include 'php_files/header.php';?>
<?php include 'php_files/header2.php';
if(isset($_SESSION["uid"]))
{
$uid = $_SESSION["uid"];
echo "<h4>My Applications</h4><ul>";
$res = mysql_query("select * from fid_fname");
while($ar = mysql_fetch_array($res))
  {
  $fid = $ar["fid"];
  $fname = $ar["fname"];
  $datat = "data".$fid;
  $res2 = mysql_query("select * from $datat where uid='$uid'");
  while($ar2 = mysql_fetch_array($res2))
     {
	 echo "<li>".$fname." - <strong>";
	 if($ar2["result"]==0)echo "Under Process</strong></li>";
	 else if($ar2["result"]==1)echo "Accepted</strong></li>";
	 else echo "Rejected</strong></li>";
	 }
  }
echo "</ul></form>";
}
?>
<?php include 'php_files/footer.php';?>
     