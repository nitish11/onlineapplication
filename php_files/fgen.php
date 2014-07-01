<?php include 'php_files/conn.php'; ?>

<head>
<script type="text/javascript">
rows = 1;
opts=1;
function morer()
{
nomore =1;
for(i=1; i<=rows; i++)
{
ptype = document.getElementById('type' + i).value;
pfield = document.getElementById('field' + i).value;
if(pfield=="" )
{
alert(" The Feild" + i + " is mandatory");
pfield = document.getElementById('field' + i).focus();
nomore =0;
}
else if(ptype == "none")
{
alert("Please select type for Field" + i);
ptype = document.getElementById('type' + i).focus();
nomore =0;
}
}
if(nomore)
{
rows++;

document.getElementById('1'+ rows).innerHTML =  "<table><tr><td id='maxx"+ rows +"' style='color:red;visibility:hidden;'>Max-Value<input  type='text' id='max"+rows+"' name ='max"+rows+"' maxlength='11' ></td><td id='imp"+ rows +"' style='color:red;visibility:hidden;'>Analyze and Restrict: <input onClick='show("+ rows +")' type='checkbox' name='chkimp" + rows + "' id='chkimp" + rows + "' value=\""+ rows +"\"></td><td>Field" + rows + ": <input type='text' id='field" + rows + "' name='field" + rows + "'> </td><td>Type: <select onChange='change("+ rows + ")' id='type" + rows + "' name='type" + rows + "'><option value='none' > Select Type</option><option  value='text'> Text</option><option  value='para'> Text Area(paragraph)</option><option  value='number'> Number</option><option  value='radio'> Radio button</option><option  value='checkbox'> Checkbox</option><option  value='dropdown'> Dropdown</option></select></td><td id='mancol" + rows + "' style= 'visibility:hidden' >Mandatory: <input type='checkbox' id='man"+ rows +"' name='man"+ rows +"' value = '1' ></td><td><div id='1"+ rows + rows + "'></div></td></tr><table><div id='1"+ (rows+1) +"'></div>" ;
document.getElementById('field' + rows).focus();
}	

}

function moreopt(n)
{
popt1 = document.getElementById('opt'+ opts+"" + n ).value;
popt2 = document.getElementById('opt'+ (opts+1) +"" + n ).value;
if(popt1 == "" || popt2 == "" )
{alert("Please fill the available options first");
document.getElementById('opt'+ opts+"" + n ).focus();
}
else
{
opts = (opts + 2);
document.getElementById('totopt' + n).value = (opts*1) + 1;
document.getElementById(n+''+opts).innerHTML = "Option " + opts + ": <input type = 'text' maxlength='20' id='opt"+ opts+"" + n +"' name='opt"+ opts+"" + n +"' > Option " + ((opts*1)+1) + ": <input type = 'text' maxlength='20' id='opt"+ ((opts*1)+1) +""+ n +"' name='opt"+ ((opts*1)+1) +""+ n +"' > <div id='"+""+ n + ((opts*1)+2) +"'></div>";
}

}
function change(n)
{

t = "type" + n ;
f= "1"+n+n;
type = document.getElementById(t).value;
switch  (type){
case  'text': 
document.getElementById('imp' + n).style.visibility = "hidden";
document.getElementById('chkimp' + n).checked = false;
document.getElementById('mancol' + n).style.visibility = "visible";
document.getElementById(f).innerHTML = "Max-Length: <input onKeyUp=\"ncheck('ln" + n +"')\" type = 'text' maxlength='2' id='ln"+ n +"' name='ln"+ n +"' >";
break;
case  'para': 
document.getElementById('imp' + n).style.visibility = "hidden";
document.getElementById('chkimp' + n).checked = false;
document.getElementById('mancol' + n).style.visibility = "visible";
document.getElementById(f).innerHTML = "Max-Length: <input onKeyUp=\"ncheck('ln" + n +"')\" type = 'text' maxlength='3' id='ln"+ n +"' name='ln"+ n +"' >";
break;
case 'number':
document.getElementById('imp' + n).style.visibility = "visible";
document.getElementById('chkimp' + n).checked = false;
document.getElementById('mancol' + n).style.visibility = "visible";
document.getElementById(f).innerHTML = "Max-Length: <input onKeyUp=\"ncheck('ln" + n +"')\" type = 'text' maxlength='2' id='ln"+ n +"' name='ln"+ n +"' >";
break;
case 'radio':
document.getElementById('imp' + n).style.visibility = "hidden";
document.getElementById('chkimp' + n).checked = false;
document.getElementById('mancol' + n).style.visibility = "hidden";
opts = 1;
document.getElementById(f).innerHTML = "Option 1: <input type = 'text' maxlength='20' id='opt1"+ n +"' name='opt1"+ n +"' > Option 2: <input type = 'text' maxlength='20' id='opt2"+ n +"' name='opt2"+ n +"' > <div id='"+ n +"3'></div><input type='button' value='more' onClick='moreopt("+ n +")'><input type='text' id = 'totopt" + rows  + "' name = 'totopt" + rows + "' value = '2'  style='visibility:hidden;'>";
break;
case 'checkbox':
document.getElementById('imp' + n).style.visibility = "hidden";
document.getElementById('chkimp' + n).checked = false;
document.getElementById('mancol' + n).style.visibility = "visible";
opts = 1;
document.getElementById(f).innerHTML = "Option 1: <input type = 'text' maxlength='20' id='opt1"+ n +"'  name='opt1"+ n +"' > Option 2: <input type = 'text' maxlength='20' id='opt2"+ n +"' name='opt2"+ n +"' > <div id='"+ n +"3'></div><input type='button' value='more' onClick='moreopt("+ n +")'><input type='text' id = 'totopt" + rows  + "' name = 'totopt" + rows + "' value = '2'  style='visibility:hidden;'>";
break;
case 'dropdown':
document.getElementById('imp' + n).style.visibility = "hidden";
document.getElementById('chkimp' + n).checked = false;
document.getElementById('mancol' + n).style.visibility = "hidden";
opts = 1;
document.getElementById(f).innerHTML = "Option 1: <input type = 'text' maxlength='20' id='opt1"+ n +"'  name='opt1"+ n +"' > Option 2: <input type = 'text' maxlength='20' id='opt2"+ n +"' name='opt2"+ n +"' > <div id='"+ n +"3'></div><input type='button' value='more' onClick='moreopt("+ n +")'><input type='text' id = 'totopt" + rows  + "' name = 'totopt" + rows + "' value = '2'  style='visibility:hidden;'>";
break;
default:
document.getElementById(f).innerHTML = "";
document.getElementById('imp' + n).style.visibility = "hidden";
document.getElementById('chkimp' + n).checked = false;
document.getElementById('mancol' + n).style.visibility = "hidden";
break;
}

}
function sub()
{
noimp = 1;
nomore = 1;
fname = document.getElementById('frmname').value;
if(fname == "")
{
alert("Please Insert a Form Name");
document.fgenrtr.frmname.focus();
}
else 
				{
for(i=1; i<=rows; i++)
		{
ptype = document.getElementById('type' + i).value;
pfield = document.getElementById('field' + i).value;
if(pfield=="" )
	{
alert(" The Feild" + i + " is mandatory");
document.getElementById('field' + i).focus();
nomore =0;
break;
	}
else if(ptype == "none")
	{
alert("Please select type for Field" + i);
document.getElementById('field' + i).focus();
nomore =0;
break;
	}
else if(ptype == "text" || ptype == "para" || ptype == "number" )
	{
len = document.getElementById('ln' + i).value;
if(len == "")
			{
alert("Please fill in max length for Field" + i);
document.getElementById('ln' + i).focus();
nomore = 0;
break;
			}
	}
chkimp = document.getElementById('chkimp' + i).checked;	
if(chkimp)
{
maxvalue = document.getElementById('max' + i).value;	
	if(!maxvalue)
	{
	alert("Please enter a value for Field" + i + " chosen for analysis");
	nomore = 0;
	break;
	}
noimp = 0;
}
		}
	
if(noimp)	
{
alert("PLease select a number field for analysis");
nomore = 0;
}	
if(nomore)
{
document.getElementById('totrow').value = rows;		
document.fgenrtr.submit();
}
				}

}


