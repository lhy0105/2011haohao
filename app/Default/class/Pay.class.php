<?php
class Default_Pay extends Controller{
	public function __construct(){
		if(!Default_Model_User::authorize()){
			header('Location:index.php?r=__login');
		}
	}

	public function index(){
		$pay = new Default_Model_Pay();
		$types = $pay->listType(true);
		$params['types']  = $types;
		$this->display('pay_index.tpl', $params);
	}

	public function getContent(){
		!isset($_GET['id']) && exit('The input is illegal!!!');
		$id = intval($_GET['id']);

		$pay = new Default_Model_Pay();
		$params['pays'] = $pay->getPayById($id);
		$this->display('pay_content.tpl', $params);
	}

	public function add(){
		!isset($_GET['id']) && exit('The input is illegal!!!');
		$id = intval($_GET['id']);

		$pay = new Default_Model_Pay();
		$params['pays'] = $pay->getPayById($id);
		$params['types'] = $pay->listType();
		$this->display('pay_add.tpl', $params);
	}
}
