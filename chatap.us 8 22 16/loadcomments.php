<?php
require 'processor.php';
$postid=$_REQUEST['postid'];

$allcmnt=getcomments($postid);
//echo count($allcmnt)."count";



for($i=0;$i<count($allcmnt);$i++)
{
    $comment=$allcmnt[$i];
    
    echo"
<div class='row' id='text comment'> <!--row 2.1.1-->
    <div class='col-lg-1 col-md-1 col-sm-1 col-xs-1'>


    </div>
    <div class='col-lg-2 col-md-4 col-sm-4 col-xs-4'>


        <img src='getprofilepic.php?id=".$comment['profileid']."' width='100' height='100'/> 

    </div>
    <div class='col-lg-7 col-md-9 col-sm-6 col-xs-6' >
        <div class='form-group'>
            <div class='well well-sm'>

                <h3 class='text text-primary'><bold>".$comment['fname']. " :</bold></h3>
                <h4 class='text text-primary'>".$comment['comment']."</h4>
            </div>
        </div>
    </div>
    <div class='col-lg-1 col-md-1 col-sm-1 col-xs-1 '>
    </div>

</div><!--row 2.1.1-->

";

}


echo"

";


                                                


?>