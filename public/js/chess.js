/*中国*/
//var _IE_ = true;
var _IE_ = (navigator.userAgent.indexOf("MSIE")>0)?true:false;

function set_attr(element, name, content){
	if(_IE_){
		switch(name)
		{
			default:
				break;
			case 'class':
				element.className = content;
				break;
			case 'rowspan':
				element.rowSpan = content;
				break;
			case 'colspan':
				element.colSpan = content;
				break;
			case 'id':
				element.id = content;
				break;
			case 'title':
				element.title = content;
				break;
			case 'type':
				element.type = content;
				break;
			case 'name':
				element.name = content;
				break;
			//default:
			//	break;
		}
	}
	else{
		element.setAttribute(name, content);
	}
		
}


function rem_attr(element, attr){
	if(_IE_){
		set_attr(element, attr, '');
	}else{
		element.removeAttribute(attr);
	}
}


function get_attr(element, name){
	var attr = ''; 
	if(element){
		if(_IE_){
			switch(name)
			{
				default:
					break;
				case 'class':
					attr = element.className;
					break;
				case 'id':
					attr = element.id;
					break;
				case 'rowspan':
					attr = element.rowSpan;
					break;
				case 'colspan':
					attr = element.colSpan;
					break;
			}
		}else{
			attr = element.getAttribute(name);		
		}
	}
	if(!attr) attr = '';
	return attr.toString();
}

function trim(s){
		return s.replace(/(^\s*)|(\s*$)/g, ''); 
}

function CHESS(element){return document.getElementById(element);}
function biaoHao(n){
	if(n < 10)return '0' + n;
	return n;
}

function tranQp(){
	var hs = [];
	var bs = [];
	var str = trim(qipu);
	var list = str.split(',');
	xx.setsrcQipu(list);
	var len = list.length;
	var xuhao = 1;
	var html = '<ul>';
	for(var i=0; i<len; i++){
		if(i%2 == 0){
			html += '<li>';
			hs.push(list[i]);
			html += biaoHao(xuhao) + '.<a href="###" onclick="xx.other('+ (i+1) +')" id="ap_'+ (i+1) +'" class="font_a_1">'+list[i]+'</a>  ';
			xuhao++;
		}else{
			bs.push(list[i]);
			html += '<a href="###" onclick="xx.other('+ (i+1) +')" id="ap_'+ (i+1) +'" class="font_a_1">'+list[i]+'</a>';
			html += '</li>';
		}
	}
	html += '</ul>';
	$('#qp').html(html);
	
	xx.setMax(len);
	xx.setQpList(hs, bs);
	xx.initBJ();
}

