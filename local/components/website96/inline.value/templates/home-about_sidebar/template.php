<?php
/**
 * @author Danil Syromolotov <ds@itex.ru>
 */
/**
 * @var array $arParams
 */

?>
<section class="section-about section-about__2 section-about__<?=mb_strtolower($arParams['SETTING']['TEMPLATE_TYPE']);?>">
    <div>
        <div class="about-item">
            <div class="row">
                <?if($arParams['BLOCK_IMG']){?>
                    <div class="col-12 about-item__img" style="background-image: url(<?=$arParams['BLOCK_IMG']?>)"></div>
                <?}?>
                <div class="<?=$arParams['BLOCK_IMG'] ? 'col-12' : ''?> about-item_content">
                    <div class="section-title">
                        <h2><?=$arParams['BLOCK_TITLE'] ? $arParams['BLOCK_TITLE'] : GetMessage('CATEGORIES_SECTION_TITLE_DEFAULT')?></h2>
                    </div>
                    <div class="about-item__text"><?if($arParams['BLOCK_DESCRIPTION'] == "Y"){
                            $APPLICATION->IncludeFile(
                                "include/".SITE_ID."/home-about.php",
                                array(), array(
                                    "SHOW_BORDER" => true,
                                    "MODE" => "html"
                                )
                            );
                        }?></div>
                    <?if($arParams['BLOCK_URL']){?>
                        <a href="<?=$arParams['BLOCK_URL']?>" class="btn btn-link"><?=GetMessage('ABOUT_PAGE_LINK_DEFAULT')?></a>
                    <?}?>
                </div>
            </div>
        </div>
    </div>
</section>