function show(n)
{

for(i =1; i<=rows ; i++)

document.getElementById('maxx' + n).style.visibility = "visible";
}

function ncheck(strStringi)
   //  check for valid numeric strings	
   {
  
  strString = document.getElementById(strStringi).value;
   var strValidChars = "0123456789";
   var strChar;

   //  test strString consists of valid characters listed above
   for (i = 0; i < strString.length ; i++)
      {
      strChar = strString.charAt(i);

      if (strValidChars.indexOf(strChar) == -1)
         {
alert("only numeric charecters");
document.getElementById(strStringi).value = "" ;
         }
      }
   }

</script>
</head>
<?php
if ($_SESSION["logged"] == 1 ){
echo "
<body >

<form name='fgenrtr' id='fgenrtr' action ='fgensub.php' method='post'>
Form Name: <input type='text' name='frmname'  id='frmname'>
Admin for this form: <select name='fadmin' id = 'fadmin'  > ";
$query = mysql_query("select * from admin");
while($admin = mysql_fetch_array($query))
echo "<option value = '" . $admin["aid"] . "' > " . $admin["aname"] . " </option>";
echo "</select>
<br><br><br>
<div id='1'>

<div id='11'>
<table>
<tr>
<td id='maxx1' style='color:red;visibility:hidden;'>Max-Value<input  type='text' id='max1' name='max1' maxlength='11' ></td><td id='imp1' style='color:red;visibility:hidden;'>Analyze and Restrict: <input onClick='show(1)' type='checkbox' name='chkimp1' id='chkimp1' value='1'></td>
<td>Field1: <input type='text' name='field1'  id='field1'></td>
<td>Type: <select onChange='change(1)' id='type1' name='type1'>
<option value='none' > Select Type</option>
<option  value='text'> Text</option>
<option  value='para'> Text Area(paragraph)</option>
<option  value='number'> Number</option>
<option  value='radio'> Radio button</option>
<option  value='checkbox'> Checkbox</option>
<option  value='dropdown'> Dropdown</option>
</select></td><td id='mancol1' style= 'visibility:hidden'>Mandatory: <input type='checkbox' id='man1' name='man1' ></td><td> 
<div id='111'></div></td>
</tr></table>
</div>
<div id='12'></div>
</div>
 <input type='button' id = 'more' onClick='morer()' name='more' value='More' />
 <br><br><br><br>
 
 <input type='text' id = 'totrow' name = 'totrow' value = '1'  style='visibility:hidden;'>
 
</form>
<input type='button' id = 'submit' onClick='sub()' name='submit' value='Submit' />
<br><br><br><br>

<font style='color:brown;'><i>*The following fields are filled automatically so no need to create them : <br><br> Name<br>Designation<br>Date of Birth<br>Gender.</i></font>
</body>" ; 
}else echo "PLease Login to continue";
?>