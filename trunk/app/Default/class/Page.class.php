<?php
class Default_Page extends Controller{
	private $_username = 'test';
	private $_password = '123123';

	public function index(){
	}

	/**
	 * 1:用户验证成功;2:用户验证失败;3:是第4次验证(这时候验证码验证);6:封锁IP;7:验证码不正确;
	 */
	public function login(){
		$ip = ip2long(get_client_ip());
		$user = Default_Model_User::getInstance();
		$valid = $user->validClientIp($ip);
		$timesLogin = $user->getLoginTimes($ip);
		$params['isValid'] = $valid;

		if(empty($_POST)){/* Open The Page At First !*/
			$params['timesLogin'] = $timesLogin;
			$this->display('login.tpl', $params);
			return;
		}


		!$valid && exit('6');/*No validate IP!*/

		if($timesLogin > 3){/* Validate The verifyed code!*/
			empty($_POST['vcode']) && exit('7');
			$_POST['vcode'] !== $_SESSION['vcode'] && exit('7');
		}


		/* Validate The User Information! */
		(empty($_POST['u']) || empty($_POST['p'])) && exit('2');
		$username = $_POST['u'];
		$password = md5($_POST['p']);
		$userInfo = $user->login($username, $password);
		if(!$userInfo){
			exit('2');
		}

		$user->clearClientIp($ip);
		$_SESSION['userId'] = $userInfo->id;
		exit('1');
	}

	public function logout(){
		Default_Model_User::getInstance()->logout();
		header('Location:index.php?r=__login');
	}

	public function captcha(){
		//phpinfo();exit();
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
