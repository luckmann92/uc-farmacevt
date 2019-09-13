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
                    <div class="row">
                        <div class="section-title">
                            <h2><?=$arParams['SECTION_TITLE'] ? $arParams['SECTION_TITLE'] : GetMessage('REVIEWS_SECTION_TITLE_DEFAULT')?></h2>
                        </div>
                        <div class="reviews-content">
                            <div class="reviews-nav__list">
                                <?foreach ($arResult['ITEMS'] as $key => $arReview){?>
                                    <div class="review-nav__item">
                                        <div class="review-nav__image" style="background-image: url(<?=$arReview['PREVIEW_PICTURE']['SRC']?>)"></div>
                                        <div class="review-nav__info">
                                            <div class="review-nav__name"><?=$arReview['NAME']?></div>
                                            <?if($arReview['PROPERTIES']['REVIEW_CLIENT_ADD_OPTION']['VALUE']){?>
                                                <div class="review-nav__date"><?=$arReview['PROPERTIES']['REVIEW_CLIENT_ADD_OPTION']['VALUE']?></div>
                                            <?}?>
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

    <script>
        $('.reviews-nav__list').slick({
            slidesToShow: 3,
            arrows: true,
            slidesToScroll: 1,
            dots: false,
            prevArrow: '<button type="button" class="review__prev review__arrow slick-prev"></button>',
            nextArrow: '<button type="button" class="review__next review__arrow slick-next"></button>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    </script>
<?}?>
