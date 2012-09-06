<?php /* Smarty version Smarty-3.1.11, created on 2012-09-04 16:23:13
         compiled from "/home/www/2011haohao/app/Default/tpl/page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5069874905035823902ad75-69053002%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd845e8bea39a2753873395252023e749319c2eca' => 
    array (
      0 => '/home/www/2011haohao/app/Default/tpl/page.tpl',
      1 => 1346731256,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5069874905035823902ad75-69053002',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_503582390e8373_81638252',
  'variables' => 
  array (
    'clientIP' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_503582390e8373_81638252')) {function content_503582390e8373_81638252($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/www/2011haohao/lib/Smarty/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html>
<head>
<title><?php echo @ADMIN_TITLE;?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="public/css/admin.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<div class="top w900">
		<span><?php echo @ADMIN_TITLE;?>
</span>
		<a href="?r=__logout">退出</a>
	</div>
	<div class="clearit line" style="width:908px;"></div>
	<div class="page w900" id="Page">
		<div class="left">
			<div class="menu">
				<h4>菜单导航</h4>
				<ul>
					<li class="current"><a href="##" data="_pay_" onclick="Menu.changeContent(this)">收支管理</a></li>
					<li><a href="##" data="_book_" onclick="Menu.changeContent(this)">读书计划</a></li>
					<!--<li><a href="##" data="_admin_role" onclick="Menu.changeContent(this)">角色管理</a></li>
					<li><a href="##" data="_admin_organization" onclick="Menu.changeContent(this)">组织结构</a></li>
					<li><a href="##" data="_admin_user" onclick="Menu.changeContent(this)">用户管理</a></li>
					<li><a href="##" data="_admin_system" onclick="Menu.changeContent(this)">系统配置</a></li>
					<li><a href="##" data="_admin_log" onclick="Menu.changeContent(this)">系统日志</a></li>-->
				</ul>
			</div>
		</div>
		<div class="right">
			<div id="Content" class="content">
				<div class="indexInfo">
					<div class="tt">>> 登陆情况</div>
					<div class="cc">
						<ul>
							<li><span>本次登陆IP:</span><?php echo $_smarty_tpl->tpl_vars['clientIP']->value;?>
</li>
							<li><span>本次登陆时间:</span><?php echo smarty_modifier_date_format(time(),'Y-m-d H:i:s','','');?>
</li>
							<li><span>上次登陆IP:</span><?php echo $_smarty_tpl->tpl_vars['user']->value->last_ip;?>
</li>
							<li><span>上次登陆时间:</span><?php echo $_smarty_tpl->tpl_vars['user']->value->last_date;?>
</li>
						</ul>
					</div>
					<div class="notice">
						提示:为了帐号的安全,如果上面的登陆情况不正常,建议马上<a href="">修改密码</a>。
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="foot w900"></div>
</body>
</html>
<script type="text/javascript" src="public/js/jquery-1.8.0.js"></script>
<script type="text/javascript" src="public/js/qwindow.js"></script>
<script type="text/javascript" src="public/js/admin.js"></script>

<?php }} ?>