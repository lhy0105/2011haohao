<?php /* Smarty version Smarty-3.1.8, created on 2012-08-23 16:55:15
         compiled from "app/Default/tpl/pay_content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10944163115035e3292c5450-48119182%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ef1c45d05011b40e8d5dbf2e31fdcbba73fdf65' => 
    array (
      0 => 'app/Default/tpl/pay_content.tpl',
      1 => 1345712112,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10944163115035e3292c5450-48119182',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5035e3292de722_71768966',
  'variables' => 
  array (
    'pays' => 0,
    'pay' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5035e3292de722_71768966')) {function content_5035e3292de722_71768966($_smarty_tpl) {?><div class="head">
	<div class=""></div>
</div>
<div class="body">
	<?php if (!empty($_smarty_tpl->tpl_vars['pays']->value)){?>
	<ul class="box head">
		<li class="id">标识</li>
		<li class="name">收支种类</li>
		<li class="ammount">收支金额</li>
		<li class="date">收支日期</li>
	</ul>
	<?php  $_smarty_tpl->tpl_vars['pay'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pay']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pays']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pay']->key => $_smarty_tpl->tpl_vars['pay']->value){
$_smarty_tpl->tpl_vars['pay']->_loop = true;
?>
	<ul class="box">
		<li class="id"><input type="checkbox"  name="pay" value="<?php echo $_smarty_tpl->tpl_vars['pay']->value['id'];?>
"></li>
		<li class="name"><?php echo $_smarty_tpl->tpl_vars['pay']->value['name'];?>
</li>
		<li class="ammount"><?php echo $_smarty_tpl->tpl_vars['pay']->value['ammount'];?>
</li>
		<li class="date"><?php echo $_smarty_tpl->tpl_vars['pay']->value['pay_date'];?>
</li>
	</ul>
	<?php } ?>
	<?php }else{ ?>
	暂无内容
	<?php }?>
</div>
<?php }} ?>