<?php /* Smarty version Smarty-3.1.11, created on 2012-08-28 10:52:43
         compiled from "/home/www/2011haohao/app/Default/tpl/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5752504850335702b9eea7-59147467%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04bc1c159486f209795aac2e4d7284aae6840139' => 
    array (
      0 => '/home/www/2011haohao/app/Default/tpl/login.tpl',
      1 => 1345684685,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5752504850335702b9eea7-59147467',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50335702b9f5e4_67615796',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50335702b9f5e4_67615796')) {function content_50335702b9f5e4_67615796($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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

<?php }} ?>