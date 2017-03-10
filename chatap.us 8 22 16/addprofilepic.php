<?php 
$host="localhost";
$user="pradeeppal";
$pass="Asdf@1234";
$db="chatapp_1990";
$con= mysql_connect($host,$user,$pass)or die ("could not connect ");
$dbc=@mysqli_connect($host,$user,$pass,$db)or die ("could not connect dbc");
//if($dbc==true)
 //   printf("success");
//else
   // printf("failure");
	
//$con=mysql_connect("localhost","pradeeppal","Asdf@1234")or die("couldnotconnect");
mysql_select_db('chatapp_1990',$con);
session_start();
$profileid = $_POST['profileid'];
//echo $profileid;

$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
$image_name = addslashes($_FILES['image']['name']);
//$sql = "INSERT INTO `product_images` (`gamename`,`description`,`price`,`genre`,`type`, `image`, `image_name`)
// VALUES ('{$gamename}','{$description}','{$price}','{$genre}','{$type'}, '{$image}', '{$image_name}');";
//$sql = "INSERT INTO `profile` (`profilepic`) VALUES ('{$image}') where profileid not in (1,2,3)";
$sql= "update profile set profilepic= '$image' where profileid=$profileid ;";
 if (!mysql_query($sql))
{ // Error handling
    echo "Something went wrong! :("; 
}
else{
	//echo "success";
    //echo $image;
    header("Refresh:0");
	header('location:profile.php');
	
}
mysql_close();
?>