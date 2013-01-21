<div class="pay_type" style="width:120px;">
	<h1><a href="##" data="_chess_" onclick="Menu.changeContent(this)">具体种类</a><a href="javascript:;" onclick="Menu.chess.pageAddCategory();"  title="添加新种类"><img src="public/css/add.png" alt="添加新种类" title="添加新种类"/></a><a href="javascript:;" onclick="Menu.chess.pageSetCategory()" alt="设置" title="设置"><img src="public/images/setting.png"/></a></h1>
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
	<div class="head">简介</div>
	<div class="body"><span>中国象棋是一项模拟战争的体育运动,蕴含着丰富的知识与智慧,取得比赛的胜利,往往需要敏锐的思维,高度的分析能力,判断能力及预测能力。所以学习和研究象棋,对开发青少年的智力、培养成年人的商战头脑及老年人修身养性都大有益处。</span>
	</div>
	<div class="head">这些术语,你知道什么意思吗？</div>
	<div class="body" style="text-indent:0px;padding-left:10px;">
	車:双点,臣压君,三把手(車、車、將),大刀剜心,占肋叫杀,并肋叫杀,边打二怪,拔(弹)荒車,肋車,霸王車<br/>
	砲:担子砲,天地砲,银河砲,重砲將,二路夹車砲,卒底砲,银河砲,卒底砲<br/>
	馬:先锋馬,边馬-布局移形,钓鱼馬,金钩挂玉(馬-車-車),拐角馬<br/>
	士:扬角士<br/>
	兵家大忌：1.一个子不能走太多，其他子没有动，会有失平衡,其他子粒效率就低;2.缺象怕双砲,寻机破双砲;3.馬逢>    边必亡<br/>
	其他名词:杀招,將门,卡肋,双將崩(馬將+砲將),平衡感,下棋思路的连贯性,身后手,先手带,三部虎,两头蛇,每步最好>    控制在30秒左右(中、后局),腋底插花,双飞燕,闷攻,铁门栓,无根車砲,竹林线,沿河线,平砲对車,空中阻击,过门<br/>
	下棋注意事项:让子粒生根,車馬砲归边有杀势<br/>
	</div>
_
</div>
<script type="text/javascript">
qipu = "";
</script>
<SCRIPT type="text/javascript" src="public/js/chess.js"></SCRIPT>
