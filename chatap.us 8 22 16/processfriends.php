<?php 
require 'processor.php';
$id=getprofileid();
$frid=$_POST["frid"];
$actnum=$_POST["actnum"];

if($actnum==1)
{
    unfriend($id,$frid);
    
}
else if($actnum==2)
{
    addfriend($id,$frid);
}
else if($actnum==3)
{
    acceptfriend($id,$frid);
}
else if($actnum==4)
{
    
    
}







?>