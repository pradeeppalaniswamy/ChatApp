
<?php

//$uname="sh";
//$msg="val";
$host="localhost";
$user="root";
$pass="Asdf@1234";
//$db="chatapp";
//$dbc=@mysqli_connect($host,$user,$pass,$db)or die ("could not connect dbc");



$con=mysql_connect("localhost","root","Asdf@1234")or die("couldnotconnect");
mysql_select_db('chatapp',$con);
mysql_query("truncate table logs");
//$selquery="select * from logs  order by id  desc;";
//$selquery="select name,msg from logs order by id desc;";
//$reslt=mysql_query($selquery);
//while($extract =mysql_fetch_array($reslt))
{
    //echo "inise meth2";
    echo "msg logs clearded ";

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