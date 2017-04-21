<?php 
include_once("../header.php");


$search='';
if(isset($_POST['search'])){
$search=$_POST['search'];
}






?>

<?php
			$type='post';
			
			if(isset($_REQUEST['type'])){
			$type=$_REQUEST['type'];
			$_SESSION['cat_type']=$type; 
			}
			if(isset($_SESSION['cat_type'])){
			$type=$_SESSION['cat_type'];
			 
			}

 ?>
<div class="container">
    <div class="panel-group">
    <div class="panel panel-default">
    <div class="panel-body"><h2><?php if($type=="style"){ ?> Style <?php } else{ ?>Category <?php } ?>
    
    <a class="btn btn-success pull-right" href="add.php"><span class="glyphicon glyphicon-plus-sign"></span>Add</a>
    <a style="margin-right:5px;" class="btn btn-default pull-right" href="../index.php"><span class="glyphicon glyphicon-home"></span> Home</a>
    </h2>   
    </div>
        </div>
     </div>
 
 
 	 <div class="panel panel-default">
  <div class="panel-body">
      <form class="form-inline pull-right" role="form" method="get">
      <div class="form-group">
        <label for="email">Search</label>
        <input type="text" name="search" value="<?php echo $search; ?>" class="form-control"  >
        </div>
      <button type="submit" class="btn btn-default">Go <i class="fa fa-arrow-right"></i></button>
      </form>
    </div>
</div>
    <div class="box">
                
               
      <div class="box-body">
      <div class="table-responsive">
    <table class="table table-bordered " >
    <thead>
    <tr >
    
    <th>Title</th>
     
    <th></th>
     
    </tr>
    </thead>
    <?php
    // $per_page=2;
    $paged = (isset($_GET['page'])) ? $_GET['page'] : 1;
    
    $total_query= "select count(*) as total FROM `category`";
    
    
    $total=get_Total($total_query,'total');
    $pages=1;
    if ($total>0){
      $pages=ceil($total/$per_page);
    }
    
    
    $query="SELECT * FROM `category` where 1=1 ";
      $search='';
    if (isset($_GET['search'])){
    $search=$_GET['search'];
    
     $query.=" and `category`.`category_title` like '%$search%' ";
    
    }
    
    
    $paged=$per_page*($paged-1);
     $query .=" limit  $paged ,$per_page ";
    
    
    $query="SELECT * FROM `category` where `type`='$type'";
    $result=mysqli_query($conn,$query);
    while ($records=mysqli_fetch_array($result)){
    $category_id=$records["category_id"];
    $category_title=$records["category_title"];
    $category_description=$records["category_description"];
    
    ?>
    <tr>
    <td align="center"><?php echo str_replace("$search","<span class='text-danger'>$search</span>",$category_title); ?></td>
     
    <td><a class="btn btn-default"  href="edit.php?edit_id=<?php echo $category_id; ?>"><span class="glyphicon glyphicon-pencil"></span></a>  <a class="btn btn-default"  href="delete.php?dlt_id=<?php echo $category_id; ?>"><span class=" text-danger glyphicon glyphicon-trash"></span></a></td>
    
    </tr>
    <?php } ?>
    <tfoot>
    <tr><td colspan="6"><?php pagination($pages); ?></td></tr>
    </tfoot> 
    
     </table>
          </div> <!--table-responsive-->       
        </div> <!--box-body-->
                
       </div> <!--box--> 
</div>   
<?php include_once("../footer.php"); ?>
