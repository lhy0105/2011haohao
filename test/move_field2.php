<?php
class Class1{
	public $field;
	public function method(){
		return $this->getField();
	}

	public function setField($field){
		$this->field = $field;
	}

	public function getField(){
		return $this->field;
	}
}


class Class2{
	public $field;
	public function __construct(){
	}

	private function _test1(){
		echo $field,"\n";
	}
	private function _test2(){
		echo $field,"\n";
	}
	private function _test3(){
		echo $field,"\n";
	}
}
