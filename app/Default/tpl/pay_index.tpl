<div class="pay_type">
	<h1>收支种类</h1>
	{foreach name=type from=$types item=type}
	<div class="head">
		<h1>{$type->name}</h1>
		{if !empty($type->sub)}
		<ul>
			{foreach name=sub from=$type->sub item=sub}
			<li><span class="ico"></span><a href="##" onclick="Menu.changePayContent(this)" data="_pay_listContent&id={$sub->id}">{$sub->name}</a></li>
			{/foreach}
		</ul>
		{/if}
	</div>
	{/foreach}
</div>
<div class="pay_content">
	<div class="body" id="PayContentBody">
		<div class="sub">
			<ul>
				{foreach name=type from=$types item=type}
				<li><a href="##" data="_pay_add&id={$type->id}" onclick="Menu.addPayHTML(this);">添加{$type->name}</a></li>
				{/foreach}
			</ul>
		</div>
	</div>
</div>
