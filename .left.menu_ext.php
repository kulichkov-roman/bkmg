<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

$aMenuLinksExt1 =  $APPLICATION->IncludeComponent(
	"bitrix:menu.sections",
	"",
	Array(
		"IS_SEF" => "N",
		"ID" => $_REQUEST["ID"],
		"IBLOCK_TYPE" => "products",
		"IBLOCK_ID" => "2",
		"SECTION_URL" => "",
		"DEPTH_LEVEL" => "1",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000"
	)
);


$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt1);
?>