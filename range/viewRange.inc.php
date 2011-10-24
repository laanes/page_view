
<?php

$view = "range";

if($_GET['_a'] == 'view' . ucfirst($view) && strpos($_SERVER['REQUEST_URI'], "added=1")) {
	
header('Location: ' . $_SERVER['HTTP_REFERER']);

}

if ( isset( $_GET[ $view . 'Id' ] ) ) {

require_once('modules'.CC_DS.'3rdparty' . CC_DS . "page_view" . CC_DS . $view .CC_DS.'classes'.CC_DS . $view . '_controller.php');

Page_Model::$table = $view . "_idx";

$page  = Page_Model::$page  = isset($_GET['page']) ? (int)sanitizeVar($_GET['page']) : 0;
$limit = Page_Model::$limit = /*$config['productPages']*/ 6 ;

$controller = ucfirst($view) . "_Controller";

$obj = $view . "_products";

$$obj = new $controller( $view );

$template = new XTemplate ('content'.CC_DS.'view' . ucfirst($view). '.tpl');
$template_main_block = $block = "product_" . $view;

$template->assign('HOME_HREF', $glob['storeURL']);

$id 	= $view . "_id";
$name 	= $view . "_name";
$desc   = $view . "_description";
$title  = $view . "_title";

$template->assign(strtoupper( $id   ), $$obj->$id  );
$template->assign(strtoupper( $name ), $$obj->$name );
$template->assign(strtoupper( $desc ), $$obj->$desc );

/* Range title */
if($$obj->$view . "_title") {

$template->assign(strtoupper($title), $$obj->$title);

}

else {
	
$template->assign(strtoupper($title), $$obj->$name . " products");

}

$total_products = $$obj->productCount;

if($total_products) {

$template->assign('TOTAL_PRODUCTS', "<span class=\"page_total_products\">" . $total_products . " products</span>");

$pagination = paginate($total_products, $limit, $page, 'page', 'txtLink', 4);
	
if(strlen($pagination) > 6) {
$template->assign("PAGINATION", "<div class=\"pagination\">".$pagination."</div>");
}


$template->assign("CURRENT_URL", $_SERVER['REQUEST_URI']);

	for($i=0; $i<=$limit-1; $i++) {

		if($$obj->products[$i]['productId']) {

			$image_path = $$obj->image_paths[$i];

			$productId  = $$obj->products[$i]['productId'];

			$template->assign('NAME', $$obj->products[$i]['name']);

			$template->assign('PRICE', $$obj->products[$i]['price']);

			$template->assign('STOCK', $$obj->stock_levels[$i]);

			$template->assign('ID', $productId);

			$template->assign('HREF', $$obj->product_links[$i]);

			$template->assign('IMAGE', $image_path);

			$template->parse( $block. '.products_true.product_loop');

		}

	 }

$template->parse( $block. '.products_true' );

}

else {
	
$template->assign( 'NO_PRODUCTS_MSG', "There are currently no " . $$obj->$name . " products. Browse by category instead: " );

require_once'modules'.CC_DS.'3rdparty'.CC_DS.'Homepage_Categories'.CC_DS.'boxes'.CC_DS.'Homepage_Categories.inc.php';

if( $categories->data ) {

$template->assign( 'HOMEPAGE_CATEGORIES', $box_content );

}

$template->parse( $block. '.products_false' );

}

$template->parse( $block );

$page_content = $template->text( $block );

}

?>