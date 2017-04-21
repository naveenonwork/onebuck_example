<?php 

$id='';

if(isset($_REQUEST['id'])){
$id=$_REQUEST['id'];

}

  $query="SELECT * FROM `post` where `post_id`='$id'";
$result=mysqli_query($conn,$query);
$records=mysqli_fetch_assoc($result) ;

$smarty->assign("post_data",$records);
$tpl="details.tpl";