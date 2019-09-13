<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<ul class="menu__sublist">
    <?foreach ($arResult as $arItem){?>
        <?if($arItem['DEPTH_LEVEL'] == 1){?>
            <li><a href="<?=$arItem['LINK']?>"><?=$arItem['TEXT']?></a></li>
        <?}?>
    <?}?>
</ul>