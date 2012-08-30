<?php /* Smarty version Smarty-3.1.11, created on 2012-08-30 11:19:01
         compiled from "/home/www/2011haohao/app/Default/tpl/pay_content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17025453395035e32b24b762-90706072%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '743f80dea0f48ccbb85f66218857ad076efdf65b' => 
    array (
      0 => '/home/www/2011haohao/app/Default/tpl/pay_content.tpl',
      1 => 1346296739,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17025453395035e32b24b762-90706072',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5035e32b2a82f7_25763567',
  'variables' => 
  array (
    'pays' => 0,
    'pay' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5035e32b2a82f7_25763567')) {function content_5035e32b2a82f7_25763567($_smarty_tpl) {?><?php if (!empty($_smarty_tpl->tpl_vars['pays']->value)){?>
<div class="head">
	<div class="type">种类:<?php echo $_smarty_tpl->tpl_vars['pays']->value[0]->name;?>
</div>
</div>
<?php }?>
<div class="body">
	<?php if (!empty($_smarty_tpl->tpl_vars['pays']->value)){?>
	<ul class="box head">
		<li class="id">标识</li>
		<li class="ammount">收支金额</li>
		<li class="date">收支日期</li>
		<li class="name">明细</li>
	</ul>
	<?php  $_smarty_tpl->tpl_vars['pay'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pay']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pays']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pay']->key => $_smarty_tpl->tpl_vars['pay']->value){
$_smarty_tpl->tpl_vars['pay']->_loop = true;
?>
	<ul class="box">
		<li class="id"><input type="checkbox"  name="pay" value="<?php echo $_smarty_tpl->tpl_vars['pay']->value->id;?>
"></li>
		<li class="ammount"><?php echo $_smarty_tpl->tpl_vars['pay']->value->ammount;?>
</li>
		<li class="date"><?php echo $_smarty_tpl->tpl_vars['pay']->value->pay_date;?>
</li>
		<li class="name"><?php echo $_smarty_tpl->tpl_vars['pay']->value->note;?>
</li>
	</ul>
	<?php } ?>
	<?php }else{ ?>
	暂无内容
	<?php }?>
</div>
<?php }} ?>