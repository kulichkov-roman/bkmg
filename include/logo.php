<?
/**
 * @todo вынести в functions.php
 * @return bool
 */
function inMainPage()
{
    global $APPLICATION;
    $curDir = $APPLICATION -> GetCurPage();

    if($curDir == '/')
    {
        return true;
    }
    else
    {
        return false;
    }
    return false;
}
?>
<?if(inMainPage()){
    ?>
    <span>
        <img src="<?=SITE_TEMPLATE_PATH?>/images/logo.png" />
    </span>
    <?
} else {?>
    <a href="/">
        <img src="<?=SITE_TEMPLATE_PATH?>/images/logo.png" />
    </a>
<?}?>