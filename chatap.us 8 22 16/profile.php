<?php
require 'processor.php';
//require 'deletepost.php';
//require 'getprofilepic.php';
    //session_start();
    if(!isset($_SESSION['username']))
    {

        header("location:newuser.php");
        echo "netset";

    }

?>

<!DOCTYPE html>
<html>
    <title>Chat application</title>
    <head>

        <meta name="viewport" content="width = device-width, initial-scale = 1">
        
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>


        <style>
.glyphicon glyphicon-user
{
background-color: yellow;

}
            .jumbotron
            {background: #ECF0F1;

            }
            .well
            {
            font-family: 'Open Sans', sans-serif;

            }
            .wallpost
            {
            margin-bottom: 1px;


            }
            .fhead h4
            {
                color:white;
            }
            
            #headingtab
            {
                
                background:white;
                border-radius: 5px;
               
            }
            
             #headingtab h3
            {
            
                
            }
            .closepost:hover
            {
                cursor: pointer;
                
            }
            .closepost
            {
                position: relative;
                float: right;
                
                
            }
            
            .myimg {
  position: relative;
}

.inner-image {
  position: absolute;
  left: 15px;
  bottom: 5px;
}
            
        </style>
        
        <link rel="stylesheet" type ="text/css" href="mainstyle.css">

    </head>

    <body>
        <div class="container">

            <!-- .navbar-fixed-top, or .navbar-fixed-bottom can be added to keep the nav bar fixed on the screen -->
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header"> 
                        <!-- Button that toggles the navbar on and off on small screens -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"<!-- Hides information from screen readers -->
                            <span class="sr-only"></span>

                            <!-- Draws 3 bars in navbar button when in small mode -->
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>     

                        <a class="pull-left" href="#"><img src="img/logo1.png" width='50' height='50'></a>
                    </div><!--close header-->
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">                                       
                            <li >
                                <a href="index.php">&nbsp; <span class="glyphicon glyphicon-home" aria-hidden="true"></span> &nbsp;  Home                             
                                <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li>
                                <a href="#"> <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>&nbsp;&nbsp;Messages
                                </a>
                            </li>
  
                            <li>
                                <a href="profile.php">&nbsp;&nbsp; 
                                    <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo $_SESSION['username']."&nbsp;"?>
                                </a>                                               
                            </li>

                            <li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-                                                expanded="false">&nbsp;


                               <?php

$frndreq=friendrequests1();

if($frndreq===null)
{
echo" <span class='glyphicon glyphicon-user' aria-hidden='true'></span>&nbsp;&nbsp;Friend Requests<span class='caret'></span></a>";

echo " <ul class='dropdown-menu'> ";


echo"<li><table class='table table-hover'><tr><td>No New friend requests</td></tr></table> </li>";

                               
                   
                  
                                                               


 
 } 
else 
{
echo"<span class='glyphicon glyphicon-user' aria-hidden='true' style='color:red'></span>&nbsp;&nbsp;Friend Requests<span class='caret'></span></a>";

echo " <ul class='dropdown-menu'> ";

for($i=0;$i<count($frndreq);$i++ )
                        {    
                        $tempfrndreq=$frndreq[$i]; 
echo"
                               
                                    <li><table class='table table-hover'><tr><td>

                                <img src='getprofilepic.php?id=".$tempfrndreq[0]."' width='30' height='30 '> </td><td>
                                   <a href='#'>".$tempfrndreq[1]."    </a> </td><td>
                                <button type='submit' class='btn btn-primary accfrnreq' id = 'accfrnreq".$tempfrndreq[0]."'>Accept request</button></td><td> 
                                <button type='submit' class='btn btn-default rejfrnreq'  id = 'rejfrnreq".$tempfrndreq[0]."'>delete request</button>
                                  </td></tr></table>
                    </li>
                  
                                                               
";

 
  }}
echo"</ul>";
?>




                                  </li>







