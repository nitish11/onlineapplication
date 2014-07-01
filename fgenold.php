<head>
<script>
rows = 1;
opts=1;
function more()
{

rows++;
a = document.getElementById('1').innerHTML;
document.getElementById('1'+rows).innerHTML =  "<table><tr><td>Field: <input type='text' name='field' id='field'> </td><td>Type: <select onChange='change("+ rows + ")' id='type" + rows + "' name='type" + rows + "'><option  > Select Type</option><option  value='text'> Text</option><option  value='para'> Text Area(paragraph)</option><option  value='number'> Number</option><option  value='radio'> Radio button</option><option  value='checkbox'> Checkbox</option><option  value='dropdown'> Dropdown</option></select></td><td>Mandatory: <input type='checkbox' id='man"+rows+"' ></td><td><div id='1"+ rows + rows + "'></div></td></tr><table><div id='1"+ (rows+1) +"'></div>" ;
	

}
function moreopt(n)
{
opts = (opts + 2);

document.getElementById(n+''+opts).innerHTML = "Option " + opts + ": <input type = 'text' maxlength='20' id='opt"+ opts+"" + n +"' > Option " + (opts+1) + ": <input type = 'text' maxlength='20' id='opt"+ (opts+1) +""+ n +"' > <div id='"+""+ n + (opts+2) +"'></div>";


}
function change(n)
{

t = "type" + n ;
f= "1"+n+n;
type = document.getElementById(t).value;
switch  (type){
case  'text': 
document.getElementById(f).innerHTML = "Max-Length: <input type = 'text' maxlength='2' id='txtln"+ n +"' >";
break;
case  'para': 
document.getElementById(f).innerHTML = "Max-Length: <input type = 'text' maxlength='3' id='paraln"+ n +"' >";
break;
case 'number':
document.getElementById(f).innerHTML = "Max-Length: <input type = 'text' maxlength='2' id='numln"+ n +"' >";
break;
case 'radio':
opts = 1;
document.getElementById(f).innerHTML = "Option 1: <input type = 'text' maxlength='20' id='opt1"+ n +"' > Option 2: <input type = 'text' maxlength='20' id='opt2"+ n +"' > <div id='"+ n +"3'></div><input type='button' value='more' onClick='moreopt("+ n +")'>";
break;
case 'checkbox':
opts = 1;
document.getElementById(f).innerHTML = "Option 1: <input type = 'text' maxlength='20' id='opt1"+ n +"' > Option 2: <input type = 'text' maxlength='20' id='opt2"+ n +"' > <div id='"+ n +"3'></div><input type='button' value='more' onClick='moreopt("+ n +")'>";
break;
case 'dropdown':
opts = 1;
document.getElementById(f).innerHTML = "Option 1: <input type = 'text' maxlength='20' id='opt1"+ n +"' > Option 2: <input type = 'text' maxlength='20' id='opt2"+ n +"' > <div id='"+ n +"3'></div><input type='button' value='more' onClick='moreopt("+ n +")'>";
break;
default:
document.getElementById(f).innerHTML = "";
}

}

</script>
</head>
<div id="1">

<div id="11">
<table>
<tr>
<td>Field: <input type="text" name="field"  id="field"></td>
<td>Type: <select onChange="change(1)" id="type1" name="type1">
<option  > Select Type</option>
<option  value='text'> Text</option>
<option  value='para'> Text Area(paragraph)</option>
<option  value='number'> Number</option>
<option  value='radio'> Radio button</option>
<option  value='checkbox'> Checkbox</option>
<option  value='dropdown'> Dropdown</option>
</select></td><td>Mandatory: <input type='checkbox' id='man1' ></td><td> 
<div id='111'></div></td>
</tr></table>
</div>
<div id='12'></div>
</div>
 <input type="button" id = "more" onClick="more()" name="more" value="More" />
