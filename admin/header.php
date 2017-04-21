<?php 
include_once(dirname(__FILE__)."/../config.php"); 
 
include_once(dirname(__FILE__)."/../utility.php");
page_protect();

?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin site</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo $siteurl_blog; ?>admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  
  
   <link rel="stylesheet" href="<?php echo $siteurl_blog; ?>admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link href="<?php echo $siteurl_blog; ?>admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

  
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      <link rel="stylesheet" href="<?php echo $siteurl_blog; ?>admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $siteurl_blog; ?>admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo $siteurl_blog; ?>admin/dist/css/skins/_all-skins.min.css">
  
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
 
    <link href="<?php echo $siteurl_blog; ?>admin/jquery.datetimepicker.css" rel="stylesheet" type="text/css">
    
    
    
    
  <!--date  date  date  date --> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

  
   <script src="<?php echo $siteurl_blog; ?>admin/bower_components/jquery/dist/jquery.min.js"></script>

</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">


<?php include_once("topmenu.php"); ?>
  <div class="content-wrapper">