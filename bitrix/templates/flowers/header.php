<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
	<meta name="cmsmagazine" content="38d2170328e981e4d60ee986faaa509f" />

	<?$APPLICATION->ShowHead();?>

	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/style.css" />
    <script src="<?=SITE_TEMPLATE_PATH?>/script/jquery-1.11.1.min.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/script/jquery.quicksand.js"></script>

    <script src="<?=SITE_TEMPLATE_PATH?>/script/madSlider.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/script/scriptFlower.js"></script>
    <title><?$APPLICATION->ShowTitle()?></title>
	<?
	$APPLICATION->IncludeComponent(
		"bitrix:main.include",
		"",
		Array(
			"AREA_FILE_SHOW" => "file",
			"PATH" => "/include/ga.php",
			"EDIT_TEMPLATE" => ""
		),
		false
	);
	?>
</head>

<body>
	<?
	$APPLICATION->IncludeComponent(
		"bitrix:main.include",
		"",
		Array(
			"AREA_FILE_SHOW" => "file",
			"PATH" => "/include/yandex_metrika.php",
			"EDIT_TEMPLATE" => ""
		),
		false
	);
	?>
	<div id="panel"><? $APPLICATION->ShowPanel();?></div>
	<div class="ord"></div>
	
    <header id="header">
        <div class="container">
            <div class="addres">
                <?
				$APPLICATION->IncludeFile(
				SITE_DIR."include/addres.php",
				Array(),
				Array("MODE"=>"html"));
				?>
            </div>
	        <div class="logo">
	            <?
	            $APPLICATION->IncludeComponent("bitrix:main.include", "",
		            Array(
			            "AREA_FILE_SHOW" => "file",
			            "PATH" => "/include/logo.php",
			            "EDIT_TEMPLATE" => ""
		            ),
		            false,
		            Array('HIDE_ICONS' => 'Y')
	            );
	            ?>
	        </div>
            <div class="phon"><?
				$APPLICATION->IncludeFile(
				SITE_DIR."include/phone.php",
				Array(),
				Array("MODE"=>"html"));
				?>
				
				<div id="basket-cont">
				 <? $APPLICATION->IncludeComponent("madcolor:shop.basket", ".default", array(
					  "ELEMENT_ID" => ""
					),
					false
					);?>
				</div>
					
				</div>
        </div>
    </header>

    <div class="shadow">
        <div class="container=container menu">
           <? $APPLICATION->IncludeComponent("bitrix:menu", "template", array(
	"ROOT_MENU_TYPE" => "top",
	"MENU_CACHE_TYPE" => "N",
	"MENU_CACHE_TIME" => "3600",
	"MENU_CACHE_USE_GROUPS" => "Y",
	"MENU_CACHE_GET_VARS" => array(
	),
	"MAX_LEVEL" => "1",
	"CHILD_MENU_TYPE" => "left",
	"USE_EXT" => "N",
	"DELAY" => "N",
	"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>
        </div>
    </div>   

<? if ($APPLICATION->GetCurPage() == "/"): ?>
<section class="slider_container clearfix">
        <? $APPLICATION->IncludeComponent("bitrix:news.list", "slider", array(
	"IBLOCK_TYPE" => "news",
	"IBLOCK_ID" => "1",
	"NEWS_COUNT" => "20",
	"SORT_BY1" => "ACTIVE_FROM",
	"SORT_ORDER1" => "DESC",
	"SORT_BY2" => "SORT",
	"SORT_ORDER2" => "ASC",
	"FILTER_NAME" => "",
	"FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"CHECK_DATES" => "Y",
	"DETAIL_URL" => "",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "Y",
	"PREVIEW_TRUNCATE_LEN" => "",
	"ACTIVE_DATE_FORMAT" => "d.m.Y",
	"SET_STATUS_404" => "N",
	"SET_TITLE" => "Y",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
	"ADD_SECTIONS_CHAIN" => "Y",
	"HIDE_LINK_WHEN_NO_DETAIL" => "N",
	"PARENT_SECTION" => "5",
	"PARENT_SECTION_CODE" => "",
	"INCLUDE_SUBSECTIONS" => "Y",
	"PAGER_TEMPLATE" => ".default",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "�������",
	"PAGER_SHOW_ALWAYS" => "Y",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "Y",
	"DISPLAY_DATE" => "Y",
	"DISPLAY_NAME" => "Y",
	"DISPLAY_PICTURE" => "Y",
	"DISPLAY_PREVIEW_TEXT" => "Y",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?>
    </section>




    <section class="sign">
        <div class="wrapper-1">
            <div class="sign-1">
                <div class="num_2"></div>
                <p>������������ �������</p>
            </div>

            <div class="sign-2">
                 <div class="num_3"></div>
                <p>����������c� � ��� �����</p>
            </div>
            <div class="sign-3">
                 <div class="num_1"></div>
                <p>��� �� �����</p>
            </div>
        </div>
    </section>

<section class="main-catalog container clearfix">

   <? $APPLICATION->IncludeComponent("bitrix:catalog.section", "main_item", array(
	"IBLOCK_TYPE" => "products",
	"IBLOCK_ID" => "2",
	"SECTION_ID" => $_REQUEST["SECTION_ID"],
	"SECTION_CODE" => "",
	"SECTION_USER_FIELDS" => array(
		0 => "",
		1 => "",
	),
	"ELEMENT_SORT_FIELD" => "PROPERTY_STAT",
	"ELEMENT_SORT_ORDER" => "desc",
	"ELEMENT_SORT_FIELD2" => "id",
	"ELEMENT_SORT_ORDER2" => "desc",
	"FILTER_NAME" => "arrFilter",
	"INCLUDE_SUBSECTIONS" => "Y",
	"SHOW_ALL_WO_SECTION" => "Y",
	"PAGE_ELEMENT_COUNT" => "4",
	"LINE_ELEMENT_COUNT" => "4",
	"PROPERTY_CODE" => array(
		0 => "STAT",
		1 => "PRICE",
		2 => "NOVELTY",
		3 => "",
	),
	"OFFERS_LIMIT" => "5",
	"SECTION_URL" => "",
	"DETAIL_URL" => "",
	"SECTION_ID_VARIABLE" => "SECTION_ID",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_GROUPS" => "Y",
	"SET_META_KEYWORDS" => "Y",
	"META_KEYWORDS" => "-",
	"SET_META_DESCRIPTION" => "Y",
	"META_DESCRIPTION" => "-",
	"BROWSER_TITLE" => "-",
	"ADD_SECTIONS_CHAIN" => "N",
	"DISPLAY_COMPARE" => "N",
	"SET_TITLE" => "Y",
	"SET_STATUS_404" => "N",
	"CACHE_FILTER" => "N",
	"PRICE_CODE" => array(
	),
	"USE_PRICE_COUNT" => "N",
	"SHOW_PRICE_COUNT" => "1",
	"PRICE_VAT_INCLUDE" => "Y",
	"BASKET_URL" => "/personal/basket.php",
	"ACTION_VARIABLE" => "action",
	"PRODUCT_ID_VARIABLE" => "id",
	"USE_PRODUCT_QUANTITY" => "N",
	"ADD_PROPERTIES_TO_BASKET" => "Y",
	"PRODUCT_PROPS_VARIABLE" => "prop",
	"PARTIAL_PRODUCT_PROPERTIES" => "N",
	"PRODUCT_PROPERTIES" => array(
	),
	"PAGER_TEMPLATE" => ".default",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "������",
	"PAGER_SHOW_ALWAYS" => "Y",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "Y",
	"AJAX_OPTION_ADDITIONAL" => "",
	"PRODUCT_QUANTITY_VARIABLE" => "quantity"
	),
	false
);?>
</section>
    
    <section class="about-short">
      <div class="container">
    	<div class="icon_adv mrg"><img src="<?=SITE_TEMPLATE_PATH?>/images/icon_1.png" /> ������ ������<br> �����</div>
        <div class="icon_adv mrg"><img src="<?=SITE_TEMPLATE_PATH?>/images/icon_2.png" /> �����c����������<br> ��������</div>
        <div class="icon_adv mrg"><img src="<?=SITE_TEMPLATE_PATH?>/images/icon_3.png" /> ������<br> ����</div>
        <div class="icon_adv mrg"><img src="<?=SITE_TEMPLATE_PATH?>/images/icon_4.png" /> �������� �� ���<br> ��� � ����</div>
        <div class="icon_adv"><img src="<?=SITE_TEMPLATE_PATH?>/images/icon_5.png" /> ������<br> ������</div>    
      </div>  
    </section>



    <section class="about">
        <div class="container">
            <div class="h-block"> <div class="h-left"></div><h2>������� � ���</h2><div class="h-right"></div> </div>
            <div class="clearfix"></div>
             <p>  
            <?
				$APPLICATION->IncludeFile(
				SITE_DIR."include/about.php",
				Array(),
				Array("MODE"=>"html"));
			?>
            </p>
        </div>
    </section>

    <section class="how-buy">
        <div class="about-bot-bg"></div>
        <div class="wrapper-1">
            <div class="h-block"> <div class="h-left"></div><h2>��� ������ �����?</h2><div class="h-right"></div> </div>

            <div class="clearfix"></div>
           
            <div class="buy mrg">
                <img src="<?=SITE_TEMPLATE_PATH?>/images/buy1.png" /> <br />
                <div class="how-buy-num">1.</div>
                <p><?
				$APPLICATION->IncludeFile(
				SITE_DIR."include/how_buy_1.php",
				Array(), 
				Array("MODE"=>"html"));
				?></p>
            </div>
            <div class="buy mrg">
                <img src="<?=SITE_TEMPLATE_PATH?>/images/buy2.png" /> <br />
                <div class="how-buy-num">2.</div>
                <p><?
				$APPLICATION->IncludeFile(
				SITE_DIR."include/how_buy_2.php",
				Array(),
				Array("MODE"=>"html"));
				?></p>
            </div>
            <div class="buy">
                <img src="<?=SITE_TEMPLATE_PATH?>/images/buy3.png" /><br />
                <div class="how-buy-num">3.</div>
                <p><?
				$APPLICATION->IncludeFile(
				SITE_DIR."include/how_buy_3.php",
				Array(),
				Array("MODE"=>"html"));
				?></p>
            </div>


            <div class="clearfix"></div><br>

         
        </div>
    </section>
		

         <div class="rev-bot-bg"></div>
		 <section class="reviews">

         <div class="wrapper-1">
            <div class="h-block"> <div class="h-left"></div><h2>������</h2><div class="h-right"></div> </div>

            <div class="clearfix"></div>
						<? $APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"reviews", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "reviews",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "4",
		"IBLOCK_TYPE" => "reviews",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "1",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "�������",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	),
	false
);?>

				</div>		
    </section>
	

<? endif;?>








