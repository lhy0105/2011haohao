<?php
class PreviousEnd{
	public function getYear(){
		return "2012";
	}

	public function getMonth(){
		return "04";
	}

	public function getDay(){
		return "01";
	}
}

class Client{
	public function nextDay(){
		$newStart =  $this->_nextDate(new PreviousEnd());
		return date('Y-m-d', $newStart);
	}

	private function _nextDate($previousEnd){
		return strtotime($previousEnd->getYear().'-'
			.$previousEnd->getMonth().'-'.($previousEnd->getDay() + 1));
	}
}


$client = new Client();
var_dump($client->nextDay());
