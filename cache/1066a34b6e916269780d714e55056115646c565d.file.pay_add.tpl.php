<?php /* Smarty version Smarty-3.1.11, created on 2012-09-04 11:55:40
         compiled from "/home/www/2011haohao/app/Default/tpl/pay_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16245732105035f90f0b44e2-72008756%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1066a34b6e916269780d714e55056115646c565d' => 
    array (
      0 => '/home/www/2011haohao/app/Default/tpl/pay_add.tpl',
      1 => 1346730928,
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
<?php if ($_valid && !is_callable('content_5035f90f0e7c97_89435973')) {function content_5035f90f0e7c97_89435973($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/www/2011haohao/lib/Smarty/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html>
<head>
<title><?php echo @ADMIN_TITLE;?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="public/css/admin.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div class="pay_add">
		<span>收支情况:</span>
		<ul>
			<?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value){
$_smarty_tpl->tpl_vars['type']->_loop = true;
?>
			<?php if ($_smarty_tpl->tpl_vars['type']->value->pid==$_GET['id']){?>
				<li><input type="radio" checked="" value='<?php echo $_smarty_tpl->tpl_vars['type']->value->id;?>
' name="typeId"/><?php echo $_smarty_tpl->tpl_vars['type']->value->name;?>
</li>
			<?php }?>
			<?php } ?>
			<li class="ammount"><span>支出金额:</span><input type="text" name="ammount" style="width:70px;"/>元<span id="note_ammount" style="color:red;"></span></li>
			<li class="ammount"><span>日期:</span><input type="text" name="pay_date" style="width:80px;" value="<?php echo smarty_modifier_date_format(time(),"Y-m-d");?>
"/><span id="note_date" style="color:red;"></span></li>
			<li class="note"><span>明细:</span><textarea name="note" style="width:400px;" id="Note"></textarea></li>
			<li class="btn_add"><input type="submit" onclick="Menu.addPayContent()" value="添 加" class="btn"/></li>
		</ul>
</div>
</body>
</html>
<script type="text/javascript" src="public/js/jquery-1.8.0.js"></script>
<script type="text/javascript" src="public/js/qwindow.js"></script>
<script type="text/javascript" src="public/js/admin.js"></script>
<script type="text/javascript">
$(function(){
			$('input[name="ammount"]').keyup(function(){
				$('#note_ammount').html('');
				if(/[^\d\.]/.test($(this).val())){
					$('#note_ammount').html('你输入有误，必须是整数!');
				}
			});
		});
</script>
<?php }} ?>