<li>
                                    <a href="logout.php"> 
                                        <span class="glyphicons glyphicons-keys" aria-hidden="true">                  </span>
                                        &nbsp;&nbsp;Logout
                                    </a>                               
                              
                            </li>

                        </ul>
                        <!-- navbar-left will move the search to the left -->
                        <form class="navbar-form navbar-right" role="search" method='post' action='findfriends.php'>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Find Friends" name='search'>
                            </div>
                            <button type="submit" class="btn btn-default" id="srchbutton">search</button>
                        </form>
                    </div><!-- /.navbar-collapse --> 
                </div><!-- /.container-fluid -->
            </nav>
            <br><br><br>
                    
            <div class="row"><!--row0-->
                <div class="col-lg-4 ol-md-4 col-sm-3 col-xs-0"><!--COL1-->
                </div>
                <div class="col-lg-7 ol-md-7 col-sm-7 col-xs-12"><!--COL1-->
                <div class="myimg">
                    <?php
    echo"
 <img src='getprofilepic.php?id=".$_SESSION['profileid']."' alt='' type='button' class='inner-image img-rounded ' height='150' width='150'>
 </img>
                    <img class='img-rounded' src='getcovpic.php?id=".$_SESSION['profileid']."' width='650' height='350 '>
                 
                      ";
                ?>
                </div>
                 <span class='glyphicon glyphicon-pencil collapsed' aria-hidden='true' id ='editpropic' data-toggle='collapse' 
                        data-target='#uploadpropic' aria-expanded='false'></span>
                    <div id='uploadpropic' class="collapse">
                            </br><form action="addprocovpic.php" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <table class="table table-hover">
                                <tr><td><label>Choose pictype: </label></td><td>
                                <select class="selectpicker" name="pictype">
  					<option>cover pic</option>
  <option>profile pic</option>
  
</select><td></tr>
                                    <tr><td><label>Choose image: </label></td><td><input type="file" name="image" required="required" ></td> </tr>
                                   <tr><td> <input type="submit" class = "btn btn-success"value="Update" /></td></tr>
                                </table>
                            </div>    
                            </form>
                        </div>
                    
<div id="test" class='collapse'>
<div class="well well-sm"  >
    
    <form action="addprofilepic.php" method="POST" enctype="multipart/form-data">
                        

<?php  echo"
                        <input type='submit' class = 'btn btn-success' value='update' />
                        
                            <div class='form-group'>
                                <input type='hidden'   name='profileid' class='form-control' value='".$_SESSION['profileid']."'
        />"
        
        ?>  
                                    
                                <table class='table table-hover'>
                                    <tr><td><label>Choose image: </label></td><td><input type='file' name='image' ></td> </tr>
                                </table>
                            </div>    
                        
                    </form> 

    
    </div>
