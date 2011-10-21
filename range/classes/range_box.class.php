<?php

class Page_Box {

	public $view;
	
	public function __construct( $view ) {

	$this->view = $view;
	$this->setProperties();
	$this->setCount();
		
	}

	private function setProperties() {

	global $db;

	$id   = $this->view . "_id";
	$name = $this->view . "_name";
		
	$sql = "SELECT " . $id . ", " . $name . " FROM " . $this->view;	

	$results = $db->select( $sql );
		
	foreach($results as $key => $value): 

	$ids[] 	 = $value[  $id    ];
	$names[] = $value[  $name  ];

	endforeach;

	$this->$id   = $ids;
	$this->$name = $names;

	}

	public function setCount() {
		
	$this->count = count( $this->view . "_id" );

	}

}

?>