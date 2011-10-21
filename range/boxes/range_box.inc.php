<?php
// /*

// +--------------------------------------------------------------------------

// |	Lock-Tech_Ranges.inc.php

// |   ========================================

// |	Lock-Tech_Ranges module for navigating the shop by range.

// +--------------------------------------------------------------------------

// */

/* Import classes */
$view = "range";

require_once('modules'.CC_DS.'3rdparty'.CC_DS.'page_view'.CC_DS . $view . CC_DS.'classes'.CC_DS . $view . '_box.class.php');



if(!empty($ranges->range_id)) {

$box_content = new XTemplate ('boxes'.CC_DS.'ranges_box.tpl');
	
for($i=0; $i<=$ranges->count-1; $i++) {

$box_content->assign('RANGE_ID',   $ranges->range_id[$i]);
$box_content->assign('RANGE_NAME', $ranges->range_name[$i]);
$box_content->parse('ranges.ranges_loop');

}

}

$box_content->parse('ranges');

$box_content = $box_content->text('ranges');

?>