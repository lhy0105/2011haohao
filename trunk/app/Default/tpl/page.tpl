<!DOCTYPE html>
<html>
<head>
<title>{$smarty.const.ADMIN_TITLE}</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="public/css/admin.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<div class="top w900">
		<span>{$smarty.const.ADMIN_TITLE}</span>
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
							<li><span>本次登陆IP:</span>{$clientIP}</li>
							<li><span>本次登陆时间:</span>{$smarty.now|date_format:'Y-m-d H:i:s':'':''}</li>
							<li><span>上次登陆IP:</span>{$user->last_ip}</li>
							<li><span>上次登陆时间:</span>{$user->last_date}</li>
						</ul>
					</div>
					<div class="notice">
						提示:为了帐号的安全,如果上面的登陆情况不正常,建议马上<a href="javascript:;" data="_admin_changePasswd" onclick="password.changePassword(this)">修改密码</a>。
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

