<?php include_once("header.php");


$search='';
if(isset($_POST['search'])){
$search=$_POST['search'];
}





 ?>

<div class="container">
<div class="row">
<div class="col-md-12">

<div class="panel-group">
<div class="panel panel-default">
<div class="panel-body"><h2>Job
<a class="btn btn-success pull-right" href="<?php echo $siteurl_blog; ?>admin/job/add.php"><span class="glyphicon glyphicon-plus-sign"></span>Add</a>
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

<tr align="center">

<th>Job Title</th>
<th>Photo</th>
<th>Category Name</th>


<th>Create Date</th>
<th>City</th>
<th>State</th>
<th></th> 
</tr>

<?php
//$per_page=3;

$paged = (isset($_GET['page'])) ? $_GET['page'] : 1;

$total_query= "select count(*) as total,jb.*,cat.category_title as category_name,cat_style.category_title as style_name  FROM `job` jb left join category cat on cat.category_id=jb.category
   left join category cat_style on cat_style.category_id=jb.style";


$total=get_Total($total_query,'total');
$pages=1;
if ($total>0){
  $pages=ceil($total/$per_page);
}


   
  $query="SELECT jb.*,cat.category_title as category_name,cat_style.category_title as style_name  FROM `job` jb left join category cat on cat.category_id=jb.category
   left join category cat_style on cat_style.category_id=jb.style  ";


     $search='';
if (isset($_GET['search'])){
$search=$_GET['search'];

  $query.=" and jb.`job_title` like '%$search%' or cat.`category_title` like '%$search%' or cat_style.`category_title` like '%$search%'";

}


$paged=$per_page*($paged-1);
 $query .=" limit  $paged ,$per_page ";









$result=mysqli_query($conn,$query);
while ($records=mysqli_fetch_assoc($result)){
$job_id=$records["job_id"];
$job_title=$records["job_title"];
$photo=$records["photo"];
$category=$records["category"];
$category_name=$records["category_name"]; 
$url=$records["url"];
$short_description=$records["short_description"];
$description=$records["description"];
$job_type=$records["job_type"];
$style=$records["style"];
$style_name=$records["style_name"];
$create_date=$records["create_date"];
$create_by=$records["create_by"];
$job_status=$records["job_status"];

$city=$records["city"];
$state=$records["state"];

?>
<tr>
<td align="center"><?php echo str_replace("$search","<span class='text-danger'>$search</span>",$job_title); ?></td>

<td>
<div class="widget-user-image">
                <?php $image= '../images/job/thumbnails/' . $job_id ."." . $photo; ?>
                  <img class="img"   src="<?php if($photo==''){echo $image="../images/job/thumbnails/no_image.png";}else{ echo $image; }?>" alt="User Avatar">
</div>
</td>

<td align="center"><?php echo str_replace("$search","<span class='text-danger'>$search</span>",$category_name); ?></td>
<td align="center"><?php echo str_replace("$search","<span class='text-danger'>$search</span>",$create_date); ?></td>
<td align="center"><?php echo str_replace("$search","<span class='text-danger'>$search</span>",$city); ?></td>
<td align="center"><?php echo str_replace("$search","<span class='text-danger'>$search</span>",$state); ?></td>

<td><a  class="btn btn-default"  href="job/edit.php?edit_id=<?php echo $job_id; ?>"><span class="glyphicon glyphicon-pencil"></span></a> <a class="btn btn-default " href="job/delete.php?dlt_id=<?php echo $job_id; ?>"><span class="glyphicon glyphicon-trash text-danger"></span></a></td>
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
   </div> <!--row-->


 </div>




<script>
  $(function () {
    $("#example1").DataTable();
	    $("#table__").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<?php include_once("footer.php"); ?>
