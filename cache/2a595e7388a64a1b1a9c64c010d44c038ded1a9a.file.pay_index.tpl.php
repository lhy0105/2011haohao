<?php /* Smarty version Smarty-3.1.11, created on 2012-09-05 15:45:06
         compiled from "/home/www/2011haohao/app/Default/tpl/pay_index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19934873835035f0394fa863-78405774%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a595e7388a64a1b1a9c64c010d44c038ded1a9a' => 
    array (
      0 => '/home/www/2011haohao/app/Default/tpl/pay_index.tpl',
      1 => 1346831090,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19934873835035f0394fa863-78405774',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5035f0394fb479_03702558',
  'variables' => 
  array (
    'types' => 0,
    'type' => 0,
    'sub' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5035f0394fb479_03702558')) {function content_5035f0394fb479_03702558($_smarty_tpl) {?><script type="text/javascript" src="public/amcharts/flash/swfobject.js"></script>
<script type="text/javascript" src="public/amcharts/amcharts.js"></script>
<script type="text/javascript" src="public/amcharts/amfallback.js"></script>
<div class="pay_type">
	<h1>收支种类</h1>
	<?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value){
$_smarty_tpl->tpl_vars['type']->_loop = true;
?>
	<div class="head">
		<h1><?php echo $_smarty_tpl->tpl_vars['type']->value->name;?>
</h1>
		<?php if (!empty($_smarty_tpl->tpl_vars['type']->value->sub)){?>
		<ul id="PayType">
			<?php  $_smarty_tpl->tpl_vars['sub'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sub']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['type']->value->sub; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sub']->key => $_smarty_tpl->tpl_vars['sub']->value){
$_smarty_tpl->tpl_vars['sub']->_loop = true;
?>
			<li class=""><span class="ico"></span><a href="##" onclick="Menu.changePayContent(this)" data="_pay_listContent&id=<?php echo $_smarty_tpl->tpl_vars['sub']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['sub']->value->name;?>
</a></li>
			<?php } ?>
		</ul>
		<?php }?>
	</div>
	<?php } ?>
</div>
<div class="pay_content">
	<div class="body" id="PayContentBody">
<!-- 统计图 -->
		<?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value){
$_smarty_tpl->tpl_vars['type']->_loop = true;
?>
		<div class="chardiv_tt"><span><?php echo $_smarty_tpl->tpl_vars['type']->value->name;?>
</span><a data="_pay_add&id=<?php echo $_smarty_tpl->tpl_vars['type']->value->id;?>
" onclick="Menu.addPayHTML(this);">添加<?php echo $_smarty_tpl->tpl_vars['type']->value->name;?>
</a></div>
        <div id="chartdiv<?php echo $_smarty_tpl->tpl_vars['type']->value->id;?>
" style="width:100%; height:400px; background-color:#FFFFFF"></div>
		<script type="text/javascript">
			
			$(function(){
					showStatistics("chartdiv<?php echo $_smarty_tpl->tpl_vars['type']->value->id;?>
", {path:"public/amcharts/flash/",settings_file: "public/amcharts/settings.xml",data_file:"?r=_pay_statistics_id_<?php echo $_smarty_tpl->tpl_vars['type']->value->id;?>
"}, 'line', 'amline.swf');
			});
			
        </script>
		<?php } ?>
<!-- .统计图 -->
	</div>
</div>

<?php }} ?>