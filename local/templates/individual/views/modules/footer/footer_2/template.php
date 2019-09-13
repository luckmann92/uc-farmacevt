<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
\Bitrix\Main\Page\Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/views/modules/footer/' . $arParams['SETTING']['FOOTER'] . '/style.css');?>
<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row justify-content-between align-items-start">
                <div class="footer-nav col-12">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        ".default",
                        array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "Y",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "footer",
                            "USE_EXT" => "N",
                            "COMPONENT_TEMPLATE" => ".default",
                            "COMPOSITE_FRAME_MODE" => "A",
                            "COMPOSITE_FRAME_TYPE" => "AUTO"
                        ),
                        false
                    );?>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row justify-content-sm-between align-items-center">
                <div class="col-auto copyright">
                    <?$APPLICATION->IncludeFile("/include/".SITE_ID."/copyright.php", [], ["SHOW_BORDER" => true, "MODE" => "text"]);?>
                </div>
                <div class="col-auto developer">
                    <a rel="nofollow" href="http://website96.ru/" target="_blank" title="Разработано Website96"><?=GetContentSvgIcon('website96')?></a>
                </div>
            </div>
        </div>
    </div>
</footer>