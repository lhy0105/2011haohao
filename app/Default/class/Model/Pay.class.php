<?php
class Default_Model_Pay extends Db{
	public function __construct(){
		parent::__construct(DB_HOST, DB_NAME, DB_USER, DB_PASS);
	}

	public function listType($isGroup= false){
		$sql = "select * from pay_type";
		$types =  $this->fetchAll($sql, null, PDO::FETCH_OBJ);
		if($isGroup){
			$types = $this->_group($types);
		}
		return $types;
	}

	/**
	 * 分组
	 */
	private function _group($types){
		if(empty($types)) return '';

		$parent = array();
		foreach($types as $k => $v){
			if($v->pid === '0'){
				$parent[$v->id] = $v;
				unset($types[$k]);
			}
		}

		foreach($types as $k=>$v){
			if(isset($parent[$v->pid])){
				$parent[$v->pid]->sub[] = $v;
			}
		}
		return $parent;
	}

	public function getPayById($typeId){
		$sql = "SELECT * FROM pay inner join pay_type on pay.sid = pay_type.id where sid = :id";
		return $this->getSingle($sql, array(':id' => $typeId), PDO::FETCH_ASSOC);
	}
}
