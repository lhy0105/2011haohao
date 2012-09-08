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
		$ip = ip2long(getClientIP());
		$user = Default_Model_User::getInstance();
		$timesLogin = $user->getLoginTimes($ip);
		if(!empty($_POST)){
			$username = $_POST['u'];
			$password = md5($_POST['p']);

			if($valid = $user->validClientIp($ip)){
				$userInfo = $user->login($username, $password);
				if($userInfo){
					$user->clearClientIp($ip);
					if($timesLogin >= 4){
						empty($_POST['vcode']) && exit('7');
						if($_POST['vcode'] == $_SESSION['vcode']){
							$_SESSION['userId'] = $userInfo->id;
						}else{
							echo '7';
							return;
						}
					}else{
						$_SESSION['userId'] = $userInfo->id;
					}
					echo '1';
					return;
				}else{
					if($timesLogin === 4){
						echo '3';
						return;
					}else if($timesLogin >= 6){
						echo '6';
						return;
					}
					echo '2';
					return;
				}
			}else{
				echo '6';
			}
			return '';
		}else{
			$params['timesLogin'] = $timesLogin;
			if($timesLogin >= 6) exit('您的IP已被认为是不安全的！如果您要登录，需要跟管理员联系baochuanzhou@gmail.com！');
			$this->display('login.tpl', $params);
		}
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
