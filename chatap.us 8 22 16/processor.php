<?php
 $con=mysql_connect("localhost","pradeeppal","Asdf@1234")or die("couldnotconnect");
mysql_select_db('chatapp_1990',$con);
    
 session_start();
function login($mailid,$password)
{
    
$res=mysql_query("select profileid,fname from profile where emailid='$mailid' and password='$password';");

if(mysql_num_rows($res))
{
session_start();
$fetch =mysql_fetch_array($res);
	$_SESSION['username']=$fetch['fname'];
    $_SESSION['profileid']=$fetch['profileid'];
    $uname=$_SESSION['username'];
   
mysql_query("update  profile set login = 1 where fname='$uname';");

    header("location:index.php");

}	

else{ 
	//echo "failure";

	header("location:newuser.php");	
}

}

function addcomment($userid,$postid,$comment)
{
    // mysql_query("insert into comments(comment,postid,userid) values ('$comment','9','1');");
    mysql_query("insert into comments(comment,postid,userid) values ('$comment','$postid','$userid');");
//header("location:newuser.php");	
    
}


function Adduser($user)
{
    $email=$user['email'];
    $password=$user['password'];
    $fname=$user['fname'];
    $lname=$user['lname'];
    $dob=$user['DOB'];
    echo $dob;
    echo $lname;
    echo $fname;
  $res=mysql_query("insert into profile(emailid,password,fname,lname,DOB) values ('$email','$password','$fname','$lname','$dob');");  
//header("location:newuser.php");
    if($res>0)
echo"user added succesfully";
    else 
        echo "not successful";

}
function getname($profileid)
{
   $res=mysql_query(" select fname from profile  where profileid=$profileid"); 
    
    if(mysql_num_rows($res))
    {
        
        while($extract =mysql_fetch_array($res))
{
    $name=$extract['fname'];

    }

    return $name;

    }
 
    
}    
function getmyposts()
{
    
   $profileid=getprofileid(); 
   $res=mysql_query(" select postid from posts where userid=$profileid order by postid desc"); 
    
    if(mysql_num_rows($res))
    {
        $friends[0]=-1;
        $i=0;
while($extract =mysql_fetch_array($res))
{
    $friends[$i++]=$extract['postid'];

    }

    return $friends;

    }


}
function getpostsids()
{
    
   $profileid=getprofileid(); 
   $res=mysql_query(" select postid from posts where userid in  (select distinct(user2) from friends where status= 'friends' and user1=$profileid 
   union 
   select distinct(user1) from friends where user2 =$profileid and status='friends')"); 
    
    if(mysql_num_rows($res))
    {
        $friends[0]=-1;
        $i=0;
while($extract =mysql_fetch_array($res))
{
    $friends[$i++]=$extract['postid'];

    }

    return $friends;

    }

    
}


function findownfriends($srchqry)
{
$i=0;
   $profileid=getprofileid(); 

   $res=mysql_query(" select fname,profilepic,profileid from profile where profileid  in (select distinct(user2) from friends where status= 'friends' and user1=$profileid 
   union 
   select distinct(user1) from friends where user2 =$profileid and status='friends') and profileid  !=$profileid   and (fname like '%$srchqry%' or lname like '%$srchqry%')"); 
  
if(mysql_num_rows($res))
    {
      
while($extract =mysql_fetch_array($res))
{
    $friends[0]=$extract['fname'];
    $friends[1]=$extract['profilepic'];
 $friends[2]=$extract['profileid'];
$friend[$i++]=$friends;
    }
}
    return $friend;

    }

function findfriendrequests($srchqry)
{
$i=0;
   $profileid=getprofileid(); 

   $res=mysql_query(" select fname,profilepic,profileid from profile where profileid  in (select distinct(user2) from friends where status= 'addfriend' and user1=$profileid ) and profileid  !=$profileid   and (fname like '%$srchqry%' or lname like '%$srchqry%')"); 
  
if(mysql_num_rows($res))
    {
      
while($extract =mysql_fetch_array($res))
{
    $friends[0]=$extract['fname'];
    $friends[1]=$extract['profilepic'];
 $friends[2]=$extract['profileid'];
$friend[$i++]=$friends;
    }
}
    return $friend;

}



function findfriendrequests1($srchqry)
{
$i=0;
   $profileid=getprofileid(); 

   $res=mysql_query(" select fname,profilepic,profileid from profile where profileid  in ( 
   select distinct(user1) from friends where user2 =$profileid and status='addfriend') and profileid  !=$profileid   and (fname like '%$srchqry%' or lname like '%$srchqry%')"); 
  
if(mysql_num_rows($res))
    {
      
while($extract =mysql_fetch_array($res))
{
    $friends[0]=$extract['fname'];
    $friends[1]=$extract['profilepic'];
 $friends[2]=$extract['profileid'];
$friend[$i++]=$friends;
    }
}
    return $friend;

}





function findfriends()
{
$i=0;
   $profileid=getprofileid(); 

   $res=mysql_query(" select fname,profilepic,profileid from profile where profileid not in (select distinct(user2) from friends where status in ('friends','addfriend') and user1=$profileid 
   union 
   select distinct(user1) from friends where user2 =$profileid and status in ('friends','addfriend')) and profileid  !=$profileid  "); 
if(mysql_num_rows($res))
    {
      
while($extract =mysql_fetch_array($res))
{
    $friends[0]=$extract['fname'];
    $friends[1]=$extract['profilepic'];
 $friends[2]=$extract['profileid'];
$friend[$i++]=$friends;
    }
}
    return $friend;

    }


