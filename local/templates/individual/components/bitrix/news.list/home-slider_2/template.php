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

if($arResult['ITEMS']){?>
    <section class="section-slider">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="slider-grid">
                        <div class="slider-pics">
                            <?foreach ($arResult['ITEMS'] as $k => $arSlide){?>
                                <div href="#" class="slider-pic c-shadow"">
                                    <div class="slider-pic__image" style="background-image:url(<?=$arSlide['PREVIEW_PICTURE']['SRC']?>)"></div>
                                    <h3 class="slider-pic__title"><?=$arSlide['NAME']?></h3>
                                </div>
                            <?}?>
                        </div>
                        <div class="slider-box">
                                <div class="slider-home"
                                     data-dots="<?=count($arResult['ITEMS']) > 0 ? 'true':'false'?>"
                                     data-arrows="<?=$arParams['SLIDER_ARROWS'] == 'N' ? 'false' : 'true'?>"
                                     data-speed="<?=$arParams['SLIDER_TIME'] > 0 ? $arParams['SLIDER_TIME'] : '0'?>"
                                     data-autoplay="<?=$arParams['SLIDER_AUTOPLAY'] == 'Y' ? 'true' : 'false'?>"
                                     data-autoheight="<?=$arParams['SLIDER_AUTOHEIGHT'] == 'Y' ? 'true' : 'false'?>"
                                >
                                    <?foreach ($arResult['ITEMS'] as $k => $arSlide){
                                        $this->AddEditAction($arSlide['ID'], $arSlide['EDIT_LINK'], CIBlock::GetArrayByID($arSlide["IBLOCK_ID"], "ELEMENT_EDIT"));
                                        $this->AddDeleteAction($arSlide['ID'], $arSlide['DELETE_LINK'], CIBlock::GetArrayByID($arSlide["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                                        ?>
                                        <div class="slide-item slide-item__1<?=$arSlide['PROPERTIES']['SLIDE_SHADOW']['VALUE_XML_ID'] == 'Y' ? ' c-shadow' : ''?>"
                                             style="background-image: url(<?=$arSlide['PREVIEW_PICTURE']['SRC']?>);"
                                             id="<?=$this->GetEditAreaId($arSlide['ID']);?>">
                                            <div class="slide-item__caption slide-item__caption__1 ">
                                                <div class="section-title c-<?=$arSlide['PROPERTIES']['SLIDE_TITLE_THEME']['VALUE_XML_ID']?>">
                                                    <h2><?=$arSlide['NAME']?></h2>
                                                </div>
                                                <?if($arSlide['PREVIEW_TEXT']){?>
                                                    <p class="slide-item__anons c-<?=$arSlide['PROPERTIES']['SLIDE_TITLE_THEME']['VALUE_XML_ID']?>"><?=$arSlide['PREVIEW_TEXT']?></p>
                                                <?}?>
                                                <?if($arSlide['PROPERTIES']['LINK_SECTION']['VALUE']){?>
                                                    <a href="<?=$arSlide['PROPERTIES']['LINK_SECTION']['VALUE']?>" target="_blank" class="btn btn-primary b-<?=$arSlide['PROPERTIES']['SLIDE_TITLE_THEME']['VALUE_XML_ID']?>">
                                                        <?=$arSlide['PROPERTIES']['LINK_BUTTON_NAME']['VALUE'] ? $arSlide['PROPERTIES']['LINK_BUTTON_NAME']['VALUE'] : GetMessage('LINK_MORE')?>
                                                    </a>
                                                <?}?>
                                            </div>
                                        </div>
                                    <?}?>
                                </div>
                                <?if(count($arResult['ITEMS']) > 1){?>
                                    <div class="slider-dots slider-dots__1">
                                        <div class="container">
                                            <div class="row justify-content-center">
                                                <div class="col-auto">
                                                    <div class="slider-home-dots"></div>
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
    </section>

    <script>
        $('.slider-pics').slick({
            autoplay: false,
            arrows: false,
            slidesToShow: 3,
            vertical: true,
            verticalSwiping: true,
            slidesToScroll: 1,
            focusOnSelect: true,
            asNavFor: '.slider-home',
            dots: false,
            prevArrow: '<button type="button" class="product-detail__prev slick-prev"></button>',
            nextArrow: '<button type="button" class="product-detail__next slick-next"></button>',
            responsive:[
                {
                    breakpoint: 992,
                    settings: {
                        vertical: false
                    }
                }
            ]
        });
        $('.slider-home').slick({
            dots: ($('.slider-home').attr('data-dots') == 'true') ? true : false,
            arrows: ($('.slider-home').attr('data-arrows') == 'true') ? true : false,
            autoplay: ($('.slider-home').attr('data-autoplay') == 'true') ? true : false,
            autoplaySpeed:$('.slider-home').attr('data-speed'),
            appendDots: $('.slider-home-dots'),
            prevArrow: '<button type="button" class="slide-prev slick-prev"></button>',
            nextArrow: '<button type="button" class="slide-next slick-next"></button>',
            adaptiveHeight: true,
            asNavFor: '.slider-pics',
            responsive:[
                {
                    breakpoint: 750,
                    settings: {
                        dots: false
                    }
                }
            ]
        });
    </script>

<?}?>
