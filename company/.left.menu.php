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
        "ADD_LEVEL" => "0", // ���������� �������� DEPTH_LEVEL (��������, ���� ����� �������� �������� � ���������)
        "SHOW_EMPTY_SECTIONS" => "Y", // ���������� ������ �������
        "SHOW_ROOT_ELEMENTS" => "Y", // ���������� �������� ��������� �������
    )
);

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt1);
?>