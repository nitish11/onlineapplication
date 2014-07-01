<head>
<script>
 function numcheck(n)
 {

 text = document.getElementById(n).value;
 var validchar = "0123456789";
 var str;
 for (i= 0;i< text.length;i++)
 {
  str = text.charAt(i);

  if (validchar.indexOf(str) == -1)
  {
  alert(" only numeric value");
  document.getElementById(n).value = "";
  }
  
 }
 
} 
function sub()
{
subm = 1;
rows = document.getElementById('rows').value;
//alert(rows);
for( i = 1 ; i <= rows ; i++)
	{
	type = document.getElementById('type' + i).value;
	//alert(type);
	if (type == "text" || type == "number" || type == "para" || type == "checkbox" )
	{
	
    man = document.getElementById('man' + i).value;
	
	/*if (type == "checkbox")
		{
		content = "";
		chks = document.getElementById('totopt' + i).value;
	     for(l =1 ; l <= chks ; l++)
		 {
		 chked = document.getElementById(i+ "" + l).checked;	
		 if (chked)
		 {
		 content = "1";
		 break;
		 }
		 }
		}
		else */
		content = document.getElementById(i).value;
	if(man & (content == ""))
	{
	alert("Please fill the mandatory fields");
	subm = 0;
	break;
	}
	
	}
	maxval = 0 ; 
	maxval =  document.getElementById('maxval' + i).value;
	if(maxval > 0)
	{
	maxval = maxval * 1 ; 
	content = content * 1 ;
	if(content > maxval)
		{
		alert("Sorry the max value for  row " + i + " is " + maxval);
		subm = 0 ;
		break;
		}
	}
	}

	//alert("entered");
if(subm)
{
alert("submit");
document.frm.submit();
}
} 

</script>
</head><body>
<form name = 'frm' id = 'frm' method = 'post' action = 'frmsub.php' >
<table style='border:1px black solid'>
<?php
$fidid = $_POST["fid"];
$fid = "det" . $fidid ;
$con = mysql_connect("localhost","root","");
mysql_select_db("sad",$con);


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
echo "<input type='hidden' name='fid' id='fid' value = '". $fidid ."' >"
?>
</table>

 
</form>
<input type = 'button' onClick = 'sub()' id = 'submit' name = 'submit' value = 'Submit' >
 </body>