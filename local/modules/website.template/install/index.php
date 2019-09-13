<?
Class website_template extends CModule
{
    var $MODULE_ID = "website.template";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $MODULE_CSS;

    function website_template()
    {
        $arModuleVersion = array();

        $path = str_replace("\\", "/", __FILE__);
        $path = substr($path, 0, strlen($path) - strlen("/index.php"));
        include($path."/version.php");
        if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion))
        {
            $this->MODULE_VERSION = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        }
        $this->MODULE_NAME = GetMessage('WEBSITE_TEMPLATE_MODULE_NAME');
        $this->MODULE_DESCRIPTION = GetMessage('WEBSITE_TEMPLATE_MODULE_DESCRIPTION');
    }

    function DoInstall()
    {
        global $DOCUMENT_ROOT, $APPLICATION;
        // Install events
        RegisterModuleDependences("iblock", "OnAfterIBlockElementUpdate", "website.template", "CWebsiteTemplate", "onBeforeElementUpdateHandler");
        RegisterModule($this->MODULE_ID);
        $APPLICATION->IncludeAdminFile(GetMessage('WEBSITE_TEMPLATE_INSTALL'), $DOCUMENT_ROOT."/bitrix/modules/website.template/install/step.php");
        return true;
    }

    function DoUninstall()
    {
        global $DOCUMENT_ROOT, $APPLICATION;
        UnRegisterModuleDependences("iblock", "OnAfterIBlockElementUpdate", "website.template", "CWebsiteTemplate", "onBeforeElementUpdateHandler");
        UnRegisterModule($this->MODULE_ID);
        $APPLICATION->IncludeAdminFile(GetMessage('WEBSITE_TEMPLATE_UNINSTALL'), $DOCUMENT_ROOT."/bitrix/modules/website.template/install/unstep.php");
        return true;
    }
}