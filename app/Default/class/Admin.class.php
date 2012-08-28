<?php
class Default_Admin extends Controller{
	public function __construct(){
		if(!Default_Model_User::authorize()){
			header('Location:index.php?r=__login');
		}
	}
	public function page(){
		$params = array();
		$params['clientIP'] = getClientIP();
		$this->display('page.tpl', $params);
	}
}
