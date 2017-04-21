<?php
/* Smarty version 3.1.31, created on 2017-03-31 12:04:36
  from "C:\installedwamp\www\blogs\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58de45d4189e02_85390257',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '415cf7a6448c6c029e62dbf3fbfef7e0a069230e' => 
    array (
      0 => 'C:\\installedwamp\\www\\blogs\\index.tpl',
      1 => 1490960397,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_58de45d4189e02_85390257 (Smarty_Internal_Template $_smarty_tpl) {
?>
 
<?php $_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="continer">

<div class="row">

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['job_datas']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>

<div class="col-md-3">

<h2><?php echo $_smarty_tpl->tpl_vars['row']->value['job_title'];?>
</h2>


</div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>


</div>

</div><?php }
}