</div>
                    </div>        
             </div><!--close row0-->
    
            <div class="row"><!--row1-->

                <div class="col-lg-5 ol-md-5 col-sm-5 col-xs-12"><!--COL1-->

                </div><!--COL1CLOSE-->

               
                </br>
            </div><!--close row1-->                         
            <div class="row"><!--row2-->

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><!--COL1-->
                
                </div><!--COL1CLOSE-->

                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-0"><!--dim2.1-->
               
                    <div class='jumboron'>
                    <div class='row'><!-- row 2.1-->
                        <!--<div class='col-lg-1 col-md-1 col-sm-1 col-xs-1'>
                        </div>-->
                         <?php
                    $postids=getmyposts();
                    for($i=0;$i<count($postids);$i++ )
                        {    
                        $val1=getposts($postids[$i]);
                    //echo"postid ".$postids[$i].$val1['description']."count".count($postids);
                        if($val1['heading'])
                        {
                        
                        
                        echo"
                        <div class='wallpost'>
                            <div class='col-lg-10 col-md-10 col-sm-10 col-xs-10'><!--dim2.2-->
                                <div class= 'well well-sm' id='headingtab'  >
                                   <div class='closepost' id='".$val1['postid']."XX'>X</div>
                                   <table>
                                       <tr>
                                           <td>                                                    <img src='getprofilepic.php?id=".$_SESSION['profileid']."'width='45' class='img-rounded img-thumbnail'></td>
                                           <td> <h3 class='text-primary'> &nbsp;  <bold>";echo $_SESSION['username']; echo"</bold> &nbsp; </h3></td>
                                            <td><h3 class='text-info'>uploaded a photo</h2>
                                           </td>
                                            
                                       </tr>
                                    </table>
                                    
                                </div>
                                       
                                <div class='thumbnail'>
                                
                                    <img src='getpostimage.php?id=".$val1['postid']."'width='600' height='600' /> 
                                    <!--width='175' height='200' -->
                                    <div class='caption'>

                                        <p ><h4 class='bg-info text-info'>
                                        ".$val1['heading']."
                                        <p >".$val1['description']."</p></h5>
                                    </div>

                                                                           <!--     <input type='submit' class='btn btn-primary'  role='button' value='mmkk'>
                                        -->
                                        <button type='button' class='collapsed btn btn-primary loadcommentbtn' data-toggle='collapse' 
                                                data-target='#".$postids[$i]."pp' aria-expanded='false' id ='".$postids[$i]."l'>
                                        View comments</button>


                                        <div  id='".$postids[$i]."pp' class='collapse' >
                                            </br>

                                            
                                        </div><!--loadcommentd-->


                                        <div class='row' id='textcomment'> <!--row 2.1.2-->
                                            </br>
                                            <div class='col-lg-1 col-md-1 col-sm-1 col-xs-1'>


                                            </div>
                                            
                                            <div class='col-lg-1 col-md-1 col-sm-1 col-xs-1'>
                                                <img src='getprofilepic.php?id=".$_SESSION['profileid']."'  width='40px' >

                                            </div>
                                            <div class='col-lg-9 col-md-9 col-sm-9 col-xs-9'>

                                                <div class='form-group'>
                                                
                                                    <textarea class='form-control cmntsection' rows='1' id='".$postids[$i]."'></textarea>
                                                  
                                                </div>
                                            </div>
                                            <div class='col-lg-1 col-md-1 col-sm-1 col-xs-1'>


                                            </div>

                                        </div><!-- row 2.1.2-->

                                        </br>
                                                                   </div><!--close thumbnail-->
                            </div><!--close dim 2.2-->


                        </div><!--close wallpost-->
                        ";}
                        else
                        {
                        
                        echo"
                        <div class='wallpost'>
                            <div class='col-lg-10 col-md-10 col-sm-10 col-xs-10'><!--dim2.2-->
                                <div class= 'well well-sm' id='headingtab'  >
                                   
                                   <div class='closepost' id ='".$val1['postid']."XX'>X </div>

                                   <table>                                       
                                   <tr>
                                           <td>                                                    <img src='getprofilepic.php?id=".$_SESSION['profileid']."'width='45' class='img-rounded img-thumbnail'></td>
                                           <td> <h3 class='text-primary'> &nbsp;  <bold>";echo $_SESSION['username']; echo"</bold> &nbsp; </h3></td>
                                            <td><h3 class='text-info'>Wrote</h2></td>
                                            
                                       </tr>
                                    </table>
                                </div>
                                       
                                <div class='thumbnail'>
                                
                                    <div class='caption'>

                                        <p ><h4 class='bg-info text-info'>
                                       
                                        <p >".$val1['description']."</p></h5>
                                    </div>

                                                                           <!--     <input type='submit' class='btn btn-primary'  role='button' value='mmkk'>
                                        -->
                                        <button type='button' class='collapsed btn btn-primary loadcommentbtn' data-toggle='collapse' 
                                                data-target='#".$postids[$i]."pp' aria-expanded='false' id ='".$postids[$i]."l'>
                                        View comments</button>


                                        <div  id='".$postids[$i]."pp' class='collapse' >
                                            </br>

                                            
                                        </div><!--loadcommentd-->


                                        <div class='row' id='textcomment'> <!--row 2.1.2-->
                                            </br>
                                            <div class='col-lg-1 col-md-1 col-sm-1 col-xs-1'>


                                            </div>
                                            
                                            <div class='col-lg-1 col-md-1 col-sm-1 col-xs-1'>
                                                <img src='getprofilepic.php?id=".$_SESSION['profileid']."'  width='40px' >

                                            </div>
                                            <div class='col-lg-9 col-md-9 col-sm-9 col-xs-9'>

                                                <div class='form-group'>
                                                
                                                    <textarea class='form-control cmntsection' rows='1' id='".$postids[$i]."'></textarea>
                                                  
                                                </div>
                                            </div>
                                            <div class='col-lg-1 col-md-1 col-sm-1 col-xs-1'>


                                            </div>

                                        </div><!-- row 2.1.2-->

                                        </br>
                                                                   </div><!--close thumbnail-->
                            </div><!--close dim 2.2-->


                        </div><!--close wallpost-->
                        ";}}
                        
                        ?>
                        
                       
                    </div><!--row2.1 close-->

                </div><!--jumbotron close-->
                </div><!--dim2.1 close-->
                                                                       
            </div><!--close row2-->
            <div class="row"><!--row3-->
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                     <div class=wrap1>
                        <div class="fhead">
                            <h4 class="text-info"  > Friends</h4>
                        </div>
                        <div class="friendslist" id="friends">
                            <div class="user" id="u0"></div>
                            <div class="user" id="u1"></div>
                            <div class="user" id="u2"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-1 col-sm-2 col-xs-12">
                    
                    <div id="wrap" class="msgwarp">
                    <div  class="chathead1" id ="chead0">
                        <div id="headtext1"></div>
                        <div class="close">X</div>
                    </div>
                    <div class="msgtxt">
                        <div id="chatlogs1" class="chatlog"></div>
                        <div class="messagetext" id="msgtext">
                            <div class="form-group">
                                <textarea class="text1 form-control" rows="4" id="text_1" name ="message"></textarea>
                            </div>
                        </div>
                    </div>
                    </div>
                
                </div>
                <div class="col-lg-3 col-md-1 col-sm-3 col-xs-12">
                    <div id="wrap_1" class="msgwarp_2">
                        <div id ="head" class="chathead2" id ="chead1">
                            <div id="headtext2"></div>
                            <div class="close1">X</div>
                        </div>
                        <div class="msgtxt_1">
                            <div id="chatlogs2" class="chatlog"></div>
                            <div class="messagetext" id="msgtext">
                                <div class="form-group">
                                    <textarea class="text2 form-control" rows="4" id="text_2" name ="message"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-lg-3 col-md-1 col-sm-3 col-xs-12">
                
                
                    <div id="wrap_2" class="msgwarp_3">
                        <div id ="head" class="chathead3" id ="chead2">
                            <div id="headtext3"></div>
                            <div class="close2">X</div>
                        </div>
                        <div class="msgtxt_2">
                            <div id="chatlogs3" class="chatlog"></div>
                            <div class="messagetext_2" id="msgtext">
                                <div class="form-group">
                                    <textarea class="text3 form-control" rows="4" id="text_2" name ="message"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>    
            </div><!--close row3--> 

           
            <div id="messagecontainer" class="msgcnter">
                
              <!--  <div id="wrap" class="msgwarp">
                    <div  class="chathead1" id ="chead0">
                        <div id="headtext1"></div>
                        <div class="close">X</div>
                    </div>
                   <!-- <div class="msgtxt">
                        <div id="chatlogs1" class="chatlog"></div>
                        <div class="messagetext" id="msgtext">
                            <textarea class="text1" rows="4" id="text_1" name ="message"></textarea>
                        </div>
                    </div>
                    </div>
                

                <div id="wrap_1" class="msgwarp_2">
                    <div id ="head" class="chathead2" id ="chead1">
                        <div id="headtext2"></div>
                        <div class="close1">X</div>
                    </div>
                    <div class="msgtxt_1">
                        <div id="chatlogs2" class="chatlog"></div>
                        <div class="messagetext" id="msgtext">
                            <textarea class="text2" rows="4" id="text_2" name ="message"></textarea>
                        </div>
                    </div>

                </div>-->
<!--

                <div id="wrap_2" class="msgwarp_3">
                    <div id ="head" class="chathead3" id ="chead2">
                        <div id="headtext3"></div>
                        <div class="close2">X</div>
                    </div>
                    <div class="msgtxt_2">
                        <div id="chatlogs3" class="chatlog"></div>
                        <div class="messagetext_2" id="msgtext">
                            <textarea class="text3" rows="4" id="text_3" name ="message"></textarea>
                        </div>
                    </div>

                </div>
-->
            </div><!--message container-->
                <!--add here-->

                
        </div><!--close  container-->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="jsscripts.js"></script>
        <script type="text/javascript">


        </script>

    </body>
</html>