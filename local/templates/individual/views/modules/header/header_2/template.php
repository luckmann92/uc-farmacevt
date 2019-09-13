<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
\Bitrix\Main\Page\Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/views/modules/header/' . $arParams['SETTING']['HEADER'] . '/style.css');
?>

<header class="header">
    <nav class="header__top">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="d-flex align-items-center header__logo header-logo--desc">
                    <a href="<?=SITE_DIR?>">
                        <?$APPLICATION->IncludeFile('/include/'.SITE_ID.'/logo.php',
                            ['SETTING' => $arParams['SETTING']],
                            ['SHOW_BORDER' => false, 'MODE' => 'php']
                        );?>
                    </a>
                </div>
                <div class="header-search">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:search.suggest.input",
                        ".default",
                        array(
                            "DROPDOWN_SIZE" => "10",
                            "INPUT_SIZE" => "20",
                            "NAME" => "q",
                            "VALUE" => "Поиск по сайту",
                            "COMPONENT_TEMPLATE" => ".default",
                            "COMPOSITE_FRAME_MODE" => "Y",
                            "COMPOSITE_FRAME_TYPE" => "STATIC"
                        ),
                        false
                    );?>
                </div>
                <div class="header__block header__address">
                    <div class="header__pic">
                        <?=GetContentSvgIcon('address')?>
                    </div>
                    <div class="header__text">
                        <div>
                            <?$APPLICATION->IncludeFile(
                                "/include/".SITE_ID."/contact/address.php",
                                array(), array(
                                    "SHOW_BORDER" => true,
                                    "MODE" => "text"
                                )
                            );?>
                        </div>
                    </div>
                </div>
                <div class="header__block header__address">
                    <div class="header__pic">
                        <?=GetContentSvgIcon('phone')?>
                    </div>
                    <div class="header__text">
                        <a class="header__number" href="tel:<?$APPLICATION->IncludeFile(
                            "/include/".SITE_ID."/contact/phone.php",
                            array(), array(
                                "SHOW_BORDER" => false,
                                "MODE" => "text"
                            )
                        );?>"><?$APPLICATION->IncludeFile(
                                "/include/".SITE_ID."/contact/phone.php",
                                array(), array(
                                    "SHOW_BORDER" => true,
                                    "MODE" => "text"
                                )
                            );?></a>
                        <?$APPLICATION->IncludeComponent(
                            "website96:forms",
                            ".default",
                            array(
                                "CACHE_TIME" => "3600",
                                "CACHE_TYPE" => "A",
                                "FORM_BTN_OPEN" => "Заказать звонок",
                                "FORM_BTN_SUBMIT" => "Отправить",
                                "FORM_BTN_TYPE" => "header__modal",
                                "FORM_FIELDS" => array(
                                    0 => "24",
                                    1 => "25",
                                ),
                                "FORM_POLITIC_URL" => "/politic/",
                                "FORM_PRODUCT_ADD" => "N",
                                "FORM_PRODUCT_ID" => "",
                                "FORM_REQUIRED_FIELDS" => array(
                                    0 => "24",
                                    1 => "25",
                                ),
                                "FORM_TITLE" => "Оставьте заявку",
                                "IBLOCK_ID" => "14",
                                "IBLOCK_TYPE" => "forms",
                                "COMPONENT_TEMPLATE" => ".default"
                            ),
                            false
                        );?>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <nav class="header__bottom">
        <div class="container">
            <div class="row row-line">
                <div class="col-12">
                    <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"header-top_2", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "top",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => "",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "Y",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => $arParams["SETTING"]["TEMPLATE_TYPE"]!="COMPANY"?"catalog_top":"company_top",
		"USE_EXT" => "Y",
		"COMPONENT_TEMPLATE" => "header-top_2",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"MAX_ITEMS" => "6"
	),
	false
); ?>
                </div>
            </div>
        </div>
    </nav>
</header>