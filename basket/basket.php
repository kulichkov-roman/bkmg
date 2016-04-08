<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>
<div class="bask-title catalog-menu"> 
  <h1>Корзина</h1>
</div>

<div class="container">

<div id="bigBasket">
<?
$APPLICATION->IncludeComponent("madcolor:shop.basket", "big-basket", array(
	"ELEMENT_ID" => ""
	),
	false
);
?>
</div>

</div>	  
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>