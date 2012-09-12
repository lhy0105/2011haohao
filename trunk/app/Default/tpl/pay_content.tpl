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
		<li class="pay_note">明细</li>
	</ul>
	{foreach name=pay from=$pays item=pay}
	<ul class="box body{if $smarty.foreach.pay.iteration%2 == 0} line{/if}">
		<li class="id"><input type="checkbox"  name="pay" value="{$pay->id}"></li>
		<li class="ammount">{$pay->ammount}</li>
		<li class="date">{$pay->pay_date|date_format:'Y-m-d'}</li>
		<li class="pay_note">{$pay->note}</li>
	</ul>
	{/foreach}
	<div class="box food">
	</div>
	{else}
	暂无内容
	{/if}
</div>
