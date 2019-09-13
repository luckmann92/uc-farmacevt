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
?>

<div class="area">
    <?if ($arResult['DETAIL_PICTURE']) {?>
        <div class="area__image" style="background-image: url(<?=$arResult['DETAIL_PICTURE']['SRC']?>)"></div>
    <?}?>
    <?if ($arResult['DETAIL_TEXT']) {?>
        <div class="area__text">
            <?=$arResult['DETAIL_TEXT']?>
        </div>
    <?}?>
</div>
