<?php
class Class1{
	private $_class2;
	public function __construct(){
		$this->_class = new Class2();
	}
	public function method(){
		$this->_class->t1();
		$this->_class->t2();
		$this->_class->t3();
	}
}

class Class2{
	public function t1(){
		echo "t1()\n";
	}
	public function t2(){
		echo "t2()\n";
	}
	public function t3(){
		echo "t3()\n";
	}
}

// 测试代码
$class = new Class1();
$class->method();
