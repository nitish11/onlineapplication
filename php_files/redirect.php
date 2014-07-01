<?php
include 'conn.php';
$username = $_POST["user"];
$pass = $_POST["pass"];
$password = $pass;
$q = "select * from admin where aid = '$username'" ;
$result = mysql_query($q,$con) or die(mysql_error());
$sa = mysql_fetch_array($result);
$passw = $sa["apass"];
$q1 = "select * from users where uid = '$username'" ;
$result1 = mysql_query($q1,$con) or die(mysql_error());
$sa1 = mysql_fetch_array($result1);
$passw1 = $sa1["upass"];
if(strcmp($passw, $password) == 0){
$_SESSION["aid"] = $username; 
$_SESSION["aname"] = $sa["aname"];
$_SESSION["logged"] = 1;
{echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=../index.php\">";}
}
else if(strcmp($passw1, $password) == 0)
{
$_SESSION["uid"] = $username; 
$_SESSION["uname"] = $sa1["name"];
$_SESSION["logged"] = 1;
{echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=../index.php\">";}
}
else 
{ 
echo "<script>alert(\"Wrong Combination\")</script>"  ;
echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=../index.php\">";
}


?>