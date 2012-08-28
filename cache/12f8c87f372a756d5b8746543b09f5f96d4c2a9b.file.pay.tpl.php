<?php /* Smarty version Smarty-3.1.8, created on 2012-08-23 17:34:06
         compiled from "/home/www/2011haohao/app/Default/tpl/pay.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15720585055035cf2ecc5f87-58536520%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12f8c87f372a756d5b8746543b09f5f96d4c2a9b' => 
    array (
      0 => '/home/www/2011haohao/app/Default/tpl/pay.tpl',
      1 => 1345714411,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15720585055035cf2ecc5f87-58536520',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5035cf2ed2e2b2_32283429',
  'variables' => 
  array (
    'types' => 0,
    'type' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5035cf2ed2e2b2_32283429')) {function content_5035cf2ed2e2b2_32283429($_smarty_tpl) {?><div class="pay_type">
	<h1>收支种类</h1>
	<ul>
	<?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value){
$_smarty_tpl->tpl_vars['type']->_loop = true;
?>
		<li><a href="##" onclick="Menu.changePayContent(this)" data="_pay_getContent&id=<?php echo $_smarty_tpl->tpl_vars['type']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['type']->value['name'];?>
</a></li>
	<?php } ?>
	</ul>
</div>
<div class="pay_content">
	<div class="body" id="PayContentBody">
		<div class="sub">
			<ul>
				<li><a href="##" data="_pay_add" onclick="Menu.addPayContent(this);">添加收支</a></li>
			</ul>
		</div>
	</div>
</div>
<?php }} ?>