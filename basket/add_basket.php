<?
/* $_SESSION['BASKET']['ELEMENT_ID'] = $_POST['element_id_add']; */


require($_SERVER["DOCUMENT_ROOT"]."/basket/CMadBasket.php");


$wz = new CMadBasket; 
$wz->AddProduct( $_POST["element_id_add"] );
	
//$wz->ClearBasket();

?>