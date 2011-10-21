<?php 

class Ranges_Box {

	public $range_id 	= array();
	public $range_name 	= array();
	public $range_count;
	
	public function __construct() {

	$this->setProperties();
	$this->setRangeCount();
		
	}

	private function setProperties() {

	global $db;
		
	$query = "SELECT range_id, range_name FROM range";	

	$rangeIds = $db->select($query);
		
	foreach($rangeIds as $key => $value): 

	$ids[] 	 = $value['range_id'];
	$names[] = $value['range_name'];

	endforeach;

	$this->range_id   = $ids;
	$this->range_name =	$names;

	}

	public function setRangeCount() {
		
	$this->range_count = count($this->range_id);

	}

}

$ranges = new Ranges_Box();

?>