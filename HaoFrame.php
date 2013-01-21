<?php
/**
 * My HaoFrame about PHP
 * @date 2011-09-08
 * @author 周宝川(ch) Dennis(en)
 * @email baochuanzhou@gmail.com
 * @blog www.cnblogs.com/baochuan
 */

defined('DS')				|| define('DS', DIRECTORY_SEPARATOR);

defined('FRAME_APP_DIR')	|| define('FRAME_APP_DIR', dirname(__FILE__).DS.'app'.DS);
defined('FRAME_ROOT_DIR')	|| define('FRAME_ROOT_DIR', dirname(__FILE__).DS);
defined('FRAME_SMARTY_DIR') || define('FRAME_SMARTY_DIR', FRAME_ROOT_DIR.'lib'.DS.'Smarty'.DS);

defined('ENVIROMENT') || define('ENVIROMENT', 'development');
switch(ENVIROMENT){
case 'development':
	error_reporting(E_ALL);
	break;
case 'product':
	error_reporting(0);
	break;
default:
	exit('The application is not set correctly!');
}

session_start();


final class HaoFrame{
	const VERSION = 'frame-1.0';
	public $params = array('module' => 'Default','controller' => 'Page','action' => 'index');
	public $demo_dir;

	/*Multiton Pattern{{{*/
	public static function getInstance($key = 'init'){
		static $_instance = array();
		if(!array_key_exists($key, $_instance)){
			$_instance[$key] = new self();
		}
		return $_instance[$key];
	}
	private function __construct()
	{
	}
	private function __clone()
	{
	}
	/*}}}*/

	/**
	 * Make Demo  Frame
	 */
	private function makeDemo()
	{
		/*{{{*/
		$str = <<<EOD
<?php
class Default_Page extends Controller{
	public function index(){
		\$this->display('index.tpl', array('test'=>'Hao HaoFramework'));
	}
}
EOD;
		$this->demo_dir = array(
			array(
				'dir'=>FRAME_APP_DIR.'Default'.DS.'class',
				'file'=>'Page.class.php',
				'content'=> $str
			), 
			array(
				'dir'=>FRAME_APP_DIR.'Default'.DS.'tpl',
				'file'=>'index.tpl',
				'content'=> '{helper->part params=$test}{helper->trigger}This is Hao PHP HaoFramework '.HaoFrame::VERSION.' !{/helper->trigger}'
			),
			array(
				'dir'=>FRAME_ROOT_DIR.'cache'.DS,
				'file'=>'',
				'content'=> ''
			)
		);
		foreach($this->demo_dir as $key=>$value){
			if(!file_exists($value['dir'])){
				mkdir($value['dir'], 0755, true);
			}
			if(!empty($value['file'])){
				//file_put_contents($value['dir'].DS.$value['file'], $value['content']);
				$file = $value['dir'].DS.$value['file'];
				if(is_writable($value['dir'])){
					if(!file_exists($file)){
						$fp = fopen($file, 'w');
						fwrite($fp, $value['content']);
						fclose($fp);
						chmod($file, 0755);
					}
				}
			}
		}
		/*}}}*/
		return $this;
	}

	/*_________________________________________________________MVC*/
	/**
	 */
	public function run()
	{
		!isset($_GET['module']) && $_GET['module'] = $this->params['module'];
		!isset($_GET['controller']) && $_GET['controller'] = $this->params['controller'];
		!isset($_GET['action']) && $_GET['action'] = $this->params['action'];

		if(count($_GET) && isset($_GET['r'])){
			$_params = explode('_',$_GET['r']);
			!empty($_params[0]) && ($_GET['module'] = ucfirst(strtolower($_params[0])));
			!empty($_params[1]) && ($_GET['controller'] = ucfirst(strtolower($_params[1])));
			!empty($_params[2]) && ($_GET['action'] = strtolower($_params[2]));
			if(isset($_params[3]) && isset($_params[4])){
				$_GET[$_params[3]] = $_params[4];
			}
		}

		// Bundle Demo
		$lockFile = FRAME_ROOT_DIR.'install.lock';
		if(!file_exists($lockFile)){
			$this->makeDemo();
			$fp = fopen($lockFile, 'w');
			fwrite($fp, 'lock');
			fclose($fp);
		}

		try{
			$this->_entry();
		}catch(HaoFrameException $e){
			echo $e->getMessage();
		}
		return $this;
	}

