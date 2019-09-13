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
<?if($arResult['ITEMS']){?>
    <section class="section-home section-reviews">
        <div class="reviews__wrapper">
            <div class="reviews__list">
                <div class="container">
                    <div class="row justified-content-between">
                        <div class="col-lg-3 section-title">
                            <h2><?=$arParams['SECTION_TITLE'] ? $arParams['SECTION_TITLE'] : GetMessage('REVIEWS_SECTION_TITLE_DEFAULT')?></h2>
                        </div>
                        <div class="col-lg-7 offset-lg-2 reviews-content">
                            <div class="reviews-nav__list">
                                <?foreach ($arResult['ITEMS'] as $key => $arReview){?>
                                    <div class="review-nav__item">
                                        <div class="review-nav__image" style="background-image: url(<?=$arReview['PREVIEW_PICTURE']['SRC']?>)"></div>
                                    </div>
                                <?}?>
                            </div>
                            <div class="reviews-main__list" data-slides-to-show="2">
                                <?foreach ($arResult['ITEMS'] as $key => $arReview){?>
                                    <div class="review-main__item">
                                        <div class="review-main__desc"><?=$arReview['PREVIEW_TEXT']?></div>
                                        <div class="review-client">
                                            <div class="row justify-content-between">
                                                <div class="col-sm-auto">
                                                    <div class=" review-client__name"><?=$arReview['NAME']?></div>
                                                    <?if($arReview['PROPERTIES']['REVIEW_CLIENT_ADD_OPTION']){?>
                                                        <div class="review-client__optional"><?=$arReview['PROPERTIES']['REVIEW_CLIENT_ADD_OPTION']['VALUE']?></div>
                                                    <?}?>
                                                </div>
                                                <div class="col-sm-auto">
                                                    <a href="/reviews/" class="btn btn-primary"><?=$arParams['SECTION_LINK'] ? $arParams['SECTION_LINK'] : GetMessage('REVIEWS_SECTION_LINK_DEFAULT')?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?}?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?}?>
