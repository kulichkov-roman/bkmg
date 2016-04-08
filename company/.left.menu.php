<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

$aMenuLinksExt1 = $APPLICATION->IncludeComponent(
    "grain:menu.sectionswithelements",
    "",
    Array(
        "IBLOCK_TYPE" => "catalog",
        "IBLOCK_ID" => "3",
        "SECTION_URL" => "/country/",
        "DETAIL_URL" => "/country/#CODE#/",    
        "CACHE_TYPE" => "A",    
        "CACHE_TIME" => "3600",
        "ADD_LEVEL" => "0", // Добавочное значение DEPTH_LEVEL (например, если нужно включить инфоблок в структуру)
        "SHOW_EMPTY_SECTIONS" => "Y", // показывать пустые разделы
        "SHOW_ROOT_ELEMENTS" => "Y", // Показывать элементы корневого раздела
    )
);

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt1);
?>