	private function _entry(){
		if(isset($_GET['controller']) && isset($_GET['action'])){
			$fileController = FRAME_APP_DIR.$_GET['module'].DS.'class'.DS.ucfirst($_GET['controller']).'.class.php';
			if(file_exists($fileController)){
				include $fileController;
				$classname = $_GET['module'].'_'.$_GET['controller'];
				if(class_exists($classname)){
					$controller = new $classname;
					if(method_exists($controller, $_GET['action'])){
						call_user_func(array($controller, $_GET['action']));
					}else{
						header("HTTP/1.0 404 Not Found"); 
						throw new HaoFrameException('Line:'.__LINE__.' Description:The MVC Control\'s Function Is Failure!');
					}
				}else{
					header("HTTP/1.0 404 Not Found"); 
					throw new HaoFrameException('Line:'.__LINE__.' Description:The MVC Control\'s Controller Is Failure!');
				}
			}else{
				header("HTTP/1.0 404 Not Found"); 
				throw new HaoFrameException('Line:'.__LINE__.' Description:The MVC Control\'s '.$file.' Is Failure!');
			}
		}else{
			header("HTTP/1.0 404 Not Found"); 
			throw new HaoFrameException('Line:'.__LINE__.' Description:The $_GET is lack of the params!');
		}
	}
}

abstract class Controller{
	public function __construct(){}

	public function display($tpl, $params=null){
		try{
			$engine = View::getEngine();
			!empty($params) && ($engine->assign($params));
			$output = $engine->fetch($tpl);
			echo $output;
			return $this;
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}

	protected function pageCache($seconds=60){
	}
}

final class View{
	public static function getEngine(){
		static $smarty = NULL;
		if(NULL === $smarty){
			$helper = new Helper();
			$fileSmarty = FRAME_SMARTY_DIR.'SmartyBC.class.php';
			if(file_exists($fileSmarty)){
				require_once $fileSmarty;
				$smarty					=	new SmartyBC();
				Smarty::$_MBSTRING = true;
				Smarty::$_CHARSET = 'utf-8';
				$smarty->compile_check	=	true;
				$smarty->caching		=	0;
				$smarty->compile_dir	=	FRAME_ROOT_DIR.'cache';
				$smarty->template_dir	=	FRAME_APP_DIR.$_GET['module'].DS.'tpl';
				$smarty->register_object('helper', $helper, null, true, Helper::$blocks);
				$smarty->plugins_dir	=	array(FRAME_SMARTY_DIR.'plugins', FRAME_ROOT_DIR.'lib/Core/plugins');
				//var_dump($smarty);exit();
				return $smarty;
			}else{
				throw new HaoFrameException('Line:'.__LINE__.' Description:The Smarty\'s File'.$file.' Does Not Exists!'); 
			}
		}
	}
}

/**
 * Smarty Tag Use
 * Call: {helper->trigger t='1'}{/helper->trigger}
 */
final class Helper{
	static public $blocks = array('trigger');
	public function trigger($params, $content, &$smarty, &$repeat){
		if(is_null($content)) return ;
		return '<span style="color:red">'.$content.'</span>';
	}
	public function part($params, &$smarty){
		var_dump(__METHOD__);
		return 'part';
	}
}

class HaoFrameException extends Exception{
	public function __construct($message, $code = 45){
		parent::__construct($message, $code);
	}
}

spl_autoload_register('frameAutoload');
function frameAutoload($class){
	/* Compatible the Smarty*/
	if(0 === strpos($class, 'Smarty') && function_exists('smartyAutoload')){
		smartyAutoload($class);
		return;
	}
	if(file_exists(FRAME_ROOT_DIR.'/lib/Core/'.$class.'.class.php')){
		require_once FRAME_ROOT_DIR.'/lib/Core/'.$class.'.class.php';
	}else{
		if(false === strpos($class, '_')){
			throw new HaoFrameException('Line:'.__LINE__.' Description:'.$class.' Is Illegal!!');
		}
		list($_module, $_controller) = explode('_', $class);
		$_module = substr($class, 0, strpos($class, '_'));
		$_model = substr($class, strpos($class, '_')+1);

		$_fileModel = FRAME_APP_DIR.$_module.DS.'class'.DS.str_replace('_', DS, $_model).'.class.php';
		if(!file_exists($_fileModel)){
			throw new HaoFrameException('Line:'.__LINE__.' Description:'.$_fileModel.' Does Not Exists!');
		}
		require_once $_fileModel;
	}
}

/**
 * Instantiation by class name
 * @params $init false:Only load class Not Instantiation.
 * @return object
 */
function load_class($class, $init=true){
	static $objects = array();
	$t_class = NULL;
	if(isset($objects[$class])){
		return $object[$class];
	}

	$file = FRAME_ROOT_DIR.'lib'.DS.'class'.DS.$class.'.php';
	if(file_exists($file)){
		require_once $file;
	}else{
		throw new HaoFrameException('Line:'.__LINE__.'  Description:Not Exists!');
	}

	if(!class_exists($class)){
		throw new HaoFrameException('Line:'.__LINE__.' Description:The Class '.$class.' Not Exists!');
	}

	
	if($init){
		$t_class = new $class();
		$objects[$class] = &$t_class;
		return $t_class;
	}
}
