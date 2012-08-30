<?php
class Default_Model_User extends Db{
	public function __construct(){
		parent::__construct(DB_HOST, DB_NAME, DB_USER, DB_PASS);
	}

	public function login($username, $password){
		$sql = 'select * from user where name = ? and password = ?';
		$stmt = $this->getDbh()->prepare($sql);
		$stmt->bindParam(1, $username, PDO::PARAM_STR, 20);
		$stmt->bindParam(2, $password, PDO::PARAM_STR, 50);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function logout(){
		if(!self::authorize()) return false;
		$sql = "UPDATE user SET last_date =:last_date,last_ip=:last_ip WHERE id =:user_id";
		$stmt = $this->getDbh()->prepare($sql);
		$stmt->execute(array(':last_date' => date('Y-m-d H:i:s'), ':last_ip' => getClientIP(), ':user_id' => $_SESSION['userId']));
	}

	public static function authorize(){
		if(isset($_SESSION['userId'])) 
			return true;
		return false;
	}

	public function getUserById(){
		if(!self::authorize()) return false;
		$params = array(':userId' => $_SESSION['userId']);
		$sql = 'select * from user where id = :userId';
		return $this->getSingle($sql, $params, PDO::FETCH_OBJ);
	}
}
