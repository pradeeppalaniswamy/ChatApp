<?php
require 'processor.php';
//require 'getprofilepic.php';
    session_start();
    $frndname=$_POST["search"];
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
                            <li class="active">
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
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo $_SESSION['username']."&nbsp;"?>
                                </a>                                               
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-                                                expanded="false">&nbsp;
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true">&nbsp;Contact Us <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Email</a></li>
                                    <li><a href="#">Phone</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Set Appointment</a></li>
                                </ul>
                                <li>
                                    <a href="logout.php"> 
                                        <span class="glyphicons glyphicons-keys" aria-hidden="true">                  </span>
                                        &nbsp;&nbsp;Logout
                                    </a>                               
                                </li>
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
            </br>
             </br>
              </br>
             <div class="col-lg-4 col-md-4 col-sm-0 col-xs-0"> </div><div class="col-lg-5 col-md-5 col-sm-12 col-xs-12"> 
             <table class="table table-hover" border="0" margin='opx'>
              
         <?php
         $frndname=$_POST["search"];
         
         
         echo"</br></br></br>";
              echo"  <div class='well well-sm' >srch =".$frndname."</div> ";
         
        $flag=0;
       
      
         
      if($frndname==""){
                                     
                      
                    $friendlist=findfriends();
         for($i=0;$i<count($friendlist);$i++ )
                        {  $flag=1;
                        $tempfrnd=   $friendlist[$i];
                         echo" <tr><td> <img src='getprofilepic.php?id=".$tempfrnd[2]."' alt=''  class='img-rounded ' height='50' width='50'>
 </img></td><td>  <div class='well well-sm' >srch =".$tempfrnd[0]."<td><input type='submit'class='btn btn-primary' value='Add friend'></div></td></tr>";
                  
                        }
                                        
                        }            
                         else{  
                         
                         
                         $friendlist=findownfriends($frndname);
           for($i=0;$i<count($friendlist);$i++ )
                        { $flag=1;
                        $tempfrnd=   $friendlist[$i];
                         echo" <tr><td> <img src='getprofilepic.php?id=".$tempfrnd[2]."' alt=''  class='img-rounded ' height='50' width='50'>
 </img></td><td> <div class='well well-sm' >srch =".$tempfrnd[0]."&nbsp;&nbsp;&nbsp;</td><td><input type='submit'class='btn btn-primary' value='unfriend'></div></td></tr> ";
        
                        
                        
                        }
                         
                         $friendlist=findfriends1($frndname);
                                     
         for($i=0;$i<count($friendlist);$i++ )
                        {  $flag=1;
                        $tempfrnd=   $friendlist[$i];
                         echo"  <tr><td> <img src='getprofilepic.php?id=".$tempfrnd[2]."' alt=''  class='img-rounded ' height='50' width='50'>
 </img></td><td> <div class='well well-sm' >srch =".$tempfrnd[0]."<td><input type='submit'class='btn btn-primary' value='Add friend'></div></td></tr>";
        
                                  
         
                        
                        
                        }}
                        
                        if($flag==0)
                        {echo" <tr><td>  <div class='well well-sm' >No search results found</div></td></tr> ";}

         
          ?>
          </div>
    </body>
</html>
