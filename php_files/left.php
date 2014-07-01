<?php  
if($_SESSION["logged"]!=1){	
echo "<h3>Login</h3>
	<form action='php_files/redirect.php' method='post'>
<table class='text'><tr>
<td>Username:</td><td><input type='text' name='user' maxlength='30'></td>
</tr>
<tr>
<td>Password:</td><td><input type='password' name='pass' maxlength='30'></td>
</tr>
</table><center>
<input style='background:white;border:1px solid black' type='submit' value='Login'>
</form>";}
else
{
echo "<h3>Welcome</h3>";
echo "<p>";
if(isset($_SESSION["aname"]))echo $_SESSION["aname"];
else echo $_SESSION["uname"];
echo "</p><p><a href='./php_files/logout.php'>Logout</a></p>";
}