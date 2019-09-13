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

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$this->setFrameMode(true);

if ($arResult['ITEMS']) {?>
<div class="areas__grid">
    <?foreach ($arResult['ITEMS'] as $k => $arItem) {?>
        <div class="areas__item">
            <div class="areas__image">
                <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arItem['PREVIEW_PICTURE']['ALT']?>">
            </div>
            <div class="areas__info">
                <div class="areas__top">
                    <div class="areas__name"><?=$arItem['NAME']?></div>
                    <div class="areas__text"><?=$arItem['PREVIEW_TEXT']?></div>
                </div>
                <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="btn btn-primary"><?=Loc::getMessage('READ_MORE')?></a>
            </div>
        </div>
    <?}?>
</div>
<?}?>
<?=$arResult['NAV_STRING'] ?: ''?>