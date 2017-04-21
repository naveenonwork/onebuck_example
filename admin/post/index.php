<?php include_once("../header.php"); 


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
<div class="panel-body"><h2>Post
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

<tr align="center">

<th></th><th>Title</th>
 
<th></th>
</tr>


<?php
//$per_page=3;
$paged = (isset($_GET['page'])) ? $_GET['page'] : 1;

$total_query= "select count(*) as total FROM `post`";


$total=get_Total($total_query,'total');
$pages=1;
if ($total>0){
  $pages=ceil($total/$per_page);
}


$query="SELECT * FROM `post` where 1=1 ";
  $search='';
if (isset($_GET['search'])){
$search=$_GET['search'];

 $query.=" and `post`.`title` like '%$search%' or `post`.`page_name` like '%$search%'  or `post`.`meta_title` like '%$search%'";

}


$paged=$per_page*($paged-1);
 $query .=" limit  $paged ,$per_page ";


$result=mysqli_query($conn,$query);
while ($records=mysqli_fetch_array($result)){
$post_id=$records["post_id"];
$title=$records["title"];

$short_description=$records["short_description"];
$meta_title=$records["meta_title"];
$meta_description=$records["meta_description"];
$long_description=$records["long_description"];
$create_user=$records["create_user"];
$photo=$records["photo"];

?>

<tr>
<td><div class="widget-user-image">
                <?php $image= '../../images/post/thumbnails/' . $post_id ."." . $photo; ?>
                  <img class="img" width="80px" height="80px" src="<?php if($photo==''){echo $image="../../images/post/thumbnails/no_image.png";}else{ echo $image; }?>" alt="User Avatar">
</div></td>
<td align="center"><?php echo str_replace("$search","<span class='text-danger'>$search</span>",$title); ?></td>




<td><a  class="btn btn-default" href="edit.php?edit_id=<?php echo $post_id; ?>"><span class="glyphicon glyphicon-pencil"></span></a> <a  class="btn btn-default" href="delete.php?dlt_id=<?php echo $post_id; ?>"><span class="glyphicon glyphicon-trash text-danger "></span></a></td>
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
   </div><!--row-->
   </div>
 <?php include_once("../footer.php"); ?>
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
