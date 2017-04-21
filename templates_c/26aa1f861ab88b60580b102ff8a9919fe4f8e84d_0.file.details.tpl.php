<?php
/* Smarty version 3.1.31, created on 2017-04-16 22:07:22
  from "D:\installedwamp\wamp64\www\onebuck_examples\templates\job1\details.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58f3eb1a364c65_41830183',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '26aa1f861ab88b60580b102ff8a9919fe4f8e84d' => 
    array (
      0 => 'D:\\installedwamp\\wamp64\\www\\onebuck_examples\\templates\\job1\\details.tpl',
      1 => 1492380438,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_58f3eb1a364c65_41830183 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="container">	

<div class="row">
 
<?php $_smarty_tpl->_assignInScope('post_id', $_smarty_tpl->tpl_vars['post_data']->value['post_id']);
?> 
<?php $_smarty_tpl->_assignInScope('photo', $_smarty_tpl->tpl_vars['post_data']->value['photo']);
?> 

<div class="col-sm-12">
                    <h2  ><?php echo $_smarty_tpl->tpl_vars['post_data']->value['title'];?>
</h2>  
                 <img class="img-responsive center-block"   id="image" src="<?php echo $_smarty_tpl->tpl_vars['siteurl_blog']->value;?>
images/post/<?php echo $_smarty_tpl->tpl_vars['post_id']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['photo']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['post_data']->value['title'];?>
">
                  
				 
               
                <p><?php echo $_smarty_tpl->tpl_vars['post_data']->value['long_description'];?>
</p>
            
                
      </div><!-- col-sm-12-->
     

        
      
 


</div> <!--row-->
</div> <!--continear-->

 

 


<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

 
<?php }
}
