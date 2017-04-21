<?php
include_once('../config.php'); 
include_once('../conn.php');
include_once('../utility.php');

$msg='';
$errmsg='';

if(isset($_SESSION['admin_userid'])){
			
		 redirect_to_page("admin/index.php");
}

$query="select * from example_users where  user_level=5";
$result_check=$conn->query($query);
if(mysqli_num_rows($result_check)<1){

 redirect_to_page("admin/signup.php");
}



if(isset($_POST['login'])){
$user_id=$_POST['UserID'];
$pass=$_POST['pwd'];
 $redirect="";
 
 if(isset($_POST['redirect']))
	$redirect=$_POST['redirect'];

 $query="select * from example_users where UserID='$user_id' and user_level=5";
$result=$conn->query($query);



if(mysqli_num_rows($result)>0){
 $records=mysqli_fetch_assoc($result);


$salt=$records['Salt'];
$Password=$records['Password'];
$hash=checkhashSSHA($salt, $pass);
	
	if($hash==$Password){
	
	$_SESSION['admin_userid']=$records['ID'];
	$_SESSION['admin_username']=$records['UserID'];
	$_SESSION['admin_email']=$records['Email'];
		if(empty($redirect)){
	
			redirect_to_page("admin/index.php");
		}else{
			//header("Location:".$redirect);
			redirect_to_page(admin/$redirect);
		}
	
	}else{
	
	$msg="<div class='alert alert-warning' color='red'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Password Mismatch!!</strong> Please check credentials</div>";
	
	}
 
 }//if
 else{
 $msg="<div class='alert alert-warning' color='red'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Unauthorized Access!!</strong> Please check credentials</div>";
	
 
 }
}
?>

 <?php include_once("header_plain.php");
?>


<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>login</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
<?php echo $msg ;?>
    <form   method="post">
      <div class="form-group has-feedback">
        <input type="trxt"  required class="form-control" name="UserID" placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password"  required class="form-control" name="pwd" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" name="login"  class="btn btn-primary btn-block btn-flat" value="Sign In">
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
 

  </div>
  <!-- /.login-box-body -->
</div>

 <?php include_once("footer_plain.php");
?>

