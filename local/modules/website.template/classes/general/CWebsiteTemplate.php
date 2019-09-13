<?php
CModule::IncludeModule('iblock');
CModule::IncludeModule('highloadblock');

use Bitrix\Highloadblock as HL;

class CWebsiteTemplate {
    public  $module_id = 'website.template';
    private $HLBlockIdColors = 1;
    private $HLBlockIdFonts = 2;
    private $type_save = '';

    public $colors = array();
    public $fonts = array();
    public $footers = array();
    public $headers = array();
    public $settings = array();
    public $type_templates = array();
    public $font_sizes = array();

    public function __construct($type_save = 'session')
    {
        $this->type_save = $type_save;
        if ($this->type_save == 'session') {
            $this->type_templates = array(
                'COMPANY' => 'Сайт компании',
                'CATALOG' => 'Сайт с каталогом/услугами',
                'SHOP' => 'Интернет-магазин'
            );
        }
        $this->settings = $this->getTemplateSetting();
        return $this->settings;
    }

    public function reset()
    {
        if ($this->type_save == 'session') {
            unset($_SESSION['TEMPLATE_SETTINGS']);
        } else {
            $templateSettingsFile = $_SERVER['DOCUMENT_ROOT'] . '/.settings.json';
            return unlink($templateSettingsFile) ? $this->getTemplateSetting() : false;
        }
    }

    public function loadCss()
    {
        if ($this->settings['COLORS']) {
            foreach ($this->settings['COLORS'] as $code => $value) {
                $this->getCssColorTheme($code, $value);
            }
        }

        if ($this->settings['FONT']) {
            foreach ($this->settings['FONT'] as $code => $value) {
                $this->getCssFonts($code, $value);
            }
        }

        if ($this->settings['FONT_SIZE']) {
            $this->getCssSizeFonts($this->settings['FONT_SIZE']);
        }
    }

    public function load()
    {
        $this->colors = $this->getElementsHLBlock($this->HLBlockIdColors);
        $this->fonts = $this->getElementsHLBlock($this->HLBlockIdFonts);
        $this->font_sizes = array(

        );
        $this->headers = $this->getViewTemplate('header');
        $this->footers = $this->getViewTemplate('footer');

    }

    public function setTemplateSetting($settings)
    {
        if (empty($settings)) {
            return false;
        }

        $cur_setting = $this->settings;
        foreach ($settings as $code => $value) {
            if (isset($cur_setting[$code])) {
                if (is_array($value)) {
                    foreach ($value as $k => $val) {
                        $cur_setting[$code][$k] = $val;
                    }
                } else {
                    $cur_setting[$code] = $value;
                }
            }

        }

        $templateSettingsFile = $_SERVER['DOCUMENT_ROOT'] . '/.settings.json';

        if ($this->type_save == 'session') {
            $_SESSION['TEMPLATE_SETTINGS'] = json_encode($cur_setting);
            $res = true;
        } else {
            $res = file_put_contents($templateSettingsFile, json_encode($cur_setting)) ? true : false;
        }
        return $res;
    }

    private function getViewTemplate($type)
    {
        $path = $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/views/modules/' . $type . '/';
        $arTemplates = array();

        if (is_dir($path)) {
            foreach (scandir($path) as $value) {
                if ($value !== '.' && $value !== '..') {
                    $tpl_path = $path . $value . '/';
                    if (is_dir($tpl_path)) {
                        $tpl = scandir($tpl_path);
                        $template['ID'] = $value;
                        foreach ($tpl as $file) {
                            if ($file !== '.' && $file !== '..') {
                                if (file_exists($tpl_path . 'template.php')) {
                                    if (file_exists($tpl_path . '.description.php')) {
                                        $desc = file_get_contents($tpl_path . '.description.php');
                                        $template['NAME'] = $desc ?: $value;
                                    }
                                    if (file_exists($tpl_path . 'preview.png')) {
                                        $template['PICTURE'] = SITE_TEMPLATE_PATH .'/views/modules/' . $type . '/' . $value . '/preview.png';
                                    }
                                }
                            }
                        }
                        $arTemplates[] = $template;
                        unset($template);
                    }
                }
            }
        }
        return $arTemplates;
    }

    public function getElementsHLBlock($id)
    {
        if(($entityDataClass = $this->getEntityDataClass($id)) != false){
            $rsData = $entityDataClass::getList(array('select' => array('*')));
            $elements = array();
            while ($arFields = $rsData->fetch()) {
                foreach ($arFields as $code => $field) {
                    if (strpos($code, 'UF') === false) {
                        $elements[$arFields['ID']][$code] = $field;
                    } else {
                        $elements[$arFields['ID']][str_replace('UF_', '', $code)] = $field;
                    }
                }
            }
            return $elements;
        } else {
            return false;
        }
    }

    private function getEntityDataClass($id)
    {
        $hlblock = HL\HighloadBlockTable::getById($id)->fetch();
        if($hlblock['ID'] > 0){
            $entity = HL\HighloadBlockTable::compileEntity($hlblock);
            $result = $entity->getDataClass();
        } else {
            $result = false;
        }
        return $result;
    }

