<?php
// /*

// +--------------------------------------------------------------------------

// |	Lock-Tech_finishes.inc.php

// |   ========================================

// |	Lock-Tech_finishes module for navigating the shop by finish.

// +--------------------------------------------------------------------------

// */

/* Import classes */

$view = "finish";

require_once('modules'.CC_DS.'3rdparty'.CC_DS.'product_loader'.CC_DS.'classes'.CC_DS.'page_box.php');

$box_obj = new Page_Box( $view );

$id   = $box_obj->$view . "_id";
$name = $box_obj->$view . "_name";

if( !empty( $id ) ) {

$box_content = new XTemplate ( 'boxes' . CC_DS . $view . '_box.tpl' );
	
for($i=0; $i<=$box_obj->count-1; $i++) {

$box_content->assign(strtoupper($view)."_ID",   $id[$i]   );
$box_content->assign(strtoupper($view)."_NAME", $name[$i] );

$box_content->parse($view .'.finish_loop');

}

}

$box_content->parse('finish');

$box_content = $box_content->text('finish');

?>