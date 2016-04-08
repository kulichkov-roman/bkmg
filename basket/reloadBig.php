<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); ?>


<?
$APPLICATION->IncludeComponent("madcolor:shop.basket", "big-basket", array(
	"ELEMENT_ID" => ""
	),
	false
);