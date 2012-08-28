<?php /* Smarty version Smarty-3.1.11, created on 2012-08-28 17:56:17
         compiled from "/home/www/2011haohao/app/Default/tpl/pay_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16245732105035f90f0b44e2-72008756%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1066a34b6e916269780d714e55056115646c565d' => 
    array (
      0 => '/home/www/2011haohao/app/Default/tpl/pay_add.tpl',
      1 => 1346147774,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16245732105035f90f0b44e2-72008756',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5035f90f0e7c97_89435973',
  'variables' => 
  array (
    'types' => 0,
    'type' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5035f90f0e7c97_89435973')) {function content_5035f90f0e7c97_89435973($_smarty_tpl) {?><link href="public/css/admin.css" type="text/css" rel="stylesheet" />
<div class="pay_add">
	<ul>
		<li><span>收支情况:</span>
				<?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value){
$_smarty_tpl->tpl_vars['type']->_loop = true;
?>
				<?php if ($_smarty_tpl->tpl_vars['type']->value->pid==$_GET['id']){?>
				<input type="radio" value='<?php echo $_smarty_tpl->tpl_vars['type']->value->id;?>
' name="pay_select"/><?php echo $_smarty_tpl->tpl_vars['type']->value->name;?>

				<?php }?>
				<?php } ?>
		</li>
		<li><span>支出金额:</span><input type="text" name="amount"/></li>
		<li><input type="submit" value="添 加"/></li>
	</ul>
</div>
<?php }} ?>