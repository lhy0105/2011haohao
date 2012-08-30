{if !empty($pays)}
<div class="head">
	<div class="type">种类:{$pays[0]->name}</div>
</div>
{/if}
<div class="body">
	{if !empty($pays)}
	<ul class="box head">
		<li class="id">标识</li>
		<li class="ammount">收支金额</li>
		<li class="date">收支日期</li>
		<li class="name">明细</li>
	</ul>
	{foreach name=pay from=$pays item=pay}
	<ul class="box">
		<li class="id"><input type="checkbox"  name="pay" value="{$pay->id}"></li>
		<li class="ammount">{$pay->ammount}</li>
		<li class="date">{$pay->pay_date}</li>
		<li class="name">{$pay->note}</li>
	</ul>
	{/foreach}
	{else}
	暂无内容
	{/if}
</div>
