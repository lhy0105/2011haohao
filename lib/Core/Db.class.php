<?php
class Db{
	private $_dbh;
	private $_stmt;

	public function __construct($host, $dbname, $user, $pass){
		$attr = array();
		$attr[PDO::ATTR_PERSISTENT] = false;
		$attr[PDO::ATTR_TIMEOUT] = 5;
		$attr[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES `utf8`";
		$this->_dbh = new PDO("mysql:host={$host};dbname={$dbname}", $user, $pass, $attr);
	}


	public function fetchAll($sql, $params = null, $fetchStyle = PDO::FETCH_BOTH){
		$this->_stmt = $this->_dbh->prepare($sql);
		if(!empty($params)){
			foreach($params as $k => $v){
				$this->_stmt->bindParam($k, $v);
			}
		}
		$this->_stmt->execute();

		return $this->_stmt->fetchAll($fetchStyle);
	}

	public function getSingle($sql, $params = null, $fetchStyle = PDO::FETCH_BOTH){
		$this->_stmt = $this->_dbh->prepare($sql);

		if(!empty($params)){
			foreach($params as $k => $v){
				$this->_stmt->bindParam($k, $v);
			}
		}
		$this->_stmt->execute();
		return $this->_stmt->fetch($fetchStyle);
	}

	public function __destruct(){
		$this->_stmt = null;
		$this->_dbh = null;
	}

	public function getDbh(){
		return $this->_dbh;
	}

	public function getStmt(){
		return $this->_stmt;
	}
}
