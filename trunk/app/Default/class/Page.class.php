<?php
class Default_Page extends Controller{
	/**
	 * 1:Success;2:Failure;3:Forth validation(Show verified Code);6:No IP;7:The verified Code  Is Error!;
	 */
	public function login(){
		$ip = ip2long(Utility_Client::getClientIP());
		$user = Default_Model_User::getInstance();
		$valid = $user->validClientIP($ip);
		$times_login =  $user->getTimesLogin($ip);
		$params['isValid'] = $valid;

		if(empty($_POST)){/* Open The Page At First !*/
			$params['timesLogin'] = $times_login;
			$this->display('login.tpl', $params);
			return;
		}


		!$valid && exit('6');/*No validate IP!*/

		if($times_login> 3){/* Validate The verifyed code!*/
			empty($_POST['vcode']) && exit('7');
			$_POST['vcode'] !== $_SESSION['vcode'] && exit('7');
		}


		/* Validate The User Information! */
		(empty($_POST['u']) || empty($_POST['p'])) && exit('2');
		$username = $_POST['u'];
		$password = md5($_POST['p']);
		$user_info = $user->login($username, $password, $ip);
		if(!$user_info){
			exit('2');
		}

		$_SESSION['userId'] = $user_info->id;
		exit('1');
	}

	public function logout(){
		Default_Model_User::getInstance()->logout();
		header('Location:index.php?r=__login');
	}

	public function captcha(){
		require FRAME_ROOT_DIR.'/lib/Captcha/captcha.php';
		$captcha = new SimpleCaptcha();
		$captcha->width = 130;
		$captcha->height = 50;
		$captcha->session_var = 'vcode';
		$captcha->minWordLength = 4;
		$captcha->maxWordLength = 5;
		$captcha->CreateImage();
	}
}
