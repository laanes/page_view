<?php 

class Finishes_Box {

	public $finish_id 	= array();
	public $finish_name 	= array();
	public $finish_count;
	
	public function __construct() {

	$this->setProperties();
	$this->setFinishCount();
		
	}

	private function setProperties() {

	global $db;
		
	$query = "SELECT finish_id, finish_name FROM finish";	

	$finishIds = $db->select($query);
		
	foreach($finishIds as $key => $value): 

	$ids[] 	 = $value['finish_id'];
	$names[] = $value['finish_name'];

	endforeach;

	$this->finish_id   = $ids;
	$this->finish_name = $names;

	}

	public function setFinishCount() {
		
	$this->finish_count = count($this->finish_id);

	}

}

$finishes = new Finishes_Box();

?>