<div class="book_index">
	<div class="head">读书计划<span onclick="book.addHTML(this)">添加读书计划</span></div>
	<div class="body">
		<ul>
			<li class="id">序号</li>
			<li class="name">书名</li>
			<li class="date_begin">开始日期</li>
			<li class="date_end">结束日期</li>
			<li class="note">备注</li>
		</ul>
		{foreach name=bn from=$book->results item=v}
		<ul>
			<li class="id"><input type="checkbox" value="{$v->id}" name="id"/></li>
			<li class="name">{$v->name}</li>
			<li class="date_begin">{$v->date_begin|date_format:'Y-m-d'}</li>
			<li class="date_end">{$v->date_end|date_format:'Y-m-d'}</li>
			<li class="note">{$v->note}</li>
		</ul>
		{/foreach}
	</div>
</div>
