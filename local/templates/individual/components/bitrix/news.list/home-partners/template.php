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
<section class="section-partners">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2><?=$arParams['BLOCK_TITLE'] ? $arParams['BLOCK_TITLE'] : GetMessage('BLOCK_TITLE')?></h2>
                </div>
                <div class="partners__box">
                    <?if ($arResult['ITEMS']) {?>
                        <div class="partners__slider">
                            <?foreach ($arResult['ITEMS'] as $k => $arItem) {?>
                                <div class="partners__item">
                                    <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
                                         alt="<?=$arItem['PREVIEW_PICTURE']['ALT']?>">
                                </div>
                            <?}?>
                        </div>
                    <?}?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
        $('.partners__slider').slick({
            loop: true,
            infinite: true,
            rows: 1,
            slidesToShow: 1,
            variableWidth: true,
            prevArrow: '<div class="partners-prev"></div>',
            nextArrow: '<div class="partners-next"></div>',
            adaptiveHeight: true,
            responsive:[
                {
                    breakpoint: 992,
                    settings: {
                        arrows: false,
                        rows: 2,
                        slidesPerRow: 2,
                        adaptiveHeight: false,
                        variableWidth: false
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        rows: 1,
                        slidesPerRow: 1,
                        slidesToShow: 4,
                        variableWidth: false,
                        vertical: true
                    }
                }
            ]
        });

        $('.partners__more').click(function(){
            $('.partners__slider').slick("slickNext");
        });
    });
</script>
