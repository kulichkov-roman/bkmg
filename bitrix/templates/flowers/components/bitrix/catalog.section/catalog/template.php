<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>



  <div class="catalog-sort">
            <ul id="sort">
                <li class="first">Сортировать по:</li>
                <li data-id="upPrice"><a class="activ">возрастанию цены</a></li>
                <li data-id="downPrice"><a>убыванию цены</a></li>
                <li data-id="name"><a>названию</a></li>
                <li data-id="new"><a>лучшие предложения</a></li>
            </ul>    
        </div>

 
        
 <div class="catalog-item-conteiner clearfix">
            <ul id="applications" class="image-grid">
            
            
    <? foreach($arResult["ITEMS"] as $coll=>$arElement):?>
	<? 
	$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
	?>
		<?
		if( ( $arElement["DISPLAY_PROPERTIES"]["STAT"]["VALUE_XML_ID"]  == "new" )||( $arElement["DISPLAY_PROPERTIES"]["STAT"]["VALUE_XML_ID"]  == "sale" ) )
		   $type = "new";
		else $type = "all";
		?>

    
                <li id="<?=$this->GetEditAreaId($arElement['ID']);?>" data-id="id-<?=$coll+1?>" data-type="<?=$type?>">
                    <div class="catalog-item">
                        <div class="catalog-item_inner">
	                        <? if ( $arElement["DISPLAY_PROPERTIES"]["STAT"]["VALUE_XML_ID"]  == "new" ):?>
                               <div class="stat"><img src="<?=SITE_TEMPLATE_PATH?>/images/new.png" /></div>
                            <? endif;?>
                            
                            <? if ( $arElement["DISPLAY_PROPERTIES"]["STAT"]["VALUE_XML_ID"]  == "sale" ):?>
                               <div class="stat"><img src="<?=SITE_TEMPLATE_PATH?>/images/sale.png" /></div>
                            <? endif;?>
                            
                            <div class="catalog-img"> <img src="<?=$arElement["PREVIEW_PICTURE"]["SRC"];?>"  /></div>

                            <div class="item-bot-bg"></div>
                            <div class="item-price">
                                <span class="name"><?=$arElement["NAME"];?></span>
                                <div class="price"><?=$arElement["DISPLAY_PROPERTIES"]["PRICE"]["DISPLAY_VALUE"];?> р.</div> 
																<div class="info">
																	<div>
																			<? 
																					$APPLICATION->IncludeComponent("madcolor:shop.button", ".default", array(
																				"ELEMENT_ID" => $arElement['ID']
																				),
																				false
																				 );
																			 ?>
																	</div>	 
                                    <span>Артикул:</span> <?=$arElement["ID"]?> <br />
																	  <?=$arElement["PREVIEW_TEXT"];?>
				                         </div>
                            </div>
                        </div>
                    </div>
                </li>
                
    <? endforeach;?>           
            </ul>

            <div class="clearfix"></div>
       </div>






<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<p><?=$arResult["NAV_STRING"]?></p>
<?endif?>
</div>
