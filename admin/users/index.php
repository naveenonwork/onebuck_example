<?php 
include_once("../header.php");

page_protect();

$errmsg='';
$msg='';
$search='';
if(isset($_POST['search'])){
$search=$_POST['search'];
}
if(isset($_POST['delete'])){
$delid=$_POST['delete'];

$query="delete from `example_users`  where `ID`=$delid ";
if($conn->query($query)===true){
		$msg="<div class='row'>
        <div class='col-md-12'>
            <div class='box-body'>
              <div class='alert alert-success alert-dismissible'>
			  	<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i>Success</h4>
                Recourds has been Delete.
              </div>
            </div>
            <!-- /.box-body -->
          
        </div>
        <!-- /.col -->
</div>";
	}else{
	$errmsg="<div class='alert alert-warning' color='red'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>Records has been not Deleted</strong></div>";
	
	}
}
?>
<div class="container">
	<div class="panel-group">
<div class="panel panel-default">
<div class="panel-body"><h2>User Manager 
<a class="btn btn-success pull-right" href="add.php"><span class="glyphicon glyphicon-plus-sign"></span>Add</a>
<a style="margin-right:5px;" class="btn btn-default pull-right" href="../index.php"><span class="glyphicon glyphicon-home"></span> Home</a>
</h2>   
</div>
    </div>
 </div>
	 <div class="panel panel-default">
  <div class="panel-body">
      <form class="form-inline pull-right" role="form" method="post">
      <div class="form-group">
        <label for="email">Search</label>
        <input type="text" name="search" value="<?php echo $search; ?>" class="form-control"  >
        </div>
      <button type="submit" class="btn btn-default">Go <i class="fa fa-arrow-right"></i></button>
      </form>
    </div>
</div> 
	<?php echo $msg; ?>
	<?php echo $errmsg; ?>

	<?php 
    if(isset($_GET['delid'])){
    $delid=$_GET['delid'];
    ?>


    <div class="box box-default">
    <div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <table align="center">  
    <tr>
    <td><strong>Are you sure want to delete</strong></td>
    </tr>
    <tr>
                <td>
                <form method="post" action="index.php">
                <button class="btn btn-success margin pull-right" type="submit" name="yes" ><span class="fa fa-check"></span> Confirm</button>
                <input type="hidden" name="delete" value="<?php echo  $delid; ?>" />
                
                </form>
                </td> 
                <td>
                <form method="post" action="index.php">
                <input type="submit" class="btn btn-default" value="Cancel" />
                </form>
                </td>           
    </tr> 
               
    </table>
    </div></div>


<?php }?>
    <div class="box">
    <div class="box-body">
      <div class="table-responsive">
    <table class="table table-bordered">
    
    <tr >
    
    
    <th align="center">UserID</th>
    <th align="center">First Name</th>
    <th align="center">Last Name</th>
    <th align="center">Email</th>
    <th align="center">Phone</th><th align="center"></th>
    </tr>
    
    
    <?php
    
    $paged = (isset($_GET['page'])) ? $_GET['page'] : 1;
    
    $total_query= "select count(*) as total from `example_users`  where  user_level not in(1)";
    
    if(!empty($search))
        {
        
    $total_query ="select count(*) as total from `example_users` where 
        
        (`UserID` like '%$search%' or 	
         `Email` like '%$search%'or  
         `FirstName` like '%$search%'or
         `LastName` like '%$search%'or 
         `Phone` like '%$search%') and  user_level not in(1)
            
        ";
        }
    
    $total=get_Total($total_query,'total');
    $pages=1;
    if ($total>0){
      $pages=ceil($total/$per_page);
    }
    
    
    $query="select * from `example_users`  where  user_level not in(1)";
    
    if(!empty($search))
        {
        
    $total_query ="select count(*) as total from `example_users` where 
        
        (`UserID` like '%$search%' or 	
         `Email` like '%$search%'or  
         `FirstName` like '%$search%'or
         `LastName` like '%$search%'or 
         `Phone` like '%$search%'
          ) and  user_level not in(1)  
        ";
        }
    
    $paged=$per_page*($paged-1);
     $query .=" limit  $paged ,$per_page ";
    
    $result=$conn->query($query);
    while($records=mysqli_fetch_assoc($result)){
    $ID=$records['ID'];
    $Salt=$records['Salt'];
    $UserID=$records['UserID'];
    $Password=$records['Password'];
    $Email=$records['Email'];
    $FirstName=$records['FirstName'];
    $LastName=$records['LastName'];
    $Address=$records['Address'];
    $ZipCode=$records['ZipCode'];
    $State=$records['State'];
    $Phone=$records['Phone'];
    
    
    ?>
    
    <tr align="center">
    
    
    
    <td align="center"><?php echo str_replace("$search","<span class='text-danger'>$search</span>",$UserID); ?></td>
    <td align="center"><?php echo str_replace("$search","<span class='text-danger'>$search</span>",$FirstName); ?></td>
    <td align="center"><?php echo str_replace("$search","<span class='text-danger'>$search</span>",$LastName); ?></td>
    <td align="center"><?php echo str_replace("$search","<span class='text-danger'>$search</span>",$Email); ?></td>
    <td align="center"><?php echo str_replace("$search","<span class='text-danger'>$search</span>",$Phone); ?></td><td align="center"><a   class="btn btn-default"  href="edit.php?ID=<?php echo $ID ?>"><span class="glyphicon glyphicon-pencil"></span></a> 
    <a  class="btn btn-default"  href="index.php?delid=<?php echo $ID; ?>"><span class="glyphicon glyphicon-trash text-danger"></span></a>
    </td>
    </tr>
    
    <?php } ?>
    <tfoot>
    <tr><td colspan="8"><?php pagination($pages); ?></td></tr>
    </tfoot>
    </table></div></div>
    </div>
</div>
<?php include_once('../footer.php'); ?>