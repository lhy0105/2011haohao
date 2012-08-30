<?php
class Default_Page extends Controller{
	private $_username = 'test';
	private $_password = '123123';

	public function index(){
	}
	public function test(){
		$this->display('test.tpl');
	}

	public function login(){
		if(!empty($_POST)){
			$username = $_POST['u'];
			$password = md5($_POST['p']);

			if(!$user = (new Default_Model_User())->login($username, $password)){
				echo 'failure';
			}else{
				$_SESSION['userId'] = $user->id;
				echo 'successful';
			}
		}else{
			$this->display('login.tpl');
		}
	}

	public function logout(){
		(new Default_Model_User())->logout();
		header('Location:index.php?r=__login');
	}
}
