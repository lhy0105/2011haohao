<?php
class Person{
	private $_name;
	private $_department;
	public function __construct($name){
		$this->_name = $name;
	}

	public function getManager(){
		return $this->getDepartment()->getManager();
	}

	public function setDepartment($department){
		$this->_department = $department;
	}

	public function getDepartment(){
		return $this->_department;
	}
}
class Department{
	private $_manager;
	public function __construct($manager){
		$this->_manager = $manager;
	}
	public function getManager(){
		return $this->_manager;
	}
}

$department = new Department(new Person('chuanshanjia'));

$xiaocai= new Person('xiaocai');
$xiaocai->setDepartment($department);
$manager = $xiaocai->getManager();
