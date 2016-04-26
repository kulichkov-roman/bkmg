<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");

?>
<div class="catalog container clearfix">
	Страница, к которой Вы обратились, не существует. Возможно, был неправильно набран адрес страницы или Ссылка, по которой Вы перешли на сайт, уже не существует!
</div>
<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>