<?
session_start();

class CMadBasket 
{
	function CMadBasket(){
	
	}
	
	function GetCountByID( $ID )
	{
		$ID = intval($ID);
		if ($ID == 0) {
			return false;
		}
		
		$result = array_search($ID, $_SESSION['ELEMENT_ID']);
		return $result > 0 ? $result : false;
	}
	
	function AddProduct( $ELEMENT_ID, $COUNT=1 )
	{
		$ELEMENT_ID = intval($ELEMENT_ID);
		if ($ELEMENT_ID == 0) {
			return;
		}
		
		$COUNT = floatval($COUNT);
		if ($COUNT == 0) {
			return false;
		}
		
		$_SESSION['BASKET'][$ELEMENT_ID]=$_SESSION['BASKET'][$ELEMENT_ID]+$COUNT; 
	
		return true;
	}
	
	function delProduct( $ELEMENT_ID )
	{
		unset($_SESSION['BASKET'][$ELEMENT_ID]);
	}
	
	function ClearBasket()
	{	
		unset($_SESSION['BASKET']);
	}	
}

?>