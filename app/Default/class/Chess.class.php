<?php
class Default_Chess extends Controller{

	public function __construct(){
		if(!Default_Model_User::authorize()){
			header('Location:index.php?r=__login');
		}
	}

	public function index(){
		$params = array();
		$chess_db = new Default_Model_Chess();
		$params['categorys'] = $chess_db->listCategoryTitle();
		$this->display('part/chess_index.tpl', $params);
	}

	public function pageAddCategory(){
		$params= array();
		$chess_db = new Default_Model_Chess();
		$params['types'] = $chess_db->listChessCategory();
		$this->display('part/chess_add_category.tpl', $params);
	}

	public function pageCatCategory(){
		!isset($_GET['id']) && exit('No Entry!');

		$params = array();
		$id = intval($_GET['id']);
		$chess_db = new Default_Model_Chess();
		$params['chess'] = $chess_db->getChessById($id);
		$this->display('part/chess_show.tpl', $params);
	}

	public function addCategory(){
		$pid = $_POST['typeid'];
		$name = $_POST['name'];
		$chess_name = $_POST['chessname'];
		$content = $_POST['content'];
		$chess_db = new Default_Model_Chess();
		$chess_db->addChess($pid, $name, $chess_name, $content);
	}

}
