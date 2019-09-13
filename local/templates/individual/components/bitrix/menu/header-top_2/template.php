<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */
?>

<?if ($arResult['ITEMS'] || $arResult['SUB_ITEMS']){?>
    <ul class="header__list">
        <?foreach ($arResult['ITEMS'] as $k => $arItem){?>
            <?if($arItem['TEXT'] || $arItem['LINK']){?>
                <li>
                    <a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
                </li>
            <?}?>
        <?}?>
        <?if($arResult['SUB_ITEMS']) {?>
            <li class="more__menu">
                <a href="#" class="js-init_more_menu"><span class="menu__dots"></span>Еще</a>
                <ul class="submenu">
                    <?foreach ($arResult['SUB_ITEMS'] as $k => $arItem){?>
                        <?if($arItem['TEXT'] || $arItem['LINK']){?>
                            <li>
                                <a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
                            </li>
                        <?}?>
                    <?}?>
                </ul>
            </li>
        <?}?>
    </ul>
<?}?>
