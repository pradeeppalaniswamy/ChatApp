
<?php
session_start();

$id=$_REQUEST['v1'];

//$uname="sh";
//$msg="val";
$host="localhost";
$user="root";
$pass="Asdf@1234";
//$db="chatapp";
//$dbc=@mysqli_connect($host,$user,$pass,$db)or die ("could not connect dbc");

//echo " $ $id ";

$con=mysql_connect("localhost","root","Asdf@1234")or die("couldnotconnect");
mysql_select_db('chatapp',$con);$uname =$_SESSION['username'];

//$selquery="select * from logs  order by id  desc;";


//$selquery="select name,msg from logs order by id ;";//

//duli
//$selquery="select uname from users where login=1 and uname !='$uname'  limit $cnt,1 ;";
$selquery="select uname from users1 where login=1 and cid='$id' limit 1  ; ";

$reslt=mysql_query($selquery);
//if(mysql_num_rows($reslt))

while($extract =mysql_fetch_array($reslt))
{
    //echo "inise meth2";
    //echo"<div class ='chatmsg'>"
              //echo $extract['name'].":".$extract['msg']."<br>";

    //echo"<div class ='chatmsg'>"."<span class ='uname'>" .$extract['name'].":"."</span>".$extract['msg']."</div><br>";
    
    //</textarea>
   // echo"<textarea class ='chatmsg' rows='4'>".$extract['name'].":".$extract['msg']."</textarea><br>";
    // echo "uname    ".$uname ." msg   ".$msg."<br>";

    $pp=$extract['uname'];    
echo"<div >".$pp."</div>";
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


