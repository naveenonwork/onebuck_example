<?php 
$siteurl_blog="http://localhost/onebuck_examples/";
$site_title="Onebuck Resume";

$template="job1";
$per_page=10;
include_once("conn.php");





$dir_path=dirname(__FILE__);
$smarty_path=$dir_path."/smarty/libs/Smarty.class.php";
include_once($smarty_path);
$smarty = new Smarty;

$smarty->template_dir = $dir_path."/templates/$template/";
$smarty->assign("siteurl_blog", $siteurl_blog);
$smarty->assign("site_title",$site_title);
?>