    public function getCssFonts($font_type, $font_code = 'default')
    {
        if (empty($font_type)) {
            return false;
        }
        $key = $this->recursive_array_search($font_code, $this->fonts);
        if ($key && !empty($this->fonts[$key])) {
            if ($this->fonts[$key]['FONT_SRC']) {
                \Bitrix\Main\Page\Asset::getInstance()->addCss($this->fonts[$key]['FONT_SRC']);
            }
            $css = SITE_TEMPLATE_PATH . '/public/css/fonts/' . $font_type . '_' . $font_code . '.css';
            if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $css)) {
                $path = $_SERVER['DOCUMENT_ROOT'] . '/local/tools/fonts/' . $font_type . '.css';
                $content = file_get_contents($path);
                $content = str_replace($font_type, $this->fonts[$key]['FONT_NAME'], $content);
                //return $css;
                if (file_put_contents($_SERVER['DOCUMENT_ROOT'] . $css, $content)) {
                    \Bitrix\Main\Page\Asset::getInstance()->addCss($css);
                    return true;
                } else {
                    return false;
                }
            } else {
                \Bitrix\Main\Page\Asset::getInstance()->addCss($css);
                return true;
            }
        }
    }

    public function getCssSizeFonts($size)
    {
        if (empty($size)) {
            return false;
        }

        $css = SITE_TEMPLATE_PATH . '/public/css/fonts/size' . $size . '.css';
        if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $css)) {
            $path = $_SERVER['DOCUMENT_ROOT'] . '/local/tools/fonts/FONT_SIZE.css';
            $content = file_get_contents($path);
            $content = str_replace('SIZE', $size, $content);
            if (file_put_contents($_SERVER['DOCUMENT_ROOT'] . $css, $content)) {
                \Bitrix\Main\Page\Asset::getInstance()->addCss($css);
                return true;
            } else {
                return false;
            }
        } else {
            \Bitrix\Main\Page\Asset::getInstance()->addCss($css);
            return true;
        }
    }

    public function getCssColorTheme($color_type, $color_code = 'default')
    {
        if (empty($color_type)) {
            return false;
        }
        $key = $this->recursive_array_search($color_code, $this->colors);
        if ($key && !empty($this->colors[$key])) {
            $css = SITE_TEMPLATE_PATH . '/public/css/theme/' . $color_type . '_' . $color_code . '.css';
            if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $css)) {
                $path = $_SERVER['DOCUMENT_ROOT'] . '/local/tools/themes/' . $color_type . '.css';
                $content = file_get_contents($path);
                $content = str_replace($color_type, '#' . $this->colors[$key]['COLOR_HEX'], $content);
                file_put_contents($_SERVER['DOCUMENT_ROOT'] . $css, $content);
            }
            \Bitrix\Main\Page\Asset::getInstance()->addCss($css);
            return true;
        } else {
            return false;
        }
    }

    function recursive_array_search($needle, $haystack)
    {
        foreach ($haystack as $key => $value) {
            $current_key = $key;
            if ($needle === $value || (is_array($value) && $this->recursive_array_search($needle, $value) !== false)) {
                return $current_key;
            }
        }
        return false;
    }

    public function getTemplateSetting()
    {
        $templateSettingsFile = $_SERVER['DOCUMENT_ROOT'] . '/.settings.json';
        $defaultSetting = array(
            'SHOW_PANEL' => COption::GetOptionString($this->module_id, 'WEBSITE_TEMPLATE_SETTING_VIEW_PANEL', 'Y', SITE_ID),
            'TEMPLATE_TYPE' => 'CATALOG',
            'HEADER' => 'default',
            'FAST_ORDER' => 'Y',
            'FOOTER' => 'default',
            'COLORS' => array(
                'MAIN' => 'default',
                'ACTION' => 'default',
            ),
            'SECTIONS' => 'default',
            'ADVANTAGE' => 'default',
            'FONT_SIZE' => '15',
            'FONT' => array(
                'SIMPLE' => 'default',
                'TITLE' => 'default'
            ),
            'REVIEWS' => 'default',
            'LOGO' => 'default',
            'SLIDER' => 'default'
        );

        if ($this->type_save == 'session') {
            $res = strlen($_SESSION['TEMPLATE_SETTINGS']) > 1 ? $this->object_to_array(json_decode($_SESSION['TEMPLATE_SETTINGS']))
                : $defaultSetting;
        } else {
            $res = file_exists($templateSettingsFile) ? $this->object_to_array(json_decode(file_get_contents($templateSettingsFile)))
                : $defaultSetting;
        }
        return $res;
    }

    function object_to_array($data)
    {
        if (is_array($data) || is_object($data))
        {
            $result = array();
            foreach ($data as $key => $value)
            {
                $result[$key] = $this->object_to_array($value);
            }
            return $result;
        }
        return $data;
    }

    public function result()
    {
        return array(
            'TEMPLATE_TYPE' => $this->type_templates,
            'FONTS' => $this->fonts,
            'FONT_SIZE' => array(
                '13' => '13px',
                '15' => '15px',
                '17' => '17px'
            ),
            'SLIDER' => array(
                'default' => array(
                    'NAME' => 'Вариант 1'
                ),
                '2' => array(
                    'NAME' => 'Вариант 2'
                ),
            ),
            'ADVANTAGE' => array(
                'default' => array(
                    'NAME' => 'Вариант 1'
                ),
                '2' => array(
                    'NAME' => 'Вариант 2'
                ),
            ),
            'SECTIONS' => array(
                'default' => array(
                    'NAME' => 'Плитками'
                ),
                '2' => array(
                    'NAME' => 'По 4 в ряд'
                ),
                '3' => array(
                    'NAME' => 'По 3 в ряд'
                ),
            ),

            'COLORS' => $this->colors,
            'HEADER' => $this->headers,
            'FOOTER' => $this->footers
        );
    }
}