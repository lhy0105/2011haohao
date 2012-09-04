<!DOCTYPE html>
<html>
<head>
<title>{$smarty.const.ADMIN_TITLE}</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="public/css/admin.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div class="pay_add">
		<span>收支情况:</span>
		<ul>
			{foreach name=type from=$types item=type}
			{if $type->pid == $smarty.get.id}
				<li><input type="radio" checked="" value='{$type->id}' name="typeId"/>{$type->name}</li>
			{/if}
			{/foreach}
			<li class="ammount"><span>支出金额:</span><input type="text" name="ammount" style="width:70px;border:1px solid #999;height:20px;line-height:20px;"/>元<span id="note_ammount" style="color:red;"></span></li>
			<li class="ammount"><span>日期:</span><input type="text" name="pay_date" style="width:80px;border:1px solid #999;height:20px;line-height:20px;" value="{$smarty.now|date_format:"Y-m-d"}"/><span id="note_date" style="color:red;"></span></li>
			<li class="note"><span>明细:</span><textarea name="note" style="vertical-align:middle;height:130px;width:400px;" id="Note"></textarea></li>
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
