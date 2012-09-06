<script type="text/javascript" src="public/amcharts/flash/swfobject.js"></script>
<script type="text/javascript" src="public/amcharts/amcharts.js"></script>
<script type="text/javascript" src="public/amcharts/amfallback.js"></script>
<div class="pay_type">
	<h1>收支种类</h1>
	{foreach name=type from=$types item=type}
	<div class="head">
		<h1>{$type->name}</h1>
		{if !empty($type->sub)}
		<ul id="PayType">
			{foreach name=sub from=$type->sub item=sub}
			<li class=""><span class="ico"></span><a href="##" onclick="Menu.changePayContent(this)" data="_pay_listContent&id={$sub->id}">{$sub->name}</a></li>
			{/foreach}
		</ul>
		{/if}
	</div>
	{/foreach}
</div>
<div class="pay_content">
	<div class="body" id="PayContentBody">
<!-- 统计图 -->
		{foreach name=type from=$types item=type}
		<div class="chardiv_tt"><span>{$type->name}</span><a data="_pay_add&id={$type->id}" onclick="Menu.addPayHTML(this);">添加{$type->name}</a></div>
        <div id="chartdiv{$type->id}" style="width:100%; height:400px; background-color:#FFFFFF"></div>
		<script type="text/javascript">
			{literal}
			$(function(){
					showStatistics("chartdiv{/literal}{$type->id}{literal}", {path:"public/amcharts/flash/",settings_file: "public/amcharts/settings.xml",data_file:"?r=_pay_statistics_id_{/literal}{$type->id}{literal}"}, 'line', 'amline.swf');
			});
			{/literal}
        </script>
		{/foreach}
<!-- .统计图 -->
	</div>
</div>

