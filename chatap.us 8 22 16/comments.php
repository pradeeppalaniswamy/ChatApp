<?php

require 'processor.php';
$postid=$_POST['postid'];
$comment=$_POST['comment'];

$userid=$_SESSION['profileid'];
echo "postid".$postid.$userid."comment".$comment;
echo $_SERVER['REQUEST_METHOD'];

//addcomment($userid,$postid,$comment);


if($postid==$comment)
{
    
    deletethepost($postid);
}

else
addcomment($userid,$postid,$comment);
    
?>