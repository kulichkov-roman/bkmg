<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Доставка цветов по магнитогорску");
?><?$APPLICATION->IncludeComponent(
	"bitrix:map.google.view", 
	"template", 
	array(
		"INIT_MAP_TYPE" => "SATELLITE",
		"MAP_DATA" => "a:4:{s:10:\"google_lat\";d:53.379097472341;s:10:\"google_lon\";d:58.984784391805;s:12:\"google_scale\";i:15;s:10:\"PLACEMARKS\";a:2:{i:0;a:3:{s:4:\"TEXT\";s:5:\"Цветы\";s:3:\"LON\";d:58.989914059639;s:3:\"LAT\";d:53.378728618722;}i:1;a:3:{s:4:\"TEXT\";s:16:\"павильон \"Цветы\"\";s:3:\"LON\";d:58.96212810579743;s:3:\"LAT\";d:53.40849493646518;}}}",
		"MAP_WIDTH" => "100%",
		"MAP_HEIGHT" => "500",
		"CONTROLS" => array(
			0 => "SMALL_ZOOM_CONTROL",
			1 => "TYPECONTROL",
			2 => "SCALELINE",
		),
		"OPTIONS" => array(
			0 => "ENABLE_DBLCLICK_ZOOM",
			1 => "ENABLE_DRAGGING",
			2 => "ENABLE_KEYBOARD",
		),
		"MAP_ID" => "flower-map"
	),
	false
);?>
<div class="contact container">
	<div class="cont">
		<h2>Контактная информация</h2>
		 <?
		$APPLICATION->IncludeFile(
				SITE_DIR."include/contact.php",
				Array(),
				Array("MODE"=>"html"));
	?>
		<h2>Оплата на карту Сбербанка</h2>
		 <?
		$APPLICATION->IncludeFile(
				SITE_DIR."include/details.php",
				Array(),
				Array("MODE"=>"html"));
	?>
	</div>
	<div class="feedback">
		<h2>Обратная связь</h2>
		 <?$APPLICATION->IncludeComponent(
	"bitrix:main.feedback",
	"template",
	Array(
		"USE_CAPTCHA" => "Y",
		"OK_TEXT" => "Спасибо, ваше сообщение принято.",
		"EMAIL_TO" => "elenakormich@mail.ru",
		"REQUIRED_FIELDS" => array(),
		"EVENT_MESSAGE_ID" => array()
	)
);?>
	</div>
</div><? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>