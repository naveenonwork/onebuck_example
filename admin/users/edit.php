<?php 
include_once("../header.php"); 



$errmsg='';
$msg='';
$update=true;
if (isset($_GET['ID'])){
$ID=$_GET['ID'];
}
if (isset($_POST['submit'])){
$ID=$_POST['ID'];
$Salt="";
$UserID=$_POST['UserID'];
$Password=$_POST['pwd'];
$confirm=$_POST['confirm'];
$Email=$_POST['Email'];
$FirstName=$_POST['FirstName'];
$LastName=$_POST['LastName'];
$Address=$_POST['Address'];
$ZipCode=$_POST['ZipCode'];
$State=$_POST['State'];
$Phone=$_POST['Phone'];
if($Password!=$confirm){
$update=false;
$msg="<font color='red'>Password and confirm password does not match.</font>";
}

if(isEmailExisted($Email,$ID)){
$update=false;
$msg="<font color='red'>This Email already exsts ,try another</font>";
}
 
if($Password!=""){
		$update=true;
		$hash=hashSSHA($Password)	;
		$Salt= $hash['salt'];
		$Password=$hash['encrypted'];
			//get hash of password
}


	if($update){

 $query="update `example_users` set `UserID`='$UserID',`Salt`='$Salt',`Password`='$Password',`Email`='$Email',`FirstName`='$FirstName',`LastName`='$LastName',`Address`='$Address',`ZipCode`='$ZipCode',`State`='$State',`Phone`='$Phone' where `ID`='$ID'";

		if($conn->query($query)===true){
			$msg="<div class='alert alert-success' color='green'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>Record has been updated</strong></div>";
	}else{
	$errmsg="<div class='alert alert-warning' color='red'>
	<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>Record could not be update.. </strong></div>";
	}
		
	}
}
?>

<?php
 $query ="(select * from `example_users` where `ID`=$ID)";
$result=$conn->query($query);

while($record=mysqli_fetch_assoc($result)){
$ID=$record['ID'];
$Salt=$record['Salt'];
$UserID=$record['UserID'];
$Password=$record['Password'];
$Email=$record['Email'];
$FirstName=$record['FirstName'];
$LastName=$record['LastName'];
$Address=$record['Address'];
$ZipCode=$record['ZipCode'];
$State=$record['State'];
$Phone=$record['Phone'];
$user_level=$record['user_level'];
?>
<div class="container">
<form method="post" role="form">


<div class="panel-group">
<div class="panel panel-default">
<div class="panel-body"><h2>User Manager
<button style="margin-left:5px;" type="submit" name="submit" class="btn btn-success pull-right" ><span class="glyphicon glyphicon-floppy-disk"></span> Update</button> 
<a class="btn btn-info pull-right" href="index.php"> <i class="fa fa-arrow-left" aria-hidden="true"></i> 
Back</a></h2></div>
    </div>
 </div>
 
   <div class="box box-primary">
            <div class="box-body">
<?php echo $msg; ?>
<?php echo $errmsg; ?>
 
<input type="hidden"  class="form-control" name="ID" value="<?php if(isset($ID)){echo $ID;} ?>"  /> 



<div class="form-group">
<label for="UserID">UserID:</label>
<input type="text" class="form-control" readonly="readonly" name="UserID" value="<?php if(isset($UserID)){echo $UserID;} ?>"  /></div>

<div class="form-group">
<label for="Password">Password:</label>
<input type="password" class="form-control" name="pwd" value=""  /></div>
<div class="form-group">
<label for="Password">Confirm Password</label>
<input type="password" class="form-control" name="confirm" value=""  /></div>
<div class="form-group">
<label for="Email">Email:</label>
<input type="text" class="form-control" name="Email" required value="<?php if(isset($Email)){echo $Email;} ?>"  /></div>

<div class="form-group">
<label for="FirstName">FirstName:</label>
<input type="text" class="form-control" name="FirstName" required value="<?php if(isset($FirstName)){echo $FirstName;} ?>"  /></div>

<div class="form-group">
<label for="LastName">LastName:</label>
<input type="text" class="form-control" name="LastName" required value="<?php if(isset($LastName)){echo $LastName;} ?>"  /></div>

<div class="form-group">
<label for="Address">Address:</label>
<textarea  class="form-control" rows="3" name="Address" ><?php if(isset($Address)){echo $Address;} ?></textarea></div>

<div class="form-group">
<label for="ZipCode">ZipCode:</label>
<input type="text" class="form-control" name="ZipCode" value="<?php if(isset($ZipCode)){echo $ZipCode;} ?>"  /></div>

<div class="form-group">
<label for="State">State:</label>
<input type="text" class="form-control" name="State" value="<?php if(isset($State)){echo $State;} ?>"  /></div>

<div class="form-group">
<label for="Phone">Phone:</label>
<input type="text" class="form-control" name="Phone" value="<?php if(isset($Phone)){echo $Phone;} ?>"  /></div>

<div class="form-group">
<label for="Phone">User Level</label>
<select class="form-control" name="user_level">
		<option <?php if($user_level==0){ ?> selected="selected" <?php }  ?> value="0">Member</option>
        <option <?php if($user_level==5){ ?> selected="selected" <?php }  ?> value="5">Admin</option>
</select>
</div>

</div>
</div>


</form>
</div>
<?php } ?>

<?php include_once("../footer.php"); ?>
