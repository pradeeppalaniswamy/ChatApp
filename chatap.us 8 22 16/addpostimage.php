<?php 
$host="localhost";
$user="pradeeppal";
$pass="Asdf@1234";
$db="chatapp_1990";
$con= mysql_connect($host,$user,$pass)or die ("could not connect ");
$dbc=@mysqli_connect($host,$user,$pass,$db)or die ("could not connect dbc");
if($dbc==true){}
 //   printf("success");
else
    printf("failure");
	
//$con=mysql_connect("localhost","pradeepal","Asdf@1234")or die("couldnotconnect");
mysql_select_db('chatapp_1990',$con);
session_start();
$heading = $_POST['heading'];
$description = $_POST['description'];
$us=$_SESSION['profileid'];

if($heading)
{
$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
$image_name = addslashes($_FILES['image']['name']);
//$sql = "INSERT INTO `product_images` (`gamename`,`description`,`price`,`genre`,`type`, `image`, `image_name`)
 //VALUES ('{$gamename}','{$description}','{$price}','{$genre}','{$type'}, '{$image}', '{$image_name}');";
$sql = "INSERT INTO `posts` (`userid`,`heading`,`description`,`picture`)
 VALUES ('{$us}','{$heading}','{$description}','{$image}')";

}
else
{
$sql = "INSERT INTO `posts` (`userid`,`heading`,`description`,`picture`)
 VALUES ('{$us}',Null,'{$description}',Null)";
    
    
}

 if (!mysql_query($sql))
{ // Error handling
    echo "Something went wrong! :("; 
}
else{
	
	header('location:index.php');
	
}
    
    


mysql_close();
?>