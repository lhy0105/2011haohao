<?php
class Default_Page extends Controller{
	public function index(){
		$this->display('index.tpl', array('test'=>'Hao HaoFramework'));
	}
}