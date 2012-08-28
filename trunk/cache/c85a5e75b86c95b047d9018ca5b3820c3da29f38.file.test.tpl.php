<?php /* Smarty version Smarty-3.1.8, created on 2012-08-21 17:35:26
         compiled from "/home/www/2011haohao/app/Default/tpl/test.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21274249150335515585755-45561363%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c85a5e75b86c95b047d9018ca5b3820c3da29f38' => 
    array (
      0 => '/home/www/2011haohao/app/Default/tpl/test.tpl',
      1 => 1345541681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21274249150335515585755-45561363',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_503355155d3d44_04104597',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_503355155d3d44_04104597')) {function content_503355155d3d44_04104597($_smarty_tpl) {?><?php $_smarty_tpl->smarty->_tag_stack[] = array('helper->trigger', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_objects['helper'][0]->trigger(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
ddd<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_objects['helper'][0]->trigger(array(), $_block_content, $_smarty_tpl, $_block_repeat);   } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php echo $_smarty_tpl->smarty->registered_objects['helper'][0]->part(array('id'=>"11"),$_smarty_tpl);?>

<?php }} ?>