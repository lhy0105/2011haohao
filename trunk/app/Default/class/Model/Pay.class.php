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

	public function listById($typeId){
		$sql = "SELECT * FROM pay inner join pay_type on pay.sid = pay_type.id where sid = :id";
		$stmt = $this->getDbh()->prepare($sql);

		$stmt->bindParam(':id', $typeId, PDO::PARAM_INT);

		$stmt->execute();

		$pays = $stmt->fetchAll(PDO::FETCH_OBJ);
		return $pays;
	}

	public function addContent($ammount, $sid, $note, $payDate){
		$sql = "INSERT INTO pay(ammount, pay_date, sid, note) values(:ammount, :pay_date, :sid, :note)";

		$stmt = $this->getDbh()->prepare($sql);

		!preg_match('/^\d{4}-\d{2}-\d{2}$/', $payDate) && ($payDate = date('Y-m-d H:i:s'));

		$stmt->bindParam(':ammount', $ammount, PDO::PARAM_INT);
		$stmt->bindParam(':pay_date', $payDate, PDO::PARAM_STR);
		$stmt->bindParam(':sid', $sid, PDO::PARAM_INT);
		$stmt->bindParam(':note', $note, PDO::PARAM_STR);

		$stmt->execute();

		/*$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result['id'];*/
	}

	public function statistics($pid){
		$sql = 'select sum(ammount) as ammount,pay_type.name,pay_type.id as id,pay_date from pay inner join pay_type on pay.sid = pay_type.id where pay_type.pid = :pid and pay_date > :before_date and pay_date < :pay_date group by sid,date(pay_date) order by pay_date desc limit 0,20';
		$stmt = $this->getDbh()->prepare($sql);

		$stmt->bindParam(':pid', $pid, PDO::PARAM_INT);
		$beforeDate = date('Y-m-d H:i:s', time()-30*24*60*60);
		$now = date('Y-m-d H:i:s', time() + 24 * 60 * 60);
		$stmt->bindParam(':before_date', $beforeDate, PDO::PARAM_STR);
		$stmt->bindParam(':pay_date', $now, PDO::PARAM_STR);

		$stmt->execute();

		$pays = $stmt->fetchAll(PDO::FETCH_OBJ);

		if(!$pays) return false;

		$dates = array();
		$payGroup = array();
		if(count($pays) > 1){
			/*$beginDate = substr($pays[0]->pay_date,0,10);
			$endDate = substr(end($pays)->pay_date,0, 10);
			$endNum = intval((strtotime($beginDate) - strtotime($endDate))/(24*60*60)) + 1;

			for($i = 0; $i < $endNum; $i++){
				if($i !== 0){
					$endDate = date('Y-m-d', strtotime($endDate) + 24 * 60 * 60);
				}else{
					$endDate = date('Y-m-d', strtotime($endDate));
				}
				$dates[] = $endDate;
			}*/

			$order = array();
			foreach($pays as $v){
				$order[] = $v->pay_date;
				$date = substr($v->pay_date, 0, 10);
				if(!in_array($date, $dates)){
					$dates[] = $date;
				}
			}

			krsort($dates);
			array_multisort($order, SORT_ASC, $pays);
			foreach($pays as $v){
				$payGroup[$v->name][] = $v;
			}
		}else{
			$dates = array(date('Y-m-d',strtotime($pays[0]->pay_date)));
			$payGroup[$pays[0]->name][] = $pays[0];
		}

		$r = new stdClass();
		$r->date = $dates;
		$r->pays = $payGroup;
		return $r;
	}
}
