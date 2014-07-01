<body>
<form name = 'frm' id = 'frm' method = 'post' action = 'frmsub.php' >

<?php
if($_SESSION["logged"] == 1)
{
$fidid = $_POST["fid"];
$fid = "det" . $fidid ;
echo "<table >";

$queryn = mysql_query("select * from fid_fname where fid = '$fidid'");
$fname = mysql_fetch_array($queryn);
echo "<h4>" . $fname["fname"] . "</h4>";

$query1 = mysql_query ("select * from  $fid " ,$con);
$row = 0;

while($res = mysql_fetch_array($query1))
{

$field = strtoupper($res["label"]);
$field = str_replace('_',' ',$field);

$row++;

$man = $res["man"];

echo "<tr style='border:1px black solid'><td>";
if($man)
echo "<font style='color:red'>* </font>";
else 
echo" &nbsp;";
echo  $field . " </td><td> <b>:</b> </td><td>";
switch ($res["type"])
{
case "text" :
echo "<input type = 'text' id = '" . $row . "' name = '" . $row . "' maxlength= '" .$res["maxlen"] ."'>  </td> ";

break;


case "dropdown":
 $drop = explode("+",$res["content"]);
 
echo "<select name = '" .$row ."' id = '".$row."'>";


foreach ( $drop as $opt )
if($opt != "")
 echo"<option value='" . $opt. "'>" .$opt ."</option>"; 
 

 echo "</select></td>" ;
 break;
 
 
 case "radio":
  $drop = explode("+",$res["content"]);
  $radio = 0;
  
  foreach ( $drop as $opt )
  {
  if($opt != "")
  	{
	$radio++;  
	echo $opt ." <input type = 'radio' value = '". $opt. "' name = '".$row."' id = '".$row.$radio."'" ;
	if ($radio ==1)
	echo "checked = 'checked'";
	echo ">"; 
	}
 }
 echo "</td>";
 break;
 
 
  
 case"checkbox":
  $drop = explode("+",$res["content"]);
  $check = 0;
   foreach( $drop as $opt) 
   {
   if($opt != "")
	{
	$check++;
	echo $opt ."<input type ='checkbox' value = '".$opt."' name = '".$row.$check."' id = '".$row.$check."'  >";
	}
   }
   
   echo "<input type = 'text' name = 'totopt".$row."' value = '".$check."' style = 'visibility:hidden' > </td>";
   break;
   
   
   case"para":
   echo "<textarea id = '" . $row . "' name = '" . $row . "' maxlength= '" .$res["maxlen"] ."'></textarea> </td> ";
   break;
   
   
   case"number":
   echo "<input type = 'text' onKeyUp = \"numcheck('".$row."')\" id = '" . $row . "' name = '" . $row . "' maxlength= '" .$res["maxlen"] ."'></td>";
   break;
    
}
echo  "  <input type='text' style='visibility:hidden' name='man" . $row . "' id='man" . $row . "' value = '". $man ."' > <input type='text' style='visibility:hidden' id ='type" . $row . "' name='type" . $row . "' value = \"". $res["type"] ."\" > <input type='text' style='visibility:hidden' name='maxval" . $row . "' id='maxval" . $row . "' value = '". $res["maxval"] ."' > " . "</tr>" ;

}
echo "<input type='hidden' name='rows' id='rows' value = '". $row ."' >";
echo "<input type='hidden' name='fid' id='fid' value = '". $fidid ."' >";
}
else echo "Please login to view this page";
?>
</table>

 
</form>
<br><br>
<input type = 'button' onClick = 'sub()' id = 'submit' name = 'submit' value = 'Submit' >
 </body>