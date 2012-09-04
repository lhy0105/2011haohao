var loadingHtml = '<div class="loading"><img src="public/loading.gif" style="width:20px;height:20px;"/>&nbsp;&nbsp;数据加载中，请稍后...</div>';
var popwin = new Qwindow();
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

function showStatistics(id, flashVars){
	if (swfobject.hasFlashPlayerVersion("8"))
	{
		swfobject.embedSWF("public/amcharts/flash/amline.swf",id, "600", "400", "8.0.0", "public/amcharts/flash/expressInstall.swf", flashVars, {bgcolor:'#FFFFFF'});
	}
	else
	{
		// Note, as this example loads external data, JavaScript version might only work on server
		var amFallback = new AmCharts.AmFallback();
		amFallback.pathToImages = "public/amcharts/images/"
		amFallback.settingsFile = flashVars.settings_file;
		amFallback.dataFile = flashVars.data_file;				
		amFallback.type = "line";
		amFallback.write(id);
	}
}