function xiangqi(){
	
	this.gpos = 0;						
	this.x = 10;						
	this.y = 9;							
	
	this.hengtochina = new Array();		
	this.hchiantoeng = new Array();		
	this.bengtochina = new Array();		
	this.bchiantoeng = new Array();		

	this.coordinateWord = new Array();	
	this.direction = new Array();		
	
	this.special = new Array();			

	this.max = 0;						

	this.recordlist = [];				
	this.recordQzList = [];				
	
	this.redlist = [];					
	this.blackList = [];				

	
	this.coordinateWord_back_red = new Array();		
	this.coordinateWord_back_black = new Array();	
	this.direction_back = new Array();				

	this.red_jin_ji = new Array();		
	this.black_jin_ji = new Array();	
	this.tongyong_chars = new Array();	

	this.srcWenziQiqu = [];				
	this.userWenziQizu = [];			
	this.userrecordlist = [];			
	this.userrecordQzList = [];			

	this.setsrcQipu = function(list){
		this.srcWenziQiqu = list;
	}

	this.setMax = function(max){
		this.max = max;
		this.gpos = max;
	}

	this.setQpList = function(r, b){
		this.redlist = r;
		this.blackList = b;
	}

	
	this.getQzZhongwen = function(englist, c){
		if('H' == c){return this.hengtochina[englist]}
		else{return this.bengtochina[englist]}
	}
	
	
	this.getQzEengwen = function(china, c){
		if('H' == c){return this.hchiantoeng[china]}
		else{return this.bchiantoeng[china]}
	}

	
	this.initCM = function(){
		

		var s1 = '一二三四五六七八九'.split('');
		var s2 = '123456789'.split('');
		var s3 = '進平退'.split('');
		for(var i=0; i<s1.length; i++){this.coordinateWord[s1[i]] = s2[i];}
		for(var i=0; i<s2.length; i++){ this.coordinateWord[s2[i]] = s2[i];}

		for(var i=0; i<s3.length; i++){
			this.direction[s3[i]] = i;
			this.direction_back[i] = s3[i];
		}			
		var s4 = '前中二三四後'.split('');
		var s4v = '011234'.split('');
		for(var i=0; i<s4.length; i++){
			this.special[s4[i]] = s4v[i];
		}

		var s = '九八七六五四三二一'.split('');
		for(var i=0; i<9; i++){this.coordinateWord_back_red[i] = s[i];}
		s = '123456789'.split('');
		for(var i=0; i<9; i++){this.coordinateWord_back_black[i] = s[i];}

		s = '一二三四五六七八九'.split('');
		for(var i=0; i<9; i++){this.red_jin_ji[(i + 1)] = s[i];this.black_jin_ji[(i + 1)] = (i + 1);}
		
		s = '前後中'.split('');
		for(var i=0; i<3; i++){this.tongyong_chars[i]= s[i];}



		var englist_array = 'ABCDEFG'.split('');
		var chinese_array = '車馬相仕帥砲兵'.split('');
		var len = englist_array.length;
		for(var i=0; i<len; i++){
			this.hengtochina[englist_array[i]] = chinese_array[i];
			this.hchiantoeng[chinese_array[i]] = englist_array[i];
		}
		englist_array = 'HIJKLMN'.split('');
		chinese_array = '車馬象士將炮卒'.split('');
		var len = englist_array.length;
		for(var i=0; i<len; i++){
			this.bengtochina[englist_array[i]] = chinese_array[i];
			this.bchiantoeng[chinese_array[i]] = englist_array[i];
		}

	}
	this.base = 'BH00,BI01,BJ02,BK03,BL04,BK05,BJ06,BI07,BH08,BM21,BM27,BN30,BN32,BN34,BN36,BN38,HA90,HB91,HC92,HD93,HE94,HD95,HC96,HB97,HA98,HF71,HF77,HG60,HG62,HG64,HG66,HG68';

	this.createMB = function(){
		var html = '';
		var temp = '';
		for(var i=0; i<this.x; i++){
			temp = '<div class="div1">';
			for(var j=0; j<this.y; j++){
				
				temp += '<p id="'+i+'-'+j+'" v="Z" onclick="xx.zouqi(this)"></p>';
			}
			temp += '</div>';
			html += temp;
		}
		$('#mb').html(html);
	}
	
	
	this.initMB = function(){
		if(!_IE_){
			for(var i=0; i<this.x; i++){
				for(var j=0; j<this.y; j++){
					//$('#'+i + '-' + j).v = 'Z';
					$('#'+i + '-' + j).attr('v', 'Z');
				}
			}
		}

		var list = this.base.split(',');
		var len = list.length;
		var temp;
		var obj = null;
		
		for(var i=0; i<len; i++){
			temp = list[i].split('');
			obj = CHESS(temp[2] + '-' + temp[3]);
			obj.v = temp[0] + '-' + temp[1];
			set_attr(obj, 'class', temp[0] + '-' + temp[1] + ' hand');
			
		}
	}

	this.BlankAndRed = function(p){
		if(p%2 == 0)return 'B';
		return 'H';
	}

	this.setAstyle = function(n){
		if(1 == n){
			if((this.gpos < 1) || (this.gpos > this.max))return ;
			set_attr(CHESS('ap_' + this.gpos), 'class', 'font_a_1');
		}else{
			if((this.gpos < 1) || (this.gpos > this.max))return ;
			set_attr(CHESS('ap_' + this.gpos), 'class', 'font_a_2');
		}
	}


	this.next = function(){
		
		if(!this.user_nallow){
			this.usernext();
			return ;
		}

		if(this.gpos == this.max) {
			
			return ;
		}
		this.setAstyle(1);
		this.gpos++;
		this.go(1);
		this.setAstyle(2);
	}
	
	
	this.prev = function(){

		if(!this.user_nallow){
			this.userprev();
			return ;
		}

		if(this.gpos == 0) {
			return ;
		}
		this.setAstyle(1);
		this.go(-1);
		this.gpos--;
		this.setAstyle(2);
	}
	
	
	this.first = function(){

		if(!this.user_nallow){
			this.userfirst();
			return ;
		}

		if(this.gpos == 0) {
			
			return ;
		}
		this.setAstyle(1);
		this.createMB();
		this.initMB();
		this.gpos = 0;
		this.setAstyle(2);
	}

	
	this.last = function(){

		if(!this.user_nallow){
			this.userlast();
			return ;
		}
		if(this.gpos == this.max) {
			
			return ;
		}
		var len = this.max - this.gpos;
		for(var i=0; i<len; i++){
			this.next();
		}
	}

	this.other = function(pos){

		if(!this.user_nallow){
			return ;
		}
		if(this.gpos == pos) {return ;}
		var deff = pos - this.gpos;
		var flag = (deff > 0)?true:false;
		var len = Math.abs(deff);
		for(var i=0; i<len; i++){
			if(flag){this.next();}
			else{this.prev();}
		}
	
	}		


	this.initBJ = function(){

		var flag = true;
		this.recordlist = [];
		this.recordQzList = [];
		var len = this.blackList.length;
		for(var i=0; i<len; i++){
			flag = this.autoGo(this.redlist[i], 'H');
			if(!flag)return ;
			flag = this.autoGo(this.blackList[i], 'B');
			if(!flag)return ;
		}
		if( this.redlist.length > this.blackList.length) this.autoGo(this.redlist[len], 'H');
		this.gpos = this.max;
		
		this.setAstyle(2);
	}
	
	this.apecialGoFir = function(fx, qz, c){
		var oo = null;
		var flag = false;	
		var qz_base = c + '-' + qz;
		var list = [];
		for(var i=0; i<this.y; i++){
			for(var j=0; j<this.x; j++){
				oo = CHESS(j + '-' + i);
				if(oo.v == qz_base){
					list.push([j,i]);
					flag = true;
				}
			}
			if(flag){
				if(list.length < 2){
					list = [];
					flag = false;
				}else{
					break;
				}
			}
		}

		if('B' == c) list.reverse();

		var pos = fx;
		if(pos > list.length) pos = list.length - 1;
		return list[pos];
	}
	

	this.apecialGoSec = function(fx, qz, c, y){
		var oo = null;
		var list = [];
		var qz_base = c + '-' + qz;
		for(var i=0; i<this.x; i++){
			oo = CHESS(y + '-' + i);
			if(oo.v == qz_base){
				list.push(i);
			}
		}

		if('B' == c) list.reverse();
		var pos = fx;
		if(pos > list.length) pos = list.length - 1;
		return list[pos];
	}
	
	this.autoGo = function(o,c){
		try{
			var isNormal = false;	
			var norlist = [];												
			var _temp_ = o.split('');
			var op = [-1, -1],np = [-1, -1];

			var fx = this.direction[_temp_[2]];				
			var ss = this.coordinateWord[_temp_[3]];						

			var qz;
			
			var _fir_ = this.special[_temp_[0]];
			if(_fir_ != undefined){
				var _sec_ = this.getQzEengwen(_temp_[1], c);
				if(_sec_ != undefined){			
					var ccc = this.apecialGoFir(_fir_, _sec_, c);
					qz = _sec_;
					op = ccc;
				}else{							
					qz = ('H' == c)?'G':'N';
					op[1] = this.getXpoint(c, this.coordinateWord[_temp_[1]]);	
					op[0] = this.apecialGoSec(_fir_, qz, c, op[1]);
				}
			}else{
				
				qz = this.getQzEengwen(_temp_[0], c);							
				op[1] = this.getXpoint(c, this.coordinateWord[_temp_[1]]);	
				var p = null;
				for(var i=0; i<10; i++){
					p = CHESS(i + '-' + op[1]);
					if(p.v == (c + '-' + qz) ){
						norlist.push(i);
					}
				}
				
				if(norlist.length == 1){
					op[0] = norlist[0];
				}else{
					isNormal = true;
				}
			}

			
			if(isNormal){
				for(var i=0; i<norlist.length; i++){
					op[0] = norlist[i];
					np = this.moveRule(c, qz, fx, op, ss);
					
					if(this.checkQz(c, qz, np)) break;
				}
			}else{
				np = this.moveRule(c, qz, fx, op, ss);
			}


			if(undefined == CHESS(np[0] + '-' + np[1]) ){
				alert('111' + o + '\n' + op + '\n' + np + '\n' + qz + '\n' + fx + '\n' + ss	);
				return false;
			}
			

			
			var old = CHESS(op[0] + '-' + op[1]);

			if(old == undefined){
				alert('222:' + o + '\nop:' + op	+ '\nqz:' + qz+ '\nfx:' + fx+ '\nc:' + c		+ '\nss:' + ss		);
				return false;
			}

			old.v = 'Z';
			rem_attr(old, 'class');

			
			var chizi = CHESS(np[0] + '-' + np[1]).v;
			CHESS(np[0] + '-' + np[1]).v = c + '-' + qz;				
			
			set_attr(CHESS(np[0] + '-' + np[1]), 'class', c + '-' + qz + ' hand');	

			this.recordlist.push(op[0] + '-' + op[1] + ':' + np[0] + '-' + np[1]);	
			this.recordQzList.push(c + '-' + qz + ':' + chizi);						
			
			return true;
		}catch(e){
			//alert(o + '--------------');
			return false;
		}
	}
	
	this.checkQz = function(c, qz, p){
		if( ('D' == qz) || ('K' == qz) ){
			if('H' == c){if( (p[0] < 7) || (p[0] > 9) || (p[1] <3) || (p[1] > 5)) return false;}
			if('B' == c){if( (p[0] < 0) || (p[0] > 2) || (p[1] <3) || (p[1] > 5)) return false;}
		}else if( ('C' == qz) || ('J' == qz) ){
			if((p[0] < 0) || (p[0] > 9) || (p[1] < 0) || (p[1] > 8)){return false;}
			if( ( ('H' == c) && (p[0] < 5) ) || ( ('B' == c) && (p[0] > 5) )){return false;}
		}else{
			if((p[0] < 0) || (p[0] > 9) || (p[1] < 0) || (p[1] > 8)){return false;}
		}
		return true;
	}


	this.go = function(flag){

		var op = [-1, -1],np = [-1, -1];
		var current_point_str = this.recordlist[this.gpos - 1];
		var current_point_arr = current_point_str.split(':');
		if(flag > 0){
			op = current_point_arr[0];
			np = current_point_arr[1];
		}else{
			op = current_point_arr[1];
			np = current_point_arr[0];
		}
		
		var oq,nq;
		var current_qizi_str = this.recordQzList[this.gpos - 1];
		var current_qizi_arr = current_qizi_str.split(':');
		oq = current_qizi_arr[0].split('-');
		nq = current_qizi_arr[1].split('-');


		set_attr(CHESS(np), 'class', current_qizi_arr[0] + ' hand');
		CHESS(np).v = current_qizi_arr[0];


		var old = CHESS(op);
		if(flag > 0){						
			rem_attr(old, 'class');
			old.v = 'Z';
			return ;
		}
		if(nq[0] == 'Z'){
			rem_attr(old, 'class');
		}else{
			set_attr(old, 'class', current_qizi_arr[1] + ' hand');
		}
		old.v = current_qizi_arr[1];
	}

	this.moveRule = function(c, cm, dc, op, desc){
		if (
			('A' == cm) || ('F' == cm) || ('G' == cm) || ('E' == cm) || ('H' == cm) || ('M' == cm) || ('N' == cm) || ('L' == cm)
		){
			if(dc == 0){						
				if(c == 'H'){
					return [op[0] - desc, op[1]];
				}else{
					return [parseInt(op[0]) + parseInt(desc), op[1]];
				}
			}else if(dc == 1){					
				if(c == 'H'){
					return [op[0], this.getXpoint(c, desc)];
				}else{
					return [op[0], this.getXpoint(c, desc)];
				}
			}else if(dc == 2){					
				if(c == 'H'){
					return [parseInt(op[0]) + parseInt(desc), op[1]];
				}else{
					return [parseInt(op[0]) - parseInt(desc), op[1]];
				}
			}
		}
		if(
			('B' == cm) || ('I' == cm)
		){
			if(dc == 0){						
				if(c == 'H'){
					return [op[0] - this.houseSpan(op[1], this.getXpoint(c, desc)), this.getXpoint(c, desc)];
				}else{
					return [op[0] + this.houseSpan(op[1], this.getXpoint(c, desc)), this.getXpoint(c, desc)];
				}
			}else if(dc == 1){					
				alert('马平');return ;
			}else if(dc == 2){					
				if(c == 'H'){
					
					return [op[0] + this.houseSpan(op[1], this.getXpoint(c, desc)), this.getXpoint(c, desc)];
				}else{
					return [op[0] - this.houseSpan(op[1], this.getXpoint(c, desc)), this.getXpoint(c, desc)];
				}
			}
		}

		if(
			('C' == cm) || ('J' == cm)
		){
			if(dc == 0){						
				if(c == 'H'){
					return [op[0] - 2, this.getXpoint(c, desc)];
				}else{
					return [op[0] + 2, this.getXpoint(c, desc)];
				}
			}else if(dc == 1){					
			}else if(dc == 2){					
				if(c == 'H'){
					return [op[0] + 2, this.getXpoint(c, desc)];
				}else{
					return [op[0] - 2, this.getXpoint(c, desc)];
				}
			}
		}

		if(
			('D' == cm) || ('K' == cm)
		){
			if(dc == 0){						
				if(c == 'H'){
					return [op[0] - 1, this.getXpoint(c, desc)];
				}else{
					return [op[0] + 1, this.getXpoint(c, desc)];
				}
			}else if(dc == 1){					
			}else if(dc == 2){					
				if(c == 'H'){
					return [op[0] + 1, this.getXpoint(c, desc)];
				}else{
					return [op[0] - 1, this.getXpoint(c, desc)];
				}
			}
		}


	}
	
	this.houseSpan = function(oy, ny){
		var v = Math.abs(oy - ny);
		if(v == 2) return 1;
		return 2;
	}

	this.getXpoint = function(c,x){
		if('H' == c){return 9 - x;}		
		else{return x - 1;}				
	}


	this.user_nallow = true;
	this.luxian_list = [];
	this.currentQz = null;		
	this.oneHand = 0;			
	this.crrentPlay = 'H';		
	this.oldstyle = [];			
	this.oldclick = [];			
	this.user_charList = [];	

	//走棋
	this.zouqi = function(o){
		
		if(this.user_nallow) return ;
		var c = o.v.split('-');
		if(this.crrentPlay != c[0]) return ;
		
		if(0 == this.oneHand){this.clearLuxian();}
		this.currentQz = o;
		this.zouqi_rule(o.v.split('-'), o.id.split('-'));
		this.oneHand = 0;
	}
	
	this.luoqi = function(o){
		var obj = null;

		var userrecordlist_string = this.currentQz.id + ':' + o.id;
		var userrecordQzList_string = this.currentQz.v + ':' + o.v;

		this.clearLuxian();

		var me = this;
		o.onclick = function(){me.zouqi(this);}

		o.v = this.currentQz.v;

		set_attr(o, 'class', get_attr(this.currentQz, 'class'));

		this.currentQz.v = 'Z';
		rem_attr(this.currentQz, 'class');

		this.currentQz.onclick = function(){me.zouqi(this);}

		this.oneHand = 1;

		var temp = this.getCharQipu(this.crrentPlay, o.v.split('-')[1], this.currentQz.id.split('-'), o.id.split('-'));

		if(this.user_charList.length == this.usergpos){
			this.user_charList.push(temp);
			this.userrecordlist.push(userrecordlist_string);
			this.userrecordQzList.push(userrecordQzList_string);
			this.usermax++;
			this.usergpos++;
		}else{
			this.user_charList = this.user_charList.slice(0, this.usergpos);
			this.userrecordlist = this.userrecordlist.slice(0, this.usergpos);
			this.userrecordQzList = this.userrecordQzList.slice(0, this.usergpos);

			this.user_charList.push(temp);
			this.userrecordlist.push(userrecordlist_string);
			this.userrecordQzList.push(userrecordQzList_string);

			this.usermax = this.usergpos;
			this.usermax++;
			this.usergpos++;
		}

		this.crrentPlay = (this.crrentPlay == 'H')?'B':'H';
		this.setUserBlankAndRed2();
	}

	
	this.clearLuxian = function(){
		var obj = null;
		var len = this.luxian_list.length;
		var old_class = '';
		for(var i=0; i<len; i++){
			obj = CHESS(this.luxian_list[i][0] + '-' + this.luxian_list[i][1]);
			set_attr(obj, 'class', this.oldstyle[i]);
			obj.onclick = this.oldclick[i];
		}
		this.luxian_list = [];
		this.oldstyle = [];
		this.oldclick = [];
	}
	
	

	
	this.set_luxian = function(array){
		if([] == array) return ;
		var len = array.length;
		var obj = null;
		var me = this;
		var old_class = '';
		for(var i=0; i<len; i++){
			obj = CHESS(array[i][0] + '-' + array[i][1]);
			old_class = get_attr(obj, 'class');
			
			this.oldstyle.push(old_class);
			this.oldclick.push(obj.onclick);
			set_attr(obj, 'class', old_class + ' hand');
			obj.onclick = function(){me.luoqi(this);}
		}
	}


	this.getCharQipu = function(c, qz, src, desc){
		
		var temp = '';
		if(('A' == qz) || ('H' == qz)){
			temp = this.char_ju(c, qz, src, desc);
		}
		if(('B' == qz) || ('I' == qz)){
			temp = this.char_ma(c, qz, src, desc);
		}
		if( ('C' == qz) || ('J' == qz) ){
			temp = this.char_xiang(c, qz, src, desc);
		}
		if( ('D' == qz) || ('K' == qz) ){
			temp = this.char_shi(c, qz, src, desc);
		}
		if( ('E' == qz) || ('L' == qz) ){
			temp = this.char_jiang(c, qz, src, desc);
		}
		if( ('F' == qz) || ('M' == qz) ){
			temp = this.char_pao(c, qz, src, desc);
		}
		if( ('G' == qz) || ('N' == qz) ){
			temp = this.char_bing(c, qz, src, desc);
		}
		
		return temp;

	}


	this.zouqi_rule = function(q, p){
		var list = [];							
		if(('A' == q[1]) || ('H' == q[1])){
			list = this.rule_ju(q[0], p);
		}
		if(('B' == q[1]) || ('I' == q[1])){
			list = this.rule_ma(q[0], p);
		}
		if( ('C' == q[1]) || ('J' == q[1]) ){
			list = this.rule_xiang(q[0], p);
		}
		if( ('D' == q[1]) || ('K' == q[1]) ){
			list = this.rule_shi(q[0], p);
		}
		if( ('E' == q[1]) || ('L' == q[1]) ){
			list = this.rule_jiang(q[0], p);
		}
		if( ('F' == q[1]) || ('M' == q[1]) ){
			list = this.rule_pao(q[0], p);
		}
		if( ('G' == q[1]) || ('N' == q[1]) ){
			list = this.rule_bing(q[0], p);
		}
		
		this.luxian_list = list;
		this.set_luxian(list);
		
	}


	this.rule_ju = function(c, p){
		var result = [];
		var temp = null;
		var x = p[0];var y = p[1];
		var len = 0;
		
		if(x > 0){
			len = x - 0;
			for(var i=0; i<len; i++){
				x--;
				temp = CHESS(x + '-' + y).v;
				if('Z' != temp){
					if(c != temp.split('-')[0]){ 
						result.push([x, y]);
					}
					break;
				}
				result.push([x, y]);
			}
		}
		

		x =p[0];
		
		if(x < 9){
			len = 9 - x;
			for(var i=0; i<len; i++){
				x++;
				temp = CHESS(x + '-' + y).v;
				if('Z' != temp){
					if(c != temp.split('-')[0]){ 
						result.push([x, y]);
					}
					break;
				}
				result.push([x, y]);
			}
		}

		
		x =p[0];
		if(y > 0){
			len = y - 0;
			for(var i=0; i<len; i++){
				y--;
				temp = CHESS(x + '-' + y).v;
				if('Z' != temp){
					if(c != temp.split('-')[0]){ 
						result.push([x, y]);
					}
					break;
				}
				result.push([x, y]);
			}
		}

		
		x =p[0];y=p[1];
		if(y < 8){
			len = 8 - y;
			for(var i=0; i<len; i++){
				y++;
				temp = CHESS(x + '-' + y).v;
				if('Z' != temp){
					if(c != temp.split('-')[0]){ 
						result.push([x, y]);
					}
					break;
				}
				result.push([x, y]);
			}
		}
		return result;
	}

	
	this.rule_pao = function(c, p){
		var result = [];
		var temp = null;
		var x =p[0];var y=p[1];
		var len = 0;
		var pao_allow = false;
		
		if(x > 0){
			len = x - 0;
			for(var i=0; i<len; i++){
				x--;
				temp = CHESS(x + '-' + y).v;
				if('Z' != temp){
					if(pao_allow){
						if(c != temp.split('-')[0]){result.push([x, y]);break;}
					}pao_allow = true;
				}else{
					if(!pao_allow)result.push([x, y]);
				}
			}
		}
		
		
		x =p[0];pao_allow = false;
		
		if(x < 9){
			len = 9 - x;
			for(var i=0; i<len; i++){
				x++;
				temp = CHESS(x + '-' + y).v;
				if('Z' != temp){
					if(pao_allow){
						if(c != temp.split('-')[0]){result.push([x, y]);break;}
					}pao_allow = true;
				}else{
					if(!pao_allow)result.push([x, y]);
				}
			}
		}

		
		x =p[0];pao_allow = false;
		if(y > 0){
			len = y - 0;
			for(var i=0; i<len; i++){
				y--;
				temp = CHESS(x + '-' + y).v;
				if('Z' != temp){
					if(pao_allow){
						if(c != temp.split('-')[0]){result.push([x, y]);break;}
					}pao_allow = true;
				}else{
					if(!pao_allow)result.push([x, y]);
				}
			}
		}

		
		x =p[0];y=p[1];pao_allow = false;
		if(y < 8){
			len = 8 - y;
			for(var i=0; i<len; i++){
				y++;
				temp = CHESS(x + '-' + y).v;
				if('Z' != temp){
					if(pao_allow){
						if(c != temp.split('-')[0]){result.push([x, y]);break;}
					}pao_allow = true;
				}else{
					if(!pao_allow)result.push([x, y]);
				}
			}
		}
		return result;
	}

	this.rule_ma = function(c, p){
		var temp = null;
		var ma_base = [
			[-1,-2],[-1,2],[-2,-1],[-2,1],[1,-2],[1,2],[2,-1],[2,1]
		];
		var ma_tui = [
			[0,-1],[0,1],[-1,0],[-1,0],[0,-1],[0,1],[1,0],[1,0]
		];
		var result = [];
		var x =0; var y=0;
		var mx = 0;var my = 0;
		var len = ma_base.length;
		for(var i=0; i<len; i++){
			x = parseInt(p[0]) + parseInt(ma_base[i][0]);
			y = parseInt(p[1]) + parseInt(ma_base[i][1]);
			if((x < 0) || (x > 9) || (y < 0) || (y > 8)){
				continue;
			}

			mx = parseInt(p[0]) + parseInt(ma_tui[i][0]);
			my = parseInt(p[1]) + parseInt(ma_tui[i][1]);
			temp = CHESS(mx + '-' + my).v;
			if('Z' != temp){continue;}

			temp = CHESS(x + '-' + y).v;
			if('Z' != temp){
				if(c == temp.split('-')[0]){continue;}
			}
			result.push([x, y]);
		}
		return result;
	}

	
	this.rule_xiang = function(c, p){
		var temp = null;
		var xiang_base = [[-2,-2],[-2,2],[2,-2],[2,2]];
		var xiang_tui = [[-1,-1],[-1,1],[1,-1],[1,1]];
		var result = [];
		var x =0; var y=0;
		var mx = 0;var my = 0;
		var len = xiang_base.length;
		for(var i=0; i<len; i++){
			x = parseInt(p[0]) + parseInt(xiang_base[i][0]);
			y = parseInt(p[1]) + parseInt(xiang_base[i][1]);
			if((x < 0) || (x > 9) || (y < 0) || (y > 8)){
				continue;
			}
			
			if( ( ('H' == c) && (x < 5) ) || ( ('B' == c) && (x > 5) )){continue;}
			
			mx = parseInt(p[0]) + parseInt(xiang_tui[i][0]);
			my = parseInt(p[1]) + parseInt(xiang_tui[i][1]);
			temp = CHESS(mx + '-' + my).v;
			if('Z' != temp){continue;}

			
			temp = CHESS(x + '-' + y).v;
			if('Z' != temp){
				if(c == temp.split('-')[0]){continue;}
			}
			result.push([x, y]);
		}
		return result;
	}

	
	this.rule_shi = function(c, p){
		var temp = null;
		var xiang_base = [[-1,-1],[-1,1],[1,-1],[1,1]];
		var result = [];
		var x =0; var y=0;
		var mx = 0;var my = 0;
		var len = xiang_base.length;
		for(var i=0; i<len; i++){
			x = parseInt(p[0]) + parseInt(xiang_base[i][0]);
			y = parseInt(p[1]) + parseInt(xiang_base[i][1]);
			if((x < 0) || (x > 9) || (y < 0) || (y > 8)){
				continue;
			}
			
			if('H' == c){if( (x < 7) || (x > 9) || (y <3) || (y > 5))continue;}
			if('B' == c){if( (x < 0) || (x > 2) || (y <3) || (y > 5))continue;}

			
			temp = CHESS(x + '-' + y).v;
			if('Z' != temp){if(c == temp.split('-')[0]){continue;}}

			result.push([x, y]);
		}
		return result;
	}

	
	this.rule_jiang = function(c, p){
		var temp = null;
		var xiang_base = [[0,-1],[0,1],[-1,0],[1,0]];
		var result = [];
		var x =0; var y=0;
		var mx = 0;var my = 0;
		var len = xiang_base.length;
		for(var i=0; i<len; i++){
			x = parseInt(p[0]) + parseInt(xiang_base[i][0]);
			y = parseInt(p[1]) + parseInt(xiang_base[i][1]);
			if((x < 0) || (x > 9) || (y < 0) || (y > 8)){
				continue;
			}
			
			if('H' == c){if( (x < 7) || (x > 9) || (y <3) || (y > 5))continue;}
			if('B' == c){if( (x < 0) || (x > 2) || (y <3) || (y > 5))continue;}

			
			temp = CHESS(x + '-' + y).v;
			if('Z' != temp){if(c == temp.split('-')[0]){continue;}}

			result.push([x, y]);
		}
		return result;
	}

	this.rule_bing = function(c, p){
		var xiang_base = [];
		if('H' == c){
			if(p[0] < 5){
				xiang_base = [[-1,0],[0,1],[0,-1]];
			}else{
				xiang_base = [[-1,0]];
			}
		}else{
			if(p[0] > 4){
				xiang_base = [[1,0],[0,1],[0,-1]];
			}else{
				xiang_base = [[1,0]];
			}
		}
		var temp = null;
		var result = [];
		var x =0; var y=0;
		var mx = 0;var my = 0;
		var len = xiang_base.length;
		for(var i=0; i<len; i++){
			x = parseInt(p[0]) + parseInt(xiang_base[i][0]);
			y = parseInt(p[1]) + parseInt(xiang_base[i][1]);
			if((x < 0) || (x > 9) || (y < 0) || (y > 8)){
				continue;
			}

			temp = CHESS(x + '-' + y).v;
			if('Z' != temp){if(c == temp.split('-')[0]){continue;}}

			result.push([x, y]);
		}
		return result;
	}


	this.char_ju = function(c, qz, src, desc){
		var result = [];
		var _a_ = 0,_b_ = 0,_c_ = 0,_d_ = 0;
		var sflag = -1;
		var temp = null;
		var base = c + '-' + qz;
		var qh = 0;
		for(var i=0; i<this.x; i++){
			if(i == src[0])continue;
			if((i == desc[0]) && (src[1] == desc[1]))continue;
			temp = CHESS(i + '-' + src[1]).v;
			if(base == temp){sflag = i; break;}
		}
		
		if('H' == c){
			if(-1 == sflag){
				_a_ = this.getQzZhongwen(qz, c);
				_b_ = this.coordinateWord_back_red[src[1]];
			}else{
				qh = (src[0] > sflag)?1:0;
				_a_ = this.tongyong_chars[qh];
				_b_ = this.getQzZhongwen(qz, c);
			}

			if(src[0] > desc[0]){
				_c_ = this.direction_back[0];
				_d_ = this.red_jin_ji[parseInt(src[0]) - parseInt(desc[0])];
			}else if(src[0] < desc[0]){
				_c_ = this.direction_back[2];
				_d_ = this.red_jin_ji[parseInt(desc[0]) - parseInt(src[0])];
			}else{
				_c_ = this.direction_back[1];
				_d_ = this.coordinateWord_back_red[desc[1]];
			}
		}else{
			if(-1 == sflag){
				_a_ = this.getQzZhongwen(qz, c);
				_b_ = this.coordinateWord_back_black[src[1]];
			}else{
				qh = (src[0] < sflag)?1:0;
				_a_ = this.tongyong_chars[qh];
				_b_ = this.getQzZhongwen(qz, c);
			}
			
			if(src[0] > desc[0]){
				_c_ = this.direction_back[2];
				_d_ = this.black_jin_ji[parseInt(src[0]) - parseInt(desc[0])];
			}else if(src[0] < desc[0]){
				_c_ = this.direction_back[0];
				_d_ = this.black_jin_ji[parseInt(desc[0]) - parseInt(src[0])];
			}else{
				_c_ = this.direction_back[1];
				_d_ = this.coordinateWord_back_black[desc[1]];
			}
		}
		return _a_ + _b_ + _c_ + _d_;
	}

	this.char_ma = function(c, qz, src, desc){
		var result = [];
		var _a_ = 0,_b_ = 0,_c_ = 0,_d_ = 0;
		var sflag = -1;
		var temp = null;
		var base = c + '-' + qz;
		var qh = 0;
		var ttt =[];
		for(var i=0; i<this.x; i++){
			if(i == src[0])continue;
			if((i == desc[0]) && (src[1] == desc[1]))continue;
			temp = CHESS(i + '-' + src[1]).v;
			if(base == temp){sflag = i; break;}
		}
		if('H' == c){
			if(-1 == sflag){
				_a_ = this.getQzZhongwen(qz, c);
				_b_ = this.coordinateWord_back_red[src[1]];
			}else{
				qh = (src[0] > sflag)?1:0;
				_a_ = this.tongyong_chars[qh];
				_b_ = this.getQzZhongwen(qz, c);
			}

			if(src[0] > desc[0]){
				_c_ = this.direction_back[0];
				_d_ = this.coordinateWord_back_red[desc[1]];
			}else{
				_c_ = this.direction_back[2];
				_d_ = this.coordinateWord_back_red[desc[1]];
			}
		}else{
			if(-1 == sflag){
				_a_ = this.getQzZhongwen(qz, c);
				_b_ = this.coordinateWord_back_black[src[1]];
			}else{
				qh = (src[0] < sflag)?1:0;
				_a_ = this.tongyong_chars[qh];
				_b_ = this.getQzZhongwen(qz, c);
			}
			
			if(src[0] > desc[0]){
				_c_ = this.direction_back[2];
				_d_ = this.coordinateWord_back_black[desc[1]];
			}else{
				_c_ = this.direction_back[0];
				_d_ = this.coordinateWord_back_black[desc[1]];
			}
		}
		return _a_ + _b_ + _c_ + _d_;
	}

	
	this.char_xiang = function(c, qz, src, desc){
		return this.char_ma(c, qz, src, desc);
	}

	
	this.char_shi = function(c, qz, src, desc){
		return this.char_ma(c, qz, src, desc);
	}

	
	this.char_jiang = function(c, qz, src, desc){
		return this.char_ju(c, qz, src, desc);
	}

	
	this.char_pao = function(c, qz, src, desc){
		return this.char_ju(c, qz, src, desc);
	}
	

	
	this.spec_bing = function(cqz, y){
		var temp = '';
		var count = 0;
		for(var j=0; j<this.y; j++){
			if(j == y)continue;
			for(var i=0; i<this.x; i++){
				temp = CHESS(i + '-' + j).v;
				if(temp == cqz){count++;
					if(2 == count) return true;
				}
			}
			count = 0;
		}
		return false;
	}

	this.bing_guimo = new Array();
	this.bing_guimo[2] = ['前','後'];
	this.bing_guimo[3] = ['前','中','後'];
	this.bing_guimo[4] = ['前','二','三','後'];
	this.bing_guimo[5] = ['前','二','三','四','後'];
	
	
	this.spec_bing_fix = function(gm, list, x, flag){
		
		var pos = 0;
		if(flag)
			list.sort(asc);
		else
			list.sort(desc);

		for(var i=0; i<gm; i++){
			if(list[i] == x){pos = i;break;}
		}
		return this.bing_guimo[gm][pos];
	}

	
	this.char_bing = function(c, qz, src, desc){
		var result = [];
		var _a_ = 0,_b_ = 0,_c_ = 0,_d_ = 0;
		
		var sflag = 0;
		var list = [];
		var temp = null;
		var base = c + '-' + qz;
		var qh = 0;
		for(var i=0; i<this.x; i++){
			if(i == src[0]){list.push(i);continue;}
			if((i == desc[0]) && (src[1] == desc[1]))continue;
			temp = CHESS(i + '-' + src[1]).v;
			if(base == temp){list.push(i);}
		}
		var len = list.length;
		if(len > 1){
			if(this.spec_bing(base, src[1])){sflag = 2;}
			else{sflag = 1;}							
		}

		if('H' == c){
			if(0 == sflag){
				_a_ = this.getQzZhongwen(qz, c);
				_b_ = this.coordinateWord_back_red[src[1]];
			}else if(1 == sflag){
				_a_ = this.spec_bing_fix(len, list, src[0], true);
				_b_ = this.getQzZhongwen(qz, c);
			}else{
				_a_ = this.spec_bing_fix(len, list, src[0], true);
				_b_ = this.coordinateWord_back_red[src[1]];
			}

			if(src[0] > desc[0]){
				_c_ = this.direction_back[0];
				_d_ = this.red_jin_ji[parseInt(src[0]) - parseInt(desc[0])];
			}else{
				_c_ = this.direction_back[1];
				_d_ = this.coordinateWord_back_red[desc[1]];
			}
		}else{
			if(0 == sflag){
				_a_ = this.getQzZhongwen(qz, c);
				_b_ = this.coordinateWord_back_black[src[1]];
			}else if(1 == sflag){
				_a_ = this.spec_bing_fix(len, list, src[0], false);
				_b_ = this.getQzZhongwen(qz, c);
			}else{
				_a_ = this.spec_bing_fix(len, list, src[0], false);
				_b_ = this.coordinateWord_back_black[src[1]];
			}
			
			if(src[0] < desc[0]){
				_c_ = this.direction_back[0];
				_d_ = this.black_jin_ji[parseInt(desc[0]) - parseInt(src[0])];
			}else{
				_c_ = this.direction_back[1];
				_d_ = this.coordinateWord_back_black[desc[1]];
			}
		}
		return _a_ + _b_ + _c_ + _d_;
	}


	this.usergpos = 0;
	this.usermax = 0;

	this.shixia = function(o){

		if('停止' == CHESS('ding_shi').value){alert('自动走棋模式下不能试下!');return ;}

		if('试下' == o.value){
			this.user_nallow = false;
			this.usergpos = this.gpos;
			this.usermax = this.gpos;
			this.user_charList = this.srcWenziQiqu.slice(0, this.gpos);
			this.userrecordlist = this.recordlist.slice(0, this.gpos);
			this.userrecordQzList = this.recordQzList.slice(0, this.gpos);
			//this.crrentPlay = this.userBlankAndRed(this.usergpos);
			this.setUserBlankAndRed();
			o.value = '结束';
			CHESS('tishi').innerHTML = '当前模式：用户试下';
		}else{
			this.clearLuxian();
			this.user_nallow = true;
			this.user_charList = [];
			o.value = '试下';
			var _gpos_ = this.gpos;
			this.first();
			this.other(_gpos_);
			CHESS('tishi').innerHTML = '当前模式：普通模式';
			CHESS('user_qp_div').style.display = 'none';
			this.setUserBlankAndRed3();
		}
	}
	
	this.userBlankAndRed = function(p){
		if(p%2 == 0)return 'H';
		return 'B';
	}

	this.setUserBlankAndRed = function(){
		this.crrentPlay = this.userBlankAndRed(this.usergpos);
		if('H' == this.crrentPlay){
			set_attr(CHESS('now_H'), 'class', 'con07_p PH');
			set_attr(CHESS('now_B'), 'class', 'con07_p PN');
		}else{
			set_attr(CHESS('now_B'), 'class', 'con07_p PB');
			set_attr(CHESS('now_H'), 'class', 'con07_p PN');
		}
	}
	this.setUserBlankAndRed2 = function(){
		if('H' == this.crrentPlay){
			set_attr(CHESS('now_H'), 'class', 'con07_p PH');
			set_attr(CHESS('now_B'), 'class', 'con07_p PN');
		}else{
			set_attr(CHESS('now_B'), 'class', 'con07_p PB');
			set_attr(CHESS('now_H'), 'class', 'con07_p PN');
		}
	}
	this.setUserBlankAndRed3 = function(){
		set_attr(CHESS('now_H'), 'class', 'con07_p PN');
		set_attr(CHESS('now_B'), 'class', 'con07_p PN');
	}

	this.usernext = function(){
		if(this.usergpos == this.usermax){return ;}
		this.usergpos++;
		this.usergo(1);
		this.setUserBlankAndRed();
	}

	this.userprev = function(){
		if(this.usergpos == 0){return ;}
		this.usergo(-1);
		this.usergpos--;
		this.setUserBlankAndRed();
	}

	this.userfirst = function(){
		if(this.usergpos == 0){return ;}
		this.createMB();
		this.initMB();
		this.usergpos = 0;
		this.setUserBlankAndRed();
	}

	this.userlast = function(){
		if(this.usergpos == this.usermax){return ;}
		var len = this.usermax - this.usergpos;
		for(var i=0; i<len; i++){
			this.usernext();
		}
	}

	this.usergo = function(flag){
		var op = [-1, -1],np = [-1, -1];
		var current_point_str = this.userrecordlist[this.usergpos - 1];
		var current_point_arr = current_point_str.split(':');
		if(flag > 0){
			op = current_point_arr[0];
			np = current_point_arr[1];
		}else{
			op = current_point_arr[1];
			np = current_point_arr[0];
		}
		
		var oq,nq;
		var current_qizi_str = this.userrecordQzList[this.usergpos - 1];
		var current_qizi_arr = current_qizi_str.split(':');
		oq = current_qizi_arr[0].split('-');
		nq = current_qizi_arr[1].split('-');

		set_attr(CHESS(np), 'class', current_qizi_arr[0] + ' hand');
		CHESS(np).v = current_qizi_arr[0];

		var old = CHESS(op);
		if(flag > 0){
			rem_attr(old, 'class');
			old.v = 'Z';
			return ;
		}
		if(nq[0] == 'Z'){
			rem_attr(old, 'class');
		}else{
			set_attr(old, 'class', current_qizi_arr[1] + ' hand');
		}
		old.v = current_qizi_arr[1];
	}

	this.dapu = function(o){
		if('试下' == CHESS('shi_xia').value){return ;}
		CHESS('user_qp_div').style.display = '';
		var len = this.user_charList.length;
		var xuhao = 1;
		var html = '';
		for(var i=0; i<len; i++){
			if(i%2 == 0){
				html += biaoHao(xuhao) + '.'+this.user_charList[i]+'  ';
				xuhao++;
			}else{
				html += this.user_charList[i]+'\n';
			}
		}
		CHESS('user_qp').value = html;

	}

	this.dingshi = function(o){
		if('结束' == CHESS('shi_xia').value){alert('试下模式下不能定时走棋!');return ;}

		if('自动' == o.value){
			o.value = '停止';
			CHESS('tishi').innerHTML = '当前模式：自动走棋';
			this.ds_time = parseInt(CHESS('user_timer').value);
			this.ds_start();
		}else{
			o.value = '自动';
			CHESS('tishi').innerHTML = '当前模式：普通模式';
			this.ds_stop();
		}
	}

	this.ds_flag = true;
	this.ds_time = 3000;
	this.ds_go = function(){
		if(this.gpos == this.max){this.ds_flag = false;}
		if(this.ds_flag){
			this.next();
			setTimeout("xx.ds_go()",this.ds_time);
		}
	}
	this.ds_start = function(){
		this.ds_flag = true;
		this.ds_go();
	}
	this.ds_stop = function(){this.ds_flag = false;}


	this.initCM();
}
function asc(a,b){return a-b;};
function desc(a,b){return b-a;};
var xx;
