<div class="pay_type" style="width:120px;">
	<h1><a href="##" data="_chess_" onclick="Menu.changeContent(this)">具体种类</a><a href="javascript:;" onclick="Menu.chess.pageAddCategory();"  title="添加新种类"><img src="public/css/add.png" alt="添加新种类" title="添加新种类"/></a></h1>
	<div class="head">
{if !empty($categorys)}
{foreach name=cate from=$categorys key=title item=types}
	<h1>{$title}</h1>
		<ul>
	{foreach name=type from=$types item=type}
			<li class=""><span class="ico"></span><a href="##" onclick="Menu.chess.pageCatCategory(this)" data="_chess_pageCatCategory&id={$type->id}" title="{$type->title}">{$type->title|truncate:8:'':true}</a></li>
	{/foreach}
		</ul>
{/foreach}
{/if}
	</div>
</div>
<div class="chess_content" id="chess_content" style="width:670px;">
	<div class="body"><span>
	中国象棋是一项模拟战争的体育运动,蕴含着丰富的知识与智慧,取得比赛的胜利,往往需要敏锐的思维,高度的分析能力,判断能力及预测能力。所以学习和研究象棋,对开发青少年的智力、培养成年人的商战头脑及老年人修身养性都大有益处。</span>
	</div>
</div>
<script type="text/javascript">
qipu = "";
</script>
<SCRIPT type="text/javascript" src="public/js/chess.js"></SCRIPT>
