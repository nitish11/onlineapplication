<?php include 'php_files/header.php';?>
<script>
function getapp(apid)
{
document.frm_getap.appid.value = apid;
document.frm_getap.submit();
}
function fillfrm(apid)
{
document.frm_fillfrm.fid.value = apid;
document.frm_fillfrm.submit();
}
</script>
<?php include 'php_files/header2.php';
if(isset($_SESSION["aid"]))
{
echo "<h4>Pending Forms</h4><form name='frm_getap' action='applicationview.php' method='POST'><input type='hidden' name='appid' /><ul>";
$aid = $_SESSION["aid"];
$res1 = mysql_query("select * from fid_fname where aid='$aid'")or die(mysql_error()) ;
while($ar1 = mysql_fetch_array($res1))
  {
  $fdata = "data".$ar1["fid"];
  $fid = $ar1["fid"];
  $res2 = mysql_query("select * from $fdata where result=0") or die(mysql_error());
  while($ar2 = mysql_fetch_array($res2)){
  $uid = $ar2["uid"];
  $appid= $ar2["appid"];
  $res3 = mysql_query("select * from fid_fname where fid='$fid'");
  $ar3 = mysql_fetch_array($res3);
  $res4 = mysql_query("select * from users where uid='$uid'");
  $ar4 = mysql_fetch_array($res4);
  echo "<li><a href='#' onClick=\"getapp('".$appid."')\">".$ar3["fname"]." by ".$ar4["name"]."</a></li>";
  }
  }
  echo "</ul></form>";
}
else if(isset($_SESSION["uid"]))
{
echo "<h4>Applications</h4><form name='frm_fillfrm' action='fshow.php' method='POST'><input type='hidden' name='fid' /><ul>";
$res = mysql_query("select * from fid_fname");
while($ar = mysql_fetch_array($res))
  {
  echo "<li><a href='#' onClick=\"fillfrm('".$ar["fid"]."')\">".$ar["fname"]."</li>";
  }
echo "</ul></form>";
}
else 
{
echo "<h5> Welcome to Online Form Portal </h5>";
}
?>
<?php include 'php_files/footer.php';?>
     