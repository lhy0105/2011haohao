<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="个人管理系统 - 登录" />
<meta name="description" content="收支管理,读书计划"/>
<title>个人管理系统-登录</title>
{literal}
<style type="text/css">
.s_body{margin:0 auto;width:900px;}
ul,ol{list-style-type:none;}

.login{margin:100px auto;width:400px;border:1px solid #CCCCCC;padding:20px;background:#E5E5E5;}

.login h1{text-align:center; font-size:1.5em;letter-spacing:10px;}
.login li{position:relative;width:300px;height:35px;font-size:14px;}
.login input{vertical-align:middle;border:1px solid #999;}
.tips{display:none;background-color:#fff;position:absolute;border:2px solid #D6EFFF;top:0px;left:188px;padding:20px 10px;width:150px;height:35px;z-index:80;font-size:12px;color:#DD4B39;}
.login span{display:block;width:60px;float:left;line-height:22px;}
</style>
{/literal}
</head>
<body>
{if !$isValid}
您的IP已被认为是不安全的！如果您要登录，需要跟管理员联系baochuanzhou@gmail.com！
{else}
<div class="s_body">
	<div class="login">
		<h1>登陆</h1>
		<ul>
			<li><span>用户名:</span><input type="text" name="username" value=""/>
				<div class="tips"></div>	
			</li>
			<li><span>密码:</span><input type="password" name="passwd" value=""/>
				<div class="tips"></div>	
			</li>
			<li id="validCode" style="{if $timesLogin < 3}display:none;{/if}"><span>验证码:</span><input type="text" name="vcode" value="" style="width:40px;" maxlength='5'/>&nbsp;<img src="" id="vcodeImg" style="vertical-align:middle;height:30px;cursor:pointer;" onclick="updateCodeImg()"/><a href="javascript:;" onclick="updateCodeImg()">看不清楚</a>
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
function updateCodeImg(){
		$('#vcodeImg').attr('src', '?r=__captcha&rand=' + Math.random());
}
$(function(){
		$('#vcodeImg').attr('src', '?r=__captcha');
		$('input[type!=submit]').focus(function(){
			$('.tips').hide();
			});
		$('#btn').click(function(){
			checklogin();
		});
		$(document).keydown(function(event){
			if(event.keyCode == 13){
				checklogin();
			}
		});
});
var checklogin = function(){
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
	var vcode = $('input[name="vcode"]').val();
	$.ajax({
		type:"POST",
		data:"u=" + username + "&p=" + password + "&vcode=" + vcode,
		url:"?r=__login",
		success:function(msg){
					var info = '';
					switch(msg){
						case '1':
							window.location.href = '?r=_admin_page';
							break;
						case '2':
							info = '帐号输入有误';
							break;
						case '3':
							info = '帐号输入有误,请您输入验证码！';
							$('#validCode').show();
							break;
						case '6':
							$('#validCode').show();
							info = '您的IP已被我们封锁，24小时之后你方可再进行登陆验证！';
							break;
						case '7':
							$('#validCode').show();
							info = '请核对您的验证码!';
							break;
					}

					if(info != '')
						$('#btn').next().html(info).show();
				}
	});
}
</script>
{/if}
