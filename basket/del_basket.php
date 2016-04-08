<?
/* $_SESSION['BASKET']['ELEMENT_ID'] = $_POST['element_id_add']; */


require($_SERVER["DOCUMENT_ROOT"]."/basket/CMadBasket.php");


$wz = new CMadBasket; 
$wz->delProduct( $_POST["idElement"] );
	


?>