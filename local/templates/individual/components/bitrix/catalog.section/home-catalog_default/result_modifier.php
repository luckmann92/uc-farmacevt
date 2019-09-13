<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

if($arResult['ITEMS']){
    $resizeType = $arParams['IMAGE_TYPE'] == '2' ? BX_RESIZE_IMAGE_EXACT : BX_RESIZE_IMAGE_PROPORTIONAL_ALT;
    $index = 1;
    foreach ($arResult['ITEMS'] as $key => $arProduct){
        if($arProduct['PREVIEW_PICTURE']){
            $arResult['ITEMS'][$key]['PREVIEW_PICTURE']['SRC'] = CFile::ResizeImageGet(
                $arProduct['PREVIEW_PICTURE'],
                array(
                    'width' => 255,
                    'height' => 200
                ), $resizeType,
                true)['src'];
        } else {
            $arResult['ITEMS'][$key]['PREVIEW_PICTURE']['SRC'] = SITE_TEMPLATE_PATH.'/public/images/noPhoto.png';
            $arResult['ITEMS'][$key]['PREVIEW_PICTURE']['ALT'] = 'Изображение отсутствует';
            $arResult['ITEMS'][$key]['PREVIEW_PICTURE']['TITLE'] = 'Изображение отсутствует';
        }
        if($arProduct['IBLOCK_SECTION_ID'] > 0){
            $arResult['ITEMS'][$key]['PARENT_SECTION'] = CIBlockSection::GetByID($arProduct['IBLOCK_SECTION_ID'])->GetNext();
        }
        if ($arProduct['PROPERTIES']['PRODUCT_LABEL']['VALUE_XML_ID']) {
            $arResult['ITEMS'][$key]['PRODUCT_LABEL'] = 'label__' . $arProduct['PROPERTIES']['PRODUCT_LABEL']['VALUE_XML_ID'];
        }
        if (strlen($arProduct['PROPERTIES']['PRODUCT_PRICE']['VALUE']) > 0) {
            if (intval($arProduct['PROPERTIES']['PRODUCT_PRICE']['VALUE']) == 0) {
                $value = $arProduct['PROPERTIES']['PRODUCT_PRICE']['VALUE'];
                $currency = 'N';
            } else {
                $value = number_format($arProduct['PROPERTIES']['PRODUCT_PRICE']['VALUE'], 0, '', ' ');
                $currency = 'Y';
            }
            $arResult['ITEMS'][$key]['PRICE'] = array(
                'VALUE' => $value,
                'CURRENCY' => $currency
            );
        }
        $index++;
    }
}