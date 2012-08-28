<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
{literal}
<style type="text/css">
.s_body{margin:0 auto;width:900px;}
ul,ol{list-style-type:none;}

.login{margin:100px auto;width:400px;border:1px solid blue;padding:20px;background:#E5E5E5;}

.login h1{text-align:center; font-size:1.5em;letter-spacing:10px;}
.login li{position:relative;width:300px;height:35px;font-size:14px;}
.login input{vertical-align:middle;border:1px solid #999;}
.tips{display:none;background-color:#fff;position:absolute;border:2px solid #D6EFFF;top:0px;left:188px;padding:20px 10px;width:150px;height:35px;z-index:80;font-size:12px;color:#DD4B39;}
.login span{display:block;width:60px;float:left;line-height:22px;}
</style>
{/literal}
</head>
<body>
<div class="s_body">
	<div class="login">
		<h1>登陆</h1>
		<ul>
			<li><span>用户名:</span><input type="text" name="username"/>
				<div class="tips"></div>	
			</li>
			<li><span>密码:</span><input type="password" name="passwd"/>
				<div class="tips"></div>	
			</li>
			<li>
				<input type="submit" id="btn" style="margin-left:80px;width:120px;height:25px;cursor:pointer;" value="登  陆"/>
				<div class="tips"></div>	
			</li>
		</ul>
	</div>
</div>
</body>
</html>
<script type="text/javascript" src="public/js/jquery-1.8.0.js"></script>
<script type="text/javascript">
$(function(){
	$('input[type!=submit]').focus(function(){
			$('.tips').hide();
		});
	$('#btn').click(function(){
		$('.tips').hide();

		var username = $('input[name="username"]').val();
		if(username == ''){
			$('input[name="username"]').next().html('用户名不能为空').show();
			return false;
		}
		var password = $('input[name="passwd"]').val();
		if(password == ''){
			$('input[name="passwd"]').next().html('密码不能为空').show();
			return false;
		}
		$.ajax({
			type:"POST",
			data:"u=" + username + "&p=" + password,
			url:"?r=__login",
			success:function(msg){
						if(msg == 'successful'){
							window.location.href = '?r=_admin_page';
						}else{
							$('#btn').next().html('帐号输入有误').show();
						}
					}
		});
	});
});
</script>

