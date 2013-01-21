var loadingHtml = '<div class="loading"><img src="public/loading.gif" style="width:20px;height:20px;"/>&nbsp;&nbsp;数据加载中，请稍后...</div>';
if(typeof(Qwindow) != 'undefined') var popwin = new Qwindow();
var Menu = {
	changeContent:function(o){
		$('.menu li').each(function(){this.className = '';});
		o.parentNode.className = 'current';

		$('#Content').html(loadingHtml);

		var url = '?r=' + o.getAttribute('data');
		this.updateContent(url);
	},
	updateContent:function(url){
		$.ajax({
			type:'POST',
			url:url,
			success:function(msg){
				$('#Content').html(msg);
			}
		});
	},
	changePayContent:function(o){
		var url = '?r=' + o.getAttribute('data');
		$('#PayType li').each(function(){
			$(this).removeClass();
		});
		o.parentNode.className = 'current';
		$('#PayContentBody').html(loadingHtml);
		$.ajax({
			type:'GET',
			url:url,
			success:function(msg){
				$('#PayContentBody').html(msg);
			}
		});
	},
	addPayHTML:function(o){
		var url = '?r=' + o.getAttribute('data');
		popwin.setTitle(o.innerHTML)
			.showTitle()
			.setContent('iframe', url)
			.setPos('middle', 'center')
			.setSize(600, 520)
			.show();
	},
	addPayContent:function(){
		var typeId = $('input[name="typeId"]:checked').val();
		var ammount = $('input[name="ammount"]').val();
		var note = $('textarea[name="note"]').val();
		var pay_date= $('input[name="pay_date"]').val();

		$.ajax({
			type:'POST',
			url:'?r=_pay_addContent',
			data:'typeId='+typeId+'&ammount='+ammount+'&note='+note+'&pay_date='+pay_date,
			success:function(msg){
				parent.popwin.hide();
				//window.top.location.reload();
				parent.Menu.updateContent('?r=_pay_');
			}
		});

	}
}

function showStatistics(id, flashVars, type, swfFile){
	if (swfobject.hasFlashPlayerVersion("8"))
	{
		swfobject.embedSWF("public/amcharts/flash/" + swfFile,id, "600", "400", "8.0.0", "public/amcharts/flash/expressInstall.swf", flashVars, {bgcolor:'#FFFFFF'});
	}
	else
	{
		// Note, as this example loads external data, JavaScript version might only work on server
		var amFallback = new AmCharts.AmFallback();
		amFallback.pathToImages = "public/amcharts/images/"
		amFallback.settingsFile = flashVars.settings_file;
		amFallback.dataFile = flashVars.data_file;				
		amFallback.type =type 
		amFallback.write(id);
	}
}

function warning(msg, obj){
	var html = '<div class="warning" style="position:absolute;left:20px;top:20px;padding:10px;border:1px solid #E5E5E5;background:#FFF;z-index:90000;">' + msg + '</div>';
	obj.append(html);
}

function ajax_update(id, url){
	$('#' + id).html(loadingHtml);
	$("#" + id).load(url);
}

var book = {
	addHTML:function(o){
		var url = "?r=_book_addTpl";
		popwin.setTitle(o.innerHTML)
			.showTitle()
			.setContent('iframe', url)
			.setPos('middle', 'center')
			.setSize(620, 300)
			.show();
	},
	addContent:function(){
		var valid = true;
		var name = $('input[name="name"]').val();
		var date_begin = $('input[name="date_begin"]').val();
		var date_end = $('input[name="date_end"]').val();
		var note = $('textarea[name="note"]').val();

		if(name == ''){
			warning('书名不能为空!', $('input[name="name"]').parent());
			valid = false;
			return false;
		}

		if(!/^\d{4}-\d{2}-\d{2}$/.test(date_begin)){
			warning('开始日期输入有误!', $('input[name="date_begin"]').parent());
			valid = false;
			return false;
		}

		if(!/^\d{4}-\d{2}-\d{2}$/.test(date_end)){
			warning('结束日期输入有误!', $('input[name="date_end"]').parent());
			valid = false;
			return false;
		}
		$.ajax({
			type:'POST',
			url:'?r=_book_addContent',
			data:'name='+name+'&date_begin='+date_begin+'&note='+note+'&date_end='+date_end,
			success:function(msg){
				parent.popwin.hide();
				//window.top.location.reload();
				parent.Menu.updateContent('?r=_book_');
			}
		});
	}
}


function selectAll(name, id){
	$('input[name="' + name+ '"]').each(function(){
		if($(this).attr('checked') == 'checked'){
			$(this).attr('checked', false);
		}else{
			$(this).attr('checked', true);
		}
	});
}

var password = {
	changePassword:function (o){
		var url = '?r=' + o.getAttribute('data');
		popwin.setTitle(o.innerHTML)
			.showTitle()
			.setContent('iframe', url)
			.setPos('middle', 'center')
			.setSize(400, 150)
			.show();

	},
	changeForm:function(){
		var oldpasswd = $('input[name="oldPasswd"]').val();
		var newpasswd = $('input[name="newPasswd"]').val();
		var illegal = false;

		if(!/^.{5,}$/.test(oldpasswd)){
			illegal = true;
			$('#spanOldPasswd').html('原密码最少5位!');
		}else{
			$('#spanOldPasswd').html('')
		}
		if(!/^.{5,}$/.test(newpasswd)){
			illegal = true;
			$('#spanNewPasswd').html('新密码最少5位!');
		}else{
			$('#spanNewPasswd').html('');
		}

		if(oldpasswd == newpasswd){
			illegal = true;
			$('#btn').html('您未作任何改动！何必呢？');
		}else{
			$('#btn').html('');
		}

		if(illegal) return;

		$.ajax({
			type:'POST',
			url:'?r=_admin_changePasswdForm',
			data:'oldpasswd='+oldpasswd+'&newpasswd='+newpasswd,
			success:function(msg){
				if(msg == '0'){
					$('#btn').html('非法参数！');
					return;
				}else if(msg == '2'){
					$('#spanOldPasswd').html('旧密码验证错误！');
					return;
				}else if(msg == '3'){
					$('#btn').html('您未作任何改动');
					return;
				}
				parent.popwin.hide();
			}
		});
	}
}

Menu[ 'chess' ] = {
	pageAddCategory:function(){
		var url = '?r=_chess_pageAddCategory';
		popwin.setTitle('添加新分类')
			.showTitle()
			.setContent('iframe', url)
			.setPos('middle', 'center')
			.setSize(600, 520)
			.show();
	},
	pageCatCategory:function(o){
		var url = '?r=' + o.getAttribute('data');
		$.ajax({
			type:'GET',
			url:url,
			success:function(msg){
				$('#chess_content').html(msg);
			}
		});
	}
}
