<?php 
include_once("../header.php"); 

$msg='';
$url_manager_id='';

if(isset($_GET['edit_id'])){
$url_manager_id=$_GET['edit_id'];
}

if (isset($_POST["submit"])){
$old_url=$_POST['old_url'];
$new_url=$_POST['new_url'];


$query="UPDATE `url_manager` SET `old_url`='$old_url',`new_url`='$new_url' WHERE `url_manager_id`='$url_manager_id'";

if (mysqli_query($conn,$query)){
$msg="<div class='row'>
        <div class='col-md-12'>
            <div class='box-body'>
              <div class='alert alert-success alert-dismissible'>	
			  	<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i>Success!!</h4>
                Record has been updated.
              </div>
            </div>
            <!-- /.box-body -->
          
        </div>
        <!-- /.col -->
</div>";

}else{
$msg="<div class='row'>
        <div class='col-md-12'>
            <div class='box-body'>
              <div class='alert alert-success alert-dismissible'>
			  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i> Error!!</h4>
                Record could not be updated...
              </div>
            </div>
            <!-- /.box-body -->
          
        </div>
        <!-- /.col -->
</div>";

}
}

?>

 
<?php
 $query="SELECT * FROM `url_manager` WHERE `url_manager_id`='$url_manager_id'";
$result=mysqli_query($conn,$query);
while ($records=mysqli_fetch_array($result)){
$url_manager_id=$records['url_manager_id'];
$old_url=$records['old_url'];
$new_url=$records['new_url'];

?>
     
     

                       


            
          
            <form role="form" method="post" >
            
            <div class="panel-group">
<div class="panel panel-default">
<div class="panel-body"><h2>Update Url Manager
<button style="margin-left:5px;" type="submit" name="submit" class="btn btn-success pull-right" ><span class="glyphicon glyphicon-floppy-disk"></span> Update</button> 
<a class="btn btn-info pull-right" href="index.php"> <i class="fa fa-arrow-left" aria-hidden="true"></i> 
Back</a></h2></div>
    </div>
 </div>    
            
            
          <?php echo $msg   ?>
           <div class="box box-primary">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Old Url</label>
                  <input type="text" class="form-control" name="old_url" value="<?php echo $old_url ?>">
                </div>
                 
                
                <div class="form-group">
                  <label for="exampleInputEmail1">New Url</label>
                  <input type="text" class="form-control " name="new_url" value="<?php echo $new_url ?>">
                </div>
                
                
              
                
              </div>
              <!-- /.box-body -->


             </div>


            </form>
            <?php }?>
           
<?php include_once("../footer.php"); ?>
