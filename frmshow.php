<table>

<?php
$fid= $_GET["fid"];
$con = mysql_connect("localhost","root","");
mysql_select_db("sad",$con);


$query1 = mysql_query ("select * from " + $fid +" ",$con);
$row = 0;



while($res = mysql_fetch_array($query1))
{
$row++;
if($res["man"])
$man = "yes";
else
$man="no";
$field = strtoupper($res["field"]);
$field = str_replace('_',' ',$field);
echo"<tr><td>" + $field + "</td><td>";
switch ($res["type"])
{
case "text" :
echo "<input type = 'text' id = '" . $row . "' maxlength= '" .$res["maxlen"] ."'> </td><td>mandatory<input type='text' disabled='true' value='" . $man ."'> </td><td>content<input type = 'text'  value = '" . $res["content"] ."'> </td> </td>";

break;



case "dropdown":
 $drop = explode("+",$res["content"]);
 
echo "<select name = '" .$row ."'>";


for (each $drop as $opt )
 echo"<option value='" . $opt. "'>" .$opt ."</option>";
 

 echo"</select>";
 break;
 
 
 case "radio":
 echo" <input type = 'radio' ";
 
 
 
 
 
}










if(1)
 echo"<option value='" . $opt. "'>" .$opt ."</option>";
 

 echo"</select>";
 break;
 
 
 case "radio":
 echo" <input type = 'radio' ";
 
 break;
 
 


































?>








<head>
<script>
 function numcheck(n)
 {
 text = document.getElementById(n).value;
 var validchar = "0123456789";
 var str;
 for (i= 0;i< text.length;i++)
 {
  str = validchar.charAt(i);
  if (validchar.indexOf(str) == -1)
  alert(" only numeric value");
  document.getElementById(n).value = "";
  
 }
 
}  
</script>
</head>
<table style='border:1px black solid'>

<tr style='border:1px black solid'>0<input type = 'text' id = '1' name = '1' maxlength= '30'> </td> </tr><br>1<tr style='border:1px black solid'>0<select name = '2' id = '2'><option value='staff '>staff </option><option value=' student '> student </option><option value=' faculty '> faculty </option></select></td></tr><br>2<tr style='border:1px black solid'>0staff  <input type = 'radio' value = 'staff ' name = '3' id = '31'checked = 'checked'> student  <input type = 'radio' value = ' student ' name = '3' id = '32'> faculty <input type = 'radio' value = ' faculty' name = '3' id = '33'></td></tr><br>3<tr style='border:1px black solid'>0staff <input type ='checkbox' value = 'staff ' name = '41' id = '41' > student <input type ='checkbox' value = ' student ' name = '42' id = '42' > faculty<input type ='checkbox' value = ' faculty' name = '43' id = '43' ></td></tr><br>4</table>