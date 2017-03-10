<?php
if(isset($_POST['submit']))
{
	$host="localhost";
$user="root";
$pass="Asdf@1234";

$con=mysql_connect("localhost","root","Asdf@1234")or die("couldnotconnect");
mysql_select_db('chatapp',$con);
$uname=$_POST['uname'];
$pass1=$_POST['password'];
$pass2=$_POST['password1'];
if($pass1!=$pass2)
{
	echo"passwords dont match";
}
else
{
$check =mysql_query("select * from users where uname='$uname' ;");
if(mysql_num_rows($check))
{
	echo "username allready exists";
}
else
{
	mysql_query("insert into users (uname,password,login) values('$uname','$pass1',-1) ;");
	echo "registered successfully click <a href='index.php'> here</>to begin <br>";
}
}
}
?>
<html>
<head>
</head>
<body>
<form name="f3" method="post" action="register.php">
	<table border="1">
		<tr><td>Your name</td><td><input type="text" name="uname"></input></td></tr>
		<tr><td>Your password</td> <td><input type="text" name="password"></input></td></tr>
		<tr><td>Re-type password</td> <td><input type="text" name="password1"></input></td></tr>

		<tr><td> <input type="submit" name ="submit" value="register"></input></td></tr>

	</table>
</form>
</body>
</html>