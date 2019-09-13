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

<section class="section-stocks">
    <?if($arResult['ITEMS']){?>
        <div class="slider-stocks"
             data-dots="<?=count($arResult['ITEMS']) > 0 ? 'true':'false'?>"
             data-arrows="<?=$arParams['SLIDER_ARROWS'] == 'N' ? 'false' : 'true'?>"
             data-speed="<?=$arParams['SLIDER_TIME'] > 0 ? $arParams['SLIDER_TIME'] : '0'?>"
             data-autoplay="<?=$arParams['SLIDER_AUTOPLAY'] == 'Y' ? 'true' : 'false'?>">
            <?foreach ($arResult['ITEMS'] as $k => $arSlide){
                $this->AddEditAction($arSlide['ID'], $arSlide['EDIT_LINK'], CIBlock::GetArrayByID($arSlide["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arSlide['ID'], $arSlide['DELETE_LINK'], CIBlock::GetArrayByID($arSlide["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="stock-item" style="background-image: url(<?=$arSlide['PREVIEW_PICTURE']['SRC']?>);" id="<?=$this->GetEditAreaId($arSlide['ID']);?>">
                    <div class="container">
                        <div class="row align-items-start justify-content-center">
                            <div class="col justify-content-center stock-item__caption">

                                <?if($arSlide['PROPERTIES']['STOCK_FIRST_TEXT']['VALUE']){?>
                                    <h2 class="stock-title"><?=$arSlide['PROPERTIES']['STOCK_FIRST_TEXT']['VALUE']?>
                                        <?if($arSlide['PROPERTIES']['STOCK_PERCENT']['VALUE']){?>
                                            <span class="stock-percent"><?=$arSlide['PROPERTIES']['STOCK_PERCENT']['VALUE']?>%</span>
                                        <?}?>
                                    </h2>
                                <?}?>
                                <?if($arSlide['PROPERTIES']['STOCK_TWO_TEXT']['VALUE']){?>
                                    <h3 class="stock-subtitle"><?=$arSlide['PROPERTIES']['STOCK_TWO_TEXT']['VALUE']?></h3>
                                <?}?>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="w-100"></div>
                            <div class="col-auto stock-item__link section-slider">
                                <a href="<?=$arSlide['DETAIL_PAGE_URL']?>" class="btn btn-primary"><?=GetMessage('LINK_TO_CATALOG')?></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?}?>
        </div>
        <?if(count($arResult['ITEMS']) > 1){?>
            <div class="slider-dots">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <div class="slider-stock-dots"></div>
                        </div>
                    </div>
                </div>
            </div>
        <?}?>
    <?}?>
</section>