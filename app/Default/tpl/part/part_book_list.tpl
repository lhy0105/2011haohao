<div class="space"></div>
<div class="body"> 
	<ul class="head">
		<li class="id">序号</li>
		<li class="name">书名</li>
		<li class="read">是否读过</li>
		<li class="date_begin">开始日期</li>
		<li class="date_end">结束日期</li>
		<li class="note">备注</li>
	</ul>
	{foreach name=book from=$book->results item=v}
	<ul>
		<li class="id"><input type="checkbox" name="id" value='{$v->id}'/></li>
		<li class="name">{$v->name}</li>
		<li class="read">{if $v->readed == 'Y'}是{else}否{/if}</li>
		<li class="date_begin">{$v->date_begin|date_format:'Y-m-d'}</li>
		<li class="date_end">{$v->date_end|date_format:'Y-m-d'}</li>
		<li class="note">{$v->note}</li>
	</ul>
	{/foreach}
</div>
<div class="space"></div>
{ajax_pager 
	tpl='app/Default/tpl/ajax_pager.tpl'
	url='?r=_book_&page=%d'
	id='booklist'
	total=$book->total
	page=$page
	size=$size
}
<script type="text/javascript">
{literal}
$(function(){
		showStatistics("chartdiv1", {path:"public/amcharts/flash/",settings_file: "public/amcharts/settings.xml",data_file:"?r=_book_statistics_page_{/literal}{$page}{literal}"}, 'column', 'amcolumn.swf');
});
{/literal}
</script>
