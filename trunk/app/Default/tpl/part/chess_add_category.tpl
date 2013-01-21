<!DOCTYPE html>
<html>
<head>
<title>后台界面管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="public/css/admin.css" type="text/css" rel="stylesheet" />
<style type="text/css">
{literal}
ul,ol{list-style-type:none;padding:0px;}
.input{height:14px;width:400px;}
.warning{font-weight:500px; color:red; font-size:12px;}
.chess_category{width:550px; padding:0 20px;}
.chess_category li{line-height:50px; border-bottom:1px solid #999;}
.chess_category ul li span{width:100px;font-size:12px;font-weight:bold;}
{/literal}
</style>
</head>
<body>
<div class="chess_category">
	<ul>
		<li><span>请选择分类:</span>
		<select id="category_select">
			<option value="0">顶级分类</option>
{if !empty($types)}
	{foreach name=type from=$types item=type}
			<option value="{$type->id}">{$type->title}</option>
	{/foreach}
{/if}
		</select>
		</li>
		<li id="category_name"><span>分类名称:</span><input class="input" type="text" name='type_name' value=''/><span class="warning"></span></li>
		<li id="chess_name"  style="display:none"><span>棋谱名称:</span><input class="input" type="text" name='chess_name' value=''/><span class="warning"></span></li>
		<li id="chess_content" style="display:none"><span>填写棋谱:</span><textarea name='chess'  cols="50" rows="10" ></textarea><span class="warning"></span></li>
		<li style="padding-left:100px;" class="btn_add"><input type="submit" onclick="javascript:addChess();" value="添 加" class="btn"/></li>
	</ul>
</div>
</body>
</html>
<script type="text/javascript" src="public/js/jquery-1.8.0.js"></script>
<script type="text/javascript">
{literal}
$(function(){
	$('#category_select').change(function(){
		var val = $('#category_select').val();
		if(val == '0'){
			$('#category_name').show();
			$('#chess_name').hide();
			$('#chess_content').hide();
		}else{
			$('#category_name').hide();
			$('#chess_name').show();
			$('#chess_content').show();
		}

	});
});
function addChess(){
		var category = $("input[type=text][name=type_name]"),
			type_id = $('#category_select').val(),
			chess_name = $('input[type=text][name=chess_name]').val(),
			content = $("textarea[name=chess]").val(),
			category_name = category.val();

		$.ajax({
			type:'POST',
			url:'?r=_chess_addCategory',
			data:'typeid='+ type_id+'&name='+category_name + '&content=' + content + '&chessname=' +chess_name,
			success:function(msg){
				parent.popwin.hide();
				//window.top.location.reload();
				parent.Menu.updateContent('?r=_chess_');
			}
		});


	}
{/literal}
</script>
