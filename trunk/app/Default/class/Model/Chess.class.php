<?php
class Default_Model_Chess extends Db{
	public function __construct(){
		parent::__construct(DB_HOST, DB_NAME, DB_USER, DB_PASS);
	}
	public function addChess($parentId, $typeName, $chessName, $chessContent = ''){
		if($parentId == 0){
			$sql  = "INSERT INTO chess_category(pid, title) values(:pid, :title)";
			$stmt = $this->getDbh()->prepare($sql);
			$stmt->bindParam(':pid', $parentId, PDO::PARAM_INT);
			$stmt->bindParam(':title', $typeName, PDO::PARAM_STR);
			$stmt->execute();
		}else{
			$sql = "INSERT INTO chess(cid, title, content) values(:cid, :title, :content)";
			$stmt = $this->getDbh()->prepare($sql);
			$stmt->bindParam(':cid', $parentId, PDO::PARAM_INT);
			$stmt->bindParam(':title', $chessName, PDO::PARAM_STR);
			$stmt->bindParam(':content', $chessContent, PDO::PARAM_STR);
			$stmt->execute();
		}
	}

	public function listChessCategory(){
		$sql = "select * from chess_category where pid= 0 order by id asc";
		$results = $this->fetchAll($sql, null, PDO::FETCH_OBJ);
		return $results;
	}

	public function listCategoryTitle(){
		$categorys = array();
		$sql = "select  chess.id as id,chess_category.title as category,chess.title as title from chess_category inner join chess on chess_category.id = chess.cid";
		$results = $this->fetchAll($sql, null, PDO::FETCH_OBJ);
		if(!empty($results)){
			foreach($results as $v){
				$categorys[$v->category][] = $v;
			}
		}

		return $categorys;
	}

	public function getChessById($id){
		$sql = "SELECT * FROM chess where id=:id";
		return $this->getSingle($sql, array(':id' => $id), PDO::FETCH_OBJ);
	}
}
