<div class="pay_add">
	<ul>
		<li><span>收支情况:</span>
				{foreach name=type from=$types item=type}
				{if $type->pid == $smarty.get.id}
				<input type="radio" value='{$type->id}' name="pay_select"/>{$type->name}
				{/if}
				{/foreach}
		</li>
		<li><span>支出金额:</span><input type="text" name="amount"/></li>
		<li><input type="submit" value="添 加"/></li>
	</ul>
</div>
