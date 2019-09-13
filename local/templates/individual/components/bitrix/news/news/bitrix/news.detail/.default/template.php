<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$arResult['DATE_NEWS'] = explode(' ', $arResult['DISPLAY_ACTIVE_FROM']);
?>
<div class="news__detail">
    <div class="news__detail-description">
        <?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]){?>
            <div class="news__item-date">
                <span class="news__item-day"><?=$arResult['DATE_NEWS'][0]?></span>
                <span class="news__item-mounth"><?=$arResult['DATE_NEWS'][1]?> <?=$arResult['DATE_NEWS'][2]?></span>
            </div>
        <?}?>

        <?if(strlen($arResult["PREVIEW_TEXT"])>0){?>
            <?if($arResult["PREVIEW_TEXT"]){?>
                <div class="news__detail-anons"><?=$arResult["PREVIEW_TEXT"];?></div>
            <?}?>
	    <?}elseif(strlen($arResult["DETAIL_TEXT"])>0){?>
            <div class="news__detail-detail"><?=$arResult["DETAIL_TEXT"];?></div>
        <?}?>
    </div>
    <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])){?>
        <div class="news__detail-image">
            <?if($arResult["DETAIL_PICTURE"]["SRC"] != $arResult["DETAIL_PICTURE"]["RESIZE_SRC"]){?>
            <a href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" class="hrefpop">
                <?}?>
                <img src="<?=$arResult["DETAIL_PICTURE"]["RESIZE_SRC"]?>"
                     alt="<?=$arResult["DETAIL_PICTURE"]["ALT"] ? $arResult["DETAIL_PICTURE"]["ALT"] : $arResult['NAME']?>"
                     title="<?=$arResult["DETAIL_PICTURE"]["TITLE"] ? $arResult["DETAIL_PICTURE"]["TITLE"] : $arResult['NAME']?>" />
                <?if($arResult["DETAIL_PICTURE"]["SRC"] != $arResult["DETAIL_PICTURE"]["RESIZE_SRC"]){?>
            </a>
        <?}?>
        </div>
    <?}?>
</div>
<?if(strlen($arResult["PREVIEW_TEXT"])>0 && strlen($arResult["DETAIL_TEXT"])>0){?>
    <BR>
    <div class="news__detail-detail"><?=$arResult["DETAIL_TEXT"];?></div>
<?}?>