var loadingHtml = '<div class="loading"><img src="public/loading.gif" style="width:20px;height:20px;"/>&nbsp;&nbsp;数据加载中，请稍后...</div>';
var popwin = new Qwindow();
var Menu = {
	changeContent:function(o){
		$('.menu li').each(function(){this.className = '';});
		o.parentNode.className = 'current';

		$('#Content').html(loadingHtml);

		var url = '?r=' + o.getAttribute('data');
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

		$.ajax({
			type:'POST',
			url:'?r=_pay_addContent',
			data:'typeId='+typeId+'&ammount='+ammount+'&note='+note,
			success:function(msg){
				parent.popwin.hide();
			}
		});

	}
}


