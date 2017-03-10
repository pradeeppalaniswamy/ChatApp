<?php

$host="localhost";
$user="pradeeppal";
$pass="Asdf@1234";
$db="chatapp_1990";
$con= mysql_connect($host,$user,$pass)or die ("could not connect ");
$dbc=@mysqli_connect($host,$user,$pass,$db)or die ("could not connect dbc");

//$con=mysql_connect("localhost","root","Asdf@1234")or die("couldnotconnect");
mysql_select_db('chatapp_1990',$con);

  $id = $_GET['id'];
  // do some validation here to ensure id is safe

  
  $sql = "SELECT picture  FROM posts WHERE postid=$id";
  $result = mysql_query("$sql");
  $row = mysql_fetch_assoc($result);
  mysql_close($con);

  header("Content-type: image/jpeg");
  echo $row['picture'];
?>