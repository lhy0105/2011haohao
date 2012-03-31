<?php
class Class1{
	private $_class2;
	public function __construct(){
		$this->_class2 = new Class2();
	}
	public function method(){
		$this->_class2->method();
	}
}

class Class2{
	public function method(){
		$this->t1();
		$this->t2();
		$this->t3();
	}
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
