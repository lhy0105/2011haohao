<?php
class Default_Model_Book extends Db{
	private $_size = 10;
	public function __construct(){
		parent::__construct(DB_HOST, DB_NAME, DB_USER, DB_PASS);
	}

	public function addContent($name, $dateBegin, $dateEnd, $note){
		$sql = "INSERT INTO book(name, date_begin, date_end, note) values(:name, :date_begin, :date_end, :note)";
		$stmt = $this->getDbh()->prepare($sql);

		$stmt->bindParam(':name', $name, PDO::PARAM_STR);
		$stmt->bindParam(':date_begin', $dateBegin, PDO::PARAM_STR);
		$stmt->bindParam(':date_end', $dateEnd, PDO::PARAM_STR);
		$stmt->bindParam(':note', $note, PDO::PARAM_STR);

		$stmt->execute();
	}

	public function listAll($page = 1){
		$book = new stdClass();
		$sqlNum = "select count(*) as total from book";
		$rows = $this->getSingle($sqlNum);
		$book->total = $rows['total'];

		$size = $this->getSize();
		$sqlQuery = "select * from book order by date_begin desc limit ".($page - 1)*$size.",{$size}";
		$book->results = $this->fetchAll($sqlQuery, null, PDO::FETCH_OBJ);
		return $book;

	}

	public function getSize(){
		return $this->_size;
	}
}
