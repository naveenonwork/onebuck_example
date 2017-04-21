<?php 
include_once("../header.php");


$search='';
if(isset($_POST['search'])){
$search=$_POST['search'];
}





?>

 <div class="panel-group">
<div class="panel panel-default">
<div class="panel-body"><h2>Url Manager
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
<tr  >

<th>Old Url</th>
<th>New Url</th>
<th></th>
<th></th> </tr>
</thead>
<?php

$paged = (isset($_GET['page'])) ? $_GET['page'] : 1;

$total_query= "select count(*) as total FROM `url_manager`";


$total=get_Total($total_query,'total');
$pages=1;
if ($total>0){
  $pages=ceil($total/$per_page);
}

 $query="SELECT * FROM `url_manager` where 1=1 ";

  $search='';
if (isset($_GET['search'])){
$search=$_GET['search'];





 $query.=" and `url_manager`.`old_url` like '%$search%' or `url_manager`.`new_url` like '%$search%' ";

}


$paged=$per_page*($paged-1);
 $query .=" limit  $paged ,$per_page ";


$result=mysqli_query($conn,$query);
while ($records=mysqli_fetch_array($result)){
$url_manager_id=$records["url_manager_id"];
$old_url=$records["old_url"];
$new_url=$records["new_url"];

?>
<tr>
<td align="center"><?php echo str_replace("$search","<span class='text-danger'>$search</span>",$old_url); ?></td>
<td align="center"><?php echo str_replace("$search","<span class='text-danger'>$search</span>",$new_url); ?></td>
<td><a  class="btn btn-default"  href="edit.php?edit_id=<?php echo $url_manager_id; ?>"><span class="glyphicon glyphicon-pencil"></span></a> <a  class="btn btn-default" href="delete.php?dlt_id=<?php echo $url_manager_id; ?>"><span class="glyphicon glyphicon-trash text-danger "></span></a></td>

</tr>
<?php } ?>
 <tfoot>
<tr><td colspan="6"><?php pagination($pages); ?></td></tr>
</tfoot>    

 </table>
      </div> <!--table-responsive-->       
    </div> <!--box-body-->
            
   </div> <!--box--> 
<?php include_once("../footer.php"); ?>
