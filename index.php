<?php
$tpl='';
include_once("config.php");
include_once("conn.php");
include_once("seo.php");


if(empty($tpl)){
  $query="SELECT * FROM `job`";

if(isset($_REQUEST['cat_id'])){
$cat_id=$_REQUEST['cat_id'];
$query="SELECT * FROM `job` where category='$cat_id'";


}


$result=mysqli_query($conn,$query);
$job_datas=array();
while ($records=mysqli_fetch_array($result)){
$job_datas[]=$records;

 
}





 
		$query_post="SELECT * FROM `category`"; 
		$result_cat=mysqli_query($conn,$query_post);
		$cat_datas=array();
		while ($records_cat=mysqli_fetch_array($result_cat)){
		 
		 $cat_datas[]=$records_cat;
 		 
         }


$job_footer_html="";          
 if(isset($_REQUEST['cat_id'])){
$cat_id=$_REQUEST['cat_id'];
  $query="SELECT `footer_html` FROM `category` where category_id='$cat_id'";

	$result_jb=mysqli_query($conn,$query);
	 
	while ($records_jb=mysqli_fetch_array($result_jb)){
	$job_footer_html=$records_jb['footer_html'];
	
	 
	}
} 



 
        

$smarty->assign("cat_datas",$cat_datas);
$smarty->assign("job_datas",$job_datas);
$smarty->assign("job_footer_html",$job_footer_html);

$tpl="index.tpl";
}
$smarty->display($tpl);
?>