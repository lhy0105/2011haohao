<?php
class Default_Admin extends Controller{
	public function __construct(){
		if(!Default_Model_User::authorize()){
			header('Location:index.php?r=__login');
		}
	}
	public function page(){
		$params = array();
		$params['clientIP'] = get_client_ip();
		$params['user'] = Default_Model_User::getInstance()->getUserById();
		$this->display('page.tpl', $params);
	}

	public function changePasswd(){
		$this->display('changePasswd.tpl');
	}

	/*
	 * 0:代表非法参数;1:代码验证成功，并更新密码;2:代表旧密码输入有误;3:新、旧密码相同不做处理。
	 */
	public function changePasswdForm(){
		$user = Default_Model_User::getInstance();

		(empty($_POST['oldpasswd']) || empty($_POST['newpasswd'])) && exit('0');

		$old_password = $_POST['oldpasswd'];
		$new_password = $_POST['newpasswd'];

		(strlen($old_password) < 5 || strlen($new_password) < 5)  && exit(0);

		if($old_password == $new_password){
			exit('3');
		}

		$userInfo = $user->getUserById();
		$user_id = $userInfo->id;
		if($userInfo->password != md5($old_password)){
			exit('2');
		}


		$user->updatePassword(md5($new_password), $user_id);
		exit('1');
	}
}
