<?php
session_start();
//$uname="sh";
//$msg="val";
$host="localhost";
$user="pradeeppal";
$pass="Asdf@1234";
//$db="chatapp_1990";
$touser=$_REQUEST['k'];
//echo "$touser";
//$dbc=@mysqli_connect($host,$user,$pass,$db)or die ("could not connect dbc");



$con=mysql_connect("localhost","pradeeppal","Asdf@1234")or die("couldnotconnect");
mysql_select_db('chatapp_1990',$con);$uname =$_SESSION['username'];

//$selquery="select * from logs  order by id  desc;";


$selquery="select name,msg from logs where name in ('$uname','$touser') and name1 in ('$uname','$touser') order by id ;";//

//duli
//$selquery="select uname from users where login=1 and uname !='$uname'  limit 8 ;";


$reslt=mysql_query($selquery);
while($extract =mysql_fetch_array($reslt))
{$pp=$extract['name'];
 
    //echo "inise meth2";
    //echo"<div class ='chatmsg'>"
              //echo $extract['name'].":".$extract['msg']."<br>";
if($pp==$uname)
    //echo"<div class ='chatmsg'>"."<span class ='uname'>" .$pp.":"."</span>".$extract['msg']."</div><br>";
 
    echo"<div class ='chatmsg'>"."    ".$extract['msg']."</div><br>";

    else
     //echo"<div class ='chatmsg1'>"."<span class ='uname'>" .$pp.":"."</span>".$extract['msg']."</div><br>";
     echo"<div class ='chatmsg1'>".$extract['msg']."</div><br>";

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
mysql_close();
?>