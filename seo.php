<?php 
 
$page_alias='';
if(isset($_GET['page']))
{
$params=$_GET['page'];
if(substr($params, -1) == '/') {
    $params = substr($params, 0, -1);
}

//header("Location:datiles.php?datils_id=9")


$param=explode("/",$params);
$page_alias=$param[0];
 }
	
	 $query="SELECT * FROM `url_aliases` where  `url_aliases`.`alias`='$page_alias'";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0)
{
 $records=mysqli_fetch_array($result) ;
 $object_id=$records['object_id'];
 $object_type 	=$records['object_type'];
   
	if($object_type =='category'){
			$query="SELECT * FROM `url_aliases` inner join `category` 
			on `category`.`category_id`=`url_aliases`.`object_id` 
			where `url_aliases`.`alias`='$page_alias'";
			$result_new=mysqli_query($conn,$query);
			if(mysqli_num_rows($result_new)>0)
			{ 
			 $records_new=mysqli_fetch_array($result_new) ;
			  $cat_type 	=$records_new['type'];
			 }
 
		 $_REQUEST['cat_id']=$object_id;
		 
		 //if category is of post than include post otherwise go to job page
		 if($cat_type=='post' ){ 
		 	include_once("post.php");
		 }
		 
		 
	 }
	if($object_type=='post'){
		$_REQUEST['id']=$object_id;
		include_once("details.php");
 
	 } 

 }

 
 
?>