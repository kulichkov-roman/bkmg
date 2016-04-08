<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

<nav>
	<ul>

<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?> 



<? if( $arItem["TEXT"] != "Наши работы" ): ?>
<li><a name="">~</a></li>
	<?if($arItem["SELECTED"]):?>
		<li><a href="<?=$arItem["LINK"]?>" class="selected"><?=$arItem["TEXT"]?></a></li>
	<?else:?>
		<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
	<?endif?>
<? endif;?>	

<?endforeach?>
		<li><a name="">~</a></li>
		
	</ul>
</nav>



<?endif?>