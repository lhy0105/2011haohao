<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="public/css/chess.css" rel="stylesheet" type="text/css" />
<!-- 左侧棋谱 -->
<div class="con01 flo_le">
	<h4 class="con04">
		<p class="flo_le" id="chess_title">标题:{$chess->title}</p>
		<p class="flo_ri" id="tishi">当前模式：普通模式</p>
		<div class="clear02"></div>
	</h4>
	<div class="clear"></div>
	<div class="con05">
		<div class="con06" id="mb"><!--棋盘区域--></div>
	</div>
</div>


<!-- 演示 -->
<div class="con02 flo_le">
	<div class="con07">
		<h4 class="con07_2"><p class="con07_p">红方</p><p class="con07_p PN" id="now_H"></p></h4>
		<div class="clear"></div>
		<h4 class="con07_3"><p class="con07_p">黑方</p><p class="con07_p PN" id="now_B"></p></h4>
		<div class="clear"></div>
	</div>
	<div class="con08"></div>
	<div class="con10" id="qp"><!--棋谱区域--></div>
	<div class="con09"></div>
	<div class="con11">
		<div class="con11_2 flo_le"><a href="javascript:;" title="开局" onclick="xx.first()"></a></div>
		<div class="con11_3 flo_le"><a href="javascript:;" title="後退" onclick="xx.prev()"></a></div>
		<div class="con11_4 flo_le"><a href="javascript:;" title="前進" onclick="xx.next()"></a></div>
		<div class="con11_5 flo_le"><a href="javascript:;" title="结束" onclick="xx.last()"></a></div>
		<div class="clear"></div>
	</div>
	<div class="con12">
		<select name="user_timer" id="user_timer">
			<option value="2000">2</option>
			<option value="3000">3</option>
			<option value="5000">5</option>
			<option value="10000">10</option>
			<option value="15000">15</option>
		</select>
		<input type="button" value="自动" id="ding_shi" onclick="xx.dingshi(this)"/>
		<input type="button" value="试下" id="shi_xia" onclick="xx.shixia(this)"/>
	</div>
</div>
<script type="text/javascript">
qipu = "{$chess->content}";
xx = new xiangqi();
xx.createMB();
xx.initMB();
tranQp();
xx.first();
</script>
