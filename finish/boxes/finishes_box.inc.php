<?php
// /*

// +--------------------------------------------------------------------------

// |	Lock-Tech_finishes.inc.php

// |   ========================================

// |	Lock-Tech_finishes module for navigating the shop by finish.

// +--------------------------------------------------------------------------

// */

/* Import classes */

$view = str_replace('view', '', strtolower($_GET['_a']));

require_once('modules'.CC_DS.'3rdparty'.CC_DS.'page_view'.CC_DS.'finish'.CC_DS.'classes'.CC_DS.'finishes_box.class.php');

if(!empty($finishes->finish_id)) {

$box_content = new XTemplate ('boxes'.CC_DS.'finishes_box.tpl');
	
for($i=0; $i<=$finishes->finish_count-1; $i++) {

$box_content->assign('FINISH_ID',   $finishes->finish_id[$i]);
$box_content->assign('FINISH_NAME', $finishes->finish_name[$i]);
$box_content->parse('finishes.finishes_loop');

}

}

$box_content->parse('finishes');

$box_content = $box_content->text('finishes');

?>