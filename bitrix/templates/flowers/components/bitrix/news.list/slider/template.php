<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="fixed-slide">
            <div id="slider">
                <ul>
                <? foreach($arResult["ITEMS"] as $arItem):?>
				<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
    
                    <li id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                        <div class="slide">
                            <h2><?=$arItem["NAME"]?></h2>
                            <p><?=$arItem["PREVIEW_TEXT"];?></p>
                            <a class="more" href="/action.php">Подробнее</a>
                        </div>
                    </li>
                    
                    <? endforeach;?>
                </ul>
            </div>
            <a href="#" class="slider-arrow leftBtn"></a>
            <a href="#" class="slider-arrow rightBtn"></a>
        </div>
        
       