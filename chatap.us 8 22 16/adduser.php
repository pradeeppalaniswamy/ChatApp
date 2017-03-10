<?php
require "processor.php";
$emailid=$_POST['email'];
$password=$_POST['password'];
$fname=$_POST['first_name'];
$lname=$_POST['last_name'];
$DOB=$_POST['DOB'];
$user['email']=$emailid;
$user['password']=$password;
$user['fname']=$fname;
$user['lname']=$lname;
$user['DOB']=$DOB;
Adduser($user);
?>