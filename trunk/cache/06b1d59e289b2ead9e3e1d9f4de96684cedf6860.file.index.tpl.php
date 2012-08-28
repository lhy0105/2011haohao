<?php /* Smarty version Smarty-3.1.8, created on 2012-08-23 08:54:14
         compiled from "/home/www/2011haohao/app/Default/tpl/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:85828107250357e721c3a69-99698660%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06b1d59e289b2ead9e3e1d9f4de96684cedf6860' => 
    array (
      0 => '/home/www/2011haohao/app/Default/tpl/index.tpl',
      1 => 1345683254,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85828107250357e721c3a69-99698660',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50357e72298299_66676328',
  'variables' => 
  array (
    'test' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50357e72298299_66676328')) {function content_50357e72298299_66676328($_smarty_tpl) {?><?php echo $_smarty_tpl->smarty->registered_objects['helper'][0]->part(array('params'=>$_smarty_tpl->tpl_vars['test']->value,'type'=>"part"),$_smarty_tpl);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('helper->trigger', array('t1'=>'1')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_objects['helper'][0]->trigger(array('t1'=>'1'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
This is Hao PHP HaoFramework frame-1.0 !<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_objects['helper'][0]->trigger(array('t1'=>'1'), $_block_content, $_smarty_tpl, $_block_repeat);   } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php echo $_smarty_tpl->tpl_vars['test']->value;?>
<?php }} ?>