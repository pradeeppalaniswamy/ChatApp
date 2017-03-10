
<!DOCTYPE html>
<html>
<head>
    
    <meta name="viewport" content="width = device-width, initial-scale = 1">
<title>Chat application</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

    
<style>
    
    body{
        background: #34495E;
    }
    
    .container
    {
        height:80%;
   width:95%;
   background-image:url(img/tran3.jpg);/*your background image*/  
   background-repeat:no-repeat;/*we want to have one single image not a repeated one*/  
   background-size:cover;/*this sets the image to fullscreen covering the whole screen*/  
    
        
    }
    a
    {
        text-decoration: none !important;
    }
  
    .well
    {background: #C0392B;
        color: azure;
        }
.centered-form{
	margin-top: 60px;
}

.centered-form .panel{
	background: rgba(255, 255, 255, 0.8);
	box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
   
}
    
    
     
    input[type="date"]:before {
        margin-right: 0.5em;
    content: attr(placeholder) !important;
    color: #aaa;
    
  }
  input[type="date"]:focus:before,
  input[type="date"]:valid:before {
    content: "";
  }
    
      </style>
	<title>Chat application</title>
    <link rel="stylesheet" type ="text/css" href="mainstyle.css">
	
</head>

<body >
    
     
         <div class="container">
             
             
             <!-- navbar-->
             <nav class="navbar navbar-default">
  <div class="container-fluid">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

      <!-- Button that toggles the navbar on and off on small screens -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          

      <!-- Hides information from screen readers -->
        <span class="sr-only"></span>

        <!-- Draws 3 bars in navbar button when in small mode -->
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="pull-left" href="#"><img src="img/logo1.png" width='50' height='50'></a>
        <a class="pull-left" href="#"><p><b><h2 class="text-prinary">&nbsp;&nbsp;Chatapp</h2></b></p></a>

        
        </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class= "collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <!-- navbar-left will move the search to the left -->
      <form class="navbar-form navbar-right" role="submit"  action="loginmodule.php" method="post">
        <div class="form-group">
            
          <input type="email" name ="emailid"class="form-control" placeholder="Email-id" required="required">
          <input type="password" name="password" class="form-control" placeholder="password" required="required">
      
          </div>
        <button type="submit" class="btn btn-default">Login</button>
      </form>
    </div><!-- /.navbar-collapse -->  </div><!-- /.container-fluid -->
</nav>

             <!--close navbar-->
             
             
             
             
        		
                
                <div class="row ">
                    <div class="col-xs-0 col-sm-0 col-md-1">
                    </div>
                    
                    <div class="col-xs-0 col-sm-0 col-md-5">
                        </div>
                        
                    <div class="col-xs-0 col-sm-0 col-md-1">
                        </div>			 			
                    
                            <div class="col-xs-0 col-sm-0 col-md-5">
                    			 			
                    
    <form role="form" method="post" action="adduser.php">
			    	           <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                 
                    <div class="well well-lg">Not a user register here </div>
                    </div>
                                                        </div>
                                                        <div class="row">
                
			    				<div class="col-xs-12 col-sm-12 col-md-12">
			    					<div class="form-group">
			                         <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name">
			    					</div>
			    				</div>
                                                        </div>
                                
                            <div class="row">
			    				<div class="col-xs-12 col-sm-12 col-md-12">
			    					<div class="form-group">
			    						<input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name">
			    					</div>
			    				</div>
			    			
                            </div>
                           <div class="row">
                               <div class="col-xs-12 col-sm-12 col-md-12">
			    				
			    			<div class="form-group">
			    				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address" required="required">
			    			</div>
                            </div>
                               </div>
                            <div class="row">
                               <div class="col-xs-12 col-sm-12 col-md-12">
			    				
			    			<div class="form-group">
			    				<input type="date" name="DOB" id="dob"  onfocus="(this.type='date')" class="form-control input-sm" placeholder="Date of birth">
			    			</div>
                            </div>
                               </div>

			    			<div class="row">
			    				<div class="col-xs-12 col-sm-12 col-md-12">
			    					<div class="form-group">
                                        
			    					<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password" required="required">
			    					</div>
			    				</div>
                                </div>
                            <div class="row">
			    			
			    				<div class="col-xs-12 col-sm-12 col-md-12">
			    					<div class="form-group">
<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password" required="required">
			    					</div>
			    				</div>
			    			</div>
                            
			    			<div class="row">
			    				<div class="col-xs-12 col-sm-12 col-md-12">
			    			
			    			<input type="submit" value="Register" class="btn btn-info btn-block">
                                </div></div>
         		</form>
                    </div>
                    </div></div>
	               </div>
    
    <!--close container-->
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="jsscripts.js"></script>
    <script type="text/javascript">

  		
	</script>

</body>
</html>