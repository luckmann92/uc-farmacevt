<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @var CMain $APPLICATION
 * @var string $headerContent
 */

$pageContent = ob_get_clean();
$pageContent = trim(implode("", $APPLICATION->buffer_content)) . $pageContent;
$APPLICATION->RestartBuffer();
ob_end_clean();

if (function_exists("getmoduleevents")) {
    foreach (GetModuleEvents("main", "OnLayoutRender", true) as $arEvent) {
        ExecuteModuleEventEx($arEvent);
    }
}

$pageLayout = $APPLICATION->GetPageProperty("PAGE_LAYOUT", AppGetCascadeDirProperties("PAGE_LAYOUT", "column1"));
$arLang = $APPLICATION->GetLang();

$pageTitle = $APPLICATION->GetPageProperty('title') ?: $APPLICATION->GetTitle(false);
?>
<!doctype html>
<html lang="<?=$arLang['LANGUAGE_ID']?>">
    <head>
        <base href="/">
        <link rel="shortcut icon" href="<?=SITE_DIR?>favicon.ico">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="UTF-8">
        <?
        \Bitrix\Main\Page\Asset::getInstance()->addCss($APPLICATION->GetTemplatePath("public/css/main.css"));
        \Bitrix\Main\Page\Asset::getInstance()->addCss($APPLICATION->GetTemplatePath("public/css/custom.css"));
        $APPLICATION->ShowHead();
        ?>
        <title><?=$arLang["SITE_NAME"] ? $pageTitle . ' - ' . $arLang["SITE_NAME"] : $pageTitle?></title>
    </head>
<body class="app">
<?
//Подключения файла настроек шаблон
require_once $_SERVER['DOCUMENT_ROOT'].'/local/tools/settings.php';
$APPLICATION->ShowPanel();
if ($USER->IsAdmin()) {

    if ($arSetting['SHOW_PANEL'] == 'Y'){
        echo '<button class="settings__panel-show"></button>';
    }
}



$APPLICATION->IncludeFile(
    "views/modules/header_responsive.php",
    array(
        "SETTING" => $arSetting
    ),
    array(
        "SHOW_BORDER" => false,
        "MODE" => "php"
    )
);

$APPLICATION->IncludeFile(
    "views/modules/header/" . $arSetting['HEADER'] . "/template.php",
    array(
        "SETTING" => $arSetting
    ),
    array(
        "SHOW_BORDER" => false,
        "MODE" => "php"
    )
);

if ($APPLICATION->GetCurPage(false) == SITE_DIR) {
    $APPLICATION->IncludeFile(
        "views/layouts/home.php",
        array(
            "CONTENT" => $pageContent,
            "SETTING" => $arSetting
        ),
        array(
            "SHOW_BORDER" => false,
            "MODE" => "php"
        )
    );
} else {
    $APPLICATION->IncludeFile(
        "views/layouts/".$pageLayout.".php",
        array(
            "CONTENT" => $pageContent,
            "SETTING" => $arSetting
        ),
        array(
            "SHOW_BORDER" => false,
            "MODE" => "php"
        )
    );
}

$APPLICATION->RestartWorkarea(true);

if (stripos($APPLICATION->GetCurPage(), 'cart') === true && $arSetting['TEMPLATE_TYPE'] != 'SHOP') {
    LocalRedirect('/');
} elseif($arSetting['TEMPLATE_TYPE'] == 'SHOP' && stripos($APPLICATION->GetCurPage(), 'cart') === false) {
    $APPLICATION->IncludeComponent(
        'website96:shop.basket',
        'panel',
        array()
    );
}

$APPLICATION->IncludeFile(
    "views/modules/footer/" . $arSetting['FOOTER'] . "/template.php",
    array(
        "SETTING" => $arSetting,
    ),
    array(
        "SHOW_BORDER" => false,
        "MODE" => "php"
    )
);

if($_COOKIE["confirm_fz152"] != 'y'){
    $APPLICATION->IncludeComponent(
        "website96:inline.value",
        "fz152",
        array(
            "COMPONENT_TEMPLATE" => "fz152",
            "VALUE" => "Сайт использует файлы cookies и сервис сбора технических данных его посетителей.  Продолжая использовать данный ресурс, вы автоматически соглашаетесь с использованием данных технологий."
        ),
        false
    );
}

$APPLICATION->IncludeFile(
    "views/scripts.php",
    array(
        "SETTING" => $arSetting,
    ),
    array(
        "SHOW_BORDER" => false,
        "MODE" => "php"
    )
);

$APPLICATION->ShowBodyScripts();
?>
</body>
</html>
