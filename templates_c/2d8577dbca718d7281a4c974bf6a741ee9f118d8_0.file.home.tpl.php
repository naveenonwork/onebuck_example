<?php
/* Smarty version 3.1.31, created on 2017-04-04 10:23:34
  from "C:\wamp\www\blogs\templates\job1\home.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58e3742616e363_66577881',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2d8577dbca718d7281a4c974bf6a741ee9f118d8' => 
    array (
      0 => 'C:\\wamp\\www\\blogs\\templates\\job1\\home.tpl',
      1 => 1491301409,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_58e3742616e363_66577881 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>




<div class="container">	
<h2><?php echo $_smarty_tpl->tpl_vars['all_post_title']->value;?>
</h2>
<div class="row">

<div class="col-sm-4 pull-right">
<form  method="get">
  <div class="input-group input-group-sm">
       <input type="text" class="form-control" name="search" id="navbar-search-input" placeholder="Search" value="">
            <!--<span class="glyphicon glyphicon-search form-control-feedback"></span>-->
            <span class="input-group-btn">
            <button type="submit" value="search" class="btn btn-info btn-flat">Search</button>
            </span>
            </div>
          </form>
        </div>


</div><br/>

<div class="row">

	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['post_data']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>

<?php $_smarty_tpl->_assignInScope('post_id', $_smarty_tpl->tpl_vars['row']->value['post_id']);
$_smarty_tpl->_assignInScope('title', $_smarty_tpl->tpl_vars['row']->value['title']);
$_smarty_tpl->_assignInScope('meta_description', $_smarty_tpl->tpl_vars['row']->value['meta_description']);
$_smarty_tpl->_assignInScope('photo', $_smarty_tpl->tpl_vars['row']->value['photo']);
?>




	  <div class="col-sm-3">
    <div class="box box">  
     <div class="box-body">
                   
                    	<a style="text-decoration:none;" href="datiles.php?datils_id=<?php echo $_smarty_tpl->tpl_vars['post_id']->value;?>
">
                        
                        <div class="form-group">
                       
                            <h3 class="text-center"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h3>
                           
                            <img class="img-responsive center-block"  style="margin-top: 20px; width:80px; height:80px;" id="image" src="<?php echo $_smarty_tpl->tpl_vars['siteurl_blog']->value;?>
/admin/post/image/thumbnails/<?php echo $_smarty_tpl->tpl_vars['post_id']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['photo']->value;?>
" width="100" height="100" alt="User Image">
                            </div>
                            </a> 
                            <p ><em><?php echo $_smarty_tpl->tpl_vars['meta_description']->value;?>
</em></p>
                            
        </div>
        </div><!--box box-->
        </div>  <!--col-sm-3-->
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

</div>
</div>



<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
