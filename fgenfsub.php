function sub()
{
fid = document.getElementById('fid').value;
fname = document.getElementById('fname').value;
if(fid == "" || fname == "" )
alert("Please fill the Form Id and Form Name first");
else
	{
if(rows == 1)
{
ptype = document.getElementById('type1').value;
pfield = document.getElementById('field1').value;

if(pfield=="" )
alert("Feild1 is mandatory");
else if(ptype == "none")
alert("Please select type for Field" + rows);
else alert("submit2");
}
else alert("submit");
	
	}

}