<!DOCTYPE html>
<html>
<head>
<title>{$smarty.const.ADMIN_TITLE}</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="public/css/admin.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<div class="changePasswd" id="changePasswd">
		<div class="body">
			<ul>
				<li><span>原密码</span><input name="oldPasswd" type="password" value=""/><span class="notice" id="spanOldPasswd"></span></li>
				<li><span>新密码</span><input name="newPasswd" type="password" value=""/><span class="notice" id="spanNewPasswd"></span></li>
			</ul>
		</div>
		<div class="act"><div class="btn" onclick="password.changeForm();"></div><span class="notice" id="btn"></span></div>
	</div>
</body>
</html>
<script type="text/javascript" src="public/js/jquery-1.8.0.js"></script>
<script type="text/javascript" src="public/js/qwindow.js"></script>
<script type="text/javascript" src="public/js/admin.js"></script>
