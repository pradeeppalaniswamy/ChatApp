<?php

require "processor.php";

$emailid=$_POST["emailid"];
$password=$_POST["password"];
login($emailid,$password);

?>