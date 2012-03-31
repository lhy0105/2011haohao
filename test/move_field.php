<?php
class Class1{
	public $_field;
	public function method(){
		return $this->_field;
	}
}


class Class2{
	private $_class1;
	public function __construct(){
		$this->_class1 = new Class1();
	}

	private function _test1(){
		echo $this->_class1->_field,"\n";
	}
	private function _test2(){
		echo $this->_class1->_field,"\n";
	}
	private function _test3(){
		echo $this->_class1->_field,"\n";
	}
}
