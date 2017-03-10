<?php
//echo "session started";
session_start();
$uname =$_SESSION['username'];
//$msg=$_REQUEST['message'];
$msg=$_POST['message'];
//$uname="sh";
//$msg="val";
$host="localhost";
$user="pradeeppal";
$pass="Asdf@1234";
$user1=$_POST['user'];;
//$user1=$_REQUEST['user'];
//$db="chatapp";
//$dbc=@mysqli_connect($host,$user,$pass,$db)or die ("could not connect dbc");

echo"msg"."$msg";

$con=mysql_connect("localhost","pradeeppal","Asdf@1234")or die("couldnotconnect");
mysql_select_db('chatapp_1990',$con);
mysql_query("insert into logs(name,name1,msg) values ('$uname','$user1','$msg');");
//$selquery="select * from logs  order by id  desc;";
$selquery="select name,msg from logs order by id ;";
$reslt=mysql_query($selquery);

while($extract =mysql_fetch_array($reslt))
{
    //echo "inise meth2";
 
    
    //echo"<div class ='chatmsg'>"."<span class ='uname'>" .$extract['name'].":"."</span>".$extract['msg']."<br>";

   // echo "uname    ".$uname ." msg   ".$msg."<br>";
}

/*$resp=@mysqli_query($dbc,$selquery);
if($resp)
{

    while($row=@mysqli_fetch_array($resp))
    {
       
        echo $row['name'].":".$row['msg']."<br>";
        //echo $row['age']."  ";
        ///$pp=false;
    }
     
}*/

?>