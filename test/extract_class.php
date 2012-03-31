<?php
class Person{
	private $_name;
	private $_PhoneNumber;
	public function __construct(){
		$this->_PhoneNumber = new PhoneNumber();
	}

	public function getPhoneNumber(){
		return $this->_PhoneNumber->getPhoneNumber;
	}
}

class PhoneNumber{
	private $_phoneCode;
	private $_phoneNumber;
	public function getPhoneNumber(){
		return $this->_phoneNumber;
	}

	public function setPhoneNumber($phoneNumber){
		$this->_phoneNumber = $phoneNumber;
	}
}
