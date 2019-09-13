<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arValues = [];

$i = 0;
foreach($arResult["ITEMS"] as $arItem){
    if ($arItem["PROPERTIES"]["C_MAP"]["VALUE"]) {
        $coordinates = explode(",", $arItem["PROPERTIES"]["C_MAP"]["VALUE"]);
        $arValues['x'] = $arValues['x'] + $coordinates[0];
        $arValues['y'] = $arValues['y'] + $coordinates[1];
        $i++;
    }
}

$arResult['COORDINATES']['X'] = $arValues['x']/$i;
$arResult['COORDINATES']['Y'] = $arValues['y']/$i;