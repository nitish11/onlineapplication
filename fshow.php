<?php include 'php_files/header.php';?>
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
	if (type == "text" || type == "number" || type == "para" )
	{
	
    man = document.getElementById('man' + i).value;
	
/*	if (type == "checkbox")
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
		else*/ 
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

document.frm.submit();
}
} 

</script>
<?php include 'php_files/header2.php';?>
<?php include 'formshow.php'  ?>
<?php include 'php_files/footer.php';?>