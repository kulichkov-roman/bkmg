<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");
?>
<div class="catalog container clearfix">
	��������, � ������� �� ����������, �� ����������. ��������, ��� ����������� ������ ����� �������� ��� ������, �� ������� �� ������� �� ����, ��� �� ����������!
	<?
	$APPLICATION->IncludeComponent(
		"bitrix:main.map",
		"map",
		Array(
			"LEVEL" => "3",
			"COL_NUM" => "2",
			"SHOW_DESCRIPTION" => "Y",
			"SET_TITLE" => "Y",
			"CACHE_TIME" => "3600",
		),
		false
	);
	?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>