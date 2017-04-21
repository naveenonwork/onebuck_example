<?php
include_once("config.php");
include_once("conn.php");

$dir_path=dirname(__FILE__);
$smarty_path=$dir_path."/smarty/libs/Smarty.class.php";
include_once($smarty_path);
$smarty = new Smarty;

$smarty->template_dir = $dir_path."/templates/$template/";





?>

 <?php
$query="SELECT * FROM `post` where 1=1 ";


if(isset($_REQUEST['cat_id'])){
$cat_id=$_REQUEST['cat_id'];

$query="SELECT * from category where  `category_id`='$cat_id' ";
$result_cat=mysqli_query($conn,$query);

while ($records_cat=mysqli_fetch_array($result_cat)){
$title= $records_cat['category_title']. "'s Posts ";

}

$query="SELECT * FROM `post` inner join category_post on `category_post`.`post_id`=`post`.post_id where `category_post`.`category_id`='$cat_id' ";

}



 $search='';
if (isset($_GET['search'])){
$search=$_GET['search'];

$query.=" and `post`.`title` like '%$search%' or `post`.`meta_description` like '%$search%' ";

}


            $result=mysqli_query($conn,$query);
            $total=mysqli_num_rows($result);
			$post_data=array();
            while ($records=mysqli_fetch_array($result)){
			
			$post_data[]=$records;
            /*$post_id=$records["post_id"];
            $title=$records["title"];
            $meta_description=$records["meta_description"];
            $photo=$records["photo"];
            $image= 'admin/post/image/thumbnails/' . $post_id ."." . $photo;*/
            ?>

   
    
  

<?php } 

if($total==0){
?>
<h3>No post found</h3>

<?php

}
$query_post="SELECT * FROM `category`"; 
		$result_cat=mysqli_query($conn,$query_post);
		$cat_datas=array();
		while ($records_cat=mysqli_fetch_array($result_cat)){
		 $cat_datas[]=$records_cat;
         }

$smarty->assign("all_post_title",'All Posts');
$smarty->assign("post_data",$post_data);
$smarty->assign("cat_datas",$cat_datas);
$smarty->assign("siteurl_blog", $siteurl_blog);

$smarty->display('home.tpl');


?>

