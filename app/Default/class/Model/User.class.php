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
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public static function authorize(){
		if(isset($_SESSION['userId'])) 
			return true;
		return false;
	}
}
