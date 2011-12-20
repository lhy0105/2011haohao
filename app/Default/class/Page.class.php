<?php
class Default_Page extends Controller{
	public function index(){
		$arr = array('age'=>'30','name'=>'zhoubc','sexy'=>'male');
		sort($arr);
		var_dump($arr);
		exit();
		// 删除数组中的一个元素
		$arr = array('a','k'=>'b','c','d');
		array_splice($arr,1,1);
		print_r($arr);
		exit();
		$arr1	=	array('0'=>array('fid'=>1,'tid'=>2,'name'=>'Name1'),'1'=>array('fid'=>1,'tid'=>3,'name'=>'Name2'),'2'=>array('fid'=>1,'tid'=>2,'name'=>'Name1'),'3'=>array('fid'=>3,'tid'=>4,'name'=>'Name3'));
		$arr2 = array();
		foreach($arr1 as $v){
			$arr2[$v['fid']][] = $v;
			//$arr2[$v['fid']][] = array($v['tid'],$v['name']);
		}
		print_r($arr2);
		exit();
		//	字符串“open_door” 转换成 “OpenDoor”、”make_by_id” 转换成 ”MakeById”
		$str	=	'open_door';
		$str	=	'make_by_id';
		$str = ucwords(str_replace('_',' ', $str));
		echo str_replace(' ', '', $str);
		exit();
		//	网页ID 
		echo getenv('REMOTE_ADDR');exit();
		//	两个日期的差数，例如2007-2-5 ~ 2007-3-6 
		$from	=	'2007-2-5';
		$to		=	'2007-3-6';
		$s = strtotime($to) - strtotime($from);
		$d = ceil($s/(24*60*60));
		echo $d;
		return 0;
		$this->display('index.tpl', array('test'=>'Hao HaoFramework'));
	}
	public function test(){
		$this->display('test.tpl');
	}
}
