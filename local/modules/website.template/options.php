<?php
$module_id = "website.template";
CModule::IncludeModule($module_id);
CModule::IncludeModule("iblock");
CModule::IncludeModule('highloadblock');

IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/options.php");
IncludeModuleLangFile(__FILE__);

$WB = new CWebsiteTemplate();
$RIGHT = $APPLICATION->GetGroupRight($module_id);

$showRightsTab = false;
$arColors = [];

foreach ($WB->arColors as $color){
    $arColors['REFERENCE'][] = $color['UF_COLOR_NAME'];
    $arColors['REFERENCE_ID'][] = $color['UF_COLOR_CODE'];
}

$arHeaders = [
    'REFERENCE_ID' => [1, 2],
    'REFERENCE' => ['Вариант 1', 'Вариант 2']
];

$arHomeViews = [
    'REFERENCE_ID' => [1, 2],
    'REFERENCE' => ['Вариант 1 (без бокового меню)', 'Вариант 2 (с боковым меню)']
];

$arTemplateTypes = [
    'REFERENCE_ID' => [1, 2, 3, 4],
    'REFERENCE' => ['Сайт компании', 'Каталог', 'Интернет-магазин']
];

if($RIGHT >= "R") {

//Вкладки
    $arTabs = [
        [
            'DIV' => 'edit1',
            'TAB' => GetMessage("WEBSITE_TEMPLATE_SETTING_VIEW_TAB"),
            'ICON' => '',
            'TITLE' => GetMessage("WEBSITE_TEMPLATE_SETTING_VIEW_TITLE")
        ],
        [
            'DIV' => 'edit2',
            'TAB' => GetMessage("WEBSITE_TEMPLATE_SETTING_SITE_TAB"),
            'ICON' => '',
            'TITLE' => GetMessage("WEBSITE_TEMPLATE_SETTING_SITE_TITLE")
        ]
    ];

//Группы
    $arGroups = [
        'SETTING_VIEW_GROUP_MAIN' => [
            'TITLE' => GetMessage('WEBSITE_TEMPLATE_SETTING_VIEW_GROUP_MAIN'),
            'TAB' => 0
        ],
        'SETTING_VIEW_GROUP_COLOR' => [
            'TITLE' => GetMessage('WEBSITE_TEMPLATE_SETTING_VIEW_GROUP_COLOR'),
            'TAB' => 0
        ],
        'SETTING_VIEW_GROUP_HEADER' => [
            'TITLE' => GetMessage('WEBSITE_TEMPLATE_SETTING_VIEW_GROUP_HEADER'),
            'TAB' => 0
        ],
        'SETTING_VIEW_GROUP_HOME' => [
            'TITLE' => GetMessage('WEBSITE_TEMPLATE_SETTING_VIEW_GROUP_HOME'),
            'TAB' => 0
        ]
    ];

//Опции
    $arOptions = array(
        'WEBSITE_TEMPLATE_SETTING_VIEW_TYPE_SAVE' => [
            'GROUP' => 'SETTING_VIEW_GROUP_MAIN',
            'TITLE' => GetMessage('WEBSITE_TEMPLATE_SETTING_VIEW_TYPE_SAVE'),
            'TYPE' => 'SELECT',
            'VALUES' => [
                'REFERENCE_ID' => ['file', 'session'],
                'REFERENCE' => ['В файле', 'В сессии']
            ],
            'SORT' => 50
        ],
        'WEBSITE_TEMPLATE_SETTING_VIEW_PANEL' => [
            'GROUP' => 'SETTING_VIEW_GROUP_MAIN',
            'TITLE' => GetMessage('WEBSITE_TEMPLATE_SETTING_VIEW_PANEL'),
            'TYPE' => 'CHECKBOX',
            'DEFAULT' => 'Y',
            'SORT' => 100
        ],
        'WEBSITE_TEMPLATE_SETTING_VIEW_COLOR_MAIN' => [
            'GROUP' => 'SETTING_VIEW_GROUP_COLOR',
            'TITLE' => GetMessage('WEBSITE_TEMPLATE_SETTING_VIEW_COLOR_MAIN'),
            'TYPE' => 'SELECT',
            'VALUES' => $arColors,
            'SORT' => 200
        ],
        'WEBSITE_TEMPLATE_SETTING_VIEW_COLOR_ACTION' => [
            'GROUP' => 'SETTING_VIEW_GROUP_COLOR',
            'TITLE' => GetMessage('WEBSITE_TEMPLATE_SETTING_VIEW_COLOR_ACTION'),
            'TYPE' => 'SELECT',
            'VALUES' => $arColors,
            'SORT' => 250
        ],
        'WEBSITE_TEMPLATE_SETTING_VIEW_HEADER' => [
            'GROUP' => 'SETTING_VIEW_GROUP_HEADER',
            'TITLE' => GetMessage('WEBSITE_TEMPLATE_SETTING_VIEW_HEADER_LIST'),
            'TYPE' => 'SELECT',
            'VALUES' => $arHeaders,
            'SORT' => 300
        ],
        'WEBSITE_TEMPLATE_SETTING_VIEW_HOME' => [
            'GROUP' => 'SETTING_VIEW_GROUP_HOME',
            'TITLE' => GetMessage('WEBSITE_TEMPLATE_SETTING_VIEW_HOME_LIST'),
            'TYPE' => 'SELECT',
            'VALUES' => $arHomeViews,
            'SORT' => 400
        ],
        'WEBSITE_TEMPLATE_SETTING_SITE_FAST_ORDER' => [
            'GROUP' => 'SETTING_SITE_GROUP_MAIN',
            'TITLE' => GetMessage('WEBSITE_TEMPLATE_SETTING_SITE_FAST_ORDER'),
            'TYPE' => 'CHECKBOX',
            'DEFAULT' => 'Y',
            'SORT' => 100
        ]
        /*
        'WEBSITE_TEMPLATE_THEME_SWITCHER' => array(
            'GROUP' => 'THEME_COLOR',
            'TITLE' => GetMessage('WEBSITE_TEMPLATE_THEME_SWITCHER'),
            'TYPE' => 'CHECKBOX',
            'DEFAULT' => 'Y',
            'SORT' => '100',
            'NOTES' => GetMessage('WEBSITE_TEMPLATE_THEME_SWITCHER_NOTICE')
        ),
        'WEBSITE_TEMPLATE_THEME_COLOR' => array(
            'GROUP' => 'THEME_COLOR',
            'TITLE' => GetMessage('WEBSITE_TEMPLATE_THEME_COLOR'),
            'TYPE' => 'SELECT',
            'VALUES' => $arColors,
            'SORT' => 200
        ),
        'WEBSITE_TEMPLATE_THEME_COLOR_ACTION' => array(
            'GROUP' => 'THEME_COLOR',
            'TITLE' => GetMessage('WEBSITE_TEMPLATE_THEME_ACTION_COLOR'),
            'TYPE' => 'SELECT',
            'VALUES' => $arColors,
            'SORT' => 300
        ),

        'WEBSITE_TEMPLATE_CATALOG_SETTING_BUY_ONE_CLICK' => array(
            'GROUP' => 'CATALOG_SETTING',
            'TITLE' => GetMessage('WEBSITE_TEMPLATE_CATALOG_SETTING_BUY_ONE_CLICK'),
            'TYPE' => 'CHECKBOX',
            'DEFAULT' => 'Y',
            'SORT' => 500
        ),*/
    );

    $opt = new CModuleOptions($module_id, $arTabs, $arGroups, $arOptions, $showRightsTab);
    $opt->ShowHTML();

}