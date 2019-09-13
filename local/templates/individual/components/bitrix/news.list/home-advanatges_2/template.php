<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
\Bitrix\Main\Page\Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/views/modules/header/' . $arParams['SETTING']['HEADER'] . '/style.css');
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

<section class="section-advantages section-advantages__default">
    <?if($arResult['ITEMS']){?>
    <div class="advantages__wrapper">
        <div class="advantage__list">
            <div class="container">
                <div class="row">
                    <?foreach ($arResult['ITEMS'] as $k => $arItem){?>
                        <?
                        // dump($arItem);
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                        ?>
                        <div class="col-lg-3 col-sm-6 col-12 advantage__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                            <div class="row justify-content-start align-items-center advantages__box">
                                <div class="advantage__icon align-items-center">
                                    <img src="<?= $arItem['DISPLAY_PROPERTIES']['ICON_FILE']['FILE_VALUE']['SRC'] ?>" alt="<?= $arItem['NAME'] ?>">
                                </div>
                                <div class="advantage__name">
                                    <span><?=$arItem['NAME']?></span>
                                </div>
                            </div>
                        </div>
                    <?}?>
                </div>
            </div>
        </div>
    </div>
    <?}?>
</section>