function findfriends1($srchqry)
{
$i=0;
   $profileid=getprofileid(); 

   $res=mysql_query(" select fname,profilepic,profileid from profile where profileid not in (select distinct(user2) from friends where status in ('friends','addfriend') and user1=$profileid 
   union 
   select distinct(user1) from friends where user2 =$profileid and status in ('friends','addfriend')) and profileid  !=$profileid   and (fname like '%$srchqry%' or lname like '%$srchqry%')"); 
  if(mysql_num_rows($res))
    {
      
while($extract =mysql_fetch_array($res))
{
    $friends[0]=$extract['fname'];
    $friends[1]=$extract['profilepic'];
 $friends[2]=$extract['profileid'];
$friend[$i++]=$friends;
    }
}
    return $friend;


    }






function getcomments($postid)
{
    //$eccomment[0]="";
    $res=mysql_query("select p.fname,c.comment,c.postid,c.userid ,p.profileid from profile p,comments c where c.userid=p.profileid and c.postid=$postid;");
    $comment['fname']="";
    $comment['comment']="";
    $comment['postid']="";
    $comment['profileid']="";
    $eccomment[0]=$comment;
$i=0;
if(mysql_num_rows($res))
{

 while($fetch =mysql_fetch_array($res))
	
 {
	$comment['fname']=$fetch['fname'];
    $comment['comment']=$fetch['comment'];
    $comment['postid']=$fetch['postid'];
    $comment['profileid']=$fetch['profileid'];
    
$eccomment[$i++]=$comment;
}

}
    
    if($comment['fname']!="")
return  $eccomment;   
    
    
}

function getposts( $postid)
{
    
    
    $res=mysql_query("select postid,fname,userid,heading,description from posts,profile where   userid=profileid and postid= $postid ;");
     if(mysql_num_rows($res))
     {
       $posts['heading']=-1;  
    while($extract =mysql_fetch_array($res))
    {   $posts['postid']=$extract['postid'];
        $posts['heading']=$extract['heading'];
        $posts['description']=$extract['description'];
        $posts['userid']=$extract['userid'];
        $posts['fname']=$extract['fname'];
    }     
     return $posts;    
         
     }
    
}

function getfrnsposts( )
{

    
    $profileid=$_SESSION['profileid'];
    $res=mysql_query("select postid,heading,description from posts where userid in (select distinct(user2) from friends where status= 'friends' and user1=$profileid 
   union 
   select distinct(user1) from friends where user2 =$profileid and status='friends')");
     if(mysql_num_rows($res))
     {
       $posts['heading']='';  
    while($extract =mysql_fetch_array($res))
    {   $post['id']=$extract['postid'];
        $posts['heading']=$extract['heading'];
        $posts['description']=$extrsct['description'];
        
    }     
     return $posts;    
         
     }
    
}

function findonlineusers($cnt,$id)
{


$profileid= getprofileid();



$selquery= "select fname from profile where login=1 and    profileid in (select user1 from friends where status ='friends'  and user2=$profileid  union  select user2 from friends where status ='friends'  and user1=$profileid) order by fname limit  $cnt,1   ; ";


$reslt=mysql_query($selquery);

while($extract =mysql_fetch_array($reslt))
{

    $pp=$extract['fname'];
    if($pp!=$uname)echo"$pp";

}

}

function getprofileid()
    
{    return  $_SESSION['profileid'];
}


function logout()
{
    session_start();
$uname =$_SESSION['username'];
$user="root";
$pass="Asdf@1234";

$con=mysql_connect("localhost","pradeeppal","Asdf@1234")or die("couldnotconnect");
mysql_select_db('chatapp_1990',$con);
mysql_query("update  profile set login = -1 where fname='$uname';");
session_destroy();

header("Location:newuser.php") ;   
}

function deletethepost($postid)
{
  mysql_query("delete from comments where postid=$postid; ");
//  mysql_query("insert into comments values ('$postid',12,2");  
  mysql_query("delete from posts where postid=$postid;");
     mysql_query(" update comments set comment='$postid';");
    ///
//    mysql_query("delete from comments");
  //    mysql_query("insert into comments values ('wtf',12,2");
}


function addfriend($id,$frid)
{     
    mysql_query(" insert into friends ( user1, user2 ,status ) values ($id,$frid,'addfriend');");
}
function acceptfriend($id,$frid)
{     
    mysql_query(" update friends set status='friends' where ( user1=$id and user2 =$frid ) or (user2=$id and user1 =$frid);");
}





function unfriend($id,$frid)
{     
   // mysql_query(" update friends  set status ='unfriend' where ( user1=$id and user2 =$frid ) or (user2=$id and user1 =$frid);");
mysql_query(" delete from  friends  where ( user1=$id and user2 =$frid ) or (user2=$id and user1 =$frid);");

}








function friendrequests1()
{
$i=0;
   $profileid=getprofileid(); 

   $res=mysql_query(" select profileid,fname from profile where profileid in (SELECT user1 from friends where user2=$profileid and status='addfriend')"); 
  if(mysql_num_rows($res))
    {
      
while($extract =mysql_fetch_array($res))
{
    $friends[0]=$extract['profileid'];
    $friends[1]=$extract['fname'];
 
$friend[$i++]=$friends;
    }
}
    return $friend;


    }









?>