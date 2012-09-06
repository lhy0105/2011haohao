<?php
class Default_Book extends Controller{
	public function __construct(){
		if(!Default_Model_User::authorize()){
			header('Location:index.php?r=__login');
		}
	}

	public function index(){
		$params['page'] = isset($_GET['page'])?intval($_GET['page']):1;
		$book = new Default_Model_Book();
		$params['book'] = $book->listAll($params['page']);
		$params['size'] = $book->getSize();
		if(isset($_GET['page'])){
			$this->display('part/part_book_list.tpl', $params);
		}else{
			$this->display('book_index.tpl', $params);
		}
	}

	public function addTpl(){
		$this->display('book_add.tpl');
	}

	public function addContent(){
		$name = $_POST['name'];
		$dateBegin = $_POST['date_begin'];
		$dateEnd = $_POST['date_end'];
		$note = $_POST['note'];

		$book = new Default_Model_Book();
		$book->addContent($name, $dateBegin, $dateEnd, $note);
	}

	public function statistics(){
		$params['page'] = isset($_GET['page'])?intval($_GET['page']):1;
		$book = new Default_Model_Book();
		$params['book'] = $book->listAll($params['page']);
		$this->display('book_data.xml', $params);
	}
}
