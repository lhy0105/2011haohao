<?php
class Default_Model_User extends Db{

	/*Multiton Pattern{{{*/
	public static function getInstance($key = 'init'){
		static $_instance = array();
		if(!array_key_exists($key, $_instance)){
			$_instance[$key] = new self();
		}
		return $_instance[$key];
	}
	public function __construct()
	{
		parent::__construct(DB_HOST, DB_NAME, DB_USER, DB_PASS);
	}
	private function __clone()
	{
	}
	/*}}}*/

	/**
	 * 1:合法;0:不合法;6:封杀IP
	 */
	public function validClientIP($clientIp){
		$sql = 'select * from '.DB_PRE.'ip where ip = :ip';

		$row = $this->getSingle($sql, array(':ip' => $clientIp), PDO::FETCH_OBJ);

		if(!empty($row) && strtotime($row->create_date) + 24 * 3600 <= strtotime('now')){
			return true;
		}

		if($row && $row->times >= 6)
			return false;

		return true;
	}

	private function _clearClientIP($clientIp){
		$sql = 'delete from '.DB_PRE.'ip where ip = :clientIp';

		$stmt = $this->getDbh()->prepare($sql);
		$stmt->bindParam(':clientIp', $clientIp, PDO::PARAM_INT);
		$stmt->execute();
	}

	public function getTimesLogin($clientIp){
		$sql = 'select * from '.DB_PRE.'ip where ip = :ip';
		$row = $this->getSingle($sql, array(':ip' => $clientIp), PDO::FETCH_OBJ);

		if(!$row) return 1;

		return $row->times + 1;

	}

	private function _updateTimesLogin($clientIp){
		$sql = 'select * from '.DB_PRE.'ip where ip = :ip';
		$row = $this->getSingle($sql, array(':ip' => $clientIp), PDO::FETCH_OBJ);

		$createDate = date('Y-m-d H:i:s');
		if(!$row){
			$this->_insertIP($clientIp, $createDate);
		}else{
			$this->_updateIP($clientIp, $row->times +1, $createDate);
		}
	}


	private function _insertIP($clientIp, $createDate, $times = 1){
		$sql = 'insert into '.DB_PRE.'ip(`ip`, `create_date`, `times`) values( :ip, :create_date, :times)';
		$stmt = $this->getDbh()->prepare($sql);
		$stmt->bindParam(':ip', $clientIp, PDO::PARAM_INT);
		$stmt->bindParam(':create_date', $createDate, PDO::PARAM_STR);
		$stmt->bindParam(':times', $times, PDO::PARAM_INT);
		$stmt->execute();
	}

	private function _updateIP($clientIp, $times, $createDate){
		$sql = 'UPDATE '.DB_PRE.'ip set times = :times,create_date = :create_date where ip = :ip';
		$stmt = $this->getDbh()->prepare($sql);
		$stmt->bindParam(':times', $times, PDO::PARAM_INT);
		$stmt->bindParam(':ip', $clientIp, PDO::PARAM_INT);
		$stmt->bindParam(':create_date', $createDate, PDO::PARAM_STR);
		$stmt->execute();
	}

	public function login($username, $password, $ip){
		$sql = 'select * from '.DB_PRE.'user where name = ? and password = ?';
		$stmt = $this->getDbh()->prepare($sql);
		$stmt->bindParam(1, $username, PDO::PARAM_STR, 20);
		$stmt->bindParam(2, $password, PDO::PARAM_STR, 50);
		$stmt->execute();

		$row  = $stmt->fetch(PDO::FETCH_OBJ);
		if(!$row){
			$this->_updateTimesLogin($ip);
		}else{
			$this->_clearClientIP($ip);
		}
		return $row;
	}

	public function updatePassword($password, $userId){
		$sql = 'update '.DB_PRE.'user set password=:password where id=:uid';
		$stmt = $this->getDbh()->prepare($sql);
		$stmt->bindParam(':password', $password, PDO::PARAM_STR, 20);
		$stmt->bindParam(':uid', $userId, PDO::PARAM_STR, 50);
		$stmt->execute();
	}

	public function logout(){
		if(!self::authorize()) return false;
		$sql = 'UPDATE '.DB_PRE.'user SET last_date =:last_date,last_ip=:last_ip WHERE id =:user_id';
		$stmt = $this->getDbh()->prepare($sql);
		$stmt->execute(array(':last_date' => date('Y-m-d H:i:s'), ':last_ip' => Utility_Client::getClientIP(), ':user_id' => $_SESSION['userId']));
		session_destroy();
	}


	public static function authorize(){
		return isset($_SESSION['userId'])?true:false;
	}


	public function getUserById(){
		if(!self::authorize()) return false;
		$params = array(':userId' => $_SESSION['userId']);
		$sql = 'select * from '.DB_PRE.'user where id = :userId';
		return $this->getSingle($sql, $params, PDO::FETCH_OBJ);
	}
}
