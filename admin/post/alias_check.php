<?php
include_once(dirname(__FILE__)."/../../config.php"); 
include_once(dirname(__FILE__)."/../../utility.php");
if(isset($_POST['ajax_title'])){
$title=$_POST['ajax_title'];
echo slugify($title);
exit;
}
?>