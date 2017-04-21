<?php
include_once('../conn.php');
include_once('../utility.php');
$err='';
$errmsg='';
$msg='';

if (isset($_POST['submit'])){
 $update=true;
 
$UserID=$_POST['UserID'];
$Password=$_POST['pwd'];
$confirm=$_POST['confirm'];
$Email=$_POST['Email'];
$FirstName=$_POST['FirstName'];
$LastName=$_POST['LastName'];


if($Password!=$confirm){
	$update=false;
	$msg="<font color='red'>Password and confirm password does not match.</font>";
}
if(isUserExisted($UserID,"")){
	$update=false;
	$msg="<font color='red'>This userid already taken ,try another</font>";
}

if(isEmailExisted($Email,"")){
	$update=false;
	$msg="<font color='red'>This email already exsts ,try another</font>";
}
$enct='';
if($Password!=""){
		$update=true;
		$hash=hashSSHA($Password)	;
		$Salt= $hash['salt'];
		$enct=$hash['encrypted'];
			//get hash of password
}



if($update){
  $query="insert into `example_users`(`Salt`,`UserID`,`Password`,`Email`,`FirstName`,`LastName`,`user_level`) values ('$Salt','$UserID','$enct','$Email','$FirstName','$LastName','5')";
		
		if ($conn->multi_query($query)===TRUE){
		$host  = $_SERVER['HTTP_HOST'];
$host_upper = strtoupper($host);
		$message = 
"Hello \n
Thank you for registering with us. Here are your login details...\n

User ID: $UserID
Email: $Email \n 
Password: $Password \n

Thank You

Administrator
$host_upper
______________________________________________________
THIS IS AN AUTOMATED RESPONSE. 
DO NOT RESPOND TO THIS EMAIL*
";

 mail($Email, "Login Details", $message,
    "From: \"Member Registration\" <auto-reply@$host>\r\n" .
     "X-Mailer: PHP/" . phpversion());
		
	$msg="<div class='alert alert-success'  ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Admin user has been creted you can <a href='signin.php'>login now </a> </strong></div>";
	}else{
	$errmsg="<div class='alert alert-danger'  ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Admin user creation failed </strong></div>";
	}
	}	
}
?>

 <?php include_once("header_plain.php");
?>

<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Register</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
  
	
        <div class='alert alert-warning'  ><strong>First Time Login!!</strong> Please create an admin user</div>
        <form method="post" role="form">
        
        
        
        <?php echo $msg; ?>
        <?php echo $errmsg; ?>
         
         
        
        <div class="form-group">
        <label for="UserID">UserID</label>
        <input type="text" class="form-control" required name="UserID" value=""  />
        </div>
        
        <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" class="form-control" required  name="pwd" value=""  /></div>
        <div class="form-group">
        <label for="Password">Confirm Password</label>
        <input type="password" class="form-control" required name="confirm" value=""  /></div>
        
        
        
        <div class="form-group">
        <label for="FirstName">First Name</label>
        <input type="text" class="form-control" required name="FirstName" value=""  />
        </div>
        
        <div class="form-group">
        <label for="LastName">Last Name</label>
        <input type="text" class="form-control" required name="LastName" value=""  />
        </div>
        
        <div class="form-group">
        <label for="Email">Email</label>
        <input type="text" class="form-control" required name="Email" value=""  />
        </div>
        
        
        
        
        
       <input type="submit" name="submit" class="btn btn-info" value="  Submit  " />
        
        
        
        </form>
    </div>
</div>
			
 <?php include_once("footer_plain.php");
?>