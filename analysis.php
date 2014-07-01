<?php include 'php_files/header.php';?>
<script>
function analyse(apid)
{
document.frm_analyse.fid.value = apid;
document.frm_analyse.submit();
}
</script>
<?php include 'php_files/header2.php';
if(isset($_SESSION["aid"]))
{
$aid = $_SESSION["aid"];
$res1 = mysql_query("select * from fid_fname where aid='$aid'");
echo "<h4>Analysis</h4><form name='frm_analyse' action='viewanalysis.php' method='post'><input type='hidden' name='fid'><ul>";
while($ar1 = mysql_fetch_array($res1))
   {
   $fid = $ar1["fid"];
   $res2 = mysql_query("select * from fid_fname where fid='$fid'");
   $ar2 = mysql_fetch_array($res2);
   echo "<li><a href='#' onClick=\"analyse('".$fid."')\">".$ar2["fname"]."</a></li>";
   }
}
echo "</ul>";
?>
<?php include 'php_files/footer.php';?>