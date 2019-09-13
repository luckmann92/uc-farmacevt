<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if($arResult['SETTING']['SHOW_PANEL'] == 'Y'){?>
    <div class="box__modal-setting animated">
        <div class="settings__tabs">
            <ul class="settings__tabs-menu">
                <li class="settings__tabs-menu-item js-tab-trigger active" data-tab="1"><a href="#">Общие настройки</a></li>
                <li class="settings__tabs-menu-item js-tab-trigger" data-tab="2"><a href="#">Главная</a></li>
                <li class="settings__tabs-menu-item js-tab-trigger" data-tab="3"><a href="#">Футер</a></li>
            </ul>
            <a class="settings__tabs-reset js-init_reset_settings" data-name="TEMPLATE_RESET" data-value="Y">
                <svg width="27" height="27" viewBox="0 0 27 27" fill="transparent" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.4286 7.92857C18.4105 5.52669 15.3843 4 12.0014 4C5.92548 4 1 8.92487 1 15C1 21.0751 5.92548 26 12.0014 26C17.9941 26 22.8678 21.209 23 15.2487" stroke="#FF1E36" stroke-width="2"/>
                    <path d="M13 8.77832H20.7782V1.00015" stroke="#FF1E36" stroke-width="2"/>
                </svg>
                <span>Сбросить</span>
            </a>
        </div>
        <div class="settings__panel">
            <div class="settings__panel-buttons-wrap">
                <div class="settings__panel-buttons">
                    <a onclick="modalClose(event);" href="#" class="settings__panel-show"></a>
                    <button class="js-init_apply_settings group__panel-submit">
                        <svg width="22" height="15" viewBox="0 0 22 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.9348 0.299139C20.536 -0.0997131 19.8894 -0.0997131 19.4905 0.299139L7.25512 12.5347L2.55203 7.83158C2.15322 7.43273 1.50663 7.43277 1.10773 7.83158C0.708881 8.23039 0.708881 8.87698 1.10773 9.27584L6.53297 14.701C6.93167 15.0998 7.57873 15.0995 7.97727 14.701L20.9348 1.74343C21.3337 1.34462 21.3336 0.697992 20.9348 0.299139Z" fill="white"/></svg>
                        Применить
                    </button>
                </div>  
            </div>
            <form action="<?=POST_FORM_ACTION_URI?>" method="get" enctype="multipart/form-data">
                <?=bitrix_sessid_post()?>
                <input type="hidden" value="Y" name="SET_SETTING">
                <div data-tab="3" class="settings__panel-content js-tab-content">
                    <?foreach ($arResult['FIELDS'] as $CODE => $arFields) {
                        switch ($CODE) {
                            case 'FOOTER':
                                ?>
                                <div class="group__panel page__view">
                                    <div class="group__theme-title">Вид футера</div>
                                    <div class="group__theme-list group__header">
                                        <?foreach ($arFields as $field) {?>
                                            <div class="col__line">
                                                <label class="view__label view__line view__footer" for="footerView__<?=$field['ID']?>">
                                                    <img src="<?=$field['PICTURE']?>" alt="">
                                                    <input type="radio"
                                                           name="<?=$CODE?>"
                                                           id="footerView__<?=$field['ID']?>"
                                                           value="<?=$field['ID']?>"
                                                        <?=$arResult['SETTING']['FOOTER'] == $field['ID'] ? 'checked' : ''?>
                                                    >
                                                    <span class="pageView__name"><?=$field['NAME']?></span>
                                                </label>
                                            </div>
                                        <?}?>
                                    </div>
                                </div>
                                <?
                                break;
                        }
                    }?>
                </div>
                <div data-tab="2" class="settings__panel-content js-tab-content">
                    <?foreach ($arResult['FIELDS'] as $CODE => $arFields) {
                        switch ($CODE) {
                            case 'SLIDER':?>
                                <div class="group__panel page__view">
                                    <div class="group__theme-title group__theme-title--checkbox">
                                        <span>Слайдер на главной</span>
                                    </div>
                                    <div class="group__theme-list">
                                        <?foreach ($arFields as $id => $field) {?>
                                            <div class="col__part" data-view-type="default">
                                                <label class="view__label view__label--slider" for="pageView__<?=$id?>" >
                                                    <img src="/local/templates/individual/components/bitrix/news.list/home-slider_<?=$id?>/preview.png" alt="">
                                                    <input type="radio" name="<?=$CODE?>" id="pageView__<?=$id?>" value="<?=$id?>"
                                                    <?=$arResult['SETTING']['SLIDER'] == $id ? 'checked' : ''?>>
                                                    <span class="pageView__name"><?=$field['NAME']?></span>
                                                </label>
                                            </div>
                                        <?}?>
                                    </div>
                                </div>
                            <?break;
                            case 'ADVANTAGE':?>
                                <div class="group__panel page__view">
                                    <div class="group__theme-title">Преимущества</div>
                                    <div class="group__theme-list group__header">
                                        <?foreach ($arFields as $id => $field) {?>
                                            <div class="col__line">
                                                <label class="view__label view__line" for="advantageView__<?=$id?>">
                                                    <img src="<?=SITE_TEMPLATE_PATH?>/components/bitrix/news.list/home-advanatges_<?=$id?>/preview.png" alt="">
                                                    <input type="radio"
                                                           name="<?=$CODE?>"
                                                           id="<?=$CODE?>View__<?=$id?>"
                                                           value="<?=$id?>"
                                                        <?=$arResult['SETTING'][$CODE] == $id ? 'checked' : ''?>
                                                    >
                                                    <span class="pageView__name"><?=$field['NAME']?></span>
                                                </label>
                                            </div>
                                        <?}?>
                                    </div>
                                </div>
                                <?break;
                            case 'REVIEWS':?>
                                <div class="group__panel page__view">
                                    <div class="group__theme-title">Блок "Отзывы"</div>
                                    <div class="group__theme-list group__header">
                                        <?foreach ($arFields as $id => $field) {?>
                                            <div class="col__line">
                                                <label class="view__label view__line" for="<?=$CODE?>View__<?=$id?>">
                                                    <img src="<?=SITE_TEMPLATE_PATH?>/components/bitrix/news.list/home-reviews_<?=$id?>/preview.png" alt="">
                                                    <input type="radio"
                                                           name="<?=$CODE?>"
                                                           id="<?=$CODE?>View__<?=$id?>"
                                                           value="<?=$id?>"
                                                        <?=$arResult['SETTING'][$CODE] == $id ? 'checked' : ''?>
                                                    >
                                                    <span class="pageView__name"><?=$field['NAME']?></span>
                                                </label>
                                            </div>
                                        <?}?>
                                    </div>
                                </div>
                            <?break;
                            case 'SECTIONS':?>
                                <div class="group__panel page__view">
                                    <div class="group__theme-title">Категории каталога</div>
                                    <div class="group__theme-list group__header">
                                        <?foreach ($arFields as $id => $field) {?>
                                            <div class="col__line">
                                                <label class="view__label view__line view__category" for="sectionsView__<?=$id?>">
                                                    <img src="<?=SITE_TEMPLATE_PATH?>/components/bitrix/catalog.section.list/home-sections_<?=$id?>/preview.png">
                                                    <input type="radio"
                                                           name="<?=$CODE?>"
                                                           id="sectionsView__<?=$id?>"
                                                           value="<?=$id?>"
                                                        <?=$arResult['SETTING'][$CODE] == $id ? 'checked' : ''?>
                                                    >
                                                    <span class="pageView__name"><?=$field['NAME']?></span>
                                                </label>
                                            </div>
                                        <?}?>
                                    </div>
                                </div>
                                <?break;
                        }
                    }?>
                </div>
                <div data-tab="1" class="settings__panel-content js-tab-content active">
                    <?foreach ($arResult['FIELDS'] as $CODE => $arFields) {
                        switch ($CODE) {
                            case 'HEADER':?>
                                <div class="group__panel page__view">
                                    <div class="group__theme-title">Вид шапки</div>
                                    <div class="group__theme-list group__header">
                                        <?foreach ($arFields as $field) {?>
                                            <div class="col__line">
                                                <label class="view__label view__line" for="headerView__<?=$field['ID']?>">
                                                    <img src="<?=$field['PICTURE']?>">
                                                    <input type="radio"
                                                           name="<?=$CODE?>"
                                                           id="headerView__<?=$field['ID']?>"
                                                           value="<?=$field['ID']?>"
                                                        <?=$arResult['SETTING']['HEADER'] == $field['ID'] ? 'checked' : ''?>
                                                    >
                                                    <span class="pageView__name"><?=$field['NAME']?></span>
                                                </label>
                                            </div>
                                        <?}?>
                                    </div>
                                </div>
                                <?break;
                            case 'FONTS':?>
                                <div class="group-inline-panel">
                                    <div class="group__panel" id="title-font">
                                        <label class="group__theme-title" for="selectMainfont">Основной шрифт</label>
                                        <div class="group__theme-list">
                                            <div class="group__theme-type">
                                                <select name="FONT[SIMPLE]"
                                                        class="group__theme-template__select"
                                                        id="selectMainfont">
                                                        <?foreach ($arFields as $field) {?>
                                                            <option value="<?=$field['FONT_CODE']?>"
                                                                <?=$arResult['SETTING']['FONT']['SIMPLE'] == $field['FONT_CODE']
                                                                    ? 'selected' : ''?>><?=$field['FONT_NAME']?></option>
                                                        <?}?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <?if ($arResult['FIELDS']['FONT_SIZE']) {?>
                                        <div class="group__panel" id="title-font">
                                            <label class="group__theme-title" for="selectMainfont">Размер шрифта</label>
                                            <div class="group__theme-list">
                                                <div class="group__theme-type">
                                                    <select name="FONT_SIZE"
                                                            class="group__theme-template__select"
                                                            id="selectSizefont">
                                                            <?foreach ($arResult['FIELDS']['FONT_SIZE'] as $id => $arFont) {?>
                                                                <option value="<?=$id?>"
                                                                    <?=$arResult['SETTING']['FONT_SIZE'] == $id
                                                                ? 'selected' : ''?>><?=$arFont?></option>
                                                            <?}?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    <?}?>
                                </div>
                                <div class="group__panel" id="simple-font">
                                    <label class="group__theme-title" for="selectTitlefont">Шрифт для заголовков</label>
                                    <div class="group__theme-list">
                                        <div class="group__theme-type">
                                            <select name="FONT[TITLE]"
                                                    class="group__theme-template__select"
                                                    id="selectTitlefont">
                                                    <?foreach ($arFields as $field) {?>
                                                        <option value="<?=$field['FONT_CODE']?>"
                                                            <?=$arResult['SETTING']['FONT']['TITLE'] == $field['FONT_CODE']
                                                                ? 'selected' : ''?>><?=$field['FONT_NAME']?></option>
                                                    <?}?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <?
                                break;
                            case 'COLORS':?>
                                <div class="group__panel">
                                    <div class="group__theme-title">Активный (основный) цвет</div>
                                    <div class="group__theme-list">
                                        <?foreach ($arFields as $id => $field) {?>
                                            <div class="theme__color theme__default">
                                                <label class="color__label"
                                                       for="actionColor_<?=$id?>"
                                                       title="<?=$field['COLOR_NAME']?>" >
                                                    <input type="radio"
                                                           name="COLORS[ACTION]"
                                                           id="actionColor_<?=$id?>"
                                                           value="<?=$field['COLOR_CODE']?>"
                                                        <?=$arResult['SETTING']['COLORS']['ACTION'] == $field['COLOR_CODE'] ? 'checked' : ''?>>
                                                    <span style="background-color: #<?=$field['COLOR_HEX']?>"></span>
                                                </label>
                                            </div>
                                        <?}?>
                                    </div>
                                </div>
                                <div class="group__panel">
                                    <div class="group__theme-title">Дополнительный цвет</div>
                                    <div class="group__theme-list">
                                        <?foreach ($arFields as $id => $field) {?>
                                            <div class="theme__color theme__default">
                                                <label class="color__label"
                                                       for="mainColor_<?=$id?>"
                                                       title="<?=$field['COLOR_NAME']?>" >
                                                    <input type="radio"
                                                           name="COLORS[MAIN]"
                                                           id="mainColor_<?=$id?>"
                                                           value="<?=$field['COLOR_CODE']?>"
                                                        <?=$arResult['SETTING']['COLORS']['MAIN'] == $field['COLOR_CODE'] ? 'checked' : ''?>>
                                                    <span style="background-color: #<?=$field['COLOR_CODE'] == 'default' ? 'fff' : $field['COLOR_HEX']?>"></span>
                                                </label>
                                            </div>
                                        <?}?>
                                    </div>
                                </div>
                                <?
                                break;
                        }
                    }?>
                </div>
            </form>
        </div>
    </div>

    <script>
        $('.js-tab-trigger').click(function() {
            var id = $(this).attr('data-tab'),
                content = $('.js-tab-content[data-tab="'+ id +'"]');

            $('.js-tab-trigger.active').removeClass('active');
            $(this).addClass('active');

            $('.js-tab-content.active').removeClass('active');
            content.addClass('active');
        });
    </script>

    <?foreach ($arResult['FIELDS']['FONTS'] as $font) {?>
        <link href="<?=$font['FONT_SRC']?>" rel="stylesheet">
    <?}
}?>